<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Device;
use Auth;

class PartnerController extends Controller
{
    //
    public function show(){
        $partners = User::where('AccountType', 'partner')->get();
        $admin = Auth::user()->name;
        return view("Admin.partners", ["admin" => $admin, "partners" => $partners]);
    }

    public function partner($id){
        $partner = User::find($id);
        $admin = Auth::user()->name;
        $devices = Device::where("business", $id)->get();

        return view("Admin.partner", ["admin" => $admin, "partner" => $partner, "devices" => $devices]);
    }
}
