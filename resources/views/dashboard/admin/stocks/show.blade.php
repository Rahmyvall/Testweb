@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">{{ $title ?? 'Stock Detail' }}</strong>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Product</th>
                            <td>{{ $stock->product->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>{{ $stock->quantity }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $stock->created_at?->format('d M Y H:i') ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $stock->updated_at?->format('d M Y H:i') ?? '-' }}</td>
                        </tr>

                    </table>
                    <a href="{{ route('admin.stocks.index') }}" class="btn btn-secondary">Back</a>
                    <a href="{{ route('admin.stocks.edit', $stock->id) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
