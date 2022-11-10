<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Dairy Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-info btn-sm float-end" href="{{ route('dairy.add') }}">Add Details</a>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-lg-12">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <h4>All Dairy Product:</h4>
                    <table id="table_id" class="display"  style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product ID</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">For Sale</th>
                                <th scope="col">Birthday</th>
                                <th scope="col">Mother ID</th>
                                <th scope="col">Mother Production</th>
                                <th scope="col">Father's Details</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Cost Price</th>
                                <th scope="col">Sale Price</th>
                                <th scope="col">Age</th>                                
                                <th scope="col">Location</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Category</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- @php($i = 1) -->
                            @foreach($productDetails as $productDetail)
                            <tr>
                                <th scope="row">{{ $productDetails->firstItem() + $loop->index }}</th>
                                <td>{{ $productDetail->product_id }}</td>
                                <td>{{ $productDetail->product_name }}</td>
                                <td>{{ $productDetail->for_sale }}</td>
                                <td>{{ $productDetail->birthday }}</td>
                                <td>{{ $productDetail->mother_id }}</td>
                                <td>{{ $productDetail->mother_production }}</td>                                
                                <td>{{ $productDetail->father_details }}</td>
                                <td>{{ $productDetail->weight }}</td>
                                <td>{{ $productDetail->cost_price }}</td>
                                <td>{{ $productDetail->sale_price }}</td>
                                <td>{{ $productDetail->product_age }}</td>
                                <td>{{ $productDetail->location }}</td>
                                <td>{{ $productDetail->user_id }}</td>
                                <td>{{ $productDetail->category_id }}</td>
                                <td>{{ $productDetail->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('dairy.edit', ['id' => $productDetail->id ]) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('dairy.delete', ['id' => $productDetail->id ]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                    {{ $productDetails->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

    <script>

        $(document).ready(function() {
            
            $('#table_id').DataTable({
                "scrollX": true
            });
            
        });
    </script>
</x-app-layout>