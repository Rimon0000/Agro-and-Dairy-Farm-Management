<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Brands
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Brand</h5>
                            <form action="{{ route('brand.update', ['id' => $brands->id ]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Brand Name</label>
                                    <input type="text" name="brand_name" value="{{ $brands->brand_name }}" class="form-control">
                                </div>
                                <label for="" class="form-label">Choose Image:</label>
                                <div class="mb-3">
                                    <input type="file" name="brand_image" class="form-control">
                                </div>

                                <div class="form-group">
                                    <img src="{{ asset($brands->brand_image) }}" width="100px" height="150px" />
                                    <input type="hidden" name="old_image" value="{{$brands->brand_image}}">
                                </div>
                                <br>
                                <div>
                                    @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @error('brand_image')
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