<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Emp_record;
use App\User;
use Charts;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::guest()){
            return redirect()->route('login');
        }

        $year1 = date('Y');

        $month = (int)date('m');
        $attend = array();
        $durationattend = array();
        for($i=1;$i<13;$i++) {
            for($j=1;$j<32;$j++) {


                    $attend[$i][$j] = ' ';


            }
        }
        for($i=0;$i<12;$i++) {
            for($j=0;$j<31;$j++) {

                $durationattend[$i][$j] = 0;


            }
        }



        $dd = 32;
        for($i=1;$i<=$month;$i++) {
            //
            $number = cal_days_in_month(CAL_GREGORIAN, $i, $year1); // 31
            $dayys = $number;
            $dd = $dayys;
            //
            if($i == $month){
                $dd = (int)date('d');
            }
            for($j=1;$j<=$dd;$j++) {
                $string = "$year1-$i-$j";
                $timestamp = strtotime($string);
                $dayy = date("D", $timestamp);

                if($dayy == "Sun" || $dayy == "Sat"){
                    $attend[$i][$j] = $dayy;
                }else{
                    $attend[$i][$j] = 'A';
                }
            }
        }

        $id = Auth::id();
        //echo abc;
        //$newemployes = Emp_record::all();

        $year = date('y');
        $year2 = date('Y');

        $newemployess = Emp_record::all();
        foreach ($newemployess as $employeee){

            if (($employeee->user_id == $id)) {
                if (($employeee->year == $year2)){

                    for($m=1;$m<=12;$m++){
                        if (($employeee->month == $m)) {
                            for ($d = 1; $d <= 31; $d++) {
                                if ($employeee->day == $d) {

                                    if (  $employeee->status == 'L' ){
                                        $attend[$m][$d]= 'L';
                                    }elseif (  $employeee->status == 'H' ){
                                        $attend[$m][$d]= 'H';
                                    }elseif (  $employeee->status == 'P' ){
                                        $attend[$m][$d]= 'P';

                                        //////// monthly chart
                                        $totaltime = $employeee->duration;
                                        $totalparsed = date_parse($totaltime);
                                        $totaltime2 = $totalparsed['hour'] * 3600 + $totalparsed['minute'] * 60 + $totalparsed['second'];
                                        $totaltime2 = $totaltime2 / 3600;
                                        $totaltime2 = round($totaltime2, 2);
                                        $durationattend[$m-1][$d-1] = $totaltime2;

                                        //////////
                                    }

                                }
                            }
                        }
                    }

                }

            }

        }

        //// new chart

        $newcharts = array();

        /*$monthlycharts = array();
        $daysOfMonth = array();*/

        $TotalDays = array();
        $monthNo = 12;
        $Thisyearis = date('Y');

        for($i = 0 ; $i < $monthNo ; $i++) {
            $TotalDays[$i] = cal_days_in_month(CAL_GREGORIAN, $i+1, $Thisyearis);
        }

        /*for($i = 0 ; $i < 31 ; $i++) {
            $daysOfMonth[$i] = "".($i+1)."";
        }*/
        $totalNoOFMonths = array("January", "February", "March" ,"April", "May", "June" ,"July", "August", "September" ,"October", "November", "December");



        for($i = 0 ; $i < 12 ; $i++) {

            $monthlycharts = array();
            $daysOfMonth = array();

            for($j = 0 ; $j < $TotalDays[$i] ; $j++) {


                $monthlycharts[$j] = 0;
                $monthlycharts[$j] = $durationattend[$i][$j];
                $daysOfMonth[$j] = "".($j+1)."";
            }

            $chart2 = Charts::create('line', 'highcharts')
                ->Title($totalNoOFMonths[$i].",".$year2)
                ->Labels($daysOfMonth)
                ->Values($monthlycharts)
                ->ElementLabel("Hours / Day");
            $newcharts[$i] = $chart2;

        }


        return view('pages.view')->with('attendd',$attend)->with('newemployess',$newemployess)->with('newcharts',$newcharts)->with('year2',$year2);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        session_start();


        if (Auth::guest()){
            return redirect()->route('login');
        }
        if(!isset($_SESSION["whenIn"])){

            $_SESSION["whenIn"] = 0;
        }

        $abc = 0;
        $id = Auth::id();
        $employe = new Emp_record;
        //$newemployess = Emp_record::all();
        $employess = Emp_record::all();
        //$employess = Employe::all();
        foreach ($employess as $employeee){

            if (($employeee->user_id == $id && $employeee->day == date('d') && $employeee->month == date('m') && $employeee->year == date('Y'))) {

                if(($employeee->punch_out == 0 || $employeee->punch == 'in') && $_SESSION["whenIn"] == 1 ){

                    $pinn = $employeee->punch_in;

                    //$employeee->punch_out = $pout = 5+date('h').date(':i');

                    $tttt = 5+date('h').date(':i');
                    $tttt = strtotime($tttt);
                    $employeee->punch_out = $pout = gmdate("H:i:s", $tttt);



                    $pdur = strtotime($pout) - strtotime($pinn);
                    $employeee->duration = gmdate("H:i:s", $pdur);//$_SESSION["total"];
                    $employeee->punch = 'out';

                    $_SESSION["dddd"] = 3;
                    $employeee->save();
                    return redirect()->route('login');
                }
                if($employeee->punch_out != 0 && $employeee->punch == 'out'){


                    $_SESSION["dddd"] = 3;
                    return redirect()->route('login');
                }
                $abc = 1;
            }

        }

        if($abc == 0 && $_SESSION["dddd"] == 1 ){
            //echo "Ahsan";
            //Create Instance OF Model(create obj of table posts)
            $employe->user_id = $id;
            $employe->day = date('d');
            $employe->month = date('m');
            $employe->year = date('Y');
            //$employe->punch_in = 5+date('h').date(':i');

            $tttt = 5+date('h').date(':i');
            $tttt = strtotime($tttt);
            $employe->punch_in = gmdate("H:i:s", $tttt);


            $employe->punch_out = 0;//$_SESSION["end"];
            $employe->duration = 0;//$_SESSION["total"];
            $employe->status = 'P';
            $employe->punch = 'in';

            $employe->save();

            $_SESSION["dddd"] = 2;
            return redirect()->route('login');

        }



        //Session::flash('success','successfully saved'); // temporary session , creates new session for every http req
        // Redirect to another Page
        if($_SESSION["dddd"] == 11){

            foreach ($employess as $employeee2) {
                if (($employeee2->user_id == $id && $employeee2->day == date('d') && $employeee2->month == date('m') && $employeee2->year == date('Y'))) {

                    /*if($employeee2->punch_in != 0 && $employeee2->punch == null){

                        $employeee2->user_id = $id;
                        $employeee2->day = date('d');
                        $employeee2->month = date('m');
                        $employeee2->year = date('Y');
                        //$employe->punch_in = 5+date('h').date(':i');

                        $tttt = 5+date('h').date(':i');
                        $tttt = strtotime($tttt);
                        $employeee2->punch_in = gmdate("H:i:s", $tttt);


                        $employeee2->punch_out = 0;//$_SESSION["end"];
                        $employeee2->duration = 0;//$_SESSION["total"];
                        $employeee2->status = 'P';
                        $employeee2->punch = 'in';

                        $employeee2->save();

                        $_SESSION["dddd"] = 2;
                        return redirect()->route('login');

                    }*/


                    if($employeee2->punch_out == 0 || $employeee2->punch == 'in') {

                        $_SESSION["dddd"] = 2;
                        return redirect()->route('login');

                    }elseif ($employeee2->punch == 'out'){

                        $_SESSION["dddd"] = 3;
                        return redirect()->route('login');
                    }
                }
            }



            $_SESSION["dddd"] = 1;
            return redirect()->route('login');
    }


        return redirect()->route('login');
        //return redirect()->route('pages.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('home');
    }

    public function show($id)
    {
        $record = Emp_record::find($id);
        return view('pages.show')->with("record",$record);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        session_start();
        $users11 = User::find($id);
        //$users11->password = decrypt($users11->password);
        $users = User::all();

        if($_SESSION["dd"] == 3){

            $_SESSION["dd"] = 1;
        }else{
            $_SESSION["dd"] = 3;
        }

        return view('admin.users')->with("users11",$users11)->with('users',$users);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
