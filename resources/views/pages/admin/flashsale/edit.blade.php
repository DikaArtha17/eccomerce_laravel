@extends('layouts.admin.main')
@section('title', 'Admin Edit Flash Sale Product')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Produk Flash Sale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.flashsale') }}">Flash Sale</a></div>
                <div class="breadcrumb-item">Edit Produk Flash Sale</div>
            </div>
        </div>
        <a href="{{ route('admin.flashsale') }}" class="btn btn-icon icon-left btn-warning">Kembali</a>
        <div class="card mt-4">
            <form action="{{ route('flashsale.update', $flashsale->id) }}" class="needs-validation" novalidate=""
                enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_name">Nama Produk</label>
                                <input id="product_name" type="text" class="form-control" name="product_name" required
                                    value="{{ $flashsale->product_name }}">
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="original_price">Harga Normal (Point)</label>
                                <input id="original_price" type="number" class="form-control" name="original_price"
                                    required value="{{ $flashsale->original_price }}">
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="discount_price">Harga Diskon (Point)</label>
                                <input id="discount_price" type="number" class="form-control" name="discount_price"
                                    required value="{{ $flashsale->discount_price }}">
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="start_time">Tanggal Mulai</label>
                                <input id="start_time" type="datetime-local" class="form-control" name="start_time"
                                    required="">
                                <div class="invalid-feedback">
                                    Kolom ini harus di isi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="form-group">
                            <label for="end_time">Tanggal
                                Berakhir</label>
                            <input id="end_time" type="datetime-local" class="form-control" name="end_time" required="">
                            <div class="invalid-feedback">
                                Kolom ini harus di isi!
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <button type="submit" class="btn btn-icon icon-left btn-primary">
            <i class="fas fa-save"></i> Simpan
        </button>
</div>
</form>
</div>
</section>
</div>
@endsection