<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan daftar mahasiswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $title = 'Data Pengguna';
        return view('users.index', compact('users', 'title'));
    }

    /**
     * Menampilkan form untuk menambah data mahasiswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = User::getEnumValues();
        $title = 'Tambah Pengguna';
        return view('users.create', compact('roles', 'title'));
    }

    /**
     * Menyimpan data mahasiswa baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required|in:admin,user',
        ]);

        // Hash the password before saving
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Menampilkan detail mahasiswa berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $title = 'Detail Pengguna';
        return view('users.detail', compact('user', 'title'));
    }

    /**
     * Menampilkan form untuk mengedit data mahasiswa.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = ['admin', 'user'];
        $title = 'Ubah Data Pengguna';
        return view('users.edit', compact('user', 'roles', 'title'));
    }

    /**
     * Memperbarui data mahasiswa di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $user = User::findOrFail($id);
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'username' => 'required|unique:users,username,' . $user->id,
            'password' => 'sometimes|required',
            'role' => 'required|in:admin,user',
        ]);

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'role' => $request->role,
        ]);

        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('users.index');
    }

    /**
     * Menghapus data mahasiswa dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Gagal menghapus pengguna: ' . $e->getMessage());
        }
    }
}
