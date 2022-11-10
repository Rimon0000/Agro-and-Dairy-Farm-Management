@extends('layouts.master_home')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center p-5">Product Details Us</h2>
        </div>
    </div>
</div>
<br><br>
<!-- Paragraph start -->
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ ($productDetails->product_img_1) ? asset($productDetails->product_img_1) : asset($productDetails->default_img) }}" class="d-block w-100" height="400px" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ ($productDetails->product_img_2) ? asset($productDetails->product_img_2) : asset($productDetails->default_img)  }}" class="d-block w-100" height="400px" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ ($productDetails->product_img_3) ? asset($productDetails->product_img_3) : asset($productDetails->default_img)  }}" class="d-block w-100" height="400px" alt="...">
                    </div>
                    <!-- <div class="carousel-item">
                        <img src="{{ ($productDetails->product_img_4) ? asset($productDetails->product_img_4) : asset($productDetails->default_img)  }}" class="d-block w-100" height="400px" alt="...">
                    </div> -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{ $productDetails->product_name }} - {{ $productDetails->product_id }}</h2>
                    <a href="{{ route('cart.save', ['id' => $productDetails->id ])}}" class="btn btn-sm btn-danger {{ !empty($productDetails->stock_qty) ? '' : 'disabled' }}" >Add To Cart</a> 
                    <strong class="text-danger">{{ (empty($productDetails->stock_qty)) ? 'In Stock within 3 days.' : '' }}</strong>
                </div>
                <div class="col-lg-12 pt-3 pb-3">
                    <p style="text-align: justify;"><strong>Short Description:</strong> {{ $productDetails->product_detail_short }} </p>
                    <p><strong>Weight:</strong> {{ $productDetails->weight }}</p>
                    <p><strong>Size:</strong> {{ $productDetails->size }}</p>
                    <p><strong>Original Price:</strong> {{ $productDetails->sale_price }} TK</p>
                    <p><strong>Discount Price:</strong> {{ $productDetails->discount_price }} TK</p>
                    <p><strong>Stock Qty:</strong> {{ $productDetails->stock_qty }}</p>
                    <p style="text-align: justify;"><strong>Details:</strong> {{ $productDetails->product_detail_long }} </p>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<!-- Paragraph start -->

@endsection