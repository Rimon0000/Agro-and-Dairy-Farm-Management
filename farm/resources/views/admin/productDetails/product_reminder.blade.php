<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Product Reminder
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <h4>Product Pending List:</h4>
                    <table id="table_id" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product ID</th>
                                <th scope="col">Current Stock</th>
                                <th scope="col">Alert Stock</th>
                                <th scope="col">Purchase Amount</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- @php($i = 1) -->
                            @foreach($productDetails as $productDetail)
                            @if($productDetail->stock_qty <= $productDetail->stock_alert )
                                <tr>
                                    <td>#</td>
                                    <td>{{ $productDetail->product_name }}</td>
                                    <td>{{ $productDetail->product_id }}</td>
                                    <td>{{ $productDetail->stock_qty }}</td>
                                    <td>{{ $productDetail->stock_alert }}</td>
                                    <form action="{{ route('product.reminder.update') }}" method="POST">
                                        @csrf
                                        <td>
                                            <input type="hidden" name="p_id" value="{{ $productDetail->product_id }}">
                                            <input type="text" name="p_amount" class="form-control" placeholder="Purchase Amount">
                                        </td>
                                        <td>
                                            <button onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-success">Update</button>
                                        </td>
                                    </form>
                                </tr>
                                @endif
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