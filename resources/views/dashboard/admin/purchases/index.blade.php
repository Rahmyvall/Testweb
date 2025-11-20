@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="page-title">{{ $title }}</h1>

            <div class="d-flex align-items-center gap-3">
                <!-- Tombol Create -->
                <a href="{{ route('admin.purchases.create') }}" class="btn btn-primary px-3">
                    <i class="fas fa-plus me-2"></i> Create
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <table class="table datatables align-middle" id="dataTable-1">
                            <thead class="thead-light">
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Buyer Name</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Cancelled At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="check{{ $purchase->id }}">
                                                <label class="custom-control-label" for="check{{ $purchase->id }}"></label>
                                            </div>
                                        </td>
                                        <td>{{ $purchase->id }}</td>
                                        <td>{{ $purchase->product->name ?? '-' }}</td>
                                        <td>{{ $purchase->qty }}</td>
                                        <td>{{ number_format($purchase->total_price, 2) }}</td>
                                        <td>{{ $purchase->buyer_name }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $purchase->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                                {{ ucfirst($purchase->status) }}
                                            </span>
                                        </td>
                                        <td>{{ optional($purchase->created_at)->format('d M, Y') ?? '-' }}</td>
                                        <td>{{ optional($purchase->cancelled_at)->format('d M, Y') ?? '-' }}</td>

                                        <td>
                                            <div class="btn-group" role="group">
                                                <!-- Detail -->
                                                <a href="{{ route('admin.purchases.show', $purchase->id) }}"
                                                    class="btn btn-info btn-sm me-1" title="Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <!-- Edit -->
                                                <a href="{{ route('admin.purchases.edit', $purchase->id) }}"
                                                    class="btn btn-warning btn-sm me-1" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <!-- Delete -->
                                                <form action="{{ route('admin.purchases.destroy', $purchase->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm me-1" title="Delete"
                                                        onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                                <!-- Print -->
                                                <a href="{{ route('admin.purchases.print') }}" target="_blank"
                                                    class="btn btn-secondary btn-sm" title="Print">
                                                    <i class="fas fa-print"></i>
                                                </a>
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
