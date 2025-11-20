@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">{{ $title ?? 'Product Detail' }}</strong>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SKU</th>
                            <td>{{ $product->sku }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{ number_format($product->price, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $product->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $product->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back</a>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
