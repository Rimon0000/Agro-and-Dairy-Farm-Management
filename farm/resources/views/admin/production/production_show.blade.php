<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daily Production
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

                    <h4>Daily Milk Production:</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Cow ID</th>
                                <th scope="col">Morning</th>
                                <th scope="col">Evening</th>
                                <th scope="col">User</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- @php($i = 1) -->
                            @foreach($productDetails as $productDetail)
                            <tr>
                                <th scope="row">{{ $productDetails->firstItem() + $loop->index }}</th>
                                <td>{{ $productDetail->date }}</td>
                                <td>{{ $productDetail->cow_id }}</td>
                                <td>{{ $productDetail->morning_shift }}</td>
                                <td>{{ $productDetail->evening_shift }}</td>
                                <td>{{ $productDetail->user->name }}</td>
                                <td>{{ $productDetail->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('production.edit', ['id' => $productDetail->id ]) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('production.delete', ['id' => $productDetail->id ]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                    {{ $productDetails->links() }}
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Daily Production</h5>
                            <form action="{{ route('production.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Cow ID</label>
                                    <select name="cow_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <option readonly value="" >Pls Select Cow ID</option>

                                        @foreach($dairyDetails as $dairyDetail)
                                        <option value="{{$dairyDetail->product_id}}">{{$dairyDetail->product_id}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Morning Shift (liter)</label>
                                    <input type="text" name="morning_shift" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Evening Shift (liter)</label>
                                    <input type="text" name="evening_shift" class="form-control">
                                </div>

                                
                                <br>

                                <div>
                                    @error('productDetail')
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