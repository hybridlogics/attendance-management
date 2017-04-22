<?php

$months = array("Jan", "Feb", "Mar" ,"Apr", "May", "Jun" ,"Jul", "Aug", "Sep" ,"Oct", "Nov", "Dec");
for($i = 0 ; $i < 12 ; $i++) {

    if($ThisMonth == $months[$i]){ // sent month

        if($ThisMonth == 'Jan'){

            $previous = "";
            $next = $months[$i+1];
        }elseif ($ThisMonth == 'Dec'){

            $previous = $months[$i-1];
            $next = "";
        }else{
            $previous = $months[$i-1];
            $next = $months[$i+1];
        }
    }
}

?>

<?php
$months = array("Jan", "Feb", "Mar" ,"Apr", "May", "Jun" ,"Jul", "Aug", "Sep" ,"Oct", "Nov", "Dec");
$pre = 0;
$nex = 0;
for($i = 0 ; $i < 12 ; $i++) {
    if($months[$i] == $previous){
        $pre = $i;
    }
    if($months[$i] == $next){
        $nex = $i;
    }
}
?>
{!! $chart1->render() !!}
<div class="row">
    <div class="col-md-10 col-md-offset-1">

        <div class="col-md-10 col-md-offset-0">
            <button   id="{{ $pre }}" > <b>&lArr;<?php echo " ".$previous;?></b> </button>
        </div>

        <div class="col-md-2 col-md-offset-0">
            <a   id="{{ $nex }}" > <b><?php echo $next." "; ?>&rArr;</b> </a>
        </div>

    </div>
</div>