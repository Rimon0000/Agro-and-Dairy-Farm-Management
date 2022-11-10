<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Reports
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <h3>Categories</h3>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card border-primary mb-3">
                        <div class="card-header text-success"><strong>Categories</strong></div>
                        <div class="card-body text-primary">
                            <h5>Total <span class="badge bg-danger">{{ $categories }}</span></h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-primary mb-3">
                        <div class="card-header text-success"><strong>Sub Categories</strong></div>
                        <div class="card-body text-primary">
                            <h5>Total <span class="badge bg-danger">{{ $sub_categories }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h3>Agro</h3>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card border-primary mb-3">
                        <div class="card-header text-success"><strong>Agro Cow</strong></div>
                        <div class="card-body text-primary">
                            <h5>Total <span class="badge bg-danger">{{ $agro_details }}</span></h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-primary mb-3">
                        <div class="card-header text-success"><strong>Dairy Cow</strong></div>
                        <div class="card-body text-primary">
                            <h5>Total <span class="badge bg-danger">{{ $dairy_details }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h3>Dairy Products</h3>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card border-primary mb-3">
                        <div class="card-header text-success"><strong>Dairy Product</strong></div>
                        <div class="card-body text-primary">
                            <h5>Total <span class="badge bg-danger">{{ $dairy_details }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h3>Expanse</h3>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card border-primary mb-3">
                        <div class="card-header text-success"><strong>Today's Farm Expanse</strong></div>
                        <div class="card-body text-primary">
                            <h5>Total <span class="badge bg-danger">{{ $expanse_details }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <h3>Income</h3>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card border-primary mb-3">
                        <div class="card-header text-success"><strong>Today's Order Amount (TK)</strong></div>
                        <div class="card-body text-primary">
                            <h5>Total <span class="badge bg-danger">{{ $orders }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>