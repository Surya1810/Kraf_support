<?php

namespace App\Http\Controllers;

use App\Models\Notulen;
use Illuminate\Http\Request;

class NotulenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notulen = Notulen::all();

        return view('notulen.index', compact('notulen'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notulen $notulen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notulen $notulen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notulen $notulen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notulen $notulen)
    {
        //
    }
}
