<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Vaccine Name
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

                    <h4>All Vaccine:</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Vaccine Name</th>
                                <th scope="col">User</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <!-- @php($i = 1) -->
                            @foreach($vaccineNames as $vaccineName)
                            <tr>
                                <th scope="row">{{ $vaccineNames->firstItem() + $loop->index }}</th>
                                <td>{{ $vaccineName->vaccine_name }}</td>
                                <td>{{ $vaccineName->user->name }}</td>
                                <td>{{ $vaccineName->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('vaccineName.edit', ['id' => $vaccineName->id ]) }}" class="btn btn-sm btn-warning" >Edit</a>
                                    <a href="{{ route('vaccineName.delete', ['id' => $vaccineName->id ]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger" >Delete</a>
                                </td>
                            </tr>
                            @endforeach

                            
                        </tbody>
                    </table>

                    {{ $vaccineNames->links() }}
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Vaccine Name</h5>
                            <form action="{{ route('vaccineName.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Vaccine Name</label>
                                    <input type="text" name="vaccine_name" class="form-control">
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