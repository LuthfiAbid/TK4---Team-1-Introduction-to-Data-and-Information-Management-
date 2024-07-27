@extends('layouts.master')

@section('title', 'Hak Akses List')

@section('content')
    <h2>Hak Akses List</h2>
    <a href="{{ route('akses.create') }}">Tambah Hak Akses</a>
    @if (count($akses) >= 1)
        <table id="productTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Akses</th>
                    <th>Keterangan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($akses as $key => $val)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $val->nama_akses }}</td>
                        <td>{{ $val->keterangan }}</td>
                        <td>
                            <a href="{{ route('akses.edit', $val->id_akses) }}">Edit</a>
                            <form action="{{ route('akses.destroy', $val->id_akses) }}" method="POST" style="display:inline;">
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
        <p>No akses found.</p>
    @endif
@endsection
