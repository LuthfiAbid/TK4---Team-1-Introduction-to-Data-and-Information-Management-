@extends('layouts.master')

@section('title', 'Penjualan List')

@section('content')
    <h2>Penjualan List</h2>
    <a href="{{ route('penjualan.create') }}">Tambah Penjualan</a>
    @if (count($penjualan) >= 1)
        <table id="productTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>Jumlah Penjualan</th>
                    <th>Harga Jual</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualan as $key => $val)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $val->nama_pelanggan }}</td>
                        <td>{{ $val->jumlah_penjualan }}</td>
                        <td>Rp. {{ number_format($val->harga_jual, 0, '') }}</td>
                        <td>
                            <a href="{{ route('penjualan.edit', $val->id_penjualan) }}">Edit</a>
                            <form action="{{ route('penjualan.destroy', $val->id_penjualan) }}" method="POST"
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
        <p>No Penjualan found.</p>
    @endif
@endsection
