@extends('admin.layout.main')

@section('title', 'Tambah Admin')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@yield('title')</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Data Admin</h6>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/manage') }}" method="post">
              @csrf
              <input type="hidden" name="id_users" value="1" required>
              <div class="form-group row">
                <label class="col-md-2 col-form-label">Nama :</label>
                <input type="text" name="name" class="form-control col-md-10 @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')<div class="col-md-2"></div><div class="invalid-feedback col-md-10">{{ $message }}</div>@enderror
              </div>
              <!-- <div class="form-group row">
                <label class="col-md-2 col-form-label">Tanggal Lahir :</label>
                <input type="date" name="dob" class="form-control col-md-10 @error('dob') is-invalid @enderror" value="{{ old('dob') }}">
                @error('dob')<div class="col-md-2"></div><div class="invalid-feedback col-md-10">{{ $message }}</div>@enderror
              </div> -->
              <div class="form-group row">
                <label class="col-md-2 col-form-label">Email :</label>
                <input type="email" name="email" class="form-control col-md-10 @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')<div class="col-md-2"></div><div class="invalid-feedback col-md-10">{{ $message }}</div>@enderror
              </div>
              <button type="submit" class="btn btn-success btn-block">Simpan</button>
              <a href="{{ url('/admin/berita') }}" class="btn btn-danger btn-block">Kembali</a>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
