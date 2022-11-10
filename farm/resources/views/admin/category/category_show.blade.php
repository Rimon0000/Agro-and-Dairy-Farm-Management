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
                    
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                    <h4>All Categories:</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category URL</th>
                                <th scope="col">Image</th>
                                <th scope="col">User</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <!-- @php($i = 1) -->
                            @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $categories->firstItem() + $loop->index }}</th>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->category_url }}</td>
                                <td><img src="{{ asset($category->cat_img) }}" width="50px" height="70px" /></td>
                                <td>{{ $category->user->name }}</td>
                                <td>{{ $category->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('category.edit', ['id' => $category->id ]) }}" class="btn btn-sm btn-warning" >Edit</a>
                                    <a href="{{ route('category.delete', ['id' => $category->id ]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger" >Delete</a>
                                </td>
                            </tr>
                            @endforeach

                            
                        </tbody>
                    </table>

                    {{ $categories->links() }}
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Category</h5>
                            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Category Name</label>
                                    <input type="text" name="category_name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Category URL</label>
                                    <input type="text" name="category_url" class="form-control">
                                </div>

                                <label for="" class="form-label">Choose Image:</label>
                                <div class="mb-3">
                                    <input type="file" name="category_image" class="form-control">
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