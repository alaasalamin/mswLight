<?php

namespace App\Http\Controllers;

use App\Models\MoonRepair;
use App\Models\Notification;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Comment;
use App\Models\Brand;
use App\Models\User;
use Auth;
use Redirect;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function b2bComment(Request $request){
        Comment::create($request->all());

        return redirect()->back();
    }
    public function b2bDevice($id){
        $admin = Auth::user();
        $notificationsNumber = Notification::where("AdminSeenStatus", "notSeenByAdmin")->count();
        $notifications = Notification::orderBy("id", "DESC")->where("AdminSeenStatus", "notSeenByAdmin")->get();
        $device = Device::find($id);
        $comments = Comment::where("deviceId", $id)->get();

        $notificationUpdate = Notification::where("device", $id)->update(['AdminSeenStatus'=>'seen']);

        return view("adminPanel.b2bDevice", [
            "admin" => $admin,
            "notificationsNumber" => $notificationsNumber,
            "notifications" => $notifications,
            "deviceId" => $id,
            "device" => $device,
            "comments" => $comments
        ]);
    }
    public function b2cDevice($id){
        $admin = Auth::user();
        $notificationsNumber = Notification::where("AdminSeenStatus", "notSeenByAdmin")->count();
        $notifications = Notification::orderBy("id", "DESC")->where("AdminSeenStatus", "notSeenByAdmin")->get();
        $device = MoonRepair::find($id);
        $comments = Comment::where("deviceId", $id)->get();

        $notificationUpdate = Notification::where("device", $id)->update(['AdminSeenStatus'=>'seen']);

        return view("adminPanel.b2cDevice", [
            "admin" => $admin,
            "notificationsNumber" => $notificationsNumber,
            "notifications" => $notifications,
            "deviceId" => $id,
            "device" => $device,
            "comments" => $comments
        ]);
    }

    public function updateDevice(Request $request, $id)
    {
        $device = Device::find($id);
        $device->update($request->all());

        return redirect()->back();

    }


    public function newTask(Request $request){
        Task::create($request->all());
        return redirect()->back();
    }

    public function editTask(Request $request){
        $message = $request['message'];
        $id = $request['id'];
        Task::where('id', $id)->update(['message' => $message]);
        return redirect()->back();
    }
    public function taskDelete($id){
        Task::destroy($id);
        return redirect()->back();
    }




    public function adminSearchRequest(Request $request){
        $keyword = $request->keyword;
        $admin = Auth::user();
        $partnersNumber = User::where("AccountType", "partner")->count();
        $pendingB2bDevices = Device::where("status", "open")->count();
        $allB2bDevices = Device::all()->count();
        $allB2cDevices = MoonRepair::all()->count();
        $devicesOnTheWay = Device::where("status", "sent")->count();
        $pendingB2cDevices = MoonRepair::where("status", "open")->count();
        $devicesB2bNeedParts = Device::where("status", "wait4Parts")->count();
        $devicesB2cNeedParts = MoonRepair::where("status", "wait4Parts")->count();

        $B2bDevices = Device::where("id", $keyword)
                            ->orWhere("model", "like", "%". $keyword ."%")
                            ->orWhere("imei", $keyword)
                            ->orWhere("error", "like", "%". $keyword ."%")
                            ->get();

        $sizeofDevices = sizeof($B2bDevices);

        if($sizeofDevices > 0) {
            $b2bDeviceCompany = Device::orderBy("id", "DESC")->take($sizeofDevices)->pluck("business")->all();
            for($i=0; $i<sizeof($b2bDeviceCompany); $i++){
                $companies [] = User::where("id", $b2bDeviceCompany[$i])->pluck("firmName")->first();
            }
        }else{
            $companies = [];
        }


        $b2cDevices = MoonRepair::where("id", $keyword)
                                ->orWhere("model", "like", "%". $keyword ."%")
                                ->orWhere("imei", $keyword)
                                ->orWhere("error", "like", "%". $keyword ."%")
                                ->orWhere("customerName", "like", "%". $keyword ."%")
                                ->get();

        $b2cDevicesOverView = [];

        $toDoList = Task::orderBy("id", "DESC")->get();

        $notificationsNumber = Notification::where("AdminSeenStatus", "notSeenByAdmin")->count();
        $notifications = Notification::orderBy("id", "DESC")->where("AdminSeenStatus", "notSeenByAdmin")->get();
        return view("adminPanel.search", [
            "admin" => $admin,
            "partners" => $partnersNumber,
            "pendingB2bDevices" => $pendingB2bDevices,
            "devicesOnTheWay" => $devicesOnTheWay,
            "pendingB2cDevices" => $pendingB2cDevices,
            "devicesB2bNeedParts" => $devicesB2bNeedParts,
            "devicesB2cNeedParts" => $devicesB2cNeedParts,
            "allB2bDevices" => $allB2bDevices,
            "B2bDevices" => $B2bDevices,
            "b2bPartners" => $companies,
            "B2cOverview" => $b2cDevicesOverView,
            "allB2cDevices" => $allB2cDevices,
            "notificationsNumber" => $notificationsNumber,
            "notifications" => $notifications,
            "tasks" => $toDoList,
            "b2cDevices" => $b2cDevices
        ]);
    }


    public function allB2b(){
        $admin = Auth::user();
        $partnersNumber = User::where("AccountType", "partner")->count();
        $pendingB2bDevices = Device::where("status", "open")->count();
        $allB2bDevices = Device::all()->count();
        $allB2cDevices = MoonRepair::all()->count();
        $devicesOnTheWay = Device::where("status", "sent")->count();
        $pendingB2cDevices = MoonRepair::where("status", "open")->count();
        $devicesB2bNeedParts = Device::where("status", "wait4Parts")->count();
        $devicesB2cNeedParts = MoonRepair::where("status", "wait4Parts")->count();

        $B2bDevices = Device::orderBy("id", "DESC")->get();

        $sizeofDevices = sizeof($B2bDevices);

        if($sizeofDevices > 0) {
            $b2bDeviceCompany = Device::orderBy("id", "DESC")->take($sizeofDevices)->pluck("business")->all();
            for($i=0; $i<sizeof($b2bDeviceCompany); $i++){
                $companies [] = User::where("id", $b2bDeviceCompany[$i])->pluck("firmName")->first();
            }
        }else{
            $companies = [];
        }


        $b2cDevices = MoonRepair::where("id", 1)->get();

        $b2cDevicesOverView = [];

        $toDoList = Task::orderBy("id", "DESC")->get();

        $notificationsNumber = Notification::where("AdminSeenStatus", "notSeenByAdmin")->count();
        $notifications = Notification::orderBy("id", "DESC")->where("AdminSeenStatus", "notSeenByAdmin")->get();
        return view("adminPanel.allb2b", [
            "admin" => $admin,
            "partners" => $partnersNumber,
            "pendingB2bDevices" => $pendingB2bDevices,
            "devicesOnTheWay" => $devicesOnTheWay,
            "pendingB2cDevices" => $pendingB2cDevices,
            "devicesB2bNeedParts" => $devicesB2bNeedParts,
            "devicesB2cNeedParts" => $devicesB2cNeedParts,
            "allB2bDevices" => $allB2bDevices,
            "B2bDevices" => $B2bDevices,
            "b2bPartners" => $companies,
            "B2cOverview" => $b2cDevicesOverView,
            "allB2cDevices" => $allB2cDevices,
            "notificationsNumber" => $notificationsNumber,
            "notifications" => $notifications,
            "tasks" => $toDoList,
            "b2cDevices" => $b2cDevices
        ]);
    }
    public function allB2c(){
        $admin = Auth::user();
        $partnersNumber = User::where("AccountType", "partner")->count();
        $pendingB2bDevices = Device::where("status", "open")->count();
        $allB2bDevices = Device::all()->count();
        $allB2cDevices = MoonRepair::all()->count();
        $devicesOnTheWay = Device::where("status", "sent")->count();
        $pendingB2cDevices = MoonRepair::where("status", "open")->count();
        $devicesB2bNeedParts = Device::where("status", "wait4Parts")->count();
        $devicesB2cNeedParts = MoonRepair::where("status", "wait4Parts")->count();

        $B2bDevices = Device::orderBy("id", "DESC")->get();

        $sizeofDevices = sizeof($B2bDevices);

        if($sizeofDevices > 0) {
            $b2bDeviceCompany = Device::orderBy("id", "DESC")->take($sizeofDevices)->pluck("business")->all();
            for($i=0; $i<sizeof($b2bDeviceCompany); $i++){
                $companies [] = User::where("id", $b2bDeviceCompany[$i])->pluck("firmName")->first();
            }
        }else{
            $companies = [];
        }


        $b2cDevices = MoonRepair::orderBy("id", "DESC")->get();

        $b2cDevicesOverView = [];

        $toDoList = Task::orderBy("id", "DESC")->get();

        $notificationsNumber = Notification::where("AdminSeenStatus", "notSeenByAdmin")->count();
        $notifications = Notification::orderBy("id", "DESC")->where("AdminSeenStatus", "notSeenByAdmin")->get();
        return view("adminPanel.allb2c", [
            "admin" => $admin,
            "partners" => $partnersNumber,
            "pendingB2bDevices" => $pendingB2bDevices,
            "devicesOnTheWay" => $devicesOnTheWay,
            "pendingB2cDevices" => $pendingB2cDevices,
            "devicesB2bNeedParts" => $devicesB2bNeedParts,
            "devicesB2cNeedParts" => $devicesB2cNeedParts,
            "allB2bDevices" => $allB2bDevices,
            "B2bDevices" => $B2bDevices,
            "b2bPartners" => $companies,
            "B2cOverview" => $b2cDevicesOverView,
            "allB2cDevices" => $allB2cDevices,
            "notificationsNumber" => $notificationsNumber,
            "notifications" => $notifications,
            "tasks" => $toDoList,
            "b2cDevices" => $b2cDevices
        ]);
    }


}
