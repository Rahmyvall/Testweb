@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Products List</h2>
            <button onclick="window.print()" class="btn btn-primary">
                <i class="fas fa-print me-1"></i> Print
            </button>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-2 table-responsive">
                <table class="table table-bordered table-hover table-striped mb-0">
                    <thead class="table-success text-white">
                        <tr>
                            <th style="width:50px;">ID</th>
                            <th>SKU</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->sku }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ number_format($product->price, 2, ',', '.') }}</td>
                                <td>{{ $product->created_at->format('d M, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        /* Styling untuk print */
        @media print {
            @page {
                size: A4 landscape;
                /* otomatis landscape */
                margin: 10mm;
            }

            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
                -webkit-print-color-adjust: exact;
                -moz-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .btn {
                display: none !important;
            }

            .table-responsive {
                overflow: visible !important;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                page-break-inside: auto;
                table-layout: fixed;
                /* supaya kolom menyesuaikan */
            }

            thead {
                display: table-header-group;
            }

            tfoot {
                display: table-footer-group;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            th,
            td {
                border: 1px solid #000;
                padding: 6px;
                text-align: left;
                word-wrap: break-word;
            }
        }

        /* Hover highlight hanya untuk layar */
        @media screen {
            table tbody tr:hover {
                background-color: #f1f1f1;
            }
        }
    </style>
@endsection
