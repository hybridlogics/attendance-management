<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Emp_record;
use App\User;

class UsersController extends Controller
{

    public function index()
    {
        ////

        $id = Auth::id();
        $users123 = User::find($id);
        //$users123->id == 1;

        if (Auth::check() && $users123->admin == 1 ) {

            $aaaa = 10;
        }else{
            return redirect()->route('pages.index');
        }

        ////

        session_start();
        $users = User::all();
        foreach ($users as $user)
        { $abc = $user->id; }

        $users11 = User::find($abc);

        $ThisYear = date('Y');
        $_SESSION["TheYear"] = $ThisYear;

        return view('admin.users')->with('users',$users)->with("users11",$users11);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , Request $request)
    {
        session_start();
        $_SESSION["theid"] = $id;

        $_SESSION['TheYear'] = $request ->input('year');

        return redirect()->route('user.index');
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
        $users = User::all();

        if($_SESSION["dd"] == 2){

            $_SESSION["dd"] = 1;
        }else{
            $_SESSION["dd"] = 2;
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
        $this->validate($request, array(
            // here we add rules to validate data
            'name' => 'required',
            'email'  => 'required',
            /*'password'  => 'required'*/
        ));
        //Save data in DB
        $record = user::find($id);

        $record->name = $request ->input('name');
        $record->email  = $request ->input('email');
        //bcrypt($data['password'])
        $record->password  = bcrypt($request ->input('password1'));
        //$record->password  = $request ->input('password1');
        $record->save();

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users11 = User::find($id);
        $users11->delete();

        return redirect()->route('admin.index');
    }

}
