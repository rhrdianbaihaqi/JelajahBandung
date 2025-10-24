<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index($id_paket)
    {
        $paket = PaketWisata::findOrFail($id_paket);
        $fasilitas = Fasilitas::where('id_paket', $id_paket)->orderBy('included', 'desc')->get();
        return view('admin.fasilitas.index', compact('fasilitas', 'paket'));
    }

    public function create($id_paket)
    {
        $paket = PaketWisata::findOrFail($id_paket);
        return view('admin.fasilitas.create', compact('paket'));
    }

    public function store(Request $request, $id_paket)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'included' => 'required|boolean',
        ]);

        Fasilitas::create([
            'nama_fasilitas' => $request->nama_fasilitas,
            'included' => $request->included,
            'id_paket' => $id_paket,
        ]);

        return redirect()->route('admin.fasilitas.index', ['id_paket' => $id_paket])
                         ->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function show(Fasilitas $fasilitas)
    {
        //
    }

    public function edit($id_fasilitas)
    {
        $fasilitas = Fasilitas::findOrFail($id_fasilitas);
        $paket = PaketWisata::findOrFail($fasilitas->id_paket); // ambil paket dari id_paket
        return view('admin.fasilitas.edit', compact('fasilitas', 'paket'));
    }

    public function update(Request $request, $id_fasilitas)
    {
        $fasilitas = Fasilitas::findOrFail($id_fasilitas);

        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'included' => 'required|boolean',
        ]);

        $fasilitas->update($request->only(['nama_fasilitas', 'included']));

        return redirect()->route('admin.fasilitas.index', ['id_paket' => $fasilitas->id_paket])
                         ->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy($id_fasilitas)
    {
        $fasilitas = Fasilitas::findOrFail($id_fasilitas);
        $id_paket = $fasilitas->id_paket;
        $fasilitas->delete();

        return redirect()->route('admin.fasilitas.index', ['id_paket' => $id_paket])
                         ->with('success', 'Fasilitas berhasil dihapus.');
    }
}
