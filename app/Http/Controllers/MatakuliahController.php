<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        return "Menampilkan data matakuliah";
    }

    public function create()
    {
        return "Menampilkan form tambah matakuliah";
    }

    public function store(Request $request)
    {
        return "Proses menyimpan data matakuliah baru";
    }

    public function show($kode = null)
    {
        if ($kode) {
            return "Anda mengakses matakuliah " . $kode;
        }

        return "Masukkan kode matakuliah!";
    }

    public function edit($id)
    {
        return "Menampilkan form edit matakuliah dengan ID: " . $id;
    }

    public function update(Request $request, $id)
    {
        return "Proses memperbarui data matakuliah dengan ID: " . $id;
    }

    public function destroy($id)
    {
        return "Proses menghapus data matakuliah dengan ID: " . $id;
    }
}