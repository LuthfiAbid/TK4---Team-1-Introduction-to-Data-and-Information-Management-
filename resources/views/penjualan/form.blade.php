@extends('layouts.master')

@section('title', isset($penjualan) ? 'Edit Item' : 'Create Item')

@section('content')
    <h2>{{ isset($penjualan) ? 'Edit Item' : 'Create Item' }}</h2>
    <form action="{{ isset($penjualan) ? route('penjualan.update', $penjualan->id_penjualan) : route('penjualan.store') }}" method="POST">
        @csrf
        @if (isset($penjualan))
            @method('PUT')
        @endif
        <div>
            <label for="jumlah_penjualan">Jumlah Penjualan : </label>
            <input type="number" id="jumlah_penjualan" name="jumlah_penjualan"
                value="{{ isset($penjualan) ? $penjualan->jumlah_penjualan : old('jumlah_penjualan') }}" required>
        </div>
        <div>
            <label for="harga_jual">Harga Jual : </label>
            <input type="number" id="harga_jual" name="harga_jual"
                value="{{ isset($penjualan) ? $penjualan->harga_jual : old('harga_jual') }}" required>
        </div>
        <div>
            <label for="id_pelanggan">Pelanggan : </label>
            <select name="id_pelanggan" id="id_pelanggan" required>
                <option value="">Pilih . . .</option>
                @foreach ($pelanggan as $key => $val)
                    <option value="{{ $val->id_pelanggan }}" {{ old('id_pelanggan') == $val->id_pelanggan ? 'selected' : '' }}>
                        {{ $val->nama_pelanggan }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">{{ isset($penjualan) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
@endsection
