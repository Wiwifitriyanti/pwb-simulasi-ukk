@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1 class="mt-4">Dashboard</h1>
    <p>Selamat datang, <strong>{{ auth()->user()->name }}</strong>!</p>

    <!-- Ringkasan Perjalanan -->
    <div class="card my-4">
        <div class="card-body">
            <h5 class="card-title">Ringkasan Perjalanan Anda</h5>
            <p class="card-text">Total Catatan Perjalanan: <strong>{{ $totalLogs }}</strong></p>
        </div>
    </div>

    <!-- Daftar Catatan Perjalanan Terbaru -->
    <h3>Catatan Perjalanan Terbaru</h3>
    @if($travelLogs->isEmpty())
        <p>Belum ada catatan perjalanan. <a href="{{ route('travel.create') }}">Tambah Catatan</a></p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Lokasi</th>
                    <th>Suhu Tubuh</th>
                </tr>
            </thead>
            <tbody>
                @foreach($travelLogs as $log)
                <tr>
                    <td>{{ $log->travel_date }}</td>
                    <td>{{ $log->travel_time }}</td>
                    <td>{{ $log->location }}</td>
                    <td>{{ $log->body_temperature }} °C</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="mt-4">
        <a href="{{ route('travel.index') }}" class="btn btn-primary">Lihat Semua Catatan</a>
        <a href="{{ route('travel.create') }}" class="btn btn-success">Tambah Catatan Baru</a>
    </div>
</div>
@endsection
