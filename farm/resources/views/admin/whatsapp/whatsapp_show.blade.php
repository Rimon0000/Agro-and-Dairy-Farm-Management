<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Whatsapps
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

                    <h4>Whatsapps Number:</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Number</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
 
                            @foreach($Whatsapps as $Whatsapp)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $Whatsapp->number }}</td>
                                <td>{{ $Whatsapp->user->name }}</td>
                                <td>{{ $Whatsapp->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('whatsapp.delete', ['id' => $Whatsapp->id ]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger" >Delete</a>
                                </td>
                            </tr>
                            @endforeach

                            
                        </tbody>
                    </table>

                   
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Number</h5>
                            <form action="{{ route('whatsapp.store') }}" method="POST" >
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Number</label>
                                    <input type="text" name="number" class="form-control">                                    
                                </div>                            
                                <div>
                                    @error('number')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                @if($count == 0)
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                @endif
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>