@extends('layouts.master')

@section('title', 'Supplier List')

@section('content')    
    <h2>Supplier List</h2>
    <a href="{{ route('supplier.create') }}">Tambah Supplier</a>
    @if (count($supplier) >= 1)
        <table id="productTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($supplier as $key => $val)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $val->nama_supplier }}</td>
                        <td>{{ $val->alamat }}</td>
                        <td>
                            <a href="{{ route('supplier.edit', $val->id_supplier) }}">Edit</a>
                            <form action="{{ route('supplier.destroy', $val->id_supplier) }}" method="POST"
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
        <p>No Supplier found.</p>
    @endif
@endsection
