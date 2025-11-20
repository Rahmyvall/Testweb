<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StockResource;
use App\Http\Resources\StockCollection;
use Illuminate\Http\Request;
use App\Models\Stock;

class StockApiController extends Controller
{
    /**
     * List semua stock dengan relasi product
     * Mendukung search berdasarkan nama product
     */
    public function index(Request $request)
    {
        $query = Stock::with('product');

        // Search by product name
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('product', function($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        // Pagination default 10
        $perPage = $request->per_page ?? 10;
        $stocks = $query->orderBy('id', 'desc')->paginate($perPage);

        return new StockCollection($stocks);
    }

    /**
     * Detail stock
     */
    public function show($id)
    {
        $stock = Stock::with('product')->find($id);

        if (!$stock) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Stock not found'
            ], 404);
        }

        return (new StockResource($stock))->additional(['status' => 'success']);
    }

    /**
     * Buat stock baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id|unique:stocks,product_id',
            'quantity'   => 'required|integer|min:0',
        ]);

        $stock = Stock::create($validated);

        return (new StockResource($stock))
                ->additional(['status' => 'success'])
                ->response()
                ->setStatusCode(201);
    }

    /**
     * Update stock
     */
    public function update(Request $request, $id)
    {
        $stock = Stock::find($id);

        if (!$stock) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Stock not found'
            ], 404);
        }

        $validated = $request->validate([
            'product_id' => 'required|exists:products,id|unique:stocks,product_id,' . $stock->id,
            'quantity'   => 'required|integer|min:0',
        ]);

        $stock->update($validated);

        return (new StockResource($stock))->additional(['status' => 'success']);
    }

    /**
     * Hapus stock
     */
    public function destroy($id)
    {
        $stock = Stock::find($id);

        if (!$stock) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Stock not found'
            ], 404);
        }

        $stock->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Stock deleted successfully'
        ], 200);
    }
}