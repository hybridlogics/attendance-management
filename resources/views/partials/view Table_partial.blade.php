<div class="container">
    <table class="table table-bordered" >
        <tr>
            <th align='center' colspan="50px"><h1><?php for($p=0;$p<25;$p++){echo '&ensp;';} $name = Auth::user()->name; echo ucfirst($name); ?></h1></th>
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

        $f = 0;
        foreach($newemployess as $emp){


        if($emp->user_id == $id && $emp->day == $d && $emp->month == $m && $emp->year == $year2){
        if($emp->status == 'P'){
        $myid = $emp->id;
        ?>
        <td id='demo'>
            <a href="{{ route('pages.show',$myid) }}">

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
</div>