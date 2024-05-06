<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class searchController extends Controllers{
    public function search(Request $request){
        $search = $request->input('cariCustomer');
        $customers = Customer::where('namaCust', 'like', "%$search%")
                            ->paginate(10);
        return view('customer.index', compact('customers'));
    }
}