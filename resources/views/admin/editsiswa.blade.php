@extends('admin.thing')
@section('title', 'Master Siswa')
@section('content-title', 'Master Siswa')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow nb-4">
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{ route('mastersiswa.update', $data->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis kelamin</label>
                        <select class="form-select form-control" id="jk" name="jk" value="{{ $data->jk }}">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $data->email }}">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label><br>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                        <img src="{{ asset('/template/img/'.$data->foto) }}" width="300" class="img-thumbnail">
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea type="text" class="form-control" id="about" name="about" value="">{{ $data->about }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="simpan">
                        <a href="{{ route('mastersiswa.index') }}" class="btn btn danger">Batal</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection