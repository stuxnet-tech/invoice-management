<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        return view('vendors.index', ['vendors' => Vendor::all()]);
    }

    public function create()
    {
        return view('vendors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'company_name' => 'required',
            'company_address' => 'required',
            'gst_number' => 'required',
            'currency' => 'required'
        ]);

        Vendor::create($request->all());

        return redirect()->route('vendors.index')->with('success', 'Vendor added.');
    }
}

