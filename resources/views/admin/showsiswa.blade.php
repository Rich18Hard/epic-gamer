@extends('admin.thing')
@section('title', 'Master Siswa')
@section('content-title', 'Master Siswa')
@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-body text-center ratio ratio-1x1">
                <img src="{{ asset('template/img/'.$data->foto) }}" width="200" class="ratio ratio-1x1 rounded-circle mt-3 mx-auto img-thumbnail">
                <h3 class="display-5">{{ $data->nama }}</h3>
                <h5><i class="fas fa-venus-mars"></i>{{ $data->jk }}</h5>
                <h5><i class="fas fa-envelope"></i>{{ $data->email }}</h5>
                <h5><i class="fas fa-map"></i>{{ $data->alamat }}</h5>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-plus"></i> Kontak Siswa</h6>
            </div>
            <div class="card-body">

            </div>
        </div>
        <div class="col-lg-8">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-quote-left"></i> About Siswa</h6>
            </div>
            <div class="card-body">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">{{ $data->about }}</p>
                </blockquote>
            </div>
        </div>
    </div>
        <!-- <div class="card shadow mb-4">
                <div class="card-body text-center">
                    <img src="" width="200" class="rounded-circle img-thumbnail">
                    <h4>Alexander Sebastian Richard</h4> -->

@endsection