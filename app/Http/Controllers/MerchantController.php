<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Merchant::latest()->paginate();

        return view('admin.merchant.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.merchant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create the Merchant
        $merchant = Merchant::create([
            'subdomain' => $request->subdomain,
            'name' => $request->name,
        ]);

        $tenant = Tenant::create([
            'id' => $merchant->subdomain,
        ]);

        $tenant->domains()->create(['domain' => $merchant->subdomain . '.mt.local']);

        \App\Models\Tenant::find(['id' => $merchant->subdomain])->runForEach(function () use ($merchant) {
            \App\Models\User::create([
                'tenant_id' => $merchant->subdomain,
                'name' => 'Merchant Admin',
                'email' => $merchant->subdomain . '@test.local',
                'password' => bcrypt('admin123'),
            ]);
        });

        return redirect()->route('merchants.index')->with('success', 'Merchant has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function show(Merchant $merchant)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merchant = Merchant::findOrFail($id);

        return view('admin.merchant.edit', compact('merchant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $merchant = Merchant::findOrFail($id);

        // Update merchant
        $merchant->name = $request->name;

        $merchant->save();
        return redirect()->route('merchants.index')->with('success', 'Merchant has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Merchant::findOrFail($id)->delete()) {
            return redirect()->back()->with('success', 'Merchant has been deleted');
        } else {
            return redirect()->back()->with('error', 'Merchant not deleted');
        }

        return redirect()->back();
    }
}
