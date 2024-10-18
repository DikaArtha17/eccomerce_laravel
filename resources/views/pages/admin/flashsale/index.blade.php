@extends('layouts.admin.main')
@section('title', 'Admin Flash Sale')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Flash Sale</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">
                            Dashboard</a></div>
                    <div class="breadcrumb-item">Flash Sale</div>
                </div>
            </div>
            <a href="{{ route('flashsale.create') }}" class="btn btn-icon icon-left btn-primary">
                <i class="fas fa-plus"></i> Tambah Flash Sale</a>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tr>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Harga Asli</th>
                            <th>Harga Diskon</th>
                            <th>Stok</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Action</th>
                        </tr>
                        @php
                            $no = 0;
                        @endphp
                        @forelse ($flashSales as $item)
                            <tr>
                                <td>{{ $no += 1 }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->original_price }} Points</td>
                                <td>{{ $item->discount_price }} Points</td>
                                <td>{{ $item->stock }}</td>
                                <td>{{ $item->start_time }}</td>
                                <td>{{ $item->end_time }}</td>
                                <td>
                                    <a href="{{ route('flashsale.detail', $item->id) }}" class="badge badge-info">Detail</a>
                                    <a href="{{ route('flashsale.edit', $item->id) }}" class="badge badge-warning">Edit</a>
                                    <form action="{{ route('flashsale.delete', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="badge badge-danger border-0"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus Flash Sale ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="8" class="text-center">Data Flash Sale Kosong</td>
                        @endforelse
                    </table>
                </div>
            </div>
    </div>
    </div>
@endsection