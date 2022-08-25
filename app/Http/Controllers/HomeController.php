<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use App\Models\Device;
use App\Models\Comment;
use App\Models\User;
use App\Models\MoonRepair;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $AccountType = Auth::user()->AccountType;
        $userId = Auth::user()->id;

        $loggedInName = Auth::user()->name;
        $activeDevices = Device::where("business", $userId)->orderBy("id", "DESC")->where("status", "=", "open")->get();
        $sentDevices = Device::where("business", $userId)->where("status", "=", "sent")->orderBy("id", "DESC")->get();
        $closedDevices = Device::where("business", $userId)->orderBy("id", "DESC")->where("status", "finished")->get();
        $comments = Comment::orderBy("id", "DESC")->get();

        if($AccountType == 'partner'){

            $company = Auth::user()->firmName;

            $devices = Device::where("business", $userId)->orderBy("id", "DESC")->take(6)->get();

            $devicesCount = Device::where("business", $userId)->count();
            $activeDevices = Device::where("business", $userId)->orderBy("id", "DESC")->where("status", "!=", "finished")->count();
            $closedDevices = Device::where("business", $userId)->orderBy("id", "DESC")->where("status", "=", "finished")->count();

            return view('Partner.index', ["partner" => $loggedInName, "companyName" => $company, "devicesCount" => $devicesCount, "activeDevices" => $activeDevices, "closedDevices" => $closedDevices, "devices" => $devices]);
//            return view('Partner.home', ["partner" => $loggedInName, "activeDevices" => $activeDevices, "closedDevices" => $closedDevices, "sentDevices" => $sentDevices]);
        }elseif($AccountType == 'admin'){
            $admin = Auth::user();
            $partnersNumber = User::where("AccountType", "partner")->count();
            $pendingB2bDevices = Device::where("status", "open")->count();
            $allB2bDevices = Device::all()->count();
            $allB2cDevices = MoonRepair::all()->count();
            $devicesOnTheWay = Device::where("status", "sent")->count();
            $pendingB2cDevices = MoonRepair::where("status", "open")->count();
            $devicesB2bNeedParts = Device::where("status", "wait4Parts")->count();
            $devicesB2cNeedParts = MoonRepair::where("status", "wait4Parts")->count();
            $b2bDevicesOverView = Device::orderBy("id", "DESC")->take(5)->get();
            $b2cDevicesOverView = MoonRepair::orderBy("id", "DESC")->take(5)->get();
            $b2bDeviceCompany = Device::orderBy("id", "DESC")->take(5)->pluck("business")->all();
            $pendingB2cDevicesToday = MoonRepair::where("status", "!=", "finished")->whereDate('created_at', Carbon::today())->count();

            $toDoList = Task::orderBy("id", "DESC")->get();

            for($i=0; $i<sizeof($b2bDeviceCompany); $i++){
                $companies [] = User::where("id", $b2bDeviceCompany[$i])->pluck("firmName")->first();

            }

            $notificationsNumber = Notification::where("AdminSeenStatus", "notSeenByAdmin")->count();
            $notifications = Notification::orderBy("id", "DESC")->where("AdminSeenStatus", "notSeenByAdmin")->get();
            return view("adminPanel.index", [
                "admin" => $admin,
                "partners" => $partnersNumber,
                "pendingB2bDevices" => $pendingB2bDevices,
                "devicesOnTheWay" => $devicesOnTheWay,
                "pendingB2cDevices" => $pendingB2cDevices,
                "devicesB2bNeedParts" => $devicesB2bNeedParts,
                "devicesB2cNeedParts" => $devicesB2cNeedParts,
                "allB2bDevices" => $allB2bDevices,
                "B2bOverview" => $b2bDevicesOverView,
                "b2bPartners" => $companies,
                "B2cOverview" => $b2cDevicesOverView,
                "allB2cDevices" => $allB2cDevices,
                "notificationsNumber" => $notificationsNumber,
                "notifications" => $notifications,
                "tasks" => $toDoList,
                "pendingB2cDevicesToday" => $pendingB2cDevicesToday,
                ]);
        }elseif($AccountType == 'tech'){

            $loggedInName = Auth::user()->name;
            $newDevices = Device::orderBy("id", "DESC")->where("status", "!=", "finished")->where("tech", NULL)->get();
            $myDevices = Device::orderBy("id", "DESC")->where("status", "!=", "finished")->where("tech", $loggedInName)->get();

            $moonRepairDevices = MoonRepair::orderBy("id", "DESC")->where("status", "!=", "finished")->where("tech", NULL)->get();
            $myMoonRepairDevices = MoonRepair::orderBy("id", "DESC")->where("status", "open")->where("tech", $loggedInName)->get();

            return view("Tech.home", [
                "tech" => $loggedInName,
                "newDevices" => $newDevices,
                "myDevices" => $myDevices,
                "moonRepairDevices" => $moonRepairDevices,
                "myMoonRepairDevices" => $myMoonRepairDevices,
            ]);
        }elseif($AccountType == "b2c"){
            $loggedInName = Auth::user()->name;
             $newDevices = MoonRepair::orderBy("id", "DESC")->where("status", "open")->where("tech", Null)->get();
            return view("moonRepair.home", [
                "b2c" => $loggedInName,
                "newDevices" => $newDevices
            ]);
        }

    }
}
