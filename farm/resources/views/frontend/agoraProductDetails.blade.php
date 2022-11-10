@extends('layouts.master_home')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center pt-3">Agro Details</h2>
        </div>
    </div>
</div>
<br><br>
<!-- Paragraph start -->
<div class="container">
    <div class="row pb-5">
        <div class="col-lg-7">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ ($agroDetails->product_img_1) ? asset($agroDetails->product_img_1) : asset($agroDetails->default_img) }}" class="d-block w-100" height="400px" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ ($agroDetails->product_img_2) ? asset($agroDetails->product_img_2) : asset($agroDetails->default_img) }}" class="d-block w-100" height="400px" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ ($agroDetails->product_img_3) ? asset($agroDetails->product_img_3) : asset($agroDetails->default_img) }}" class="d-block w-100" height="400px" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ ($agroDetails->product_img_4) ? asset($agroDetails->product_img_4) : asset($agroDetails->default_img) }}" class="d-block w-100" height="400px" alt="...">
                    </div>
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
                    <h2>{{ $agroDetails->product_name }} - {{ $agroDetails->product_id }}</h2>
                    <!-- <button class="btn btn-danger btn-sm">Enquiry</button> -->
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#agroDetail_{{$agroDetails->id}}">Send Enquiry</button>
                </div>
                <div class="col-lg-12" style="width: 100px; height:100px;">
                    <a href="https://web.whatsapp.com/send?phone={{ empty($Whatsapp->number) ? '' : $Whatsapp->number }}" target="blank">
                        <img class="img-thumbnail mt-2" src="{{ asset('frontend/assets/images/whatsapp.png') }}" width="60px" height="60px">
                    </a>
                </div>
                <div class="col-lg-12 pb-3">
                    <p style="text-align: justify;"><strong>Description:</strong> {{ $agroDetails->product_detail_short }} </p>
                    <p><strong>Breed Name:</strong> {{ $agroDetails->product_breed }}</p>
                    <p><strong>Price:</strong> {{ $agroDetails->sale_price }} TK</p>
                    <p><strong>Age:</strong> {{ $agroDetails->product_age }} year(s)</p>
                    <p><strong>Milk Per Day:</strong> {{ $agroDetails->milk_per_day }} L</p>
                    <p style="text-align: justify;"><strong>Details:</strong> {{ $agroDetails->product_detail_long }} </p>
                </div>
                <div class="col-lg-12">
                    <p><strong>Location: </strong> {{ $agroDetails->location }}</p>
                    <!-- <p><strong>Social Media: </strong></p> -->
                </div>



                <!-- Modal -->
                <div class="modal fade" id="agroDetail_{{$agroDetails->id}}" tabindex="-1" aria-labelledby="agroDetailLabel" aria-hidden="true">
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
                                        <input type="text" readonly class="form-control" name="product_name" value="{{ $agroDetails->product_name }}">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" readonly class="form-control" name="product_id" value="{{ $agroDetails->product_id }}">
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
            </div>
        </div>
    </div>
</div>
<hr>
<!-- Paragraph start -->

@endsection