<?php
$myidd = 1000000000;
$leave = 1000000001;
$holiday =1000000002;
?>
<div class="container-fluid">
    <div class="row">

        <div class="col-md-3 ">
            <a href="{{ route('admin.index') }}" class="btn btn-success"><i class="fa fa-angle-left custom" ></i> Admin View</a>
        </div>
        <div class="col-md-1 ">

        </div>
        <div class="col-md-1 ">
            <a href="{{ route('user.show',$myidd) }}" class="btn btn-success btn-block" > Update </a>
        </div>
        <div class="col-md-1 ">
            <a href="{{ route('user.show',$holiday) }}" class="btn btn-success btn-block" > Holiday </a>
        </div>
        <div class="col-md-1 ">
            <a href="{{ route('user.show',$leave) }}" class="btn btn-success btn-block" > Leave </a>
        </div>

        <div class="col-md-2 col-md-offset-3">

           {!!   Form::open(array('route' => array('admin.show',$_SESSION["theid"]),'method'=>'GET')) !!}


            <span style="display:inline-block">

                <select name="year" class="form-control">
                    <option selected="selected"><?php echo $_SESSION["TheYear"]; ?></option>
                           <?php
                           $size = sizeof($AllYearsInDB);
                           for ($i = 0 ; $i < $size ; $i++)
                           {
                    if($_SESSION["TheYear"] != $AllYearsInDB[$i] ){
                    ?>
                    <option ><?php echo $AllYearsInDB[$i]; ?></option>
                           <?php }} ?>
                </select>

            </span>

            <span style="display:inline-block">

                    {{ Form::submit('Show',['class'=>'btn btn-success btn-block']) }}

            </span>









            {!!   Form::close() !!}

            {{--<a href="{{ route('user.show',$leave) }}" class="btn btn-success btn-block" > Leave </a>--}}
        </div>
    </div>
</div>

<br>

<div class="container-fluid">
   {{-- <div class="row">
        <div class="col-md-10 col-md-offset-1">--}}
    <table class="table table-bordered" >
        <tr>
            <th align='center' colspan="50px">

                <div class="row">
                    <div class=" col-md-offset-5">

                        <h1><?php echo ucfirst($name); ?></h1>

                    </div>
                </div>

            </th>
        </tr>
        <tr align='center'>
            <th> # </th>
            <?php
            for($th = 0; $th < 31; $th++){

                echo "<th>".($th+1)."</th>";
            }
            ?>

        </tr>
        <?php

        $id = Auth::id();
        $myid = 0;
        $months = array("Jan", "Feb", "Mar" ,"Apr", "May", "Jun" ,"Jul", "Aug", "Sep" ,"Oct", "Nov", "Dec" );
        for($m=1;$m<=12;$m++){
        echo "<tr align='center'>";
        echo "<td>".$months[$m-1]."</td>";
        for ($d = 1; $d <= 31; $d++) {
        //echo "<td id='demo' >".$attendd[$m][$d]."</td>";


        $f = 0;
        foreach($newemployess as $emp){


        if($emp->user_id == $iddd && $emp->day == $d && $emp->month == $m && $emp->year == $y){

        if($emp->status == 'P'){

        $myid = $emp->id;
        ?>
        <td id='demo'>
            <a href="{{ route('user.show',$myid) }}">

                <?php
                echo $attendd[$m][$d];
                $f = 1;
                ?>

            </a>
        </td>

        <?php
        }
        }
        }
        if($f == 0){echo "<td id='demo'>".$attendd[$m][$d]."</td>";}


        }
        echo "</tr>";
        }
        ?>

    </table>
{{--</div>
</div>--}}
</div>