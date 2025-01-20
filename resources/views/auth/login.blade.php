@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center" style="min-height: 100vh; background: linear-gradient(to bottom right, #007bff, #6fb9f7);">
    <div class="col-md-4 d-flex align-items-center">
        <div class="card shadow-lg rounded-4 w-100" style="background: white; border: none;">
            <div class="card-body text-center p-5">
                <h2 class="mb-3">Silakan Masukan Nama Lengkap Anda dan Nik Anda</h2>
                <p class="text-muted"></p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <input type="text" name="nama" id="nama" class="form-control rounded-pill py-2 px-3" placeholder="Masukkan Nama Lengkap Anda..." required>
                    </div>
                    <div class="mb-4">
                        <input type="password" name="nik" id="nik" class="form-control rounded-pill py-2 px-3" placeholder="Masukkan NIK Anda..." required pattern="\d{10}" title="NIK harus terdiri dari 10 digit angka">
                        @if ($errors->has('nik'))
                            <span class="text-danger">{{ $errors->first('nik') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary w-100 rounded-pill py-2">Login</button>
                </form>
                <div class="text-center mt-4">
                    <p class="m-0 text-secondary">Belum Punya Akun...? <br> 
                        <a href="{{ route('register') }}" class="text-primary text-decoration-none">Silahkan Ke Halaman Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection