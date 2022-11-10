<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All SubCategory
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

                    <h4>All SubCategories:</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category</th>
                                <th scope="col">SubCategory</th>
                                <th scope="col">User</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- @php($i = 1) -->
                            @foreach($subcategories as $subcategory)
                            <tr>
                                <th scope="row">{{ $subcategories->firstItem() + $loop->index }}</th>
                                <td>{{ $subcategory->categoryName->category_name }}</td>
                                <td>{{ $subcategory->subcategory }}</td>
                                <td>{{ $subcategory->user->name }}</td>
                                <td>{{ $subcategory->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('subcategory.edit', ['id' => $subcategory->id ]) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('subcategory.delete', ['id' => $subcategory->id ]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                    {{ $subcategories->links() }}
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Sub Category</h5>
                            <form action="{{ route('subcategory.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Subcategory Name</label>
                                    <input type="text" name="subcategory" class="form-control">
                                </div>

                                <div>
                                    <label for="" class="form-label">Category Name</label>
                                    <select name="category_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <option readonly value="" >Pls Select Category</option>

                                        @foreach($categories as $category)
                                        <option selected value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                        
                                    </select>
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
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>