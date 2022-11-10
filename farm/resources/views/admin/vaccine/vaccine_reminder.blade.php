<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Vaccine Reminder
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

                    <h4>Vaccine Pending List:</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Vaccine Date</th>
                                <th scope="col">Cow ID</th>
                                <th scope="col">Vaccine</th>
                                <th scope="col">Vaccine Notification Days</th>
                                <th scope="col">User</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- @php($i = 1) -->
                            @foreach($getReminders as $getReminder)
                            <tr>
                                <th scope="row">{{ $getReminders->firstItem() + $loop->index }}</th>
                                <td>{{ $getReminder->vaccine_date }}</td>
                                <td>{{ $getReminder->cow_id }}</td>
                                <td>{{ $getReminder->vaccineName->vaccine_name }}</td>
                                <td>{{ $getReminder->vaccine_notification }}</td>
                                <td>{{ $getReminder->user->name }}</td>
                                <td>{{ $getReminder->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('vaccineReminder.update', ['id' => $getReminder->id ]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-success">Done</a>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                    {{ $getReminders->links() }}
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-12 pt-4">
                    <h4>Vaccine Given List:</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Vaccine Date</th>
                                <th scope="col">Cow ID</th>
                                <th scope="col">Vaccine</th>
                                <th scope="col">Vaccine Notification Days</th>
                                <th scope="col">User</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- @php($i = 1) -->
                            @foreach($getdata as $getdatum)
                            <tr>
                                <th scope="row">{{ $getdata->firstItem() + $loop->index }}</th>
                                <td>{{ $getdatum->vaccine_date }}</td>
                                <td>{{ $getdatum->cow_id }}</td>
                                <td>{{ $getdatum->vaccineName->vaccine_name }}</td>
                                <td>{{ $getdatum->vaccine_notification }}</td>
                                <td>{{ $getdatum->user->name }}</td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                    {{ $getdata->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>