<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExport;
use App\Models\Mahasiswa;
use App\Models\Hitung;

class ExportController extends Controller
{
    public function index()
    {
        // Ambil mahasiswa yang memiliki ranking di tabel Hitung
        $data = Mahasiswa::whereHas('hitungs', function ($query) {
            $query->whereNotNull('rangking'); // Pastikan hanya mahasiswa yang punya ranking
        })
            ->with(['hitungs' => function ($query) {
                $query->orderBy('rangking', 'asc'); // Urutkan berdasarkan ranking
            }])
            ->get();

        $title = 'Cetak Data Penerima Beasiswa Scientist';

        return view('export.index', compact('data', 'title'));
    }

    public function exportSeleksi()
    {
        return Excel::download(new DataExport, 'data-penerima-scientist.xlsx');
    }
}
