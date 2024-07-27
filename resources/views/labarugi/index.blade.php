@extends('layouts.master')

@section('title', 'Pelanggan List')

@section('content')
    <h2>Laporan Laba Rugi</h2>
    @if (count($labarugi) >= 1)
        <table id="productTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Total Pembelian</th>
                    <th>Total Penjualan</th>
                    <th>Laba-Rugi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($labarugi as $key => $val)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $val->nama_barang }}</td>
                        <td>Rp. {{ number_format($val->total_pembelian, 0, '') }}</td>
                        <td>Rp. {{ number_format($val->total_penjualan, 0, '') }}</td>
                        <td>Rp. {{ number_format(($val->total_penjualan - $val->total_pembelian), 0, '') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No Penjualan found.</p>
    @endif
@endsection
