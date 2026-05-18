<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kotas = Kota::all();
        return view('kota.index', compact('kotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Kota::create($request->all());

        return redirect()->route('kota.index')->with('success', 'Kota berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kota $kota)
    {
        return view('kota.show', compact('kota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kota $kota)
    {
        return view('kota.edit', compact('kota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kota $kota)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kota->update($request->all());

        return redirect()->route('kota.index')->with('success', 'Kota berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kota $kota)
    {
        $kota->delete();

        return redirect()->route('kota.index')->with('success', 'Kota berhasil dihapus.');
    }
}
