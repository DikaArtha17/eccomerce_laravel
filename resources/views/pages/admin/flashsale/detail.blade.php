@extends('layouts.admin.main')

@section('title', 'Detail Flash Sale')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Flash Sale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.flashsale') }}">Flash Sale</a></div>
                <div class="breadcrumb-item">Detail</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Detail Flash Sale: {{ $flashSale->product_name }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('images/' . $flashSale->image) }}" alt="{{ $flashSale->product_name }}" class="img-fluid rounded">
                    </div>
                    <div class="col-md-6">
                        <h4>{{ $flashSale->product_name }}</h4>
                        <p><strong>Harga Asli: </strong>Rp{{ number_format($flashSale->original_price, 2) }}</p>
                        <p><strong>Harga Diskon: </strong>Rp{{ number_format($flashSale->discount_price, 2) }}</p>
                        <p><strong>Diskon: </strong>{{ round($flashSale->discount_percentage) }}%</p>
                        <p><strong>Stok: </strong>{{ $flashSale->stock }}</p>
                        <p><strong>Tanggal Mulai: </strong>{{ $flashSale->start_time }}</p>
                        <p><strong>Tanggal Berakhir: </strong>{{ $flashSale->end_time }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                
                <a href="{{ route('admin.flashsale') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </section>
</div>
@endsection