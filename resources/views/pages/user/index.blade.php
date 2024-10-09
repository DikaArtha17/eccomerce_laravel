@extends('layouts.user.main') 
@section('content') 
<!-- start banner Area --> 
<section class="banner-area"> 
    <div class="container"> 
        <div class="row fullscreen align-items-center justify-content-start"> 
            <div class="col-lg-12"> 
                <div class=""> 
                    <!-- single-slide --> 
                    <div class="row"> 
                        <div class="col-lg-5 col-md-6"> 
                            <div class="banner-content"> 
                                <h1>Nike New <br>Collection!</h1> 
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p> 
                            </div> 
                        </div> 
                        <div class="col-lg-7"> 
                            <div class="banner-img"> 
                                <img class="img-fluid" src="{{ asset('assets/templates/user/img/banner/banner-img.png') }}" alt=""> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</section> 
<!-- End banner Area --> 
 
<!-- start product Area --> 
<section class="section_gap"> 
    <div class="container"> 
        <div class="row justify-content-center"> 
            <div class="col-lg-6 text-center"> 
                <div class="section-title"> 
                    <h1>Latest Products</h1> 
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> 
                </div> 
            </div> 
        </div> 

        <div class="row">
            <!-- Kondisi jika ada produk -->
            @if($products->count() > 0)
                @foreach($products as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}">
                        <div class="product-details">
                            <h6>{{ $item->name }}</h6>
                            <h6 class="price">{{ $item->price }}</h6>
                            <div class="prd-bottom">
                                <a href="#" class="social-info">
                                    <span class="ti-bag"></span>
                                    <p class="hover-text">Beli</p>
                                </a>
                                <a href="#" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">Detail</p>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <!-- Jika tidak ada produk -->
                <div class="col-lg-12 col-md-12">
                    <div class="single-product">
                        <h3 class="text-center">Tidak ada produk</h3>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section> 
<!-- end product Area --> 
@endsection