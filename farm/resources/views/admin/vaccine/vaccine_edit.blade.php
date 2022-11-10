<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Vaccine
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Update Vaccine Details</h5>
                            <form action="{{ route('vaccine.update',['id' => $productDetails->id]) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Date</label>
                                    <input type="date" value="{{$productDetails->vaccine_date}}" name="vaccine_date" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Cow ID</label>
                                    <select name="cow_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
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
                                <div class="mb-3">
                                    <label for="" class="form-label">Vaccine</label>
                                    <select name="vaccine" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <option readonly value="">Pls Select Vaccine</option>

                                        @foreach($vaccineNames as $vaccineName)
                                        <option value="{{$vaccineName->id}}"
                                            @if ($productDetails->vaccine == $vaccineName->id)
                                            {{'selected="selected"'}}
                                            @endif
                                        
                                        > {{ $vaccineName->vaccine_name }}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Vaccine Notification Day</label>
                                    <input type="date" value="{{$productDetails->vaccine_notification}}" name="vaccine_notification" class="form-control">
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