<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    // PERTEMUAN 7 - CRUD USER: Menampilkan seluruh data User (READ).
    public function index()
    {
        $dataUser = User::all();


        return view('admin.user.index', compact('dataUser'));
    }


    // PERTEMUAN 7 - CRUD USER: Menampilkan form tambah User (CREATE).
    public function create()
    {
        return view('admin.user.create');
    }


    // PERTEMUAN 7 - CRUD USER: Memvalidasi dan menyimpan User baru.
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect()
            ->route('user.index')
            ->with('success', 'Data User berhasil ditambahkan!');
    }


    // PERTEMUAN 7 - CRUD USER: Mengambil data User untuk form edit.
    public function edit($id)
    {
        $user = User::findOrFail($id);


        return view('admin.user.edit', compact('user'));
    }


    // PERTEMUAN 7 - CRUD USER: Memvalidasi dan memperbarui data User.
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);


        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            // Password boleh kosong saat edit. Jika diisi, minimal 8 karakter
            // dan harus sama dengan password_confirmation.
            'password' => 'nullable|min:8|confirmed',
        ]);


        // Password lama dipertahankan jika kolom password tidak diisi.
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }


        $user->update($data);


        return redirect()
            ->route('user.index')
            ->with('success', 'Data User berhasil diperbarui!');
    }


    // PERTEMUAN 7 - CRUD USER: Menghapus data User (DELETE).
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();


        return redirect()
            ->route('user.index')
            ->with('success', 'Data User berhasil dihapus!');
    }
}


