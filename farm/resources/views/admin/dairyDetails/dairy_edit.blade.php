<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif



                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Cow's Details</h5>
                            <form action="{{ route('dairy.update',['id' => $productDetails->id]) }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Cow's ID</label>
                                            <input type="text" value="{{ $productDetails->product_id }}" name="product_id" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Cow's Name</label>
                                            <input type="text" value="{{ $productDetails->product_name }}" name="product_name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Cow's Birthday</label>
                                            <input type="text" value="{{ $productDetails->birthday }}" name="birthday" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Mother's ID</label>
                                            <input type="text" value="{{ $productDetails->mother_id }}" name="mother_id" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Mother Production</label>
                                            <input type="text" value="{{ $productDetails->mother_production }}" name="mother_production" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Father Details</label>
                                            <input type="text" value="{{ $productDetails->father_details }}" name="father_details" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Weight</label>
                                            <input type="text" value="{{ $productDetails->weight }}" name="weight" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Age</label>
                                            <input type="text" value="{{ $productDetails->product_age }}" name="product_age" class="form-control">
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Cost Price</label>
                                            <input type="text" value="{{ $productDetails->cost_price }}" name="cost_price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Sale Price</label>
                                            <input type="text" value="{{ $productDetails->sale_price }}" name="sale_price" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Location</label>
                                            <input type="text" value="{{ $productDetails->location }}" name="location" class="form-control">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">For Sale</label>
                                            <select name="for_sale" class="form-select">
                                                <option {{ $productDetails->for_sale == 'No' ? 'selected' : '' }} value="No">No</option>
                                                <option {{ $productDetails->for_sale == 'Yes' ? 'selected' : '' }} value="Yes">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <br>

                                <div>
                                    @error('subcategory')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @error('category_id')
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