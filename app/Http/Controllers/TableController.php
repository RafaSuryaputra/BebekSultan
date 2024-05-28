<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TableController extends Controller
{

    public function reservationTables(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'date' => 'required',
        ]);

        // check if the date is less than today
        if($request->date < date('Y-m-d')) {
            return redirect()->back()->with('error2', 'Tanggal tidak boleh kurang dari hari ini');
        }
               
            $tables = DB::table('tables')->get();
    
            $availabilityResults = [];
    
            foreach ($tables as $table) {
                $tableId = $table->id;
                
                if($table->status === 'maintainance') {
                    $availabilityResults[$tableId] = 0;
                    continue;
                }

                // Check if the table is available and not reserved or approved in any reservation
                $isAvailable = DB::table('reservations')
                    ->whereDate('date', $request->date)
                    ->where('table_id', $tableId)
                    ->whereNotIn('status', ['canceled','done'])
                    ->count() === 0;
    
                $availabilityResults[$tableId] = $isAvailable ? 1 : 0;
            }                                                        

        return view('reservation_table', [
            'title' => 'Table',
            'name' => $request->name,
            'phone' => $request->phone,
            'date' => $request->date,
            'availableTable' => $availabilityResults
        ]);
    }

    // same as reservationTables but return json
    public function getAvailableTable(Request $request)
    {
         // check if the date is less than today
         if($request->date < date('Y-m-d')) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tanggal tidak boleh kurang dari hari ini'
            ], 404);
        }

        // using try catch to handle error
        try {
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'date' => 'required',
            ]);
    
            $tables = DB::table('tables')->get();
    
            $availabilityResults = [];
    
            foreach ($tables as $table) {
                $tableId = $table->id;
                
                if($table->status === 'maintainance') {
                    $availabilityResults[$tableId] = 0;
                    continue;
                }
    
                // Check if the table is available and not reserved or approved in any reservation
                $isAvailable = DB::table('reservations')
                    ->whereDate('date', $request->date)
                    ->where('table_id', $tableId)
                    ->whereNotIn('status', [ 'canceled','done'])
                    ->count() === 0;
    
                $availabilityResults[$tableId] = $isAvailable ? 1 : 0;
            }
            
            $data = [
                'name' => $request->name,
                'phone' => $request->phone,
                'date' => $request->date,
                'availableTable' => $availabilityResults
            ];
    
            return view('getAvailaibleTable', $data);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreTableRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTableRequest $request, Table $table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        //
    }
}
