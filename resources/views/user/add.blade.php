@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 mt-4">
            <h2>Add New User</h2>
        </div>
        <div class="col-md-8 mt-2">
            <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama User</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password">
              </div>
              <label for="exampleInputEmail1" class="form-label">Role</label>
              <select class="form-select mt-1 mb-3" id="floatingSelect" aria-label="Floating label select example" name="role">
                <option selected>Role</option>
                <option value="admin">Admin</option>
                <option value="editor">Editor</option>
              </select>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection