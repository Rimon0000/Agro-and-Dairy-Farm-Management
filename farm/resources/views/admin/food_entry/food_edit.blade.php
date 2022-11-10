<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Food
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Update Food Details</h5>
                            <form action="{{ route('food.update',['id' => $foods->id]) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Food Name</label>
                                    <input type="text" value="{{$foods->food_name}}" name="food_name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">No. of Times</label>
                                    <input type="text" value="{{$foods->time}}" name="time" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Date</label>
                                    <input type="date" value="{{$foods->date}}" name="date" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Total Amount</label>
                                    <input type="text" value="{{$foods->total_amount}}" name="total_amount" class="form-control">
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