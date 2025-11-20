@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">{{ $title ?? 'Create Purchase' }}</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.purchases.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <!-- Product -->
                        <div class="form-group mb-3">
                            <label for="product_id">Product</label>
                            <select name="product_id" id="product_id"
                                class="form-control @error('product_id') is-invalid @enderror" required>
                                <option value="">-- Select Product --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">Please select a product.</div>
                            @enderror
                        </div>

                        <!-- Quantity -->
                        <div class="form-group mb-3">
                            <label for="qty">Quantity</label>
                            <input type="number" name="qty" id="qty"
                                class="form-control @error('qty') is-invalid @enderror" placeholder="Enter quantity"
                                value="{{ old('qty') }}" min="1" required>
                            @error('qty')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">Please enter a valid quantity.</div>
                            @enderror
                        </div>

                        <!-- Total Price -->
                        <div class="form-group mb-3">
                            <label for="total_price">Total Price</label>
                            <input type="number" name="total_price" id="total_price"
                                class="form-control @error('total_price') is-invalid @enderror"
                                placeholder="Enter total price" value="{{ old('total_price') }}" min="0"
                                step="0.01" required>
                            @error('total_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">Please enter a valid total price.</div>
                            @enderror
                        </div>

                        <!-- Buyer Name -->
                        <div class="form-group mb-3">
                            <label for="buyer_name">Buyer Name</label>
                            <input type="text" name="buyer_name" id="buyer_name"
                                class="form-control @error('buyer_name') is-invalid @enderror"
                                placeholder="Enter buyer name" value="{{ old('buyer_name') }}" required>
                            @error('buyer_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">Please enter buyer name.</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror"
                                required>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">Please select a status.</div>
                            @enderror
                        </div>

                        <!-- Note -->
                        <div class="form-group mb-3">
                            <label for="note">Note</label>
                            <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror"
                                placeholder="Optional note">{{ old('note') }}</textarea>
                            @error('note')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">Please enter a valid note.</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.purchases.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Bootstrap custom validation
        (function() {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
@endsection
