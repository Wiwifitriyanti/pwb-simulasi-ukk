@extends('layouts.app')

@section('title', 'Tambah Catatan Perjalanan')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0">Tambah Catatan Perjalanan</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="{{ route('travel.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="travel_date" class="form-label">Tanggal</label>
                            <input type="date" name="travel_date" id="travel_date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="travel_time" class="form-label">Waktu</label>
                            <input type="time" name="travel_time" id="travel_time" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Lokasi</label>
                            <select name="location" id="location" class="form-control" required>
                                <option value="" disabled selected>Pilih Lokasi</option>
                                <option>Jakarta</option> 
                                <option>Surabaya</option> 
                                <option>Bandung</option> 
                                <option>Semarang</option> 
                                <option>Yogyakarta</option> 
                                <option>Malang</option> 
                                <option>Bekasi</option> 
                                <option>Depok</option> 
                                <option>Tangerang</option> 
                                <option>Cirebon</option> 
                                <option>Medan</option> 
                                <option>Palembang</option> 
                                <option>Pekanbaru</option> 
                                <option>Bandar Lampung</option> 
                                <option>Padang</option> 
                                <option>Banda Aceh</option> 
                                <option>Jambi</option> 
                                <option>Batam</option> 
                                <option>Bengkulu</option> 
                                <option>Tanjung Pinang</option> 
                                <option>Balikpapan</option> 
                                <option>Samarinda</option> 
                                <option>Banjarmasin</option> 
                                <option>Palangkaraya</option>
                                <option>Tarakan</option> 
                                <option>Pontianak</option>
                                <option>Makassar</option> 
                                <option>Manado</option> 
                                <option>Palu</option>
                                <option>Gorontalo</option> 
                                <option>Parepare</option> 
                                <option>Denpasar</option> 
                                <option>Kupang</option> 
                                <option>Labuan Bajo</option>
                                <option>Singaraja</option>
                                <option>Ambon</option>
                                <option>Ternate</option> 
                                <option>Jayapura</option> 
                                <option>Manokwari</option> 
                                <option>Sorong</option> 
                                <option>Merauke</option>      
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="body_temperature" class="form-label">Suhu Tubuh</label>
                            <input type="number" name="body_temperature" id="body_temperature" class="form-control" step="0.1" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection