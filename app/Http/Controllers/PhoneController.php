<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function add(Request $request) {
        // validate
        $this->validate($request, [
            'name'  => 'required|max:50',
            'phone' => 'required|max:20'
        ], [
            'name.required' => 'Name is required.',
            'phone.required' => 'Phone is required.'
        ]);

        Phone::create([
            'name'  => $request->name,
            'phone' => $request->phone,
        ]);

        return response()->json(['success' => 'Contact added successfully.']);
    }
}
