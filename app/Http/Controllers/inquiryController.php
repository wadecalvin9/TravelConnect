<?php

namespace App\Http\Controllers;

use App\Models\inquiry;
use Illuminate\Http\Request;
use App\Models\review;

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
        inquiry::create($validatedData);
        return redirect()->route('tours.index')
            ->with('success', 'Your inquiry has been sent successfully!');
    }


    public function review(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'comment' => 'required|string'

        ]);
        review::create($validatedData);
        return redirect('contact')
            ->with('success', 'Thank you for the review!');
    }


}
