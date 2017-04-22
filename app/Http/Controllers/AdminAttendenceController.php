<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Emp_record;
use App\User;
use Charts;
use phpDocumentor\Reflection\Types\Array_;

class AdminAttendenceController extends Controller
{

    public function index(Request $request)
    {
        ////

        $idd = Auth::id();
        $users123 = User::find($idd);
        //$users123->id == 1;
        if (Auth::guest()){
            return redirect()->route('login');
        }
        if (Auth::check() && $users123->admin == 1 ) {

            $aaaa = 10;
        }else{
            return redirect()->route('pages.index');
        }

        ////

        session_start();

        $yearsss =  array();
        $AllYearsInDB =  array();

        $yearsss = Emp_record::distinct()->get(['year']); // gets in Json form

        $size = sizeof($yearsss);
        for ($i = 0 ; $i < $size ; $i++)
        {
            $yearsss[$i] = json_decode($yearsss[$i]);      // convert Json to array
            $AllYearsInDB[$i] = $yearsss[$i]->{'year'};
        }


        if(!isset($_SESSION["Holiday"])){

            $_SESSION["Holiday"] = 1;

        }

        if(!isset($_SESSION['TheYear'])){

            $_SESSION["TheYear"] = date('Y');

        }else{
            //echo $_SESSION['TheYear'];
            //$_SESSION["TheYear"] = $request ->input('year');
        }

        $id = $_SESSION["theid"];
        //echo $id;
        $year1 = date('Y');

        $month = (int)date('m');
        $Thismonthis = (int)date('m');
        $ThisMonth = date('M');
        $ThisYear = date('Y');
        $Theyear2 = $_SESSION["TheYear"];
        $y = $Theyear2;

        $ThisMonth = date('M');



        $chartdate = (int)date('d');

        $attend = array();
        $durationattend = array();
        $total = array();


        for($i=0;$i<12;$i++) {

            $total[$i] = 0;
        }

        $dayss = (int)date('d');
        $totaldays = array();
        $totaldays2 = array();

        for($i=0;$i<$dayss;$i++) {

            $totaldays[$i] = 0;
        }

        for($i=0;$i<31;$i++) {

            $totaldays2[$i] = 0;
        }

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
        if($Theyear2 != $ThisYear){

            $month =12;
            $ThisMonth = 'Jan';
        }
        $ThisDate = $ThisMonth.",".$Theyear2;

        for($i=1;$i<=$month;$i++) {
            //
            $number = cal_days_in_month(CAL_GREGORIAN, $i, $year1); // 31
            $dayys = $number;
            $dd = $dayys;
            //
            if($i == $month && $Theyear2 == $ThisYear){
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
        //echo abc;
        //$newemployes = Emp_record::all();
        $newemp = User::find($id);
        $name = $newemp->name;
        $iddd = $newemp->id;

        $year = date('y');
        $year2 = date('Y');


        $newemployess = Emp_record::all();
        foreach ($newemployess as $employeee){

            if (($employeee->user_id == $id)) {
                if ($employeee->year == $Theyear2){ //year = 17 && year2 = 2017
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

                                            //////// yearly chart
                                        $timee = $employeee->duration;
                                        $parsed = date_parse($timee);
                                        $time = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
                                        $time = $time / 3600;
                                        $total[$m-1] = $total[$m-1] + $time;
                                        ////////
                                        $chartmonth = (int)date('m');

                                        if($chartmonth == $m && ($employeee->year == $year || $employeee->year == $year2) ){ //this year
                                            $timeee = $employeee->duration;
                                            $parsedd = date_parse($timeee);
                                            $time2 = $parsedd['hour'] * 3600 + $parsedd['minute'] * 60 + $parsedd['second'];
                                            $time2 = $time2 / 3600;
                                            $time2 = round($time2, 2);
                                            $totaldays2[$d-1] = $time2;

                                            //$chartmonth = (int)date('m');
                                            $chartdate = (int)date('d');


                                        }elseif($m == 1 && ($employeee->year != $year && $employeee->year != $year2)){ // not this year



                                            $timeeee = $employeee->duration;
                                            $parseddd = date_parse($timeeee);
                                            $time3 = $parseddd['hour'] * 3600 + $parseddd['minute'] * 60 + $parseddd['second'];
                                            $time3 = $time3 / 3600;
                                            $time3 = round($time3, 2);
                                            $totaldays2[$d-1] = $time3;

                                            $chartdate = 31;
                                        }
                                        ////////
                                    }
                                }
                            }
                            $total[$m-1] = round($total[$m-1], 2);
                        }
                    }

                }

            }

        }
        ////
        $chart = Charts::create('line', 'highcharts')
            ->Title("Year: ".$Theyear2)
            ->Labels(["Jan", "Feb", "Mar" ,"Apr", "May", "Jun" ,"Jul", "Aug", "Sep" ,"Oct", "Nov", "Dec"])
            ->Values([$total[0],$total[1],$total[2],$total[3],$total[4],$total[5],$total[6],$total[7],$total[8],$total[9],$total[10],$total[11]])
            ->ElementLabel("Hours / Month");
        ////
        $daysOfMonth = Array();

        for($i = 0 ; $i < $chartdate ; $i++) {
         $daysOfMonth[$i] = "".($i+1)."";
        }
            $chart1 = Charts::create('line', 'highcharts')
                ->Title($ThisDate.",".$Theyear2)
                ->Labels($daysOfMonth)
                ->Values($totaldays2)
                ->ElementLabel("Hours / Day");

        //// new chart

        $newcharts = array();

        $TotalDays = array();
        $monthNo = 12;

        for($i = 0 ; $i < $monthNo ; $i++) {
            $TotalDays[$i] = cal_days_in_month(CAL_GREGORIAN, $i+1, $Theyear2);
        }

        $totalNoOFMonths = array("January", "February", "March" ,"April", "May", "June" ,"July", "August", "September" ,"October", "November", "December");

        for($i = 0 ; $i < 12 ; $i++) {

            $daysOfMonth2 = Array();
            $monthlycharts = array();

            for($j = 0 ; $j < $TotalDays[$i] ; $j++) {

                $monthlycharts[$j] = 0;
                $monthlycharts[$j] = $durationattend[$i][$j];
                $daysOfMonth2[$j] = "".($j+1)."";
            }


            $chart2 = Charts::create('line', 'highcharts')
                ->Title($totalNoOFMonths[$i].",".$Theyear2)
                ->Labels($daysOfMonth2)
                ->Values($monthlycharts)
                ->ElementLabel("Hours / Day");
            $newcharts[$i] = $chart2;

        }

        /*echo $durationattend[$i];
        echo $durationattend;*/

        ////
if ($_SESSION["Holiday"] == 10){

    echo "<script>alert('Cannot Override Existing Date with Holiday or Leave');</script>";
    $_SESSION["Holiday"] = 1;
}

        return view('admin.adminview')->with('attendd',$attend)->with('newemployess',$newemployess)->with('name',$name)->with('iddd',$iddd)->with('chart',$chart)->with('chart1',$chart1)->with('newcharts',$newcharts)->with('ThisYear',$ThisYear)->with('Thismonthis',$Thismonthis)->with('ThisMonth',$ThisMonth)->with('y',$y)->with('AllYearsInDB',$AllYearsInDB);

    }

    public function create(Request $request)
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
        session_start();
        $id = $_SESSION["theid"];

        $check = 0;
        $theNewID = 0;

        $date = $request ->input('date');

        $time  = strtotime($date);
        $day   = date('d',$time);
        $month = date('m',$time);
        $year  = date('Y',$time);

        $Allemployes = Emp_record::all();
        foreach ($Allemployes as $Allemploye) {
            if (($Allemploye->user_id == $id)){
                if (($Allemploye->year == $year)){
                    if (($Allemploye->month == $month)){
                        if (($Allemploye->day == $day)){

                            $check = 1;
                            $theNewID = $Allemploye->id;
                        }
                    }
                }
            }
        }

        if($check == 1){

            $TheEmploye = Emp_record::find($theNewID);

            $TheEmploye->user_id = $id;
            $TheEmploye->day = $day;
            $TheEmploye->month = $month;
            $TheEmploye->year = $year;
            $a = $TheEmploye->punch_in = $request ->input('punch_in');
            $b = $TheEmploye->punch_out = $request ->input('punch_out');
            $TheEmploye->status = 'P';


            $_SESSION["pout"] = 2;
            if($b != 0 || $b != null ){

                $_SESSION["pout"] = 10;
            }

            $pdur = strtotime($b) - strtotime($a);

            $TheEmploye->duration = gmdate("H:i:s", $pdur);
            $TheEmploye->save();


        }else{

            $employe = new Emp_record;

            $employe->user_id = $id;
            $employe->day = $day;
            $employe->month = $month;
            $employe->year = $year;
            $a = $employe->punch_in = $request ->input('punch_in');
            $b = $employe->punch_out = $request ->input('punch_out');
            $employe->status = 'P';


            $_SESSION["pout"] = 2;
            if($b != 0 || $b != null ){

                $_SESSION["pout"] = 10;
            }

            $pdur = strtotime($b) - strtotime($a);

            $employe->duration = gmdate("H:i:s", $pdur);
            $employe->save();

        }


        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id == 1000000000){

            return view('admin.edit1');
        }elseif($id == 1000000001){

            return view('admin.leave');
        }elseif($id == 1000000002){

            return view('admin.holiday');
        }else {
            $record = Emp_record::find($id);
            return view('admin.show')->with("record",$record);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find post in the DB and save as a var
        $record = Emp_record::find($id);
        //return the view and pass in the var we previously created
        return view('admin.edit')->with("record",$record);
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
        $this->validate($request, array(
            // here we add rules to validate data
            'punch_in' => 'required',
            'punch_out'  => 'required'
        ));
        //Save data in DB
        $record = Emp_record::find($id);

        $a = $record->punch_in = $request ->input('punch_in');
        $b = $record->punch_out  = $request ->input('punch_out');

        /*$_SESSION["pout"] = 2;
        if($request ->input('punch_out') != 0 || $request ->input('punch_out') != null || $request ->input('punch_out') != '' ){

            $_SESSION["pout"] = 10;
        }*/

        $pdur = strtotime($b) - strtotime($a);
        $record->duration = gmdate("H:i:s", $pdur);

        $record->save();

        return redirect()->route('user.show',$record->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Emp_record::find($id);
        $emp->delete();

        return redirect()->route('user.index');
    }


}
