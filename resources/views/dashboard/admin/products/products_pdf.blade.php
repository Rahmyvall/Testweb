<!DOCTYPE html>
<html>

    <head>
        <title>Products PDF</title>
        <style>
            @page {
                margin: 10px;
                /* margin PDF minimal */
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
                /* header muncul di setiap halaman PDF */
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
                /* hindari terpotong */
            }

            th {
                font-weight: bold;
                font-size: 13px;
            }
        </style>
    </head>

    <body>
        <h2>Products List</h2>
        <table>
            <thead>
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
    </body>

</html>
