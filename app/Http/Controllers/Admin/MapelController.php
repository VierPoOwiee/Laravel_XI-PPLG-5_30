<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mapel;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapels = Mapel::all();
        return view('admin.mapel.index', compact('mapels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_mapel' => 'required | unique:mapels',
            'nama_mapel' => 'required',
            'id_guru' => 'required | unique:mapels',
            'nama_guru' => 'required',
        ]);
        Mapel::create($request->all());
        return redirect()->route('mapels.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mapel $mapel)
    {
        return view('admin.mapel.edit', compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapel)
    {
        $validated = $request->validate([
            'id_mapel' => 'required | unique:mapels,id_mapel,' . $mapel->id,
            'nama_mapel' => 'required',
            'id_guru' => 'required | unique:mapels,id_guru,' . $mapel->id,
            'nama_guru' => 'required',
        ]);

        $mapel->update($validated);
        return redirect()->route('mapels.index')->with('success', 'Data mata pelajaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapel)
    {
        try {
            $mapel->delete();
            return redirect()->route('mapels.index')->with('success', 'Data mata pelajaran berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('mapels.index')->with('error', 'Gagal menghapus data mata pelajaran. ' . $e->getMessage());
        }
    }
}
