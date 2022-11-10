<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Expanse Name
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

                    <h4>All Expanse:</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Expanse Name</th>
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
                                <td>{{ $vaccineName->date }}</td>
                                <td>{{ $vaccineName->expanse_name }}</td>
                                <td>{{ $vaccineName->user->name }}</td>
                                <td>{{ $vaccineName->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('expanse.edit', ['id' => $vaccineName->id ]) }}" class="btn btn-sm btn-warning" >Edit</a>
                                    <a href="{{ route('expanse.delete', ['id' => $vaccineName->id ]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger" >Delete</a>
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
                            <h5 class="card-title">Add Expanse Name</h5>
                            <form action="{{ route('expanse.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Expanse Name</label>
                                    <input type="text" name="expanse_name" class="form-control" required>
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