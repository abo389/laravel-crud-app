<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Customer::when($request->has("search"), function($instans) use ($request) {
            $instans
            ->where("firstName", "LIKE", "%$request->search%")
            ->orwhere("lastName", "LIKE", "%$request->search%")
            ->orwhere("email", "LIKE", "%$request->search%")
            ->orwhere("phone", "LIKE", "%$request->search%")
            ;
        })->orderby("id", $request->has("order")&&$request->order == "ASC"?"ASC":"DESC")->get();
        return view("customer.index", ["data"=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("customer.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        if($request->hasFile("image")) {
            $file = $request->file("image")->store("/", "public2");
        }
        Customer::create([
            "image" => $file ?? "avatar.png",
            "firstName" => $request->fname,
            "lastName" => $request->lname,
            "email" => $request->email,
            "phone" => $request->phone,
            "bank" => $request->bank,
            "about" => $request->about
        ]);
        return redirect()->route("customer.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Customer::find($id);
        return view("customer.show", ["customer" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Customer::find($id);
        return view("customer.edit", ["customer" => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, string $id)
    {
        if($request->hasFile("image")) {
            $file = $request->file("image")->store("/", "public2");
        }
        Customer::find($id)->update([
            "image" => $file ?? "avatar.png",
            "firstName" => $request->fname,
            "lastName" => $request->lname,
            "email" => $request->email,
            "phone" => $request->phone,
            "bank" => $request->bank,
            "about" => $request->about
        ]);
        return redirect()->route("customer.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);
        // File::delete(public_path($customer->image));
        $customer->delete();
        return redirect()->back();
    }

    function trash(Request $request) {
        $data = Customer::when($request->has("search"), function($instans) use ($request) {
            $instans
            ->where("firstName", "LIKE", "%$request->search%")
            ->orwhere("lastName", "LIKE", "%$request->search%")
            ->orwhere("email", "LIKE", "%$request->search%")
            ->orwhere("phone", "LIKE", "%$request->search%")
            ;
        })->orderby("id", $request->has("order")&&$request->order == "ASC"?"ASC":"DESC")->onlyTrashed()->get();
        return view("customer.trash", ["data"=> $data]);
    }

    function restore(string $id) {
        Customer::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back();
        // return redirect()->route("customer.index");
    }
    function forceDestroy(string $id) {
        $customer = Customer::onlyTrashed()->findOrFail($id);
        // File::delete(public_path($customer->image));
        $customer->forceDelete();
        return redirect()->back();
    }
}