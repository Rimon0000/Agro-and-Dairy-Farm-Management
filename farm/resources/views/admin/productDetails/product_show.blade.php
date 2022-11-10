<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-info btn-sm float-end" href="{{ route('product.add') }}">Add Details</a>
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

                    <h4>Dairy Product Lists:</h4>
                    <table id="table_id" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product ID</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Size</th>
                                <th scope="col">Cost Price</th>
                                <th scope="col">Sale Price</th>
                                <th scope="col">Discount Price</th>                                
                                <th scope="col">Category</th>
                                <th scope="col">SubCategory</th>
                                <th scope="col">Details</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- @php($i = 1) -->
                            @foreach($productDetails as $productDetail)
                            <tr>
                                <th scope="row">#</th>
                                <td>{{ $productDetail->product_id }}</td>
                                <td>{{ $productDetail->product_name }}</td>
                                <td>{{ $productDetail->weight }}</td>
                                <td>{{ $productDetail->size }}</td>
                                <td>{{ $productDetail->cost_price }}</td>
                                <td>{{ $productDetail->sale_price }}</td>
                                <td>{{ $productDetail->discount_price }}</td>                                

                                <td>{{ $productDetail->categoryName->category_name }}</td>
                                <td>{{ $productDetail->subcategoryName->subcategory }}</td>



                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$productDetail->id}}">
                                        Details
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$productDetail->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$productDetail->id}}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel{{$productDetail->id}}">More Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">User ID</th>
                                                                <th scope="col">Rating</th>
                                                                <th scope="col">Detail Short</th>
                                                                <th scope="col">Detail Long</th>
                                                                <th scope="col">Created At</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $productDetail->user->name }}</td>
                                                                <td>{{ $productDetail->rating }}</td>
                                                                <td>{{ $productDetail->product_detail_short }}</td>
                                                                <td>{{ $productDetail->product_detail_long }}</td>
                                                                <td>{{ $productDetail->created_at->diffForHumans() }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>



                                <td>
                                    <a href="{{ route('product.edit', ['id' => $productDetail->id ]) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('product.delete', ['id' => $productDetail->id ]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

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