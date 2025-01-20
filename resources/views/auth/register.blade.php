@extends('layouts.app')

@section('title', 'Registrasi')

@section('content')
<div class="row justify-content-center" style="min-height: 100vh; background: linear-gradient(to bottom right, #007bff, #6fb9f7);">
    <div class="col-md-4 d-flex align-items-center">
        <div class="card shadow-lg rounded-4 w-100" style="background: white; border: none;">
            <div class="card-body text-center p-5">
                <h3 class="mb-3">Selamat Datang Di</h3>
                <p class="text-muted">Aplikasi Catatan Perjalanan</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-4">
                        <input type="text" name="name" id="name" class="form-control rounded-pill py-2 px-3" placeholder="Masukkan Nama Lengkap Anda..." value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input type="text" name="nik" id="nik" class="form-control rounded-pill py-2 px-3" placeholder="Masukkan NIK Anda..." value="{{ old('nik') }}" required>
                        @error('nik')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100 rounded-pill py-2">Daftar</button>
                </form>
                <div class="text-center mt-4">
                    <p class="m-0 text-secondary">Sudah Punya Akun? <br> 
                        <a href="{{ route('login') }}" class="text-primary text-decoration-none">Login di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
