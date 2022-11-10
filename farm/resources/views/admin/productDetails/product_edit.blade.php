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
                            <form action="{{ route('product.update',['id' => $productDetails->id]) }}" method="POST">
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
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Weight/Liter</label>
                                            <input type="text" value="{{ $productDetails->weight }}" name="weight" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Size</label>
                                            <input type="text" value="{{ $productDetails->size }}" name="size" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Stock Unit</label>
                                            <input type="number" value="{{ $productDetails->stock_qty }}" name="stock_qty" min="0" value="0" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Stock Alert</label>
                                            <input type="number" value="{{ $productDetails->stock_alert }}" name="stock_alert" min="0" value="0" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Cost Price</label>
                                            <input type="number" value="{{ $productDetails->cost_price }}" name="cost_price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Sale Price</label>
                                            <input type="number" value="{{ $productDetails->sale_price }}" name="sale_price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Discount Price</label>
                                            <input type="number" value="{{ $productDetails->discount_price }}" name="discount_price" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Category Name</label>
                                            <select name="category_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                                <option readonly value="">Pls Select Category</option>

                                                @foreach($categories as $category)
                                                <option @if($productDetails->category_id == $category->id){{ 'selected="selected"' }} @endif value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Sub Category Name</label>
                                            <select name="subcategory_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                                <option readonly value="">Pls Select Subcategory</option>

                                                @foreach($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}" @if ($productDetails->subcategory_id == $subcategory->id)
                                                    {{'selected="selected"'}} @endif> {{$subcategory->subcategory}}
                                                </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Product Detail Short</label>
                                    <textarea name="product_detail_short" class="form-control" id="" cols="30" rows="5">{{ $productDetails->product_detail_short }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Product Detail Long</label>
                                    <textarea name="product_detail_long" class="form-control" id="" cols="30" rows="5">{{ $productDetails->product_detail_long }}</textarea>
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