@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('peserta.store') }}">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tinggi Badan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tinggiBadan">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Berat Badan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="beratBadan">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Hobi</label>
                <input type="text" class="form-control mt-1" id="exampleInputEmail1" aria-describedby="emailHelp" name="hobi[]">
                <input type="text" class="form-control mt-1" id="exampleInputEmail1" aria-describedby="emailHelp" name="hobi[]">
                <input type="text" class="form-control mt-1" id="exampleInputEmail1" aria-describedby="emailHelp" name="hobi[]">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tahun Lahir</label>
                <input type="number" placeholder="YYYY" min="1000" max="2100" class="form-control" name="tahunLahir">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.querySelector("input[type=number]")
    .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
</script>
@endsection