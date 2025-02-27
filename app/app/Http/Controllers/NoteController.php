<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id=Auth::id();
        $notes = Note::where('user_id',$user_id)->latest()->paginate(5); //get();
        //dd($notes);

        //$notes->each(function($note){
          //dump($note->title);
        //});

        return view('notes.index')->with('notes',$notes); //within notes dir

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create'); //within notes dir
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'title'=>'required|max:120',
        'text'=>'required'
       ]);
        $note = new Note([
            'user_id' => Auth::id(),
            'uuid'=> Str::uuid(),
            'title' => $request->title,
            'text'=> $request->text
        ]);
        $note->save();
        return to_route('notes.index', $note);

    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        if($note->user_id !== Auth::id()){
            abort('403');
        }
        return view('notes.show',['note'=>$note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if($note->user_id !== Auth::id()){
            abort('403');
        }
        return view('notes.edit',['note'=>$note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if($note->user_id !== Auth::id()){
            abort('403');
        }
        $request->validate([
            'title'=>'required|max:120',
            'text'=>'required'
        ]);

        $note->update([
            'title'=>$request->title,
            'text'=>$request->text
        ]);

        return to_route('notes.show', $note);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if($note->user_id !== Auth::id()){
            abort('403');
        }
        $note->delete();
        return to_route('notes.index');
    }
}
