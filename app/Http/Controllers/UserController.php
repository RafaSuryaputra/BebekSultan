<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $viewIndex = 'user_index';
    private $viewCreate = 'user_form';
    private $viewEdit = 'user_form';
    private $viewShow = 'user_show';
    private $routePrefix = 'admin.user';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.' . $this->viewIndex, [
            'models' => Model::latest()->get(),
            'routePrefix' => $this->routePrefix,
            'title' => 'Data User'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'model' => new Model(),
            'method' => 'POST',
            'route' => $this->routePrefix . '.store',
            'button' => 'SIMPAN',
            'title' => 'FORM DATA USER',
        ];
        return view('admin.' . $this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        try {

            $userStore = Model::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request->password),
            ]);

            if ($userStore['password'] == null) {
                unset($userStore['password']); 
            } else {
                $userStore['password'] = Hash::make($userStore['password']);
            }

            if ($request->role == 'admin') {
                $userStore->assignRole('admin');
            } else {
                $userStore->assignRole('user');
            }

            DB::commit();
            session()->flash('success', 'User Berhasil Ditambahkan');
            return back();
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            session()->flash('error2', 'User Gagal Ditambahkan');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Model $user)
    {
        return view('admin.' . $this->viewShow, [
            'model' => Model::findOrFail($user->id),
            'title' => 'Detail Data User',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Model $user)
    {
        $userEdit = Model::findOrFail($user->id);

        $data = [
            'model' => $userEdit,
            'method' => 'PUT',
            'route' => [$this->routePrefix . '.update', $user->id],
            'button' => 'UPDATE',
            'title' => 'FORM DATA EDIT USER',
        ];
        return view('admin.' . $this->viewEdit, $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        DB::beginTransaction();
        try {

            $userStore = [
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request->password),
            ];

            $updateUser = Model::findOrFail($id);

            if ($request->filled('role')) {
                $updateUser->syncRoles($request->role);
            }

            $updateUser->update($userStore);
            $updateUser->save();

            DB::commit();
            session()->flash('success', 'User Berhasil Diupdate');
            return back();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            session()->flash('error2', 'User Gagal Diupdate');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Model $user)
    {
        DB::beginTransaction();
        try {
            Model::findOrFail($user->id)->delete();           
            DB::commit();
            session()->flash('success', 'User Berhasil Dihapus');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();            
            session()->flash('error2', 'User Gagal Dihapus');
            return redirect()->back();
        }
    }
}
