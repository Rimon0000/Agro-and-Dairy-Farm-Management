@extends('layouts.master_home')

@section('content')
<div class="container-fluid p-4">
  <div class="row d-flex justify-content-center">
    <div class="col-lg-6">
      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      @if(session('warning'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session('warning') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
    </div>
  </div>
  <div class="row">

    @php
    $product_list = [];
    @endphp
    @foreach($allCarts as $allCart)
    @php
    array_push($product_list, $allCart->product_id);
    @endphp
    <div class="col-lg-12 pt-4">
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <div class="accordion-button">
              <h5>{{ $allCart->product_name }}</h5>
            </div>
          </h2>
          <div id="" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $allCart->product_id }}">
                <input type="hidden" name="user_id" value="{{ $allCart->user_id }}">
                <input type="hidden" name="product_price" value="{{ $allCart->product_price }}">
                <div class="row">
                  <div class="col-lg-2">
                    <img src="{{ asset($allCart->product_image) }}" alt="" height="100px" width="100px">
                  </div>
                  <div class="col-lg-2">
                    <h5>Price: <span id="sale_price">{{ $allCart->product_price }}</span> TK</h5>
                  </div>
                  <div class="col-lg-1">
                    {{ $allCart->product_size }}
                  </div>

                  <div class="col-lg-1">
                    {{ $allCart->product_weight }}
                  </div>
                  <div class="col-lg-2">
                    <div class="input-group input-group-sm mb-3">
                      <span class="input-group-text">Qty</span>
                      <input type="number" name="qty" id="qty" value="{{ $allCart->product_qty }}" class="form-control" min="1" value="1">
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <h5>Total: <span id="total_price">{{ $allCart->product_qty * $allCart->product_price }}</span> TK</h4>
                  </div>
                  <div class="col-lg-2">
                    <button type="submit" class="btn btn-sm btn-warning">Update</button>
                    <a href="{{ route('cart.delete',['id' => $allCart->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    <div class="col-lg-12">
      <h4 class="d-flex justify-content-end pt-5">Total: {{ $final_price }} TK</h5>
    </div>
    @if(session('coupon_price'))
    <div class="col-lg-12">
      <h4 class="d-flex justify-content-end pt-5">Discount Total: {{ session('coupon_price') }} TK</h5>
    </div>
    @endif

  </div>
  <div class="row">
    <div class="col-lg-6">
      <form action="{{ route('coupon.apply') }}" method="POST">
        @csrf
        <div class="row mb-3">
          <div class="col">
            <input type="text" class="form-control" name="coupon_code" placeholder="Coupon Code" required>
          </div>
          <div class="col">
            <button type="submit" class="btn btn-info">Apply</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="row d-flex justify-content-end">
  <div class="col-lg-6 p-4">
    <p>
      <img src="{{ asset('frontend/assets/images/paymentmethod.png') }}" alt="" style="width: 500px; height: 100px; object-fit:cover">
    </p>
    <br>
    <p style="text-align: justify;">
      বিকাশঃ কোর্স ফি পাঠিয়ে দিন 01876397492 (বিকাশ পার্সোনাল) নম্বরে .ফিরতি SMS থেকে পাওয়া TrxID টি সংরক্ষন করুন, যেটি কোর্স রেজিঃ এর সময় প্রদান করবেন।

      রকেটঃ কোর্স ফি পাঠিয়ে দিন 01774688159 (রকেট পার্সোনাল) নম্বরে .ফিরতি SMS থেকে পাওয়া TrxID টি সংরক্ষন করুন, যেটি কোর্স রেজিঃ এর সময় প্রদান করবেন।

      ইউজার Account Active হয়ে যাওয়ার পরে কোর্স ফি ফেরত যোগ্য নয়। কোর্সের মান যাচাই করতে ফ্রি ক্লাস দেখুন। কোর্স প্লানের ভিডিও থেকে দেখে নিন, কি কি থাকছে।

      আপনার যে কোনো জিজ্ঞাসা কিংবা সাহায্যের জন্যে কোর্স ম্যানেজারের সাথে কথা বলুন - সুমাইয়া খানম মোবাইল নং 01774688159 , অবশ্যই সকাল ১০ টা থেকে রাত ৮ টার মধ্যে।
    </p>
  </div>
  <div class="col-lg-6 p-4">
    <form action="{{ route('order.store') }}" method="POST">
      @csrf
      <div class="row mb-3">
        <div class="col">

          <input type="text" class="form-control" name="user_name" placeholder="Full Name" required>
          <input type="hidden" class="form-control" name="user_id" value="{{ $isEmpty ? $allCart->user_id : '' }}">
          <input type="hidden" class="form-control" name="coupon_price" value="{{ session('coupon_price') }}">
          <input type="hidden" class="form-control" name="final_price" value="{{ $final_price }}">
          <input type="hidden" class="form-control" name="user_list" value="{{  $isEmpty ? implode(',',$product_list) : '' ; }}">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <input type="email" class="form-control" name="user_email" placeholder="Email Address" required>
        </div>
        <div class="col">
          <input type="text" class="form-control" name="user_number" placeholder="Phone Number" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <textarea class="form-control" name="address" placeholder="Address" required></textarea>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <input type="text" class="form-control" name="street" placeholder="Street" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <input type="text" class="form-control" name="pin_code" placeholder="Zip Code" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <select class="form-select" name="city" aria-label="Default select example" required>
            <option selected readonly>Choose City</option>
            <option value="DHK">DHK</option>
            <option value="CTG">CTG</option>
            <option value="KULNA">KULNA</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <select class="form-select" name="pyt_method" aria-label="Default select example" required>
            <option selected readonly>Choose Payment Method</option>
            <option value="COD">COD</option>
            <option value="bkash">bkash</option>
            <option value="Nogod">Nogod</option>
            <option value="Roket">Roket</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <input type="text" class="form-control" name="pty_number" placeholder="Payment Number" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <input type="text" class="form-control" name="trdx" placeholder="TRDX Number" required>
        </div>
      </div>


      <button type="submit" class="btn btn-sm btn-primary" {{ $isEmpty == false ? "disabled" : "" }}>Submit</button>
    </form>
  </div>
</div>



@endsection