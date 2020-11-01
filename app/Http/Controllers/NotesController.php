<?php

namespace App\Http\Controllers;

use App\Http\Requests\MultipleNotesRequest;
use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteAddedResource;
use App\Models\Contact;
use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request, Contact $contact)
    {
        $note = new Note($request->all());
        $contact->notes()->save($note);

        return new NoteAddedResource($note);
    }

    /**
     * Store many newly created resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMany(MultipleNotesRequest $request, Contact $contact)
    {
        $data = $request->all()['notes'];

        foreach($data as $key => $value) {
            $note = new Note($value);
            $data[$key] = $contact->notes()->save($note);
        }

        return NoteAddedResource::collection($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
