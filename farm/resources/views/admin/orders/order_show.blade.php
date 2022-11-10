<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Order
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

                    <h4>Order List:</h4>
                    <table id="table_order" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User ID</th>
                                <th scope="col">User Name</th>
                                <th scope="col">PYT Method</th>
                                <th scope="col">Pty Number</th>
                                <th scope="col">TRDXr</th>
                                <th scope="col">Total Products</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- @php($i = 1) -->
                            @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{ $orders->firstItem() + $loop->index }}</th>
                                <td>{{ $order->user_id }}</td>
                                <td>{{ $order->user_name }}</td>
                                <td>{{ $order->pyt_method }}</td>
                                <td>{{ $order->pty_number }}</td>
                                <td>{{ $order->trdx }}</td>
                                <td>{{ $order->total_products }}</td>
                                <td>{{ $order->total_price }}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$order->id}}">
                                        More..
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$order->id}}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel{{$order->id}}">Order Info</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>User Number</td>
                                                                <td>{{ $order->user_number }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email</td>
                                                                <td>{{ $order->user_email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Message</td>
                                                                <td>{{ $order->address }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>City</td>
                                                                <td>{{ $order->city }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Pin Code</td>
                                                                <td>{{ $order->pin_code }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Street</td>
                                                                <td>{{ $order->street }}</td>
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
                                <!-- <td>
                                    <a href="{{ route('contact.delete', ['id' => $order->id ]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">Delete</a>
                                </td> -->
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                    {{ $orders->links() }}
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {

            $('#table_order').DataTable({
                "scrollX": true
            });

        });
    </script>
</x-app-layout>