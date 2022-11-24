@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <a href="{{ url('user/create') }}" class="btn btn-success">Add New User</a>
        <div class="col-md-12 text-center">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach( $user as $a)
                        <tr>
                            <td style="vertical-align: middle;">{{ $i++ }}</td>
                            <td style="vertical-align: middle;">{{ $a->name }}</td>
                            <td style="vertical-align: middle;">{{ $a->email }}</td>
                            <td style="vertical-align: middle;">{{ $a->role }}</td>
                            <td style="vertical-align: middle;">
                                <a href="{{ url('user/'. $a->id .'/edit') }}" class="btn btn-primary">Edit User</a>
                                <form action="{{ route('user.destroy',$a->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger d-inline-block mt-1">Hapus User</button>
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