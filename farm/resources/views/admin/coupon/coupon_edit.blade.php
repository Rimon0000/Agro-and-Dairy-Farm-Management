<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Coupon
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Coupon</h5>
                            <form action="{{ route('coupon.update',['id' => $coupons->id]) }}" method="POST" >
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Coupon Title</label>
                                    <input type="text" value="{{$coupons->title}}" name="title" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Coupon Code</label>
                                    <input type="text" value="{{$coupons->code}}" name="code" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Discount Amount</label>
                                    <input type="text" value="{{$coupons->discount_amt}}" name="discount_amt" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Min Order Amount</label>
                                    <input type="text" value="{{$coupons->min_order_amt	}}" name="min_order_amt" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">User Status</label>
                                    <input type="text" value="{{$coupons->user_status}}" name="user_status" class="form-control">
                                </div>

                                <br>
                                <div>
                                    @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>