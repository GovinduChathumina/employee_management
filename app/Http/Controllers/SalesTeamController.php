<?php

namespace App\Http\Controllers;

use App\Models\SalesTeam;
use Illuminate\Http\Request;

class SalesTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SalesTeam::latest()->paginate(5);

        return view('index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|unique:sales_team',
            'telephone'     => 'required|regex:/(01)[0-9]{9}/',
            'current_route' => 'required',
            'member_image'  => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        $file_name = time() . '.' . request()
            ->member_image
            ->getClientOriginalExtension();

        request()->member_image->move(public_path('images'), $file_name);

        $sales_team = new SalesTeam;

        $sales_team->name          = $request->name;
        $sales_team->email         = $request->email;
        $sales_team->telephone     = $request->telephone;
        $sales_team->current_route = $request->current_route;
        $sales_team->member_image  = $file_name;

        $sales_team->save();

        return redirect()->route('sales_team.index')
            ->with('success', 'Member Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesTeam  $salesTeam
     * @return \Illuminate\Http\Response
     */
    public function show(SalesTeam $salesTeam)
    {
        return view('show', compact('salesTeam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesTeam  $salesTeam
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesTeam $salesTeam)
    {
        return view('edit', compact('salesTeam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalesTeam  $salesTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesTeam $salesTeam)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|unique:sales_team',
            'telephone'     => 'required|regex:/(01)[0-9]{9}/',
            'current_route' => 'required',
            'member_image'  => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        $member_image = $request->hidden_member_image;

        if($request->member_image != '')
        {
            $member_image = time() . '.' . request()
                ->member_image
                ->getClientOriginalExtension();

            request()->member_image->move(public_path('images'), $member_image);
        }

        $salesTeam = SalesTeam::find($request->hidden_id);

        $salesTeam['name']          = $request->name;
        $salesTeam['email']         = $request->email;
        $salesTeam['telephone']     = $request->telephone;
        $salesTeam['current_route'] = $request->current_route;
        $salesTeam['member_image']  = $member_image;

        $salesTeam->save();

        return redirect()->route('sales_team.index')
            ->with('success', 'Member Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesTeam  $salesTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesTeam $salesTeam)
    {
        $salesTeam->delete();

        return redirect()->route('sales_team.index')
            ->with('success', 'Member Data deleted successfully');
    }
}
