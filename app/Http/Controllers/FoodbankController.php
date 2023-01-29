<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodbankRequest;
use App\Models\Report;
use App\Models\Marker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Csrf;




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

        return redirect()->back()->with('status', 'Form submitted successfully!');

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

    public function index3()
    {
        // retrieve all report foodbank requests for admin review
        $foodbankRequests = Report::join('users', 'reports.user_id', '=', 'users.id')
        ->select('reports.*', 'users.email','users.phone')
        ->where('reports.status', 'unsolved')
        ->get();
        return view('admin.foodbank-report', compact('foodbankRequests'));
    }

    public function index4()
    {
        // retrieve all pending report requests for admin review
        $foodbankRequests = Report::join('users', 'reports.user_id', '=', 'users.id')
        ->select('reports.*', 'users.email','users.phone')
        ->whereIn('reports.status', ['solved'])
        ->get();
        return view('admin.history-report', compact('foodbankRequests'));
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

        
        session()->flash('status','Request Approved, Foodbank has been created');
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


    public function solve($id)
    {
        // find the foodbank request and update its status to approved
        $foodbankRequest = Report::find($id);
        $foodbankRequest->status = 'solved';
        $foodbankRequest->save();


        
        session()->flash('status','Report Solved');
        return redirect()->back();
    
    }
}
