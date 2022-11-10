<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Entry Dairy Product Page
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
                            <h5 class="card-title">Add Dairy Product Details</h5>
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Product ID</label>
                                            <input type="text" name="product_id" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Product Name</label>
                                            <input type="text" name="product_name" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Weight/Liter</label>
                                            <input type="text" name="weight" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Size</label>
                                            <input type="text" name="size" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Stock Unit</label>
                                            <input type="number" name="stock_qty" min="0" value="0" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Stock Alert</label>
                                            <input type="number" name="stock_alert" min="0" value="0" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Cost Price</label>
                                            <input type="number" name="cost_price" min="0" value="0" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Sale Price</label>
                                            <input type="number" name="sale_price" min="0" value="0" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Discount Price</label>
                                            <input type="number" name="discount_price" min="0" value="0" class="form-control">
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
                                                <option selected value="{{$category->id}}" selected>{{$category->category_name}}</option>
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
                                                <option value="{{$subcategory->id}}">{{$subcategory->subcategory}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Product Detail Short</label>
                                    <textarea name="product_detail_short" class="form-control" id="" cols="30" rows="5"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Product Detail Long</label>
                                    <textarea name="product_detail_long" class="form-control" id="" cols="30" rows="5"></textarea>
                                </div>

                                <br>
                                <br>
                                <label for="" class="form-label">Choose Image 1:</label>
                                <div class="mb-3">
                                    <input type="file" name="product_image_1" class="form-control" required>
                                </div>

                                <label for="" class="form-label">Choose Image 2:</label>
                                <div class="mb-3">
                                    <input type="file" name="product_image_2" class="form-control" required>
                                </div>

                                <label for="" class="form-label">Choose Image 3:</label>
                                <div class="mb-3">
                                    <input type="file" name="product_image_3" class="form-control" required>
                                </div>

                                <!-- <label for="" class="form-label">Choose Image 4:</label>
                                <div class="mb-3">
                                    <input type="file" name="product_image_4" class="form-control" required>
                                </div> -->
                                <br>

                                <div>
                                    @error('subcategory')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @error('category_id')
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