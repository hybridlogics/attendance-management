<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Emp_record;
use App\User;
use Charts;

class Leaveholidays extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$id = Auth::id();

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
            $_SESSION["Holiday"] = 10;

        }else{
            $_SESSION["Holiday"] = 1;
            $employe = new Emp_record;
            $employe->user_id = $id;
            $employe->day = $day;
            $employe->month = $month;
            $employe->year = $year;

            $employe->status = 'L';

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
    public function update(Request $request, $iddd)
    {
        //$id = Auth::id();

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
            $_SESSION["Holiday"] = 10;

        }else{
            $_SESSION["Holiday"] = 1;
            $employe = new Emp_record;
            $employe->user_id = $id;
            $employe->day = $day;
            $employe->month = $month;
            $employe->year = $year;

            $employe->status = 'H';

            $employe->save();
        }


        return redirect()->route('user.index');
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
