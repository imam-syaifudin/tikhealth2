@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 mt-4">
            <h2>Add New Artikel</h2>
        </div>
        <div class="col-md-8 mt-2">
            <form method="POST" action="{{ route('artikel.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="kategori_id">
                  <option selected>Select Kategori</option>
                  @foreach($kategori as $kat )
                   <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                  @endforeach
                </select>
                <label for="floatingSelect">Kategori</label>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Judul Artikel</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="judul">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Foto</label>
                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="foto">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">isi</label>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="isi"></textarea>
                    <label for="floatingTextarea">Isi Artikel</label>
                  </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection