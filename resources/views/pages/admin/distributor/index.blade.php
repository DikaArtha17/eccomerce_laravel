@extends('layouts.admin.main')

@section('title', 'Admin Distributor')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Distributor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"></div>
            </div>
        </div>
        <a href="{{ route('distributor.create') }}" class="btn  btn-icon icon-left btn-primary"><i
                class="fas fa-plus"></i>
            Tambah Distributor</a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>Kontak</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                    @php
                        $no = 0
                    @endphp
                    @forelse ($distributors as $item)
                        <tr>
                            <td>{{ $no += 1 }}</td>
                            <td>{{ $item->nama_distributor }}</td>

                            <td>{{ $item->kota }} </td>
                            <td>{{ $item->provinsi }} </td>
                            <td>{{ $item->kontak }} </td>
                            <td>{{ $item->email }} </td>
                            <td>
                                <a href="{{ route('distributor.edit', $item->id) }}" class="badge badge-info">edit</a>
                                <form action="{{ route('distributor.delete', $item->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge badge-danger border-0"
                                        data-confirm-delete="true">Hapus</button>
                                </form>

                            </td>



                        </tr>
                    @empty
                        <td colspan="5" class="text-center">Data Produk Kosong</td>
                    @endforelse
                </table>
            </div>
        </div>
</div>
</div>
@endsection