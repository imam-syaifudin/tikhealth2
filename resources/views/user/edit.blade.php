@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 mt-4">
            <h2>Edit User</h2>
        </div>
        <div class="col-md-8 mt-2">
            <form method="POST" action="{{ route('user.update',$user->id) }}">
              @method('put')
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama User</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{ $user->name }}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ $user->email }}">
              </div>
              <label for="exampleInputEmail1" class="form-label">Role</label>
              <select class="form-select mt-1 mb-3" id="floatingSelect" aria-label="Floating label select example" name="role">
                <option selected>Role</option>
                <option value="admin" @if( $user->role == 'admin') selected @endif>Admin</option>
                <option value="editor" @if( $user->role == 'editor') selected @endif>Editor</option>
              </select>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection