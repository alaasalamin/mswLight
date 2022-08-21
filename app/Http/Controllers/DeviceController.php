<?php

namespace App\Http\Controllers;

use App\Models\MoonRepair;
use App\Models\Notification;
use App\Models\Task;
use Illuminate\Http\Request;
use Auth;
use App\Models\Device;
use App\Models\Comment;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function neededPart(Request $request){

        Task::create([
            'tech' => $request->tech,
            "message" => $request->tech." hat darum gebeten, ein ".$request->neededPart." für <a href='adminPanel/device/".$request->device."'>Gerät</a> zu kaufen",
            "device" => $request->device,
        ]);
        Notification::create([
            "tech" => $request->tech,
            "message" => $request->tech." hat darum gebeten, ein ".$request->neededPart." für <a href='adminPanel/device/".$request->device."'>Gerät</a> zu kaufen",
            "device" => $request->device,
        ]);

        $deviceID = $request->device;
        Device::where('id',$deviceID)->update(['status'=>'wait4Parts']);
        return redirect('tech/device/'.$deviceID.'');



    }


    public function newDevice(){
        $AccountType = Auth::user()->AccountType;
        $userId = Auth::user()->id;
        $loggedInName = Auth::user()->name;
        $brands = DB::table('brands')->orderBy('brandName', 'ASC')->get();
        return view("Partner.newDevice", ["partner" => $loggedInName, "brands" => $brands]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $valitatedData = $request->validate(
            [
                'model' => 'required|max:255|string',
                'price' => 'required',
            ]
        );
//        return $request->status;
          $createDevice = Device::create($request->all());
        $devices = Device::orderBy('id', 'DESC')->get();
        $deviceID = $devices[0]['id'];


        $partnerName = Auth::user()->name;
        $partnerID = Auth::user()->id;
        Notification::create([
            "business" => $partnerID,
            "message" => $partnerName. " hat ein neues <a href='adminPanel/Device/".$deviceID."'>Gerät</a> gesendet (".$request->model.") ",
        ]);


        if($createDevice){
            return redirect('device/'.$deviceID.'');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deviceDetails = Device::find($id);
        $AccountType = Auth::user()->AccountType;
        $userId = Auth::user()->id;
        $loggedInName = Auth::user()->name;
        $comments = Comment::where("deviceId", $id)->where("status", "readable")->orderBy("id", "DESC")->get();
        return view("Partner.device", ["device" => $deviceDetails, "partner" => $loggedInName, "comments" => $comments, "AccountType" => $AccountType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $device = Device::find($id);
        $device->update($request->all());
        $loggedInName = Auth::user()->name;
        return redirect('device/'.$id.'');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Device::destroy($id);
    }



    public function search($keyword){

        $userId = Auth::user()->id;
        $loggedInName = Auth::user()->name;

        $accountType = Auth::user()->AccountType;

        if($accountType == "admin"){
            $results = Device::where('id', $keyword)
            ->orWhere('model', 'like', '%'.$keyword.'%')
            ->orWhere('error', 'like', '%'.$keyword.'%')
            ->orWhere('imei', $keyword)->where('business', $userId)
            ->orderBy('id', 'DESC')->get();

            $moonRepairDevices = MoonRepair::where("id", $keyword)
                ->orWhere('model', 'like', '%'.$keyword.'%')
                ->orWhere('error', 'like', '%'.$keyword.'%')
                ->orWhere('imei', $keyword)
                ->orderBy('id', 'DESC')->get();

              $partners = [];
              for($i=0; $i<sizeof($results); $i++){
                  $partners[] = $results[$i]['business'];
              }

              $partnersNames = [];
              for($i=0; $i<sizeof($partners); $i++){
                  $partnersNames[] = User::where('id', $partners[$i])->pluck('name')->toArray();
              }


              $names = [];
              for($i=0; $i<sizeof($partnersNames); $i++){
                  $names[] = $partnersNames[$i][0];
              }




            return view("admin.search", [
                "devices" => $results,
                "b2b" => $names,
                "partner" => $loggedInName,
                "keyword" => $keyword,
                "moonRepairDevices" => $moonRepairDevices,
            ]);

        }elseif($accountType == "partner"){
            $results = Device::where('id', $keyword)->where('business', $userId)
            ->orWhere('model', 'like', '%'.$keyword.'%')->where('business', $userId)
            ->orWhere('error', 'like', '%'.$keyword.'%')->where('business', $userId)
            ->orWhere('imei', $keyword)->where('business', $userId)
            ->orderBy('id', 'DESC')->get();
            return view("Partner.search", ["devices" => $results, "partner" => $loggedInName, "keyword" => $keyword]);
        }elseif($accountType == "tech"){
            $results = Device::where('id', $keyword)
            ->orWhere('model', 'like', '%'.$keyword.'%')
            ->orWhere('error', 'like', '%'.$keyword.'%')
            ->orWhere('imei', $keyword)->where('business', $userId)
            ->orderBy('id', 'DESC')->get();

            $moonRepairDevices = MoonRepair::where("id", $keyword)
                ->orWhere('model', 'like', '%'.$keyword.'%')
                ->orWhere('error', 'like', '%'.$keyword.'%')
                ->orWhere('imei', $keyword)
                ->orderBy('id', 'DESC')->get();

            return view("tech.search", [
                "devices" => $results,
                "partner" => $loggedInName,
                "keyword" => $keyword,
                "moonRepairDevices" => $moonRepairDevices,
            ]);

        }
    }

    public function pdfShow($id){
        $device = Device::find($id);

        $business = $device->business;
        $customerData = User::where('id', $business)->get();
        return view("Partner.pdf", ["device" => $device, "customer" => $customerData]);
    }
}
