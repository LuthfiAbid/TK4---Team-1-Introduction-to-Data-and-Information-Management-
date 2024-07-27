@extends('layouts.master')

@section('title', isset($supplier) ? 'Edit Item' : 'Create Item')

@section('content')
    <h2>{{ isset($supplier) ? 'Edit Item' : 'Create Item' }}</h2>
    <form action="{{ isset($supplier) ? route('supplier.update', $supplier->id_supplier) : route('supplier.store') }}"
        method="POST">
        @csrf
        @if (isset($supplier))
            @method('PUT')
        @endif
        <div>
            <label for="nama_supplier">Nama Supplier : </label>
            <input type="text" id="nama_supplier" name="nama_supplier"
                value="{{ isset($supplier) ? $supplier->nama_supplier : old('nama_supplier') }}" required>
        </div>
        <div>
            <label for="alamat">Alamat : </label>
            <textarea type="text" id="alamat" name="alamat" required>{{ isset($supplier) ? $supplier->alamat : old('alamat') }}</textarea>
        </div>
        <div>
            <button type="submit">{{ isset($supplier) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
@endsection
