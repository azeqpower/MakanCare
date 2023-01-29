<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodbankRequest;
use App\Models\Report;
use App\Models\Marker;
use Illuminate\Support\Facades\Auth;


class FoodbankController extends Controller
{
    public function create()
    {
        $current_user_id = Auth::id();

        return view('foodbank.create-foodbank',compact('current_user_id'));
    }

    public function reports()
    {
        $current_user_id = Auth::id();

        return view('report.report',compact('current_user_id'));
    }

    public function store(Request $request)
    {
        

        // create a new foodbank request
        $foodbankRequest = new FoodbankRequest();
        $foodbankRequest->name = $request->name;
        $foodbankRequest->longitude = $request->longitude;
        $foodbankRequest->latitude = $request->latitude;
        $foodbankRequest->user_id = $request->user_id;
        $foodbankRequest->description = $request->description;
        $foodbankRequest->status = 'pending'; // set the status to pending for admin review
        $foodbankRequest->save();

        return redirect()->back()->with('status', 'Foodbank request submitted successfully. It will be reviewed by admin.');
    }

    public function report(Request $request)
    {
        

        // create a new foodbank request
        $ReportRequest = new Report();
        $ReportRequest->marker_id = $request->marker_id;
        $ReportRequest->categories_id = $request->categories_id;
        $ReportRequest->user_id = $request->user_id;
        $ReportRequest->description = $request->description;
        $ReportRequest->status = 'unsolved'; // set the status to pending for admin review
        $ReportRequest->save();

        return response()->json(['success'=>'Form Submitted successfully']);
    }

    public function index()
    {
        // retrieve all pending foodbank requests for admin review
        $foodbankRequests = FoodbankRequest::join('users', 'food_bank_requests.user_id', '=', 'users.id')
        ->select('food_bank_requests.*', 'users.email')
        ->where('food_bank_requests.status', 'pending')
        ->get();
        return view('admin.foodbank-requests', compact('foodbankRequests'));
    }

    public function index2()
    {
        // retrieve all pending foodbank requests for admin review
        $foodbankRequests = FoodbankRequest::join('users', 'food_bank_requests.user_id', '=', 'users.id')
        ->select('food_bank_requests.*', 'users.email')
        ->whereIn('food_bank_requests.status', ['approved','rejected'])
        ->get();
        return view('admin.history-request', compact('foodbankRequests'));
    }





    public function approve($id)
    {
        // find the foodbank request and update its status to approved
        $foodbankRequest = FoodbankRequest::find($id);
        $foodbankRequest->status = 'approved';
        $foodbankRequest->save();

        $marker = new Marker();
        $marker->latitude = $foodbankRequest->latitude;
        $marker->longitude = $foodbankRequest->longitude;
        $marker->user_id = $foodbankRequest->user_id;
        $marker->name = $foodbankRequest->name;
        $marker->save();

        
        session()->flash('status','Request Submitted. Subject to Admin Approval');
        return redirect()->back();
    
    }

    public function reject($id)
    {
        // find the foodbank request and update its status to rejected
        $foodbankRequest = FoodbankRequest::find($id);
        $foodbankRequest->status = 'rejected';
        $foodbankRequest->save();

        return redirect()->back()->with('status', 'Foodbank request rejected.');
    }
}
