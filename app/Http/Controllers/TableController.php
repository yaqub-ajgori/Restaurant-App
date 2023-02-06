<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Requests\TableStoreRequest;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::all();
        return view('admin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableStoreRequest $request)
    {
        Table::create([
            'name' => $request->name,
            'guests_number' => $request->guests_number,
            'status' => $request->status,
            'location' => $request->location,
         ]);

        return redirect()->route('admin.tables.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        return view('admin.tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(TableStoreRequest $request, Table $table)
    {
        $table->update([
            'name' => $request->name,
            'guests_number' => $request->guests_number,
            'status' => $request->status,
            'location' => $request->location,
         ]);

        return redirect()->route('admin.tables.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        $table->delete();
        return redirect()->route('admin.tables.index');
    }
}
