@extends('layouts.master_home')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="p-3">
                <h3 class="text-center">Dairy Products</h3>
            </div>
        </div>
    </div>
</div>
<br><br>
<!-- Paragraph start -->
<div class="container-fluid p-3">
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
        @foreach($productDetails as $productDetail)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card m-1">
                <img src="{{ ($productDetail->product_img_1) ? asset($productDetail->product_img_1) : asset($productDetail->default_img) }}" class="card-img-top" alt="{{ $productDetail->product_img_1 }}" height="200px">
                <div class="card-body">
                    <h5 class="card-title" style="height: 50px;">{{ $productDetail->product_name }} - {{ $productDetail->product_id }}</h5>

              

                    @if(empty($productDetail->discount_price))
                    <p class="card-text"><strong>Price</strong> - {{ $productDetail->sale_price }} TK</p>
                    <strong class="text-danger">{{ (empty($productDetail->stock_qty)) ? 'Out of Stock' : '' }}</strong>
                    @else
                    <p class="card-text"><strong>Price</strong> - <del>{{ $productDetail->sale_price }} TK </del></p>
                    <p class="card-text"><strong>Discount Price</strong> - {{ $productDetail->discount_price }} TK</p>
                    @endif

                    
                    <hr>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a href="{{ route('product.details', ['id' => $productDetail->id ])}}" class="btn btn-sm btn-danger">Details</a>
                        <a href="{{ route('cart.save', ['id' => $productDetail->id ])}}" class="btn btn-sm btn-primary {{ (empty($productDetail->stock_qty)) ? 'disabled' : '' }}">Add To Cart</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
<hr>
<!-- Paragraph start -->

@endsection