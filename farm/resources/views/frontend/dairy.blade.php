@extends('layouts.master_home')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="p-3">
                <h3 class="text-center">Dairy</h3>
            </div>
        </div>
    </div>
</div>
<br><br>
<!-- Paragraph start -->
<div class="container-fluid p-3">
    <div class="row">
        @foreach($dairyDetails as $dairyDetail)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card m-1">
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
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Send Enquiry</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Content Us</h5>
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
</div>
<hr>
<!-- Paragraph start -->

@endsection