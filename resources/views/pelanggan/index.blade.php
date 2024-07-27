@extends('layouts.master')

@section('title', 'Pelanggan List')

@section('content')    
    <h2>Pelanggan List</h2>
    <a href="{{ route('pelanggan.create') }}">Tambah Pelanggan</a>
    @if (count($pelanggan) >= 1)
        <table id="productTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggan as $key => $val)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $val->nama_pelanggan }}</td>
                        <td>{{ $val->alamat }}</td>
                        <td>
                            <a href="{{ route('pelanggan.edit', $val->id_pelanggan) }}">Edit</a>
                            <form action="{{ route('pelanggan.destroy', $val->id_pelanggan) }}" method="POST"
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
        <p>No Pelanggan found.</p>
    @endif
@endsection
