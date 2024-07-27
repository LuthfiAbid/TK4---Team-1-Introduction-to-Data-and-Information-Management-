@extends('layouts.master')

@section('title', isset($barang) ? 'Edit Item' : 'Create Item')

@section('content')
    <h2>{{ isset($barang) ? 'Edit Item' : 'Create Item' }}</h2>
    <form action="{{ isset($barang) ? route('barang.update', $barang->id_barang) : route('barang.store') }}" method="POST">
        @csrf
        @if (isset($barang))
            @method('PUT')
        @endif
        <div>
            <label for="nama_barang">Nama Barang : </label>
            <input type="text" id="nama_barang" name="nama_barang"
                value="{{ isset($barang) ? $barang->nama_barang : old('nama_barang') }}" required>
        </div>
        <div>
            <label for="keterangan">Keterangan Barang : </label>
            <input type="text" id="keterangan" name="keterangan"
                value="{{ isset($barang) ? $barang->keterangan : old('keterangan') }}" required>
        </div>
        <div>
            <label for="satuan">Satuan Barang : </label>
            <input type="text" id="satuan" name="satuan"
                value="{{ isset($barang) ? $barang->satuan : old('satuan') }}" required>
        </div>
        <div>
            <label for="id_pengguna">Pengguna Barang : </label>
            <select name="id_pengguna" id="id_pengguna" required>
                <option value="">Pilih . . .</option>
                @foreach ($pengguna as $key => $val)
                    <option value="{{ $val->id_pengguna }}" {{ old('id_pengguna') == $val->id_pengguna ? 'selected' : '' }}>
                        {{ $val->nama_pengguna }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">{{ isset($barang) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
@endsection
