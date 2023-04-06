@extends('layouts.admin')

@section('title')
    Tambah Pasien  
@endsection

@section('content')
<div class="my-4 card w-50 mx-auto border-0 shadow-sm">
    <div class="card-body">
        <div class="ps-3 fw-bold text-primary fs-5">Tambah Pasien</div>
        <form action="/pasien/tambah" method="POST" class="p-3">
            @csrf
            <div class="pb-3 position-relative">
                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                <input type="text" name="nama_pasien" id="nama_pasien" class="form-control mb-1 {{ $errors->has('nama_pasien') ? 'is-invalid' : ''}}" placeholder="Masukan Nama Rumah Sakit disini..." aria-label="nama_pasien" autocomplete="false" value="{{old('nama_pasien')}}">
                @error('nama_pasien')
                    <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                @enderror
            </div>
            <div class="pb-3 position-relative">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control mb-1 {{ $errors->has('alamat') ? 'is-invalid' : ''}}" placeholder="Masukan alamat disini..." aria-label="alamat">{{old('alamat')}}</textarea>
                @error('alamat')
                    <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                @enderror
            </div>
            <div class="pb-3 position-relative">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" name="no_telepon" id="telepon" class="form-control mb-1 {{ $errors->has('no_telepon') ? 'is-invalid' : ''}}" placeholder="Masukan telepon disini..." aria-label="telepon" value="{{old('no_telepon')}}">
                @error('no_telepon')
                    <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                @enderror
            </div>
            <div class="pb-3 position-relative">
                <label for="telepon" class="form-label">Nama Rumah Sakit</label>
                <select name="id_rumah_sakit" id="nama_rumah_sakit" class="form-control {{$errors->has('id_rumah_sakit') ? 'is-invalid' : ''}}">
                    <option selected value="">Pilih Rumah Sakit</option>
                    @foreach ($RumahSakit as $rs)
                        <option value="{{$rs->id}}">{{$rs->nama_rumah_sakit}}</option>
                    @endforeach
                </select>
                @error('id_rumah_sakit')
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