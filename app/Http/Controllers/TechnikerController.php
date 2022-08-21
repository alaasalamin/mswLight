<?php

namespace App\Http\Controllers;
use App\Models\Device;
use App\Models\Comment;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use App\Models\MoonRepair;

class TechnikerController extends Controller
{
    //
    public function showDevice($id){
        $device = Device::find($id);
        $adminName = Auth::user()->name;
        $comments = Comment::where("deviceId", $id)->orderBy("id", "DESC")->get();
        return view("tech.device", ["tech" => $adminName, "device" => $device, "comments" => $comments]);
    }

    public function takeDevice($id){

        $loggedInName = Auth::user()->name;
        MoonRepair::where("id", $id)->update(array('tech' => $loggedInName));
        // return $id;
        return redirect('../home/');
    }
}
