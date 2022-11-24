@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 mt-4">
            <h2>Add New Artikel</h2>
        </div>
        <div class="col-md-8 mt-2">
            <form method="POST" action="{{ route('artikel.update',$artikel->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="kategori_id">
                  <option selected>Select Kategori</option>
                  @foreach($kategori as $kat )
                   <option value="{{ $kat->id }}" {{ $kat->id === $artikel->kategori->id ? 'selected' : '' }}>{{ $kat->nama }}</option>
                  @endforeach
                </select>
                <label for="floatingSelect">Kategori</label>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Judul Artikel</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="judul" value="{{ $artikel->judul }}">
              </div>
              <div class="mb-3">
                <img src="{{ url('storage/',$artikel->foto) }}" alt="" width="200">
                <br>
                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="foto">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">isi</label>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="isi">{{ $artikel->isi }}</textarea>
                    <label for="floatingTextarea">Isi Artikel</label>
                  </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection