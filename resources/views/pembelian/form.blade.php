@extends('layouts.master')

@section('title', isset($pembelian) ? 'Edit Item' : 'Create Item')

@section('content')
    <h2>{{ isset($pembelian) ? 'Edit Item' : 'Create Item' }}</h2>
    <form action="{{ isset($pembelian) ? route('pembelian.update', $pembelian->id_pembelian) : route('pembelian.store') }}" method="POST">
        @csrf
        @if (isset($pembelian))
            @method('PUT')
        @endif
        <div>
            <label for="jumlah_pembelian">Jumlah Pembelian : </label>
            <input type="number" id="jumlah_pembelian" name="jumlah_pembelian"
                value="{{ isset($pembelian) ? $pembelian->jumlah_pembelian : old('jumlah_pembelian') }}" required>
        </div>
        <div>
            <label for="harga_beli">Harga Beli : </label>
            <input type="number" id="harga_beli" name="harga_beli"
                value="{{ isset($pembelian) ? $pembelian->harga_beli : old('harga_beli') }}" required>
        </div>
        <div>
            <label for="id_supplier">Supplier : </label>
            <select name="id_supplier" id="id_supplier" required>
                <option value="">Pilih . . .</option>
                @foreach ($supplier as $key => $val)
                    <option value="{{ $val->id_supplier }}" {{ old('id_supplier') == $val->id_supplier ? 'selected' : '' }}>
                        {{ $val->nama_supplier }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">{{ isset($pembelian) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
@endsection
