<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class StockController extends Controller
{
    /**
     * Tampilkan semua stok
     */
    public function index()
    {
        $stocks = Stock::with('product')->get();
        $title = 'Stock Management';
        return view('dashboard.admin.stocks.index', compact('stocks', 'title'));
    }

    /**
     * Form create stock
     */
    public function create()
    {
        $products = Product::all();
        $title = 'Create Stock';
        return view('dashboard.admin.stocks.create', compact('products', 'title'));
    }

    /**
     * Simpan stock baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id|unique:stocks,product_id',
            'quantity' => 'required|integer|min:0',
        ]);

        // Buat stock baru
        Stock::create($validated);

        return redirect()->route('admin.stocks.index')->with('success', 'Stock created successfully!');
    }

    /**
     * Tampilkan detail stock
     */
    public function show($id)
    {
        $stock = Stock::with('product')->findOrFail($id);
        $title = 'Stock Detail';
        return view('dashboard.admin.stocks.show', compact('stock', 'title'));
    }

    /**
     * Form edit stock
     */
    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        $products = Product::all();
        $title = 'Edit Stock';
        return view('dashboard.admin.stocks.edit', compact('stock', 'products', 'title'));
    }

    /**
     * Update stock
     */
    public function update(Request $request, $id)
    {
        $stock = Stock::findOrFail($id);

        // Fix unique rule agar update produk yang sama tidak error
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id|unique:stocks,product_id,' . $stock->id,
            'quantity' => 'required|integer|min:0',
        ]);

        $stock->update($validated);

        return redirect()->route('admin.stocks.index')->with('success', 'Stock updated successfully!');
    }

    /**
     * Hapus stock
     */
    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();
        return redirect()->route('admin.stocks.index')->with('success', 'Stock deleted successfully!');
    }

    /**
     * Export PDF
     */
    public function exportPDF()
    {
        $stocks = Stock::with('product')->get();
        $title = 'Stocks PDF Export';

        $pdf = Pdf::loadView('dashboard.admin.stocks.stocks_pdf', compact('stocks', 'title'));
        return $pdf->download('stocks.pdf');
    }

    /**
     * Print view HTML
     */
    public function print()
    {
        $stocks = Stock::with('product')->get();
        $title = 'Stocks Print View';
        return view('dashboard.admin.stocks.stocks_print', compact('stocks', 'title'));
    }
}