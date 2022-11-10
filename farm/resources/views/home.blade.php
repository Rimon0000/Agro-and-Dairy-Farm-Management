@extends('layouts.master_home')


@section('content')

<!-- Silder start -->

<div class="row">
    <div class="col-lg-12">
        <!-- <div class="parallax">
                <div class="overlay_parallax d-flex justify-content-center align-items-center">
                    <h1 class="heading_text">Welcome To Our Farm</h1>
                </div>
            </div> -->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('frontend/assets/images/banners/cow_1.jpg') }}" height="600px" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('frontend/assets/images/banners/cow_2.jpeg') }}" height="600px" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('frontend/assets/images/banners/cow_3.png') }}" height="600px" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('frontend/assets/images/banners/cow_4.png') }}" height="600px" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<!-- Silder end -->

<!-- Categories start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="row home__category d-flex justify-content-center">
                @foreach($categories as $category)
                <div class="col-lg-2">
                    <a href="{{ route($category->category_url) }}">
                        <div class="card p-2">
                            <div class="text-center">
                                <img src="{{ asset($category->cat_img) }}" class="card-img-top image_cat" alt="...">
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center">{{ $category->category_name }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Categories start -->
<br><br>
<!-- Paragraph start -->
<div class="container-fluid p-3">
    <h1 class="heading__text">Agro Details:</h1>
    <div class="row">

        @foreach($agroDetails as $agroDetail )
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card m-1">
                <img src="{{ ($agroDetail->product_img_1) ? asset($agroDetail->product_img_1) : asset($agroDetail->default_img) }}" class="card-img-top" alt="{{ $agroDetail->product_img_1 }}" height="200px">
                <div class="card-body">
                    <h5 class="card-title" style="height: 50px;">{{ $agroDetail->product_name }} - {{ $agroDetail->product_id }}</h5>
                    <p class="card-text"><strong>Location</strong> - {{ $agroDetail->location }}</p>
                    <p class="card-text"><strong>Price</strong> - {{ $agroDetail->sale_price }} TK</p>
                    <p class="card-text">
                    <div class="row">
                        <div class="col-lg-12">
                            <strong>Age</strong> - {{ $agroDetail->product_age }} year/years
                        </div>
                        <!-- <div class="col-lg-7">
                            <strong>Milk Per Day</strong> - {{ $agroDetail->milk_per_day }}
                        </div> -->
                    </div>
                    </p>
                    <hr>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a href="{{ route('agro.details', ['id' => $agroDetail->id ])}}" class="btn btn-sm btn-danger">Details</a>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#agroDetail_{{$agroDetail->id}}">Send Enquiry</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="agroDetail_{{$agroDetail->id}}" tabindex="-1" aria-labelledby="agroDetailLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agroDetailLabel">Content Us</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('inquiry.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" readonly class="form-control" name="product_name" value="{{ $agroDetail->product_name }}">
                            </div>
                            <div class="mb-3">
                                <input type="text" readonly class="form-control" name="product_id" value="{{ $agroDetail->product_id }}">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="inquiry_email" placeholder="Email Address">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="inquiry_fname" placeholder="Full Name">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="inquiry_phone" placeholder="Phone">
                            </div>
                            <div class="md-3">
                                <select name="inquiry_location" class="form-select mt-2 mb-2" aria-label="Default select example">
                                    <option selected>Your Location</option>
                                    <option value="ctg">CTG</option>
                                    <option value="dhk">DHK</option>
                                    <option value="kulna">Kulna</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <textarea type="text" class="form-control" name="inquiry_message" placeholder="Your Message"></textarea>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" name="video_status" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Pls check if you want to talk </label>
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <h1 class="heading__text">Dairy Details:</h1>
    <div class="row">

        @foreach($dairyDetails as $dairyDetail)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card m-1">
                <!-- <img src="{{ asset('frontend/assets/images/products/cow_1.jpg') }}" class="card-img-top" alt="{{ $dairyDetail->product_img_1 }}" height="350px"> -->
                <img src="{{ ($dairyDetail->product_img_1) ? asset($dairyDetail->product_img_1) : asset($dairyDetail->default_img) }}" class="card-img-top" alt="{{ $dairyDetail->product_img_1 }}" height="200px">
                <div class="card-body">
                    <h5 class="card-title" style="height: 50px;">{{ $dairyDetail->product_name }} - {{ $dairyDetail->product_id }}</h5>
                    <p class="card-text"><strong>Location</strong> - {{ $dairyDetail->location }}</p>
                    <p class="card-text"><strong>Price</strong> - {{ $dairyDetail->sale_price }} TK</p>
                    <p class="card-text"><strong>Age</strong> - {{ $dairyDetail->product_age }} year(s)</p>
                    <p class="card-text"><strong>Milk Per Day</strong> - {{ $dairyDetail->mother_production }} L</p>
                    <hr>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a href="{{ route('dairy.details', ['id' => $dairyDetail->id ])}}" class="btn btn-sm btn-danger">Details</a>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#dairyDetail_{{$dairyDetail->id}}">Send Enquiry</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="dairyDetail_{{$dairyDetail->id}}" tabindex="-1" aria-labelledby="dairyDetailLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dairyDetailLabel">Content Us</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('inquiry.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" readonly class="form-control" name="product_name" value="{{ $dairyDetail->product_name }}">
                            </div>
                            <div class="mb-3">
                                <input type="text" readonly class="form-control" name="product_id" value="{{ $dairyDetail->product_id }}">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="inquiry_email" placeholder="Email Address">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="inquiry_fname" placeholder="Full Name">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="inquiry_phone" placeholder="Phone">
                            </div>
                            <div class="md-3">
                                <select name="inquiry_location" class="form-select mt-2 mb-2" aria-label="Default select example">
                                    <option selected>Your Location</option>
                                    <option value="ctg">CTG</option>
                                    <option value="dhk">DHK</option>
                                    <option value="kulna">Kulna</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <textarea type="text" class="form-control" name="inquiry_message" placeholder="Your Message"></textarea>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" name="video_status" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Pls check if you want to talk </label>
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <h1 class="heading__text">Dairy Products Details:</h1>
    <div class="row">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @foreach($productDetails as $productDetail)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card m-1">
                <img src="{{($productDetail->product_img_1) ? asset($productDetail->product_img_1) : asset($productDetail->default_img) }}" class="card-img-top" alt="{{ $productDetail->product_img_1 }}" height="200px">
                <div class="card-body">
                    <h5 class="card-title" style="height: 50px;">{{ $productDetail->product_name }} - {{ $productDetail->product_id }}</h5>

                    @if($productDetail->discount_price != 'NA')
                    <p class="card-text"><strong>Price</strong> - <del>{{ $productDetail->sale_price }} TK </del></p>
                    @else
                    <p class="card-text"><strong>Price</strong> - {{ $productDetail->sale_price }} TK</p>
                    @endif

                    <p class="card-text"><strong>Discount Price</strong> - {{ $productDetail->discount_price }} TK</p>

                    <hr>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a href="{{ route('product.details',['id' => $productDetail->id ]) }}" class="btn btn-sm btn-danger">Details</a>
                        <a href="{{ route('cart.save', ['id' => $productDetail->id ])}}" class="btn btn-sm btn-primary">Add To Cart</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
<hr>
<div class="container">
    <h1 class="heading__text">Virtual Tour To Our Farm:</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Cow Videos
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/bCrz03-OJtY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="col-lg-4">
                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/moE9DuXELww" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="col-lg-4">
                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/moE9DuXELww" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<!-- Paragraph start -->

@endsection