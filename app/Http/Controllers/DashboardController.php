<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $title = 'Dashboard Admin'; // Tambahkan judul
        $dataUser = User::count();
        $dataMahasiswa = Mahasiswa::count();
        $dataAspek = Aspek::count();
        $dataKriteria = Kriteria::count();

        return view('admin.dashboard', compact('title', 'dataUser', 'dataMahasiswa', 'dataAspek', 'dataKriteria'));
    }

    public function userDashboard()
    {
        $userId = Auth::id();
        $title = 'Dashboard'; // Tambahkan judul
        $dataUser = User::count();
        $dataMahasiswa = Mahasiswa::count();
        $dataAspek = Aspek::count();
        $dataKriteria = Kriteria::count();

        return view('user.dashboard', compact('title', 'dataUser', 'dataMahasiswa', 'dataAspek', 'dataKriteria'));
    }
}
