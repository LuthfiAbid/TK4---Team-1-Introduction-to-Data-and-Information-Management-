@extends('layouts.master')

@section('title', isset($akses) ? 'Edit Item' : 'Create Item')

@section('content')
    <h2>{{ isset($akses) ? 'Edit Item' : 'Create Item' }}</h2>
    <form action="{{ isset($akses) ? route('akses.update', $akses->id_akses) : route('akses.store') }}" method="POST">
        @csrf
        @if (isset($akses))
            @method('PUT')
        @endif
        <div>
            <label for="nama_akses">Nama Akses : </label>
            <input type="text" id="nama_akses" name="nama_akses"
                value="{{ isset($akses) ? $akses->nama_akses : old('nama_akses') }}" required>
        </div>
        <div>
            <label for="keterangan">Keterangan Akses : </label>
            <input type="text" id="keterangan" name="keterangan"
                value="{{ isset($akses) ? $akses->keterangan : old('keterangan') }}" required>
        </div>
        <div>
            <button type="submit">{{ isset($akses) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
@endsection
