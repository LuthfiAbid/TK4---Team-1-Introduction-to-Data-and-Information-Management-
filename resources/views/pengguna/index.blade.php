@extends('layouts.master')

@section('title', 'Pengguna List')

@section('content')
    <h2>Pengguna List</h2>
    <a href="{{ route('pengguna.create') }}">Tambah Pengguna</a>
    @if (count($pengguna))
        <table id="productTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Nomor HP</th>
                    <th>Alamat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengguna as $key => $val)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $val->nama_pengguna }}</td>
                        <td>{{ $val->nama_depan }}</td>
                        <td>{{ $val->nama_belakang }}</td>
                        <td>{{ $val->no_hp }}</td>
                        <td>{{ $val->alamat }}</td>
                        <td>
                            <a href="{{ route('pengguna.edit', $val->id_pengguna) }}">Edit</a>
                            <form action="{{ route('pengguna.destroy', $val->id_pengguna) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No pengguna found.</p>
    @endif
@endsection
