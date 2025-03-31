<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Invoice;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get filter type
        $filter = $request->query('filter', 'today');

        // Calculate date range based on filter
        switch ($filter) {
            case 'this_week':
                $startDate = Carbon::now()->startOfWeek();
                break;
            case 'this_month':
                $startDate = Carbon::now()->startOfMonth();
                break;
            case 'this_year':
                $startDate = Carbon::now()->startOfYear();
                break;
            case 'custom':
                $startDate = Carbon::parse($request->query('start_date'));
                $endDate = Carbon::parse($request->query('end_date'));
                break;
            default:
                $startDate = Carbon::now()->startOfDay();
                $endDate = Carbon::now()->endOfDay();
        }

        $totalVendors = Vendor::whereBetween('created_at', [$startDate, $endDate])->count();
        $totalProducts = Product::whereBetween('created_at', [$startDate, $endDate])->count();
        $totalInvoices = Invoice::whereBetween('created_at', [$startDate, $endDate])->count();
        $totalUsers = User::whereBetween('created_at', [$startDate, $endDate])->count();

        return view('dashboard', compact('totalVendors', 'totalProducts', 'totalInvoices', 'totalUsers', 'filter'));
    }
}
