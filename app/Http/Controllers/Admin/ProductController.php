<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    // Tampilkan semua produk
    public function index()
    {
        $products = Product::all();
        $title = 'Product Management';
        return view('dashboard.admin.products.index', compact('products', 'title'));
    }

    // Form create
    public function create()
    {
        $title = 'Create Product';
        return view('dashboard.admin.products.create', compact('title'));
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sku' => 'required|string|max:100|unique:products,sku',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    // Tampilkan detail produk
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $title = 'Product Detail';
        return view('dashboard.admin.products.show', compact('product', 'title'));
    }

    // Form edit
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $title = 'Edit Product';
        return view('dashboard.admin.products.edit', compact('product', 'title'));
    }

    // Update produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'sku' => 'required|string|max:100|unique:products,sku,'.$product->id,
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    // Hapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }

    // Export PDF
    public function exportPDF()
    {
        $products = Product::all();
        $title = 'Products PDF Export';
        $pdf = Pdf::loadView('dashboard.admin.products.products_pdf', compact('products', 'title'));
        return $pdf->download('products.pdf');
    }

    // Print view HTML
    public function print()
    {
        $products = Product::all();
        $title = 'Products Print View';
        return view('dashboard.admin.products.products_print', compact('products', 'title'));
    }
}