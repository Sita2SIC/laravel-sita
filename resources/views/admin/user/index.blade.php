@extends('layouts.admin.app')
@section('content')


{{-- Notifikasi berhasil --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mx-4"
         role="alert">
        {{ session('success') }}




        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@endif




{{-- Notifikasi gagal validasi --}}
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mx-4"
         role="alert">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach




        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@endif




            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Data User</h1>
                    <p class="mb-0">List data seluruh user</p>
                </div>
                <div>
                   <a href="{{ route('user.create') }}"
                    class="btn btn-success text-white">
                        Tambah User
</a>
                </div>
            </div>




        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-user" class="table table-centered table-nowrap mb-0 rounded">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-0">Nama</th>
                                        <th class="border-0">Email</th>
                                        <th class="border-0">Password</th>
                                        <th class="border-0 rounded-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($dataUser as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->password }}</td>
                                            <td>
                                                {{-- Baris 71 (Tombol Edit) --}}
                                                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-info btn-sm">
                                                        Edit
                                                    </a>
                                                    <svg  class="icon icon-xs me-2" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"></path>
                                                    </svg>
                                                    Edit
                                                </a>
                                                {{-- Baris 77 (Form Delete / Destroy) --}}
                                                    <form action="{{ route('user.destroy', $item->id) }}" method="POST" style="display:inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                                    </form>
                                                    method="POST"
                                                    style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Yakin ingin menghapus data user ini?')">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                Belum ada data user.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
