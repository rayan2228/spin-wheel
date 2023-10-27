<?php

namespace App\Http\Controllers;

use App\Models\Participants;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get_participants()
    {
        $participants = Participants::where("result", 0)->limit(1000)->get();
        return view("welcome", compact("participants"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function participants_list()
    {
        $participants = Participants::all();
        return view("dashboard", compact("participants"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $names_or_num = array_chunk(explode("\r\n", $request->name_or_num), 5);
        foreach ($names_or_num as $key => $value) {
            foreach ($value as $key => $value2) {
                Participants::insert([
                    "name_or_num" => $value2,
                    "created_at" => now()
                ]);
            }
        }
        return back()->withSuccess('names or numbers added successfully');
        // $request->validate([
        //     "*" => "required"
        // ]);
        // if ($request->position != "normal") {
        //     if (Participants::where('position', $request->position)->exists()) {
        //         return back()->withErrors(['checkError' => 'position already exists']);
        //     } else {
        //         Participants::insert([
        //             "name_or_num" => $request->name_or_num,
        //             "position" => $request->position,
        //             "created_at" => now()
        //         ]);
        //     }
        // } else {
        //     Participants::insert([
        //         "name_or_num" => $request->name_or_num,
        //         "position" => $request->position,
        //         "created_at" => now()
        //     ]);
        // }

        // return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Participants $participants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participants $participants)
    {

        return Participants::find($participants);
        // return view("participants_edit")
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participants $participants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participants $participants)
    {
        //
    }
}
