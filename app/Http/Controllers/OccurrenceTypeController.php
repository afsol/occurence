<?php

namespace App\Http\Controllers;

use App\Models\OccurrenceType;
use App\Http\Requests\StoreOccurrenceTypeRequest;
use App\Http\Requests\UpdateOccurrenceTypeRequest;

class OccurrenceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('users.index-occurrence-type');
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
    public function store(StoreOccurrenceTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OccurrenceType $occurrenceType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OccurrenceType $occurrenceType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOccurrenceTypeRequest $request, OccurrenceType $occurrenceType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OccurrenceType $occurrenceType)
    {
        //
    }
}
