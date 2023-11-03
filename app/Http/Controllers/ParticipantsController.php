<?php

namespace App\Http\Controllers;

use App\Models\Participants;
use App\Models\Settings;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{

    function __construct()
    {
        $this->middleware("auth", ["only" => ["participants.edit", "participants.update", "participants.destroy"]]);
    }
    /**
     * Display a listing of the resource.
     */
    public function get_participants()
    {
        $limit = Settings::where("setting_name", "limit")->first();
        $participants = Participants::where("onSpin", 1)->limit($limit->setting_value)->get();
        $winners = Participants::where("result", 1)->get();
        $participantsCount = Participants::count();
        $spin = Settings::where("setting_name", "spin")->first();
        return view("welcome", compact("participants", "participantsCount", "winners", "spin"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function participants_list()
    {
        $participants = Participants::all();
        $spin = Settings::where("setting_name", "spin")->first();
        $limit = Settings::where("setting_name", "limit")->first();
        return view("dashboard", compact("participants", "spin", "limit"));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Participants $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participants $participant)
    {

        return view("participants_edit", compact("participant"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participants $participant)
    {
        $request->validate([
            "*" => "required"
        ]);
        if ($request->position != "normal") {
            if (Participants::where('position', $request->position)->exists()) {
                return back()->withErrors('position already exists');
            } else {
                $participant->update([
                    "name_or_num" => $request->name_or_num,
                    "position" => $request->position,
                ]);
                return redirect(route("dashboard"))->withSuccess('position updated successfully');
            }
        } else {
            $participant->update([
                "name_or_num" => $request->name_or_num,
                "position" => $request->position,
            ]);
            return redirect(route("dashboard"))->withSuccess('position updated successfully');
        }
    }

    public function participants_result(Request $request)
    {
        Participants::find($request->id)->update([
            "result" => 1,
        ]);
        return back();
    }
    public function participants_remove(Request $request)
    {
        Participants::find($request->id)->update([
            "onSpin" => false,
            "result" => 1,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participants $participant)
    {
        return $participant;
    }
}
