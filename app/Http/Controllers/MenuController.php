<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu as Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{

    private $viewIndex = 'menu_index';
    private $viewCreate = 'menu_form';
    private $viewEdit = 'menu_form';
    private $viewShow = 'menu_show';
    private $routePrefix = 'admin.menu';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.' . $this->viewIndex, [
            'models' => Model::latest()->get(),
            'routePrefix' => $this->routePrefix,
            'title' => 'Data Menu'
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
            'title' => 'FORM DATA MENU',
        ];
        return view('admin.' . $this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {        
        DB::beginTransaction();
        try {            

            $menu = Model::create([
                'name' => $request['name'],
                'price' => $request['price'],
                'description' => $request['description'],
                'category' => $request['category'],
                'tags' => $request['tags'],
                'image' => $request->file('image')->store('public/menus'),            
            ]);

            DB::commit();
            session()->flash('success', 'Menu Berhasil Ditambahkan');
            return back();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            session()->flash('error2', 'Menu Gagal Ditambahkan');            
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Model $menu)
    {
        return view('admin.' . $this->viewShow, [
            'model' => Model::findOrFail($menu->id),
            'title' => 'Detail Data Menu',               
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Model $menu)
    {
        $menu = Model::findOrFail($menu->id);          

        $data = [
            'model' => $menu,
            'method' => 'PUT',
            'route' => [$this->routePrefix . '.update', $menu->id],
            'button' => 'UPDATE',
            'title' => 'FORM DATA EDIT MENU',            
        ];
        return view('admin.' . $this->viewEdit, $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Model $menu)
    {        
        DB::beginTransaction();
        try {
            
           $menuUpdate = [
                'name' => $request['name'],
                'price' => $request['price'],
                'description' => $request['description'],
                'category' => $request['category'],
                'tags' => $request['tags'],            
            ];

            $model = Model::findOrFail($menu->id);
            
            if ($request->hasFile('image')) {
                Storage::delete($model->image);
                $menuUpdate['image'] = $request->file('image')->store('public/menus');
            }   

            $model->update($menuUpdate);
            $model->save();            
            DB::commit();
            session()->flash('success', 'Menu Berhasil Diupdate');
            return back();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            session()->flash('error2', 'Menu Gagal Diupdate');        
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Model $menu)
    {
        DB::beginTransaction();
        try {
            Model::findOrFail($menu->id)->delete();
            Storage::delete($menu->image);
            DB::commit();
            session()->flash('success', 'Berhasil Menghapus Menu');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error2', 'Gagal Menghapus Menu');
            return redirect()->back();
        }
    }
}
