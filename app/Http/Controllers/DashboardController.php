<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    // sudah lengkap seperti ini
    public function index()
    {
        $title = 'Dashboard';
        $user = Auth::user();

        $totalProducts = Product::count();
        $totalStock = Stock::sum('quantity');
        $stocksPerProduct = Stock::with('product')->get();

        $totalPurchases = Purchase::count();
        $totalRevenue = Purchase::sum('total_price');
        $recentPurchases = Purchase::with('product')->orderBy('created_at', 'desc')->take(5)->get();

        $purchasesPending   = Purchase::where('status', 'pending')->count();
        $purchasesActive    = Purchase::where('status', 'active')->count();
        $purchasesCancelled = Purchase::where('status', 'cancelled')->count();

        $lastWeekPurchases = Purchase::whereBetween('created_at', [now()->subWeek(), now()])->count();
        $previousWeekPurchases = Purchase::whereBetween('created_at', [now()->subWeeks(2), now()->subWeek()])->count();
        $purchaseGrowth = $previousWeekPurchases > 0
            ? round((($lastWeekPurchases - $previousWeekPurchases) / $previousWeekPurchases) * 100, 2)
            : 0;

        return view('dashboard.admin', compact(
            'user',
            'title',
            'totalProducts',
            'totalStock',
            'stocksPerProduct',
            'totalPurchases',
            'totalRevenue',
            'recentPurchases',
            'purchasesPending',
            'purchasesActive',
            'purchasesCancelled',
            'purchaseGrowth'
        ));
    }
    
    public function dashboard()
    {
        $user = auth()->user(); // ambil user yang login
        return view('dashboard.admin', compact('user'));
    }

    
    
}