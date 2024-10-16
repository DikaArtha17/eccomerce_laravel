@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Distributor</h1>

    <form action="{{ route('distributors.update', $distributor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Distributor</label>
            <input type="text" name="name" class="form-control" value="{{ $distributor->name }}" required>
        </div>

        <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" name="address" class="form-control" value="{{ $distributor->address }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Telepon</label>
            <input type="text" name="phone" class="form-control" value="{{ $distributor->phone }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
