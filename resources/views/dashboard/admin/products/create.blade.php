@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">{{ $title ?? 'Create Product' }}</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.products.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <!-- SKU -->
                        <div class="form-group mb-3">
                            <label for="sku">SKU</label>
                            <input type="text" name="sku" id="sku" class="form-control" placeholder="Enter SKU"
                                value="{{ old('sku') }}" required>
                            <div class="invalid-feedback">Please enter the SKU.</div>
                        </div>

                        <!-- Name -->
                        <div class="form-group mb-3">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter product name" value="{{ old('name') }}" required>
                            <div class="invalid-feedback">Please enter the product name.</div>
                        </div>

                        <!-- Price -->
                        <div class="form-group mb-3">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control"
                                placeholder="Enter price" value="{{ old('price') }}" step="0.01" min="0"
                                required>
                            <div class="invalid-feedback">Please enter a valid price.</div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
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
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })();
    </script>
@endsection
