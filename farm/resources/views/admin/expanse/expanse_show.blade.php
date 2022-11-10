<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Expanse Details
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

                    <h4>Expanse Details List:</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Expanse Date</th>
                                <th scope="col">Expanse Name</th>
                                <th scope="col">Total Amount</th>
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
                                <td>{{ $productDetail->expanse_date }}</td>                               
                                <td>{{ $productDetail->expanseDetails->expanse_name }}</td>
                                <td>{{ $productDetail->expanse_amount }}</td>
                                <td>{{ $productDetail->user->name }}</td>
                                <td>{{ $productDetail->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('expanseDetails.edit', ['id' => $productDetail->id ]) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('expanseDetails.delete', ['id' => $productDetail->id ]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">Delete</a>
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
                            <h5 class="card-title">Add Expanse Details</h5>
                            <form action="{{ route('expanseDetails.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Expanse Date Date</label>
                                    <input type="date" name="expanse_date" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Expanse Name</label>
                                    <select name="expanse_name" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <option readonly value="" >Pls Select Expanse Name</option>

                                        @foreach($dairyDetails as $dairyDetail)
                                        <option value="{{$dairyDetail->id}}">{{$dairyDetail->expanse_name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Total Amount</label>
                                    <input type="text" name="expanse_amount" class="form-control">
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