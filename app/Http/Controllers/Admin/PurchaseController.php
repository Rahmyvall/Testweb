<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PurchaseController extends Controller
{
    /**
     * Tampilkan semua purchases
     */
    public function index()
    {
        $purchases = Purchase::with('product')->get();
        $title = 'Purchases Management';
        return view('dashboard.admin.purchases.index', compact('purchases', 'title'));
    }

    /**
     * Form create purchase
     */
    public function create()
    {
        $products = Product::all();
        $title = 'Create Purchase';
        return view('dashboard.admin.purchases.create', compact('products', 'title'));
    }

    /**
     * Simpan purchase baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'buyer_name' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        Purchase::create($validated);

        return redirect()->route('admin.purchases.index')
                         ->with('success', 'Purchase created successfully!');
    }

    /**
     * Tampilkan detail purchase
     */
    public function show($id)
    {
        $purchase = Purchase::with('product')->findOrFail($id);
        $title = 'Purchase Detail';
        return view('dashboard.admin.purchases.show', compact('purchase', 'title'));
    }

    /**
     * Form edit purchase
     */
    public function edit($id)
    {
        $purchase = Purchase::findOrFail($id);
        $products = Product::all();
        $title = 'Edit Purchase';
        return view('dashboard.admin.purchases.edit', compact('purchase', 'products', 'title'));
    }

    /**
     * Update purchase
     */
    public function update(Request $request, $id)
    {
        $purchase = Purchase::findOrFail($id);

        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'buyer_name' => 'required|string|max:255',
            'status' => 'required|in:active,cancelled',
            'note' => 'nullable|string',
        ]);

        // Jika status berubah menjadi cancelled, isi cancelled_at
        if ($validated['status'] === 'cancelled' && $purchase->status !== 'cancelled') {
            $purchase->cancelled_at = now();
        } elseif ($validated['status'] === 'active') {
            $purchase->cancelled_at = null;
        }

        $purchase->update($validated);

        return redirect()->route('admin.purchases.index')
                         ->with('success', 'Purchase updated successfully!');
    }

    /**
     * Hapus purchase
     */
    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();

        return redirect()->route('admin.purchases.index')
                         ->with('success', 'Purchase deleted successfully!');
    }

    /**
     * Export PDF
     */
    public function exportPDF()
    {
        $purchases = Purchase::with('product')->get();
        $title = 'Purchases PDF Export';

        $pdf = Pdf::loadView('dashboard.admin.purchases.purchases_pdf', compact('purchases', 'title'));
        return $pdf->download('purchases.pdf');
    }

    /**
     * Print view HTML
     */
    public function print()
    {
        $purchases = Purchase::with('product')->get();
        $title = 'Purchases Print View';
        return view('dashboard.admin.purchases.purchases_print', compact('purchases', 'title'));
    }
}