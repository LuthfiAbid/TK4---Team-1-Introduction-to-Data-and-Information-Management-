@extends('layouts.master')

@section('title', 'Pembelian List')

@section('content')
    <h2>Pembelian List</h2>
    <a href="{{ route('pembelian.create') }}">Tambah Pembelian</a>
    @if (count($pembelian) >= 1)
        <table id="productTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Pembelian</th>
                    <th>Harga Beli</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembelian as $key => $val)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $val->nama_barang }}</td>
                        <td>{{ $val->jumlah_pembelian }}</td>
                        <td>Rp. {{ number_format($val->harga_beli, 0, '') }}</td>
                        <td>
                            <a href="{{ route('pembelian.edit', $val->id_pembelian) }}">Edit</a>
                            <form action="{{ route('pembelian.destroy', $val->id_pembelian) }}" method="POST"
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
        <p>No Pembelian found.</p>
    @endif
@endsection
