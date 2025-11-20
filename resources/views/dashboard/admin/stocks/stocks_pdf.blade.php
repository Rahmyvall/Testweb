<!DOCTYPE html>
<html>

    <head>
        <title>Stocks PDF</title>
        <style>
            @page {
                margin: 10px;
            }

            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
                margin: 0;
            }

            h2 {
                text-align: center;
                color: #333;
                margin: 15px 0 20px 0;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                page-break-inside: auto;
            }

            thead {
                background-color: #4CAF50;
                color: white;
                display: table-header-group;
            }

            tfoot {
                display: table-footer-group;
            }

            th,
            td {
                padding: 8px 10px;
                border: 1px solid #000;
                text-align: left;
                vertical-align: middle;
            }

            tbody tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            tbody tr {
                page-break-inside: avoid;
            }

            th {
                font-weight: bold;
                font-size: 13px;
            }
        </style>
    </head>

    <body>
        <h2>Stocks List</h2>
        <table>
            <thead>
                <tr>
                    <th style="width:50px;">ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stocks as $stock)
                    <tr>
                        <td>{{ $stock->id }}</td>
                        <td>{{ $stock->product->name ?? '-' }}</td>
                        <td>{{ $stock->quantity }}</td>
                        <td>{{ $stock->created_at->format('d M, Y') }}</td>
                        <td>{{ $stock->updated_at->format('d M, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
