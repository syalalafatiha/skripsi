<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use Illuminate\Http\Request;

class AspekController extends Controller
{
    public function index()
    {
        $aspeks = Aspek::all();
        $data = [
            'title' => 'Data Aspek',
            'aspeks' => $aspeks,
        ];
        return view('aspek.index', $data);
    }


    public function create()
    {
        $bobotOptions = [5, 10, 15, 20, 25, 30, 40, 45, 50];
        $factors = ['Core', 'Secondary'];
        $data = [
            'title' => 'Tambah Aspek',
            'bobotOptions' => $bobotOptions,
            'factors' => $factors
        ];
        return view('aspek.create', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:aspeks|string',
            'aspek' => 'required',
            'bobot' => 'required|integer',
            'factor' => 'required|in:Core,Secondary',
        ]);

        Aspek::create($validatedData);

        return redirect()->route('aspek.index')->with('success', 'Aspek penilaian berhasil ditambahkan');
    }

    public function edit($id)
    {
        $aspek = Aspek::findOrFail($id);
        $bobotOptions = [5, 10, 15, 20, 25, 30, 35, 40, 45, 50];
        $factors = ['Core', 'Secondary'];
        $data = [
            'title' => 'Ubah Aspek',
            'aspek' => $aspek,
            'bobotOptions' => $bobotOptions,
            'factors' => $factors,
        ];
        return view('aspek.edit', $data);
    }

    /**
     * Mengupdate data aspek
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'aspek' => 'required|string|max:255',
            'bobot' => 'required|integer',
            'factor' => 'required|in:Core,Secondary',
        ]);

        $aspek = Aspek::findOrFail($id);
        $aspek->update($validatedData);

        return redirect()->route('aspek.index')->with('success', 'Data aspek berhasil diupdate.');
    }

    public function destroy($id)
    {
        try {
            $aspek = Aspek::findOrFail($id);
            $aspek->delete();
            return redirect()->route('aspek.index')->with('success', 'Data aspek berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('aspek.index')->with('error', 'Gagal menghapus data aspek: ' . $e->getMessage());
        }
    }
}
