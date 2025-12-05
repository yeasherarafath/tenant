<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::with('domains')->get();
        return view('central.tenant', compact('tenants'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'domain' => 'required|unique:domains,domain',
            'name' => 'required',
        ]);

        $tenant = Tenant::create([
            'name' => $request->input('name'),
        ]);

        $tenant->domains()->create([
            'domain' => $request->input('domain') . '.' . $request->getHost(),
        ]);

        return back()->with('success', 'Tenant created successfully!');
    }
}
