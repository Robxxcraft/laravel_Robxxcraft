@extends('layouts.admin')

@section('title')
    Tambah Rumah Sakit  
@endsection

@section('content')
<div class="my-4 card w-50 mx-auto border-0 shadow-sm">
    <div class="card-body">
        <div class="ps-3 fw-bold text-primary fs-5">Tambah Rumah Sakit</div>
        <form action="/rumah-sakit/tambah" method="POST" class="p-3">
            @csrf
            <div class="pb-3 position-relative">
                <label for="nama_rumah_sakit" class="form-label">Nama Rumah Sakit</label>
                <input type="text" name="nama_rumah_sakit" id="nama_rumah_sakit" class="form-control mb-1 {{ $errors->has('nama_rumah_sakit') ? 'is-invalid' : ''}}" placeholder="Masukan Nama Rumah Sakit disini..." aria-label="nama_rumah_sakit" autocomplete="false" value="{{old('nama_rumah_sakit')}}">
                @error('nama_rumah_sakit')
                    <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                @enderror
            </div>
            <div class="pb-3 position-relative">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control mb-1 {{ $errors->has('alamat') ? 'is-invalid' : ''}}" placeholder="Masukan alamat disini..." aria-label="alamat" value="{{old('alamat')}}"></textarea>
                @error('alamat')
                    <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                @enderror
            </div>
            <div class="pb-3 position-relative">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control mb-1 {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="Masukan email disini..." aria-label="email" value="{{old('email')}}">
                @error('email')
                    <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                @enderror
            </div>
            <div class="pb-3 position-relative">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" name="telepon" id="telepon" class="form-control mb-1 {{ $errors->has('telepon') ? 'is-invalid' : ''}}" placeholder="Masukan telepon disini..." aria-label="telepon" value="{{old('telepon')}}">
                @error('telepon')
                    <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                @enderror
            </div>
            <div class="mt-2 d-flex justify-content-end"><a href="/petugas/buku" type="button" class="btn btn-outline-secondary fw-semibold me-3">Kembali</a>
                <button type="submit" class="btn btn-primary fw-semibold">Tambah</button>
            </div>
        </form>
    </div>
</div>
@endsection