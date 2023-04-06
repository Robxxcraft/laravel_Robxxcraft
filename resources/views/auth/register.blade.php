@extends('layouts.base')

@section('title')
    Register
@endsection

@section('body')
    <div class="position-absolute vw-100 vh-100">
        <img src="{{asset('images/background.jpg')}}" class="img-fluid vw-100 vh-100" style="object-fit: cover; z-index: -1;" alt="">
    </div>
    <div class="vh-100 vw-100 d-flex justify-content-center align-items-center overflow-hidden">
        <div class="bg-white rounded w-25 overflow-hidden" style="z-index: 1; box-shadow: 0 2px 4px 0 whitesmoke, 0 2px 2px 0 whitesmoke;">
            <div class="d-flex text-center bg-white" style="">
                <a href="/login" class="py-2 fw-bold col-6" style="background-color: whitesmoke; color: rgb(201, 196, 190); border-top: 4px solid rgb(201, 196, 190); border-bottom-right-radius: 6px;">Login</a>
                <div class="py-2 fw-bold col-6 bg-white text-primary" style="border-top: 4px solid #ec0c0c;">Register</div>
            </div>
            <div class="p-4">
                <div class="fs-5 fw-semibold mb-3">Register</div>
                <form action="/register" method="POST">
                    @csrf
                    <div class="pb-3 position-relative">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control mb-1 {{$errors->has('username') ? 'is-invalid' : ''}}" placeholder="Masukan username..." aria-label="username" value="{{old('username')}}">
                        @error('username')
                            <div class="invalid-feedback position-absolute bottom-0">{{$message}}</div>
                        @enderror
                    </div>
                    @csrf
                    <div class="pb-3 position-relative">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control mb-1 {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="Masukan email..." aria-label="email" value="{{old('email')}}">
                        @error('email')
                            <div class="invalid-feedback position-absolute bottom-0">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="pb-3 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control mb-1 {{$errors->has('password') ? 'is-invalid' : ''}}" placeholder="Masukan password..." aria-label="password">
                        @error('password')
                            <div class="invalid-feedback position-absolute bottom-0">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="mt-3 btn btn-primary fw-semibold w-100">Daftar</button>
                </form>
            </div>
        </div>
    </div>   
@endsection