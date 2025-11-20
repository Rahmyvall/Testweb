@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">{{ $title }}</h1>

        <!-- ======================
             WIDGETS SUMMARY
             ====================== -->
        <div class="row mb-4">
            <!-- Total Purchases -->
            <div class="col-md-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <small class="text-muted">Total Purchases</small>
                        <h3>{{ $totalPurchases }}</h3>
                        <p class="small text-muted">
                            <i class="fe fe-arrow-{{ $purchaseGrowth >= 0 ? 'up text-success' : 'down text-danger' }}"></i>
                            {{ abs($purchaseGrowth) }}% last week
                        </p>
                    </div>
                </div>
            </div>

            <!-- Total Revenue -->
            <div class="col-md-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <small class="text-muted">Total Revenue</small>
                        <h3>${{ number_format($totalRevenue, 2) }}</h3>
                    </div>
                </div>
            </div>

            <!-- Pending Purchases -->
            <div class="col-md-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <small class="text-muted">Pending Purchases</small>
                        <h3>{{ $purchasesPending }}</h3>
                    </div>
                </div>
            </div>

            <!-- Active Purchases -->
            <div class="col-md-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <small class="text-muted">Shipped Purchases</small>
                        <h3>{{ $purchasesActive }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- ======================
             LAST 5 PURCHASES TABLE
             ====================== -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="mb-3">Last 5 Purchases</h6>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
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
                                @foreach ($recentPurchases as $purchase)
                                    <tr>
                                        <td>{{ $purchase->id }}</td>
                                        <td>{{ optional($purchase->created_at)->format('Y-m-d H:i:s') }}</td>
                                        <td>{{ $purchase->buyer_name ?? '-' }}</td>
                                        <td>{{ $purchase->product->name ?? '-' }}</td>
                                        <td>{{ $purchase->qty }}</td>
                                        <td>${{ number_format($purchase->total_price, 2) }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $purchase->status == 'active' ? 'bg-success' : ($purchase->status == 'cancelled' ? 'bg-danger' : 'bg-warning') }}">
                                                {{ ucfirst($purchase->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $purchase->note ?? '-' }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('admin.purchases.edit', $purchase->id) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <form
                                                            action="{{ route('admin.purchases.destroy', $purchase->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item"
                                                                onclick="return confirm('Are you sure?')">Remove</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
