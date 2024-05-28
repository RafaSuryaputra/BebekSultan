<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function getReservations()
    {
        try {
            $reservations = DB::table('reservations')->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan reservasi',
                'data' => $reservations
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan reservasi',
                'data' => [],
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function getReservationById($id)
    {
        try {
            $reservation = DB::table('reservations')->where('id', $id)->first();
            return response()->json([
                'message' => 'Berhasil mendapatkan reservasi',
                'data' => $reservation
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan reservasi',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Reservation field 
    // 'user_id' => $request->user()->id,
    // 'table_id' => $request->table_id,
    // 'payment_method' => $request->payment_method,
    // 'payment_proof' => $request->payment_proof,
    // 'note' => $request->note,
    // 'status' => 'pending',

    public function createReservation(Request $request)
    {
        try {
            $reservation = DB::table('reservations')->insert([
                'user_id' => $request->id,
                'table_id' => $request->table_id,
                'payment_method' => $request->payment_method,
                'payment_proof' => $request->payment_proof,
                'note' => $request->note,
                'status' => 'pending',
            ]);
            return response()->json([
                'message' => 'Berhasil Membuat Reservasi',
                'data' => $reservation
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal Membuat Reservasi',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateReservation(Request $request, $id)
    {
        try {
            $reservation = DB::table('reservations')->where('id', $id)->update([
                'user_id' => $request->id,
                'table_id' => $request->table_id,
                'payment_method' => $request->payment_method,
                'payment_proof' => $request->payment_proof,
                'note' => $request->note,
                'status' => $request->status,
            ]);
            return response()->json([
                'message' => 'Berhasil Mengubah Reservasi',
                'data' => $reservation
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal Mengubah Reservasi',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteReservation($id)
    {
        try {
            $reservation = DB::table('reservations')->where('id', $id)->delete();
            return response()->json([
                'message' => 'Berhasil Menghapus Reservasi',
                'data' => $reservation
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal Menghapus Reservasi',
                'data' => []
                , 'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getReservationByUserId($id)
    {
        try {
            $reservation = DB::table('reservations')->where('user_id', $id)->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan reservasi',
                'data' => $reservation
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan reservasi',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getReservationByTableId($id)
    {
        try {
            $reservation = DB::table('reservations')->where('table_id', $id)->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan reservasi',
                'data' => $reservation
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan reservasi',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getReservationByStatus($status)
    {
        try {
            $reservation = DB::table('reservations')->where('status', $status)->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan reservasi',
                'data' => $reservation
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan reservasi',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getReservationByStatusAndUserId($status, $id)
    {
        try {
            $reservation = DB::table('reservations')->where('status', $status)->where('user_id', $id)->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan reservasi',
                'data' => $reservation
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan reservasi',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getReservationByStatusAndTableId($status, $id)
    {
        try {
            $reservation = DB::table('reservations')->where('status', $status)->where('table_id', $id)->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan reservasi',
                'data' => $reservation
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan reservasi',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getReservationByStatusAndUserIdAndTableId($status, $id, $id2)
    {
        try {
            $reservation = DB::table('reservations')->where('status', $status)->where('user_id', $id)->where('table_id', $id2)->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan reservasi',
                'data' => $reservation
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan reservasi',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getReservationByUserIdAndTableId($id, $id2)
    {
        try {
            $reservation = DB::table('reservations')->where('user_id', $id)->where('table_id', $id2)->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan reservasi',
                'data' => $reservation
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan reservasi',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function searchReservation($keyword)
    {
        try {
            // using nicolaslopezj/searchable
            $reservations = DB::table('reservations')->search($keyword)->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan reservasi',
                'data' => $reservations
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan reservasi',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }          

    public function searchReservationByUserId($keyword, $id)
    {
        try {
            // using nicolaslopezj/searchable
            $reservations = DB::table('reservations')->search($keyword)->where('user_id', $id)->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan reservasi',
                'data' => $reservations
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan reservasi',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function searchReservationByUserIdPost(Request $request)
    {
        try {
            // using nicolaslopezj/searchable
            $reservations = DB::table('reservations')->search($request->keyword)->where('user_id', $request->id)->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan reservasi',
                'data' => $reservations
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan reservasi',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getNotAvailableTablesByReservation()
{
    try {
        $currentDay = Carbon::now()->format('Y-m-d');

        $notAvailableTables = DB::table('tables')
            ->whereNotIn('id', function ($query) use ($currentDay) {
                $query->select('table_id')
                    ->from('reservations')
                    ->whereDate('created_at', $currentDay)
                    ->whereIn('status', ['approved']);
            })
            ->whereIn('status', ['occupied', 'reserved'])
            ->get();

        return response()->json([
            'message' => 'Successfully retrieved not available tables by reservation',
            'data' => $notAvailableTables,
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Failed to retrieve not available tables by reservation',
            'data' => [],
            'error' => $e->getMessage(),
        ], 500);
    }
}

public function getAvailableTablesByReservation()
{
    try {
        $currentDay = Carbon::now()->format('Y-m-d');

        $availableTables = DB::table('tables')
            ->where('status', 'available')
            ->whereIn('id', function ($query) use ($currentDay) {
                $query->select('table_id')
                    ->from('reservations')
                    ->whereDate('created_at', $currentDay)
                    ->whereIn('status', ['approved']);
            })
            ->get();

        return response()->json([
            'message' => 'Successfully retrieved available tables by reservation',
            'data' => $availableTables,
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Failed to retrieve available tables by reservation',
            'data' => [],
            'error' => $e->getMessage(),
        ], 500);
    }
}

}
