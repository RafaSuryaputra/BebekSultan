<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function getMenus(){
        try{
            $menus = DB::table('menus')->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan menu',
                'data' => $menus
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Gagal mendapatkan menu',
                'data' => []
            ], 500);
        }
    }

    public function getMenuById($id){
        try{
            $menu = DB::table('menus')->where('id', $id)->first();
            return response()->json([
                'message' => 'Berhasil mendapatkan menu',
                'data' => $menu
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Gagal mendapatkan menu',
                'data' => []
            ], 500);
        }
    }

    public function searchMenu($keyword){
        try{
            // using nicolaslopezj/searchable
            $menus = DB::table('menus')->search($keyword)->get();               
            return response()->json([
                'message' => 'Berhasil mendapatkan menu',
                'data' => $menus
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Gagal mendapatkan menu',
                'data' => []
            ], 500);
        }
    }

    public function getMenuAvailableStock(){
        try{
            $menus = DB::table('menus')->where('stock', '>', 0)->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan menu',
                'data' => $menus
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Gagal mendapatkan menu',
                'data' => []
            ], 500);
        }
    }

    public function getMenuNotAvailableStock(){
        try{
            $menus = DB::table('menus')->where('stock', '<=', 0)->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan menu',
                'data' => $menus
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Gagal mendapatkan menu',
                'data' => []
            ], 500);
        }
    }

    public function getMenuByPrice($price){
        try{
            $menus = DB::table('menus')->where('price', '>=', $price)->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan menu',
                'data' => $menus
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Gagal mendapatkan menu',
                'data' => []
            ], 500);
        }
    }

    public function getMenuByPriceLessThan($price){
        try{
            $menus = DB::table('menus')->where('price', '<=', $price)->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan menu',
                'data' => $menus
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Gagal mendapatkan menu',
                'data' => []
            ], 500);
        }
    }

    public function getMenuByPriceBetween($price1, $price2){
        try{
            $menus = DB::table('menus')->whereBetween('price', [$price1, $price2])->get();
            return response()->json([
                'message' => 'Berhasil mendapatkan menu',
                'data' => $menus
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Gagal mendapatkan menu',
                'data' => []
            ], 500);
        }
    }
}
