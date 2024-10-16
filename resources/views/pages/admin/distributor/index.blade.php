@extends('layouts.admin.main')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Flash Sale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">
                        Dashboard</a></div>
                <div class="breadcrumb-item">Distributor</div>
            </div>
        </div>
        

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Distributor</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>Kontak</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($distributors as $distributor)
                        <tr>
                            <td>{{ $distributor->id }}</td>
                            <td>{{ $distributor->nama_distributor }}</td>
                            <td>{{ $distributor->kota }}</td>
                            <td>{{ $distributor->provinsi }}</td>
                            <td>{{ $distributor->kontak }}</td>
                            <td>{{ $distributor->email }}</td>
                            <td>
                                <a href="{{ route('distributor.edit', $distributor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('distributor.delete', $distributor->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection