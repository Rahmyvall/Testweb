@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">{{ $title ?? 'Purchase Detail' }}</strong>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Product</th>
                            <td>{{ $purchase->product->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>{{ $purchase->qty }}</td>
                        </tr>
                        <tr>
                            <th>Total Price</th>
                            <td>{{ number_format($purchase->total_price, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Buyer Name</th>
                            <td>{{ $purchase->buyer_name }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge {{ $purchase->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($purchase->status) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Note</th>
                            <td>{{ $purchase->note ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $purchase->created_at?->format('d M Y H:i') ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Cancelled At</th>
                            <td>{{ $purchase->cancelled_at?->format('d M Y H:i') ?? '-' }}</td>
                        </tr>
                    </table>

                    <a href="{{ route('admin.purchases.index') }}" class="btn btn-secondary">Back</a>
                    <a href="{{ route('admin.purchases.edit', $purchase->id) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
