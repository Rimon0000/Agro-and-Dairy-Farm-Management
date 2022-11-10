<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Coupon
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="m-4">
            <div class="row">
                <div class="col-lg-8">
                    
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                    <h4>All Coupons List:</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Coupon</th>
                                <th scope="col">Discount (%)</th>
                                <th scope="col">Min Order Amt</th>
                                <th scope="col">Status</th>
                                <th scope="col">User Status</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <!-- @php($i = 1) -->
                            @foreach($coupons as $coupon)
                            <tr>
                                <th scope="row">{{ $coupons->firstItem() + $loop->index }}</th>
                                <td>{{ $coupon->title }}</td>
                                <td>{{ $coupon->code }}</td>
                                <td>{{ $coupon->discount_amt }}</td>
                                <td>{{ $coupon->min_order_amt }}</td>
                                <td>{{ $coupon->status }}</td>
                                <td>{{ $coupon->user_status }}</td>
                                <td>{{ $coupon->user_id }}</td>
                                <td>{{ $coupon->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('coupon.edit', ['id' => $coupon->id ]) }}" class="btn btn-sm btn-warning" >Edit</a>
                                    <a href="{{ route('coupon.delete', ['id' => $coupon->id ]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger" >Delete</a>
                                </td>
                            </tr>
                            @endforeach

                            
                        </tbody>
                    </table>

                    {{ $coupons->links() }}
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Coupon</h5>
                            <form action="{{ route('coupon.store') }}" method="POST" >
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Coupon Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Coupon Code</label>
                                    <input type="text" name="code" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Discount Amount</label>
                                    <input type="text" name="discount_amt" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Min Order Amount</label>
                                    <input type="text" name="min_order_amt" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">User Status</label>
                                    <input type="text" name="user_status" class="form-control" required>
                                </div>
                                
                                <div>
                                    @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @error('category_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>