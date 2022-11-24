@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 mt-4">
            <h2>Add New Kategori</h2>
        </div>
        <div class="col-md-8 mt-2">
            <form method="POST" action="{{ route('kategori.update',$kategori->id) }}" enctype="multipart/form-data">
              @method('put')
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" value="{{ $kategori->nama }}">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection