<?php

namespace App\Http\Controllers;

use App\Models\Occurrence;
use Illuminate\Http\Request;

class OccurrenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index-occurrence');
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
    public function store(Request $request)
    {
        $request->validate([
            'occurrenceType' => 'required',
            'description' => 'required',
            'attachment' => 'nullable|image|max:1024',
        ]);

        $occurrence = Occurrence::create([
            'occurrence_type_id' => $request->input('occurrenceType'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('attachment')) {
            $occurrence->addMedia($request->file('attachment'))
                ->toMediaCollection('attachments');
        }


        return redirect()->back()->with('success', 'Occurrence saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Occurrence $occurrence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Occurrence $occurrence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Occurrence $occurrence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Occurrence $occurrence)
    {
        //
    }
}
