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
    </div>
  </div>
  <div class="row">

    @foreach($allCarts as $allCart)

    <div class="col-lg-12 pt-4">
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <div class="accordion-button">
              <div class="row">
                <div class="col-lg-6">
                  <h5>{{ $allCart->total_products }}</h5>
                </div>
              </div>
            </div>
          </h2>
          <div id="" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="row">

              </div>
              <div class="row">
                <div class="col-lg-2">
                  <h5>Price: <span id="sale_price">{{ $allCart->total_price }}</span> TK</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @endforeach
  </div>
</div>


@endsection