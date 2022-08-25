<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoonRepair;
use App\Models\Brand;
use App\Models\MoonRepairComment;
use Auth;

use Redirect;
class MoonRepairController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function search($keyword){
        $moonRepair = Auth::user()->name;
        $results = MoonRepair::where("id", $keyword)->orWhere("customerName", 'like', '%'.$keyword.'%')->orWhere("model", 'like', '%'.$keyword.'%')->orWhere("imei", $keyword)->get();

        return view("moonRepair.search", [
            "results" => $results,
            "moonRepair" => $moonRepair,
            "keyword" => $keyword
        ]);
    }

    public function show($id){
        $device = MoonRepair::find($id);
        $accountType = Auth::user()->AccountType;
        $comments = MoonRepairComment::where("deviceID", $id)->orderBy("id", "DESC")->get();

        $loggedInName = Auth::user()->name;

        return view("moonRepair.device", [
            "device" => $device,
            "AccountType" => $accountType,
            "comments" => $comments,
            "loggedInName" => $loggedInName
        ]);
    }

    public function pdfShow($id){

        $moonRepair = Auth::user()->name;
        $device = MoonRepair::find($id);
        return view("moonRepair.pdf", [
            "device" => $device,
            "moonRepair" => $moonRepair,
        ]);
    }

    public function newDevice(){
        $moonRepair = Auth::user()->name;
        $brands = Brand::orderBy('brandName', 'ASC')->get();
        return view("moonRepair.newDevice", [
            "moonRepair" => $moonRepair,
            "brands" => $brands,
        ]);
    }

    public function store(Request $request)
    {
        $createDevice = MoonRepair::create($request->all());

        if($createDevice){
            return redirect('home');
        }

    }
    public function updateDevice(Request $request, $id)
    {
        $device = Moonrepair::find($id);
        $device->update($request->all());
        $loggedInName = Auth::user()->name;
        return Redirect::back();
    }

    public function closeDevice($id){
        $device = MoonRepair::where("id", $id)->update(['status' => "finished"]);
        return Redirect::back();
    }

    public function openDevice($id){
        $device = MoonRepair::where("id", $id)->update(['status' => "open"]);
        return Redirect::back();
}

}
