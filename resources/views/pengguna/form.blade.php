@extends('layouts.master')

@section('title', isset($pengguna) ? 'Edit Item' : 'Create Item')

@section('content')
    <h2>{{ isset($pengguna) ? 'Edit Item' : 'Create Item' }}</h2>
    <form action="{{ isset($pengguna) ? route('pengguna.update', $pengguna->id_pengguna) : route('pengguna.store') }}"
        method="POST">
        @csrf
        @if (isset($pengguna))
            @method('PUT')
        @endif
        <div>
            <label for="id_akses">Hak Akses : </label>
            <select name="id_akses" id="id_akses" required>
                <option value="">Pilih . . .</option>
                @foreach ($role as $key => $val)
                    <option value="{{ $val->id_akses }}" {{ old('id_akses') == $val->id_akses ? 'selected' : '' }}>
                        {{ $val->nama_akses }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="nama_pengguna">Nama Pengguna : </label>
            <input type="text" id="nama_pengguna" name="nama_pengguna"
                value="{{ isset($pengguna) ? $pengguna->nama_pengguna : old('nama_pengguna') }}" required>
        </div>
        <div>
            <label for="nama_depan">Nama Depan : </label>
            <input type="text" id="nama_depan" name="nama_depan"
                value="{{ isset($pengguna) ? $pengguna->nama_depan : old('nama_depan') }}" required>
        </div>
        <div>
            <label for="nama_belakang">Nama Belakang : </label>
            <input type="text" id="nama_belakang" name="nama_belakang"
                value="{{ isset($pengguna) ? $pengguna->nama_belakang : old('nama_belakang') }}" required>
        </div>
        <div>
            <label for="no_hp">Nomor HP : </label>
            <input type="text" id="no_hp" name="no_hp"
                value="{{ isset($pengguna) ? $pengguna->no_hp : old('no_hp') }}" required>
        </div>
        <div>
            <label for="alamat">Alamat : </label>
            <input type="text" id="alamat" name="alamat"
                value="{{ isset($pengguna) ? $pengguna->alamat : old('alamat') }}" required>
        </div>
        <div>
            <label for="password">Password : </label>
            <input type="password" id="password" name="password" value="" {{ isset($pengguna) ? '' : 'required' }}>
        </div>
        <div>
            <button type="submit">{{ isset($pengguna) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
@endsection
