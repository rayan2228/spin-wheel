<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function update(Request $request)
    {


        Settings::where("setting_name", "spin")->update([
            "setting_value" => $request->spin
        ]);
        return back();
    }

    public function updatelimit(Request $request)
    {


        Settings::where("setting_name", "limit")->update([
            "setting_value" => $request->limit
        ]);
        return back();
    }
}
