@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tinggi Badan</th>
                    <th scope="col">Berat Badan</th>
                    <th scope="col">BMI</th>
                    <th scope="col">Status Berat Badan</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Hobi</th>
                    <th scope="col">Konsultasi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach( $peserta as $p)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->tinggiBadan }}</td>
                            <td>{{ $p->beratBadan }}</td>
                            <td>{{ $p->BMI }}</td>
                            <td>{{ $p->statusBeratBadan }}</td>
                            <td>{{ $p->umur }}</td>
                            <td>{{ explode('-',$p->hobi)[0] }}</td>
                            <td>
                                @if( $p->umur === 'dewasa' && $p->statusBeratBadan === 'Obesitas')
                                  <span class="text-success">Anda bisa mendapatkan Konsultasi
                                    gratis.</span>
                                @else
                                    <span class="text-danger">tidak aktif</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
