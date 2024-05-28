<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public function getTables(){
       try{
            $tables = DB::table('tables')->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan meja',
                'data' => $tables
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Gagal mendapatkan meja',
                'data' => [],
                "error" => $e->getMessage()
            ], 500);
       }
    }

    public function getTableByStatus($status){
        try{
            $tables = DB::table('tables')->where('status', $status)->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan meja',
                'data' => $tables
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Gagal mendapatkan meja',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getTableById($id){
        try{
            $table = DB::table('tables')->where('id', $id)->first();
            return response()->json([
                'message' => 'Berhasil mendapatkan meja',
                'data' => $table
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Gagal mendapatkan meja',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getTableByNumber($number){
        try{
            $table = DB::table('tables')->where('number', $number)->first();
            return response()->json([
                'message' => 'Berhasil mendapatkan meja',
                'data' => $table
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Gagal mendapatkan meja',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getTableAvailableByCapacity($capacity){
        try{
            $tables = DB::table('tables')->where('capacity', '>=', $capacity)->where('status', 'available')->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan meja',
                'data' => $tables
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Gagal mendapatkan meja',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getTableAvailableByCapacityAndTableNumber($capacity, $table_number){
        try{
            $tables = DB::table('tables')->where('capacity', '>=', $capacity)->where('status', 'available')->where('number', $table_number)->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan meja',
                'data' => $tables
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Gagal mendapatkan meja',
                'data' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
}
