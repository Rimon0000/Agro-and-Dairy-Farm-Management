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
                            <form action="{{ route('expanseDetails.update',['id' => $productDetails->id]) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Date</label>
                                    <input type="date" value="{{$productDetails->expanse_date}}" name="date" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Expanse Name</label>
                                    <select name="expanse_name" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <option readonly value="">Pls Select Expanse Name</option>

                                        @foreach($dairyDetails as $dairyDetail)
                                        <option value="{{$dairyDetail->id}}" @if ($productDetails->expanse_name == $dairyDetail->id)
                                            {{'selected="selected"'}}
                                            @endif

                                            >{{$dairyDetail->expanse_name}}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Total Amount</label>
                                    <input type="text" name="expanse_amount" class="form-control" value="{{$productDetails->expanse_amount}}">
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