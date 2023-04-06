@extends('layouts.admin')

@section('title')
    Kelola Data Rumah Sakit   
@endsection

@section('content')
    <div class="p-4 mx-3">
        <div class="fs-5 fw-bold mb-3 text-primary">Kelola Data Rumah Sakit</div>
        <a href="/rumah-sakit/tambah" class="text-secodary link mb-3"><i class="fa-solid fa-plus-circle me-1"></i> Tambah Rumah Sakit</a>
        @if (session()->has('success'))
            <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive mt-5">
            <table class="table mx-auto table-hover overflow-hidden rounded-1 shadow-sm">
                <thead>
                    <tr class="bg-primary text-white">
                        <th class="px-3">#</th>
                        <th class="px-3">Nama Rumah Sakit</th>
                        <th class="px-3">Alamat</th>
                        <th class="px-3">Email</th>
                        <th class="px-3">No Telepon</th>
                        <th class="px-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($RumahSakit as $rs)
                        <tr>
                            <td class="px-3 text-primary fw-semibold bg-white">{{$rs->id}}</td>
                            <td class="px-3 fw-semibold text-break bg-white">{{$rs->nama_rumah_sakit}}</td>
                            <td class="px-3 fw-semibold text-break bg-white" style="max-width: 24rem;">{{$rs->alamat}}</td>
                            <td class="px-3 fw-semibold text-break bg-white">{{$rs->email}}</td>
                            <td class="px-3 fw-semibold text-break bg-white">{{$rs->telepon}}</td>
                            <td class="px-3 bg-white">
                                <div class="d-flex align-items-center">
                                    <a href="/rumah-sakit/edit/{{$rs->id}}" class="rounded btn me-2 btn-warning px-2 py-1 text-white">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                        <form method="post" class="delete-form" data-route="/rumah-sakit/delete/{{$rs->id}}">
                                            @method('delete')
                                            <button type="submit" class="rounded btn btn-danger px-2 py-1 text-white" >
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="mt-4 d-flex justify-content-end">{{$RumahSakit->links()}}</div>
    </div>

    <script>
     $(document).ready(function() {

        $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        var $tr = $(this).closest('tr');
        $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(this).data('route'),
            data: {
                '_method': 'delete'
            },
            success: function (response, textStatus, xhr) {
                $tr.remove();
            }
        });
        })
    });
    </script>
@endsection