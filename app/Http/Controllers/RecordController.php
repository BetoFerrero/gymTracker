<?php

namespace App\Http\Controllers;
use App\Models\Routine;
use App\Models\Record;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRecordRequest;
use App\Http\Requests\UpdateRecordRequest;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('record.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createFrom(Request $request, $id)
    {
        $routine = Routine::findOrFail($id);
        $records = Record::where('routine_id', $id)->get();
        return view('record.create', compact('routine', 'records'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecordRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Record $record)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecordRequest $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        //
    }
}
