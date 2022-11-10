<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Sub Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Sub Category</h5>
                            <form action="{{ route('subcategory.update',['id' => $subcategories->id]) }}" method="POST" >
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Update Sub-Category Name</label>
                                    <input type="text" value="{{$subcategories->subcategory}}" name="subcategory" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">SubCategory Name</label>
                                    <select name="category_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <option readonly value="">Pls Select Subcategory</option>

                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if ($category->id == $subcategories->category_id)
                                            {{'selected="selected"'}}
                                            @endif

                                            >{{$category->category_name}}
                                        </option>
                                        @endforeach

                                    </select>
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