<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Reservation as Model;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    private $viewIndex = 'reservation_index';
    private $viewCreate = 'reservation_form';
    private $viewEdit = 'reservation_form';
    private $viewShow = 'reservation_show';
    private $routePrefix = 'admin.reservation';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.' . $this->viewIndex, [
            'models' => Model::latest()->paginate(10),
            'routePrefix' => $this->routePrefix,
            'title' => 'Data Reservations'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        // dd($request->meja);
        DB::beginTransaction();

         // check if the date is less than today
         if($request->date < date('Y-m-d')) {
            return redirect()->back()->with('error2', 'Tanggal tidak boleh kurang dari hari ini');
        }

        if($request->meja == null) {
            DB::rollBack();            
            return redirect()->back()->with('error2', 'Table tidak boleh kosong, mohon pilih table yang tersedia');
        }

        $count = Model::where('table_id', $request->table_id)
            ->where('date', $request->date)
            ->where('status', '!=', 'canceled')
            ->where('status', '!=', 'approved')
            ->where('status', '!=', 'done')
            ->count();

            if($count > 0) {
                DB::rollBack();
                return redirect()->back()->with('error2', 'Table sudah diresevasi, mohon pilih table yang tersedia');
            }

        try {
            $reservation = Model::create([
                'user_id' => auth()->user()->id,
                'table_id' => $request->meja,
                'name' => $request->name,
                'phone' => $request->phone,
                'date' => $request->date,
                // 'note' => $request->note,
                'status' => 'waiting payment',
                // 15 minutes from now
                // in indonesia timezone set the timezone to asia/jakarta
                'payment_due_at' => now()->addMinutes(15)->addSecond(2)->setTimezone('Asia/Jakarta')
            ]);
            
            DB::commit();
            return redirect()->route('payment', $reservation)->with('success', 'Reservation berhasil dibuat, Silahkan melakukan pembayaran melalui qris dengan waktu 15 menit');
        } catch (\Throwable $th) {
            // dd($th);
            DB::rollBack();
           return redirect()->back()->with('error2', "Reservation gagal dibuat, mohon cek koneksi anda");
        }
    }

    public function payment(Model $reservation)
    {
        return view('payment', [
            'reservation' => $reservation,
            'title' => 'Payment'
        ]);
    }

    public function paymentSuccess(Model $reservation)
    {
        return view('payment-success', [
            'reservation' => $reservation,
            'title' => 'Payment Success'
        ]);
    }

    public function paymentStore(Model $reservation, Request $request )
    {        
        DB::beginTransaction();    
        try {

            $request->validate([
                'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $reservation->update([
                'status' => 'pending',                
                'payment_proof' => $request->file('payment_proof')->store('public/' . auth()->user()->name),
                'payment_due_at' => null
            ]);

            DB::commit();
            return redirect()->route('payment.success', $reservation)->with('success', 'Terima kasih sudah melakukan pembayaran, mohon menunggu konfirmasi pembayaran');
        } catch (\Throwable $th) {
            DB::rollBack();
           return redirect()->back()->with('error2', "Pembayaran gagal, mohon isi bukti pembayaran");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Model $reservation)
    {
        return view('admin.' . $this->viewShow, [
            'model' => Model::findOrFail($reservation->id),
            'title' => 'Detail Data Menu',               
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Model $reservation)
    {
        $data = [
            'model' => $reservation,
            'method' => 'PUT',
            'route' => [$this->routePrefix . '.update', $reservation->id],
            'button' => 'UPDATE',
            'title' => 'FORM DATA EDIT RESERVATION',            
        ];
        return view('admin.' . $this->viewEdit, $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Model $reservation)
    {

        // // Checking the table available
        // $count = Model::where('table_id', $request->table_id)
        //     ->where('date', $request->date)
        //     ->where('status', '!=', 'canceled')
        //     ->where('status', '!=', 'approved')
        //     ->count();

        //     if($count > 0) {
        //         DB::rollBack();
        //         return redirect()->back()->with('error2', 'Table sudah diresevasi, mohon pilih table yang tersedia');
        //     }
        // // just edit status and table_id if needed
        DB::beginTransaction();
        try {
            $reservation->update([
                'status' => $request->status,
                // 'table_id' => $request->table_id,
                // 'date' => $request->date,
            ]);
            DB::commit();
            session()->flash('success', 'Reservation Berhasil Diupdate');
            return redirect()->route($this->routePrefix . '.index');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error2', 'Reservation Gagal Diupdate');            
            return redirect()->route($this->routePrefix . '.index');
        }
    }

    public function myReservation()
    {
        return view('my-reservation', [
            'title' => 'My Reservation',
            'reservations' => Model::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function myReservationDetail(Model $reservation)
    {
        return view('my-reservation-detail', [
            'title' => 'My Reservation Detail',
            'model' => $reservation
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Model $reservation)
    {
        DB::beginTransaction();
        try {
            $reservation->delete();
            DB::commit();
            session()->flash('success', 'Reservation Berhasil Dihapus');
            return redirect()->route($this->routePrefix . '.index');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error2', 'Reservation Gagal Dihapus');            
            return redirect()->route($this->routePrefix . '.index');
        }
    }
}
