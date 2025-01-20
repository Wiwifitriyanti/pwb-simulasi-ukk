@extends('layouts.app')

@section('title', 'Daftar Catatan Perjalanan')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h1 class="text-primary">Daftar Catatan Perjalanan</h1>
        <a href="{{ route('travel.create') }}" class="btn btn-primary">Tambah Catatan</a>
    </div>
    <div class="card shadow-lg rounded-4">
        <div class="card-body">
            @if($travelLogs->isEmpty())
                <p>Belum ada catatan perjalanan. <a href="{{ route('travel.create') }}">Tambah Catatan</a></p>
            @else
                <table class="table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Suhu Tubuh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($travelLogs as $log)
                        <tr>
                            <td>{{ $log->travel_date }}</td>
                            <td>{{ $log->travel_time }}</td>
                            <td>{{ $log->location }}</td>
                            <td>{{ $log->body_temperature }} °C</td>
                            <td>
                                <a href="{{ route('travel.edit', $log->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('travel.destroy', $log->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection