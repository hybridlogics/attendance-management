<?php
session_start();

if(!isset($_SESSION['dddd'])){
?>

<script>window.location.href = '{{route("pages.create")}}';</script>
<?php
$_SESSION["dddd"] = 11;
}

$button1 = 0;
$button2 = 0;
?>
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Todays Attendence</div>

                <div class="panel-body">
                    @if (Auth::guest())

                        <script>window.location.href = '{{route("login")}}';</script>

                    @endif

                        <p style="font-size:12px;"><b>Note:</b>&nbsp;&nbsp; Please use your office system to Punch In/Out but if you forgot or<br>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp; want to work from home then E-mail at hybridlogics@gmail.com<br>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;  for Punch In/Out timing.<br><br><br></p>

                        <div class="container">

                            <button type="button" class="<?php

                            if($_SESSION["dddd"] == 1){
                                echo "btn btn-success ";
                                $button1 = 1;
                            }
                            elseif($_SESSION["dddd"] == 2){
                                echo "btn btn-success disabled";
                                $button1 = 2;
                            }
                            elseif($_SESSION["dddd"] == 3){
                                echo "btn btn-success disabled";
                                $button1 = 3;
                            }

                            ?>"
                                    onclick="myFunction()" >
                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Punch In&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</button>



                            <button type="button" class="<?php
                            if($_SESSION["dddd"] == 1){
                                echo "btn btn-success disabled";
                                $button2 = 1;
                            }
                            elseif($_SESSION["dddd"] == 2){
                                echo "btn btn-success ";
                                $button2 = 2;
                            }
                            elseif($_SESSION["dddd"] == 3){
                                echo "btn btn-success disabled";
                                $button3 = 3;
                            }

                            ?>" onclick="myFunction1()">
                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Punch Out&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</button>
                        </div>

                        <script>
                            function myFunction() {
                                <?php
                                        if($button1 == 1){
                                            ?>
                                            window.location.href = '{{route("pages.create")}}';
                                            <?php
                                        }
                                ?>
                                }
                            function myFunction1() {
                                <?php
                                        if($button2 == 2){
                                        $_SESSION["whenIn"] = 1;
                                        ?>
                                        window.location.href = '{{route("pages.create")}}';
                                <?php
                               }
                                ?>
                            }
                        </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
