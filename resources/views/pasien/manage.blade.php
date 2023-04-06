@extends('layouts.admin')

@section('title')
    Kelola Data Pasien
@endsection

@section('content')
    <div class="p-4 mx-3">
        <div class="fs-5 fw-bold mb-3 text-primary">Kelola Data Pasien</div>
        <a href="/pasien/tambah" class="text-secodary link mb-3"><i class="fa-solid fa-plus-circle me-1"></i> Tambah Pasien</a>
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
                        <th class="px-3">Nama Pasien</th>
                        <th class="px-3">Alamat</th>
                        <th class="px-3">No Telepon</th>
                        <th class="px-3">Nama Rumah Sakit</th>
                        <th class="px-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasien as $psn)
                        <tr>
                            <td class="px-3 text-primary fw-semibold bg-white">{{$psn->id}}</td>
                            <td class="px-3 fw-semibold text-break bg-white">{{$psn->nama_pasien}}</td>
                            <td class="px-3 fw-semibold text-break bg-white" style="max-width: 24rem;">{{$psn->alamat}}</td>
                            <td class="px-3 fw-semibold text-break bg-white">{{$psn->no_telepon}}</td>
                            <td class="px-3 fw-semibold text-break bg-white">{{$psn->rumah_sakit->nama_rumah_sakit}}</td>
                            <td class="px-3 bg-white">
                                <div class="d-flex align-items-center">
                                    <a href="/pasien/edit/{{$psn->id}}" class="rounded btn me-2 btn-warning px-2 py-1 text-white">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <form method="post" class="delete-form" data-route="/pasien/delete/{{$psn->id}}">
                                        @method('delete')
                                        <button type="submit" class="rounded btn btn-danger px-2 py-1 text-white">
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
        
        <div class="mt-4 d-flex justify-content-end">{{$pasien->links()}}</div>
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