<?php

namespace App\Http\Controllers;

use App\Funnel;
use App\Prospect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prospects = Prospect::orderBy('updated_at', 'desc')->paginate(25);

        $usr_pros = '';

        if(Auth::user()){
            $usr_pros = Prospect::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(25);
        }


        return view('roles.admin.prospects.index',
            compact('prospects','usr_pros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funnels = Funnel::pluck('status', 'id')->all();
        return view('roles.admin.prospects.create', compact('funnels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $data = [
            'user_id' => $user->id,
            'funnel_id' => $request->funnel_id,
            'name_first' => $request->name_first,
            'name_last' => $request->name_last,
            'email' => $request->email,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'phone' => $request->phone,
            'fax' => $request->fax
        ];

        Prospect::create($data);

        return redirect(route('prospects.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function show(Prospect $prospect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function edit(Prospect $prospect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prospect $prospect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prospect $prospect)
    {
        //
    }
}
