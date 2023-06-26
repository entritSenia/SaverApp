<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
// use Illuminate\Http\Request;
// use Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::orderByDesc('created_at')->where('by_user_id', auth()->user()->id);
        $listingsData = Listing::orderByDesc('created_at')->where('by_user_id', auth()->user()->id)->paginate(8);
        $totalPrice = $listings->sum('price'); // for all
        $homeData = DB::table('listings')->where('for', '=', 0)
            ->where('by_user_id', auth()->user()->id)->get()->toArray(); // for house
        $carData = DB::table('listings')->where('for', '=', 1)
            ->where('by_user_id', auth()->user()->id)->get()->toArray(); // for car
        $Data = $listings->get()->toArray(); // for all
        return inertia('Listing/Index', ['listings' => $listings, 'listingsData' => $listingsData, 'totalPrice' => $totalPrice, 'homeData' => $homeData, 'carData' => $carData, 'data' => $Data]);
    }

    public function table()
    {
        $listings = Listing::orderByDesc('created_at')->where('by_user_id', auth()->user()->id)->paginate(4);
        // $listings = Listing::all();
        // $tags = Listing::query()->where(Request::input('search'), function ($query, $search) {
        // $query->where('need', 'like', "%{$search}%");
        // ->OrWhere('for', 'like', "%{$search}%");
        // })->paginate(5);
        return inertia('Listing/Table', ['listings' => $listings]);
    }

    // public function tableSearch()
    // {
    //     $tags = Listing::query()->where(Request::input('search'), function ($query, $search) {
    //         $query->where('need', 'like', "%{$search}%");
    //         // ->OrWhere('for', 'like', "%{$search}%");
    //     })->paginate(5);
    //     return inertia('Listing/Table/{search}', ['tags' => $tags]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incomingFields = $request->validate([
            'need' => 'required|string',
            'type' => 'required|boolean',
            'for' => 'required|string',
            'status' => 'required|boolean',
            'price' => 'required|integer|min:0',
        ]);

        // $incomingFields['street'] = strip_tags($incomingFields['street']);
        $incomingFields['user_id'] = auth()->id();

        auth()->user()->listings()->create($incomingFields)->save();

        return redirect()->route('listing.index')->with('success', 'Listing was created!');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        if (Auth::user()->cannot('edit', $listing)) {
            abort(403);
        }
        return inertia('Listing/Edit', ['listing' => $listing]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        if (Auth::user()->cannot('edit', $listing)) {
            abort(403);
        }

        $listing->update(
            $request->validate([
                'need' => 'required|string',
                'type' => 'required|boolean',
                'for' => 'required|boolean',
                'status' => 'required|boolean',
                'price' => 'required|integer|min:0',
            ])
        );

        return redirect()->route('listing.index')->with('success', 'Listing was changed!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        if (Auth::user()->cannot('edit', $listing)) {
            abort(403);
        }

        $listing->delete();

        return redirect()->back()->with('success', 'Listing was deleted');
    }
}
