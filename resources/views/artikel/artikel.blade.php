@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <a href="{{ url('artikel/create') }}" class="btn btn-success">Add Artikel</a>
        <div class="col-md-12 text-center">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul Artikel</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Isi</th>
                    <th scope="col">Tanggal Dibuat</th>
                    <th scope="col">Dibuat Oleh</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach( $artikel as $a)
                        <tr>
                            <td style="vertical-align: middle;">{{ $i++ }}</td>
                            <td style="vertical-align: middle;">{{ $a->judul }}</td>
                            <td><img src="{{ asset('storage/' . $a->foto ) }}" alt="" width="200" class="img-thumbnail shadow-sm"></td>
                            <td style="vertical-align: middle;">{{ $a->kategori->nama }}</td>
                            <td style="vertical-align: middle;">{{ Str::limit($a->isi, 10)  }}</td>
                            <td style="vertical-align: middle;">{{ $a->tanggalArtikel }}</td>
                            <td style="vertical-align: middle;">{{ $a->user->name }}</td>
                            <td style="vertical-align: middle;">
                                <a href="{{ url('artikel/'. $a->id .'/edit') }}" class="btn btn-primary">Edit Artikel</a>
                                <form action="{{ route('artikel.destroy',$a->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger d-inline-block mt-1">Hapus Artikel</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>

@endsection