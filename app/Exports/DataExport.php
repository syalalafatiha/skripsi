<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DataExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        // Ambil mahasiswa yang memiliki ranking di tabel hitung
        return Mahasiswa::whereHas('hitungs', function ($query) {
            $query->whereNotNull('rangking'); // Pastikan mahasiswa memiliki ranking
        })
            ->with(['hitungs' => function ($query) {
                $query->orderBy('rangking', 'asc'); // Urutkan ranking terkecil lebih dulu
            }])
            ->get()
            ->map(function ($mahasiswa) {
                // Ambil hanya ranking tertinggi (terkecil) dari tabel hitung
                $mahasiswa->ranking_tertinggi = $mahasiswa->hitungs->first()->rangking ?? '-';
                return $mahasiswa;
            })
            ->unique('id'); // Pastikan hanya satu mahasiswa per ID
    }

    public function headings(): array
    {
        return ["Nama", "Universitas", "Program Studi", "Alamat", "Nominal UKT", "Ranking Tertinggi"];
    }

    public function map($row): array
    {
        return [
            $row->nama,
            $row->universitas,
            $row->prodi,
            $row->alamat,
            $row->ukt,
            $row->ranking_tertinggi, // Ranking tertinggi dari tabel hitung
        ];
    }
}
