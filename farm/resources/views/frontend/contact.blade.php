@extends('layouts.master_home')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center p-5">Contact Us</h2>
        </div>
    </div>
</div>
<div class="container">
    <div class="row pt-5">
        <div class="col-lg-6">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <input type="text" name="contact_name" class="form-control" placeholder="Full Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="contact_email" class="form-control" placeholder="Your Email" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="contact_number" class="form-control" placeholder="Phone Number" required>
                </div>
                <div class="md-3">
                    <select name="location" class="form-select mt-2 mb-2" aria-label="Default select example" required>
                        <option selected readonly value="">Your Location</option>
                        <option value="ctg">CTG</option>
                        <option value="dhk">DHK</option>
                        <option value="kulna">Kulna</option>
                    </select>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="message" rows="4" cols="50" placeholder="Your Message" required></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <h6>OFFICE ADDRESS</h6>
            <p>Address : IPL City Centere, 162, O. R. Nizam Road, Goal Pahar, Chattogram, Bangladesh.</p>
            <p>Phone : +880241355228 , +8801847422904</p>
        </div>
    </div>
    <br>
    <br>
</div>

@endsection