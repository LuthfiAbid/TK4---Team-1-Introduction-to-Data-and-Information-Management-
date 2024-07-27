@extends('layouts.master')

@section('title', isset($pelanggan) ? 'Edit Item' : 'Create Item')

@section('content')
    <h2>{{ isset($pelanggan) ? 'Edit Item' : 'Create Item' }}</h2>
    <form action="{{ isset($pelanggan) ? route('pelanggan.update', $pelanggan->id_pelanggan) : route('pelanggan.store') }}"
        method="POST">
        @csrf
        @if (isset($pelanggan))
            @method('PUT')
        @endif
        <div>
            <label for="nama_pelanggan">Nama Pelanggan : </label>
            <input type="text" id="nama_pelanggan" name="nama_pelanggan"
                value="{{ isset($pelanggan) ? $pelanggan->nama_pelanggan : old('nama_pelanggan') }}" required>
        </div>
        <div>
            <label for="alamat">Alamat : </label>
            <textarea type="text" id="alamat" name="alamat" required>{{ isset($pelanggan) ? $pelanggan->alamat : old('alamat') }}</textarea>
        </div>
        <div>
            <button type="submit">{{ isset($pelanggan) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
@endsection
