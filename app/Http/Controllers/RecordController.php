<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::all();
        return view('events.index', compact('records'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
        ]);

        Record::create($request->all());

        return redirect()->route('events.index')->with('success', 'Record added successfully.');
    }

    public function edit(Record $record)
    {
        return view('events.edit', compact('record'));
    }

    public function update(Request $request, Record $record)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
        ]);

        $record->update($request->all());

        return redirect()->route('events.index')->with('success', 'Record updated successfully.');
    }

    public function destroy(Record $record)
    {
        $record->delete();
        return redirect()->route('events.index')->with('success', 'Record deleted successfully.');
    }
}
