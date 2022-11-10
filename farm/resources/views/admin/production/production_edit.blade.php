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
                            <h5 class="card-title">Update Daily Production Details</h5>
                            <form action="{{ route('production.update',['id' => $productDetails->id]) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Date</label>
                                    <input type="date" value="{{$productDetails->date}}" name="date" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Cow ID</label>
                                    <input type="text" value="{{$productDetails->cow_id}}" name="cow_id" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Morning Shift (liter)</label>
                                    <input type="text" value="{{$productDetails->morning_shift}}" name="morning_shift" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Evening Shift (liter)</label>
                                    <input type="text" value="{{$productDetails->evening_shift}}" name="evening_shift" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Cow ID</label>
                                    <select name="product_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <option readonly value="">Pls Select Cow ID</option>

                                        @foreach($dairyDetails as $dairyDetail)
                                        <option value="{{$dairyDetail->product_id}}" @if ($productDetails->cow_id == $dairyDetail->product_id)
                                            {{'selected="selected"'}}
                                            @endif

                                            >{{$dairyDetail->product_id}}
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