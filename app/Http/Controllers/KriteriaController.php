<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::with('aspek')->get();
        $data = [
            'title' => 'Data Kriteria',
            'kriterias' => $kriterias,
        ];
        return view('kriteria.index', $data);
    }

    public function create()
    {
        $title = 'Tambah Kriteria Penilaian';
        $aspekOptions = Aspek::all();
        $kriteria = new Kriteria();
        $factors = [
            'core' => 'Core Factor',
            'secondary' => 'Secondary Factor',
        ];

        return view('kriteria.create', compact('title', 'aspekOptions', 'kriteria', 'factors'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:kriterias',
            'aspek_id' => 'required|exists:aspeks,id',
            'kriteria' => 'required',
            'factor' => 'required',
            'nilai_target' => 'required',
        ]);

        Kriteria::create($validatedData);

        return redirect()->route('kriteria.index')->with('success', 'Data kriteria berhasil ditambahkan');
    }

    public function edit($id)
    {
        $title = 'Ubah Kriteria Penilaian';
        $kriteria = Kriteria::find($id);
        $aspekOptions = Aspek::pluck('aspek', 'id');
        $factors = [
            'core' => 'Core Factor',
            'secondary' => 'Secondary Factor',
        ];

        return view('kriteria.edit', compact('title', 'kriteria', 'aspekOptions', 'factors'));
    }

    /**
     * Mengupdate kriteria
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'aspek_id' => 'required',
            'kriteria' => 'required',
            'factor' => 'required',
            'nilai_target' => 'required|numeric',
        ]);

        Kriteria::where('id', $id)->update([
            'aspek_id' => $request->aspek_id,
            'kriteria' => $request->kriteria,
            'factor' => $request->factor,
            'nilai_target' => $request->nilai_target,
        ]);

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil diupdate!');
    }

    /**
     * Menghapus kriteria
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kriteria::where('id', $id)->delete();

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus!');
    }
}
