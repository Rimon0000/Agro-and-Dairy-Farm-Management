<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Category</h5>
                            <form action="{{ route('category.update',['id' => $categories->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Update Category Name</label>
                                    <input type="text" value="{{$categories->category_name}}" name="category_name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Update Category URL</label>
                                    <input type="text" value="{{$categories->category_url}}" name="category_url" class="form-control">
                                </div>
                                <label for="" class="form-label">Choose Image:</label>
                                <div class="mb-3">
                                    <input type="file" name="category_image" class="form-control">
                                </div>

                                <div class="form-group">
                                    <img src="{{ asset($categories->cat_img) }}" width="100px" height="150px" />
                                    <input type="hidden" name="old_image" value="{{$categories->cat_img}}">
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