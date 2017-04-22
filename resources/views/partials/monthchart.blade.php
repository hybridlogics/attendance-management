<?php


?>

        <div id="a">
            {!! $newcharts[0]->render() !!}
        </div>
        <div id="b">
            {!! $newcharts[1]->render() !!}
        </div>
        <div id="c">
            {!! $newcharts[2]->render() !!}
        </div>
        <div id="d">
            {!! $newcharts[3]->render() !!}
        </div>
        <div id="e">
            {!! $newcharts[4]->render() !!}
        </div>
        <div id="f">
            {!! $newcharts[5]->render() !!}
        </div>
        <div id="g">
            {!! $newcharts[6]->render() !!}
        </div>
        <div id="h">
            {!! $newcharts[7]->render() !!}
        </div>
        <div id="i">
            {!! $newcharts[8]->render() !!}
        </div>
        <div id="j">
            {!! $newcharts[9]->render() !!}
        </div>
        <div id="k">
            {!! $newcharts[10]->render() !!}
        </div>
        <div id="l">
            {!! $newcharts[11]->render() !!}
        </div>


        <div class="row">
            <div class="col-md-12 col-md-offset-1">

                <div class="col-md-9 col-md-offset-0">
                    <a id="b1" ><i class="fa fa-angle-left custom" ></i> <b></b></a>
                </div>

                <div class="col-md-3 col-md-offset-0">
                    <a  id="b2" ><b></b> <i class="fa fa-angle-right custom" ></i></a>
                </div>
                <?php /* echo $_SESSION["ShowMonth"];  */?>
            </div>
        </div>

<script>

    $(document).ready(function(){
        var cdt = new Date();
        var current_year =cdt.getFullYear();
        var current_month = cdt.getMonth();
        var month = 1 ;



        $("#a").show();
        $("#b").hide();
        $("#c").hide();
        $("#d").hide();
        $("#e").hide();
        $("#f").hide();
        $("#g").hide();
        $("#h").hide();
        $("#i").hide();
        $("#j").hide();
        $("#k").hide();
        $("#l").hide();
        $("#b1").hide();

        var text="Februray";
        $('#b2').children().first().html(text);

        $("#b1").click(function(){

            if (month == 1) {

            }
            else if(month == 2){
                month = 1;

                $("#b1").hide();
                $("#a").show();
                $("#b").hide();

                //$('#b1').button();
                var text1="<b>Februray</b>";
                $('#b2').children().first().html(text1);

            }
            else if(month == 3){
                month = 2;

                $("#a").hide();
                $("#b").show();
                $("#c").hide();

                //$('#b1').button();
                var text2="<b>January</b>";
                $('#b1').children().first().html(text2);
                //$('#b1').button();
                var text3="<b>March</b>";
                $('#b2').children().first().html(text3);

            }
            else if(month == 4){
                month = 3;
                $("#b").hide();
                $("#c").show();
                $("#d").hide();

                //$('#b1').button();
                var text4="<b>February</b>";
                $('#b1').children().first().html(text4);
                //$('#b1').button();
                var text5="<b>April</b>";
                $('#b2').children().first().html(text5);
            }
            else if(month == 5){
                month = 4;
                $("#c").hide();
                $("#d").show();
                $("#e").hide();

                //$('#b1').button();
                var text6="<b>March</b>";
                $('#b1').children().first().html(text6);
                //$('#b1').button();
                var text7="<b>May</b>";
                $('#b2').children().first().html(text7);
            }
            else if(month == 6){
                month = 5;
                $("#d").hide();
                $("#e").show();
                $("#f").hide();

                //$('#b1').button();
                var text8="<b>April</b>";
                $('#b1').children().first().html(text8);
                //$('#b1').button();
                var text9="<b>June</b>";
                $('#b2').children().first().html(text9);
            }
            else if(month == 7){
                month = 6;
                $("#e").hide();
                $("#f").show();
                $("#g").hide();

                //$('#b1').button();
                var text10="<b>May</b>";
                $('#b1').children().first().html(text10);
                //$('#b1').button();
                var text11="<b>July</b>";
                $('#b2').children().first().html(text11);
            }
            else if(month == 8){
                month = 7;
                $("#f").hide();
                $("#g").show();
                $("#h").hide();

                //$('#b1').button();
                var text12="<b>June</b>";
                $('#b1').children().first().html(text12);
                //$('#b1').button();
                var text13="<b>August</b>";
                $('#b2').children().first().html(text13);
            }
            else if(month == 9){
                month = 8;
                $("#g").hide();
                $("#h").show();
                $("#i").hide();

                //$('#b1').button();
                var text14="<b>July</b>";
                $('#b1').children().first().html(text14);
                //$('#b1').button();
                var text15="<b>September</b>";
                $('#b2').children().first().html(text15);
            }
            else if(month == 10){
                month = 9;
                $("#h").hide();
                $("#i").show();
                $("#j").hide();

                //$('#b1').button();
                var text16="<b>August</b>";
                $('#b1').children().first().html(text16);
                //$('#b1').button();
                var text17="<b>October</b>";
                $('#b2').children().first().html(text17);
            }
            else if(month == 11){
                month = 10;
                $("#i").hide();
                $("#j").show();
                $("#k").hide();

                //$('#b1').button();
                var text18="<b>September</b>";
                $('#b1').children().first().html(text18);
                //$('#b1').button();
                var text19="<b>November</b>";
                $('#b2').children().first().html(text19);
            }
            else if(month == 12){
                month = 11;
                $("#b2").show();
                $("#j").hide();
                $("#k").show();
                $("#l").hide();

                //$('#b1').button();
                var text20="<b>October</b>";
                $('#b1').children().first().html(text20);
                //$('#b1').button();
                var text21="<b>December</b>";
                $('#b2').children().first().html(text21);
            }

        });
        $("#b2").click(function(){

            if (month == 1) {
                month = 2;
                $("#b1").show();
                $("#a").hide();
                $("#b").show();
                $("#c").hide();

                //$('#b1').button();
                var text22="<b>January</b>";
                $('#b1').children().first().html(text22);
                //$('#b1').button();
                var text23="<b>March</b>";
                $('#b2').children().first().html(text23);

            }
            else if(month == 2){
                month = 3;
                $("#b").hide();
                $("#c").show();
                $("#d").hide();

                //$('#b1').button();
                var text24="<b>February</b>";
                $('#b1').children().first().html(text24);
                //$('#b1').button();
                var text25="<b>April</b>";
                $('#b2').children().first().html(text25);

            }
            else if(month == 3){
                month = 4;

                $("#c").hide();
                $("#d").show();
                $("#e").hide();

                //$('#b1').button();
                var text26="<b>March</b>";
                $('#b1').children().first().html(text26);
                //$('#b1').button();
                var text27="<b>May</b>";
                $('#b2').children().first().html(text27);

            }
            else if(month == 4){
                month = 5;
                $("#d").hide();
                $("#e").show();
                $("#f").hide();

                //$('#b1').button();
                var text28="<b>April</b>";
                $('#b1').children().first().html(text28);
                //$('#b1').button();
                var text29="<b>June</b>";
                $('#b2').children().first().html(text29);

            }
            else if(month == 5){
                month = 6;
                $("#e").hide();
                $("#f").show();
                $("#g").hide();

                //$('#b1').button();
                var text30="<b>May</b>";
                $('#b1').children().first().html(text30);
                //$('#b1').button();
                var text31="<b>July</b>";
                $('#b2').children().first().html(text31);

            }
            else if(month == 6){
                month = 7;
                $("#f").hide();
                $("#g").show();
                $("#h").hide();

                //$('#b1').button();
                var text32="<b>June</b>";
                $('#b1').children().first().html(text32);
                //$('#b1').button();
                var text33="<b>August</b>";
                $('#b2').children().first().html(text33);
            }
            else if(month == 7){
                month = 8;
                $("#g").hide();
                $("#h").show();
                $("#i").hide();

                //$('#b1').button();
                var text="<b>July</b>";
                $('#b1').children().first().html(text);
                //$('#b1').button();
                var text="<b>September</b>";
                $('#b2').children().first().html(text);

            }
            else if(month == 8){
                month = 9;
                $("#h").hide();
                $("#i").show();
                $("#j").hide();

                //$('#b1').button();
                var text="<b>August</b>";
                $('#b1').children().first().html(text);
                //$('#b1').button();
                var text="<b>October</b>";
                $('#b2').children().first().html(text);

            }
            else if(month == 9){
                month = 10;
                $("#i").hide();
                $("#j").show();
                $("#k").hide();

                //$('#b1').button();
                var text="<b>September</b>";
                $('#b1').children().first().html(text);
                //$('#b1').button();
                var text="<b>November</b>";
                $('#b2').children().first().html(text);

            }
            else if(month == 10){
                month = 11;
                $("#j").hide();
                $("#k").show();
                $("#l").hide();

                //$('#b1').button();
                var text="<b>October</b>";
                $('#b1').children().first().html(text);
                //$('#b1').button();
                var text="<b>December</b>";
                $('#b2').children().first().html(text);

            }
            else if(month == 11){
                month = 12;
                $("#k").hide();
                $("#l").show();
                $("#b2").hide();

                //$('#b1').button();
                var text="<b>November</b>";
                $('#b1').children().first().html(text);
                //$('#b1').button();

            }
            else if(month == 12){

            }

        });

    });

</script>
