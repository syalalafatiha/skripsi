<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    public function index()
    {
        $sub_kriterias = SubKriteria::with('kriteria')->get();
        $data = [
            'title' => 'Data Sub Kriteria',
            'sub_kriterias' => $sub_kriterias,
        ];
        return view('sub-kriteria.index', $data);
    }

    public function create()
    {
        $title = 'Tambah Sub Kriteria Penilaian';
        $kriteriaOptions = Kriteria::all();
        $subkriteria = new SubKriteria();
        return view('sub-kriteria.create', compact('title', 'kriteriaOptions', 'subkriteria'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:sub_kriterias',
            'kriteria_id' => 'required|exists:kriterias,id',
            'sub_kriteria' => 'required',
            'nilai' => 'required|numeric',
        ]);

        SubKriteria::create($request->only(['id', 'kriteria_id', 'sub_kriteria', 'nilai']));
        return redirect()->route('sub-kriteria.index')->with('success', 'Data sub-kriteria berhasil ditambahkan');
    }

    public function edit($id)
    {
        $title = 'Ubah Sub Kriteria Penilaian';
        $subkriteria = SubKriteria::find($id);
        $kriteriaOptions = Kriteria::all();
        return view('sub-kriteria.edit', compact('title', 'subkriteria', 'kriteriaOptions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kriteria_id' => 'required|exists:kriterias,id',
            'sub_kriteria' => 'required',
            'nilai' => 'required|numeric',
        ]);

        SubKriteria::where('id', $id)->update($request->only(['id', 'kriteria_id', 'sub_kriteria', 'nilai']));
        return redirect()->route('sub-kriteria.index')->with('success', 'Sub-kriteria berhasil diupdate!');
    }

    public function destroy($id)
    {
        SubKriteria::where('id', $id)->delete();
        return redirect()->route('sub-kriteria.index')->with('success', 'Sub-kriteria berhasil dihapus!');
    }
}
