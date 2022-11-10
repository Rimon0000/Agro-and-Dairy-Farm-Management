@extends('layouts.master_home')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center pt-5">Profile Details</h2>
        </div>
    </div>
</div>
<div class="container">
    <div class="row pt-5">
        <div class="col-lg-12">

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <h4>Profile Details: </h4>
            <form method="POST" action="{{ route('register.update') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">User ID</label>
                    <input type="text" class="form-control" value="{{ $data->user_id }}" name="user_id" placeholder="User ID" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">User Name</label>
                    <input type="text" class="form-control" value="{{ $data->user_name }}" name="user_name" placeholder="Full Name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">User Email</label>

                    <input type="email" class="form-control" value="{{ $data->user_email }}" name="user_email" placeholder="Your Email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">User Phone</label>

                    <input type="text" class="form-control" value="{{ $data->user_phone }}" name="user_phone" placeholder="Phone Number" required>
                </div>
                <div class="md-3">
                    <label class="form-label">Your Location</label>
                    <select name="user_location" class="form-select mt-2 mb-2" aria-label="Default select example" required>
                        <option {{ $data->user_location == 'ctg' ? 'selected' : ''  }} value="ctg">CTG</option>
                        <option {{ $data->user_location == 'dhk' ? 'selected' : ''  }} value="dhk">DHK</option>
                        <option {{ $data->user_location == 'kulna' ? 'selected' : ''  }} value="kulna">Kulna</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label  class="form-label">User Status</label>
                    <input type="text" class="form-control" value="{{ $data->user_status }}" readonly name="user_status">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-danger btn-sm">Update</button>
                </div>
            </form>

            <h4>Password Change:</h4>
            @if(session('success_pass'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success_pass') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(session('success_warn'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong class="text-center">{{ session('success_warn') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Old Password</label>
                    <input type="text" class="form-control" name="old_pass" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="text" class="form-control" name="new_pass" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-danger btn-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<br><br>

@endsection