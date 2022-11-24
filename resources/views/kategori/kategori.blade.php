@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <a href="{{ url('kategori/create') }}" class="btn btn-success">Add Kategori</a>
        <div class="col-md-12 text-center">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach( $kategori as $a)
                        <tr>
                            <td style="vertical-align: middle;">{{ $i++ }}</td>
                            <td style="vertical-align: middle;">{{ $a->nama }}</td>
                            <td style="vertical-align: middle;">
                                <a href="{{ url('kategori/'. $a->id .'/edit') }}" class="btn btn-primary">Edit Kategori</a>
                                <form action="{{ route('kategori.destroy',$a->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger d-inline-block mt-1">Hapus Kategori</button>
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