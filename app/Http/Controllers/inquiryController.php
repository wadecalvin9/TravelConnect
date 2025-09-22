<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
class InquiryController extends Controller
{
    public function inquiry(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'people' => 'required|integer|min:1',
            'message' => 'nullable|string',
            'date' => 'required|date',
            'destination_id' => 'required|integer',
            'tour_id' => 'required|integer',
            'user_id' => 'nullable|integer',
        ]);
        Inquiry::create($validatedData);
        return redirect()->route('tours.index')
                         ->with('success', 'Your inquiry has been sent successfully!');
    }
}
