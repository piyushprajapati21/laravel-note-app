<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //notes list
        $userId = Auth::id();
        //$notes= Note::where('user_id',$userId)->latest('updated_at')->paginate(5); 
        $notes =  Auth::user()->notes()->latest('updated_at')->paginate(5);
        return view('notes.index')->with('notes',$notes);
        /* $notes->each(function($note)
        {
            dump($note->title);
        });  */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //view page
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //save data
        $request->validate([
            'title' => 'required|max:120',
            'text'=>'required'
        ]);
        Note::create([
            'uuid'=>Str::uuid(),
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'text'=>$request->text
        ]); 
        return to_route('notes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        //edit note
        $note = Note::where('uuid',$uuid)->where('user_id',Auth::id())->firstOrFail();
        return view('notes.show')->with('note',$note);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $uuid)
    {
         //edit note
        $note = Note::where('uuid',$uuid)->where('user_id',Auth::id())->firstOrFail();
        return view('notes.edit')->with('note',$note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        //edit info
        //save data
        $request->validate([
            'title' => 'required|max:120',
            'text'=>'required'
        ]);
        $note->update([ 
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'text'=>$request->text
        ]); 
        return to_route('notes.show',$note)->with('success','Note successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //delete
        if($note->user_id!=Auth::id())
        {
            return abort(403);
        }
        $note->delete();
        return to_route('notes.index')->with('success','Note successfully Deleted');

    }
}
