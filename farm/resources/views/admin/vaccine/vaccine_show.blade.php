<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Vaccine Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <h4>Vaccine Details List:</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Vaccine Date</th>
                                <th scope="col">Cow ID</th>
                                <th scope="col">Vaccine</th>
                                <th scope="col">Vaccine Notification Days</th>
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
                                <td>{{ $productDetail->vaccine_date }}</td>
                                <td>{{ $productDetail->cow_id }}</td>
                                <td>{{ $productDetail->vaccineName->vaccine_name }}</td>
                                <td>{{ $productDetail->vaccine_notification }}</td>
                                <td>{{ $productDetail->user->name }}</td>
                                <td>{{ $productDetail->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('vaccine.edit', ['id' => $productDetail->id ]) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('vaccine.delete', ['id' => $productDetail->id ]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $productDetails->links() }}
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Vaccine Details</h5>
                            <form action="{{ route('vaccine.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Vaccine Date</label>
                                    <input type="date" name="vaccine_date" class="form-control">
                                </div>


                                <div class="mb-3">
                                    <label for="" class="form-label">Cow ID</label>
                                    <select name="cow_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <option readonly value="">Pls Select Cow ID</option>

                                        @foreach($dairyDetails as $dairyDetail)
                                        <option value="{{$dairyDetail->product_id}}">{{$dairyDetail->product_id}}</option>
                                        @endforeach

                                        @foreach($agroDetails as $agroDetail)
                                        <option value="{{$agroDetail->product_id}}">{{$agroDetail->product_id}}</option>
                                        @endforeach


                                    </select>
                                </div>
                               
                                <div class="mb-3">
                                    <label for="" class="form-label">Vaccine</label>
                                    <select name="vaccine_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <option readonly value="">Pls Select Vaccine</option>

                                        @foreach($VaccineNames as $VaccineName)
                                        <option value="{{$VaccineName->id}}">{{$VaccineName->vaccine_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Vaccine Notification Day</label>
                                    <input type="date" name="vaccine_notification" class="form-control">
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