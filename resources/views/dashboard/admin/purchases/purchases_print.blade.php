@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Purchases List</h2>
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
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Buyer Name</th>
                            <th>Status</th>
                            <th>Note</th>
                            <th>Created At</th>
                            <th>Cancelled At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchases as $purchase)
                            <tr>
                                <td>{{ $purchase->id }}</td>
                                <td>{{ $purchase->product->name ?? '-' }}</td>
                                <td>{{ $purchase->qty }}</td>
                                <td>{{ number_format($purchase->total_price, 2) }}</td>
                                <td>{{ $purchase->buyer_name }}</td>
                                <td>{{ ucfirst($purchase->status) }}</td>
                                <td>{{ $purchase->note ?? '-' }}</td>
                                <td>{{ optional($purchase->created_at)->format('d M, Y') ?? '-' }}</td>
                                <td>{{ optional($purchase->cancelled_at)->format('d M, Y') ?? '-' }}</td>
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
