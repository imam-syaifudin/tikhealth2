@extends('layouts.app')

@section('content')


<div class="container mt-5">
    <div class="row justify-content-center">
        @foreach( $artikel as $a )
        <div class="col-4 d-flex justify-content-center">
            <div class="card bg-dark text-light" style="width: 24rem;">
                <img src="{{ asset('storage/'. $a->foto) }}" class="card-img-top" alt="..." height="200">
                <div class="card-body">
                  <h5 class="card-title">{{ $a->judul }}</h5>
                  <p class="card-text">{{ Str::limit($a->isi, 120) }}</p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item bg-dark text-light">Penulis : <span class="text-success" >{{ $a->user->name }}</span></li>
                  <li class="list-group-item bg-dark text-light">Tanggal : <span class="text-danger" >{{ $a->tanggalArtikel }}</span></li>
                </ul>
                <div class="card-body text-center">
                  <a href="{{ url('/artikel') }}" class="card-link btn btn-outline-primary shadow-sm px-4" style="border-radius: 20px;">Edit</a>
                  <a href="{{ url('/login') }}" class="card-link btn btn-outline-warning shadow-sm px-4" style="border-radius: 20px;">Login</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>


@endsection