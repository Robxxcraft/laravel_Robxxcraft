@extends('layouts.base')

@section('body')
    <div class="d-flex">
        <!-- sidebar -->
        <div class="vh-100 text-white position-fixed" style="width: 20%; background-color:rgb(138, 6, 6);">
            <div class="w-100">
                <a href="/" class="d-block text-white px-4 py-3 fw-bold fs-5">
                    <i class="fa-solid fa-notes-medical me-2"></i>
                    Data Rumah Sakit</a>
                <div class="mb-1 text-uppercase fw-medium px-4 fw-semibold" style="font-size: 0.78rem; color: rgb(201, 196, 190);">managements</div>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item border-0">
                        <div class="accordion-header" id="flush-headingOne">
                            <button class="text-white py-2 accordion-button collapsed  {{request()->is('petugas/buku') || request()->is('petugas/buku/tambah') || request()->is('petugas/buku/edit') ? 'brown' : ''}}" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="box-shadow: none !important; background-color:rgb(138, 6, 6);">
                                <div class="d-flex px-1">
                                    <i class="fa-solid fa-hospital-user fs-5" style="width: 40px"></i>
                                    <div class="fw-semibold ms-1">Pasien</div>
                                </div>
                            </button>
                        </div>
                        <div id="flush-collapseOne" class="pb-3 pt-2 px-4 collapse" style="background-color:rgb(138, 6, 6);" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="text-white bg-primary p-2" style="border-radius: 3px">
                                <a href="/pasien/tambah" class="d-block fw-semibold py-2 mx-2 {{request()->is('pasien/tambah') ? 'bg-white text-primary':'text-white'}}" style="border-radius: 6px"><i class="fa-solid fa-plus" style="width: 40px"></i> Tambah</a>
                                <a href="/pasien" class="d-block fw-semibold py-2 mx-2 {{request()->is('pasien') ? 'bg-white text-primary':'text-white'}}" style="border-radius: 6px"><i class="fa-solid fa-gear" style="width: 40px"></i> Kelola</a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0">
                        <div class="accordion-header" id="flush-headingTwo">
                            <button class="text-white py-2 mt-1 accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="box-shadow: none !important; background-color:rgb(138, 6, 6);">
                                <div class="d-flex px-1">
                                    <i class="fa-solid fa-hospital fs-5" style="width: 40px"></i>
                                    <div class="fw-semibold ms-1">Rumah Sakit</div>
                                </div>
                            </button>
                        </div>
                        <div id="flush-collapseTwo" class="pb-3 pt-2 px-4 collapse" style="background-color:rgb(138, 6, 6);" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="text-white bg-primary p-2" style="border-radius: 3px">
                                <a href="/rumah-sakit/tambah" class="d-block fw-semibold py-2 mx-2 {{request()->is('rumah-sakit/tambah') ? 'bg-white text-primary':'text-white'}}" style="border-radius: 6px"><i class="fa-solid fa-plus" style="width: 40px"></i> Tambah</a>
                                <a href="/rumah-sakit" class="d-block fw-semibold py-2 mx-2 {{request()->is('rumah-sakit') ? 'bg-white text-primary':'text-white'}}" style="border-radius: 6px"><i class="fa-solid fa-gear" style="width: 40px"></i> Kelola</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- body -->
        <div class="position-absolute" style="right: 0; width: 80%;">
            <!-- top nav -->
            <div class="bg-white p-3 w-100"><i class="fa-solid fa-bars"></i></div>

            <!-- content body -->
            @yield('content')
        </div>
    </div>
@endsection