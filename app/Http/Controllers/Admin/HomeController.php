<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DashboardService;
use App\Admin;
use App\Models\Day;
use App\Models\Timetable;
use App\Models\AcademicPeriod;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
// $this->middleware('guest:admin')->except('postLogout');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timetables = Timetable::orderBy('created_at', 'DESC')->paginate(10);
        $days = Day::all();
        $academicPeriods = AcademicPeriod::all();
        return view('admin.home',compact( 'timetables', 'days', 'academicPeriods'));
    }




    public function profile()
    {
        // $details=Admin::all()->where(Auth::user()->name);
       $details = Admin::where([
            ['id', '=', Auth::user()->id]
        ])->get();
        return view('admin.profile',compact('details'));
    }





    
}
