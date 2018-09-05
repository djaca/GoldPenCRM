<?php

namespace App\Http\Controllers;

use App\Funnel;
use App\Note;
use App\Prospect;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $notes = Note::orderBy('updated_at', 'desc')->paginate(25);
//        $notes = Note::all();
        $notes = Note::sortable()->paginate(20);

        $id = Auth::id();
        $notes2 = Note::where('user_id', $id)->sortable()->paginate();

//        $notes2 = $not_admin;

//        $usr_notes1 = Note::where('user_id', Auth::user()->id);
//        $usr_notes2 = $usr_notes1->sortable()->paginate(20);
//        $usr_notes = Note::where('user_id', Auth::user()->id)->sortable()->paginate(20);
        /*if(Auth::user()->id != 1){
            $notes = $notes->where('user_id', Auth::user()->id);
        }*/
      /*  $usr_notes = Note::select(['id as not_admin'])
//                        ->where('user_id', Auth::user()->id)
                        ->sortable(['not_admin'])
                        ->paginate(10);*/

        return view('roles.admin.notes.index', compact('notes', 'notes2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funnels = Funnel::pluck('status', 'id')->all();
        $prospects = Prospect::orderBy('name_last')->pluck('name_last', 'id')->all();


        return view('roles.admin.notes.create', compact('funnels','prospects'));
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
            'prospect_id' => $request->prospect_id,
            'title' => $request->title,
            'description' => $request->description,
        ];
        Note::create($data);

        $pro_id = $request->prospect_id;
        $prospect = Prospect::find($pro_id);
        $fun_id = $request->funnel_id;
        $prospect->funnel_id = $fun_id;
        $prospect->save();

        return redirect(route('notes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
}
