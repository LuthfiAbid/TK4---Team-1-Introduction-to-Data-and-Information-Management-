@extends('layouts.master')

@section('title', 'Barang List')

@section('content')
    <h2>Barang List</h2>
    <a href="{{ route('barang.create') }}">Tambah Barang</a>
    @if (count($barang) >= 1)
        <table id="productTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Keterangan</th>
                    <th>Satuan</th>
                    <th>Pengguna</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $key => $val)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $val->nama_barang }}</td>
                        <td>{{ $val->keterangan }}</td>
                        <td>{{ $val->satuan }}</td>
                        <td>{{ $val->nama_pengguna }}</td>
                        <td>
                            <a href="{{ route('barang.edit', $val->id_barang) }}">Edit</a>
                            <form action="{{ route('barang.destroy', $val->id_barang) }}" method="POST"
                                style="display:inline;">
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
        <p>No Barang found.</p>
    @endif
@endsection
