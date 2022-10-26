<!-- @extends('admin.thing')
@section('title', 'Master Projects')
@section('content-title', 'Master Projects')
@section('content')

@endsection -->
@if ($data->isEmpty())
    <h6 class="text-center">Siswa belum memiliki project</h6>
@else
    @foreach ($data as $item)
    <div class="card">
        <div class="card-header">
            {{ $item->nama_proyek }}
        </div>
        <div class="card-body">
            <h5>Tanggal Proyek</h5>
            {{ $item->tanggal }}
            <h5>Destipsi Proyek</h5>
            {{ $item->deskripsi }}
        </div>
        <div class="card-header">
            <a href="" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
            <a href="" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
        </div>
    @endforeach
@endif