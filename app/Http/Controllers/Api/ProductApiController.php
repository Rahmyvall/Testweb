<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductApiController extends Controller
{
    // List semua produk
    public function index(Request $request)
    {
      $query = Product::query();

      // Search by name or SKU
      if ($request->has('search') && $request->search != '') {
          $search = $request->search;
          $query->where('name', 'like', "%$search%")
                ->orWhere('sku', 'like', "%$search%");
      }
  
      // Pagination, default 10 per page
      $products = $query->orderBy('id', 'desc')->paginate($request->per_page ?? 10);
  
      return new ProductCollection($products);
    }

    // Detail produk
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found'
            ], 404);
        }
    
        return new ProductResource($product);
    }

    // Create produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sku' => 'required|string|max:100|unique:products,sku',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => $product
        ], 201);
    }

    // Update produk
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found'
            ], 404);
        }

        $validated = $request->validate([
            'sku' => 'required|string|max:100|unique:products,sku,'.$product->id,
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($validated);

        return response()->json([
            'status' => 'success',
            'data' => $product
        ]);
    }

    // Hapus produk
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully'
        ]);
    }
}