@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="page-title">{{ $title }}</h1>
        </div> <!-- .col-12 -->
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow bg-primary text-white border-0">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-sm bg-primary-light">
                                                <i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
                                            </span>
                                        </div>
                                        <div class="col pr-0">
                                            <p class="small text-muted mb-0">Monthly Sales</p>
                                            <span class="h3 mb-0 text-white">$1250</span>
                                            <span class="small text-muted">+5.5%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-sm bg-primary">
                                                <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                                            </span>
                                        </div>
                                        <div class="col pr-0">
                                            <p class="small text-muted mb-0">Orders</p>
                                            <span class="h3 mb-0">1,869</span>
                                            <span class="small text-success">+16.5%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-sm bg-primary">
                                                <i class="fe fe-16 fe-filter text-white mb-0"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <p class="small text-muted mb-0">Conversion</p>
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-auto">
                                                    <span class="h3 mr-2 mb-0"> 86.6% </span>
                                                </div>
                                                <div class="col-md-12 col-lg">
                                                    <div class="progress progress-sm mt-2" style="height:3px">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 87%" aria-valuenow="87" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-sm bg-primary">
                                                <i class="fe fe-16 fe-activity text-white mb-0"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <p class="small text-muted mb-0">AVG Orders</p>
                                            <span class="h3 mb-0">$80</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end section -->
                    <div class="row align-items-center my-2">
                        <div class="col-auto ml-auto">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label for="reportrange" class="sr-only">Date Ranges</label>
                                    <div id="reportrange" class="px-2 py-2 text-muted">
                                        <i class="fe fe-calendar fe-16 mx-2"></i>
                                        <span class="small"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-sm"><span
                                            class="fe fe-refresh-ccw fe-12 text-muted"></span></button>
                                    <button type="button" class="btn btn-sm"><span
                                            class="fe fe-filter fe-12 text-muted"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- charts-->
                    <div class="row my-4">
                        <div class="col-md-12">
                            <div class="chart-box">
                                <div id="columnChart"></div>
                            </div>
                        </div> <!-- .col -->
                    </div> <!-- end section -->
                    <!-- info small box -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="chart-widget">
                                        <div id="gradientRadial"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-center">
                                            <p class="text-muted mb-0">Yesterday</p>
                                            <h4 class="mb-1">126</h4>
                                            <p class="text-muted mb-2">+5.5%</p>
                                        </div>
                                        <div class="col-6 text-center">
                                            <p class="text-muted mb-0">Today</p>
                                            <h4 class="mb-1">86</h4>
                                            <p class="text-muted mb-2">-5.5%</p>
                                        </div>
                                    </div>
                                </div> <!-- .card-body -->
                            </div> <!-- .card -->
                        </div> <!-- .col -->
                        <div class="col-md-4">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="chart-widget mb-2">
                                        <div id="radialbar"></div>
                                    </div>
                                    <div class="row items-align-center">
                                        <div class="col-4 text-center">
                                            <p class="text-muted mb-1">Cost</p>
                                            <h6 class="mb-1">$1,823</h6>
                                            <p class="text-muted mb-0">+12%</p>
                                        </div>
                                        <div class="col-4 text-center">
                                            <p class="text-muted mb-1">Revenue</p>
                                            <h6 class="mb-1">$6,830</h6>
                                            <p class="text-muted mb-0">+8%</p>
                                        </div>
                                        <div class="col-4 text-center">
                                            <p class="text-muted mb-1">Earning</p>
                                            <h6 class="mb-1">$4,830</h6>
                                            <p class="text-muted mb-0">+8%</p>
                                        </div>
                                    </div>
                                </div> <!-- .card-body -->
                            </div> <!-- .card -->
                        </div> <!-- .col -->
                        <div class="col-md-4">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <p class="mb-0"><strong class="mb-0 text-uppercase text-muted">Today</strong></p>
                                    <h3 class="mb-0">$2,562.30</h3>
                                    <p class="text-muted">+18.9% Last week</p>
                                    <div class="chart-box mt-n5">
                                        <div id="lineChartWidget"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 text-center mt-3">
                                            <p class="mb-1 text-muted">Completions</p>
                                            <h6 class="mb-0">26</h6>
                                            <span class="small text-muted">+20%</span>
                                            <span class="fe fe-arrow-up text-success fe-12"></span>
                                        </div>
                                        <div class="col-4 text-center mt-3">
                                            <p class="mb-1 text-muted">Goal Value</p>
                                            <h6 class="mb-0">$260</h6>
                                            <span class="small text-muted">+6%</span>
                                            <span class="fe fe-arrow-up text-success fe-12"></span>
                                        </div>
                                        <div class="col-4 text-center mt-3">
                                            <p class="mb-1 text-muted">Conversion</p>
                                            <h6 class="mb-0">6%</h6>
                                            <span class="small text-muted">-2%</span>
                                            <span class="fe fe-arrow-down text-danger fe-12"></span>
                                        </div>
                                    </div>
                                </div> <!-- .card-body -->
                            </div> <!-- .card -->
                        </div> <!-- .col-md -->
                    </div> <!-- / .row -->
                    <div class="row">
                        <!-- Recent purchases -->
                        <div class="col-md-12">
                            <h6 class="mb-3">Last Purchases</h6>
                            <table class="table table-borderless table-striped">
                                <thead>
                                    <tr role="row">
                                        <th>ID</th>
                                        <th>Purchase Date</th>
                                        <th>Buyer Name</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchase)
                                        <tr>
                                            <th scope="row">{{ $purchase->id }}</th>
                                            <td>{{ optional($purchase->created_at)->format('Y-m-d H:i:s') }}</td>
                                            <td>{{ $purchase->buyer_name }}</td>
                                            <td>{{ $purchase->product->name ?? '-' }}</td>
                                            <td>{{ $purchase->qty }}</td>
                                            <td>{{ number_format($purchase->total_price, 2) }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $purchase->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                                    {{ ucfirst($purchase->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $purchase->note ?? '-' }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm dropdown-toggle more-vertical"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.purchases.edit', $purchase->id) }}">Edit</a>
                                                        <form
                                                            action="{{ route('admin.purchases.destroy', $purchase->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item"
                                                                onclick="return confirm('Are you sure?')">Remove</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </div>
@endsection
