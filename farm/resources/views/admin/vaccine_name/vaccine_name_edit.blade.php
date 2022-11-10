<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Vaccine Name
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Vaccine Name</h5>
                            <form action="{{ route('vaccineName.update',['id' => $VaccineNames->id]) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Update Vaccine Name</label>
                                    <input type="text" value="{{$VaccineNames->vaccine_name}}" name="vaccine_name" class="form-control">
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