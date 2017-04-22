
@extends('layouts.app1')

@section('content')
    @if (Auth::guest())
        <script>window.location.href = '{{route("login")}}';</script>
    @endif

    @include('partials.adminviewTable_partial')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-6">

                {!! $chart->render() !!}

            </div>
            <div class="col-md-6">

                @include('partials.monthchart')

            </div>

        </div>
    </div>
</div>

<br><br>

  {{--  <div id="100">
        @include('partials.monthchart')
    </div>--}}






{{--<script>
    $('button').click(function addseries(e){
            $.ajax({
                type:'get',
                url:'user.create',
                data: {id:id

                },error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }
        function getMessage(){
            $.ajax({
                type:'get',
                url:"{{url('user.create')}}",
                data: {

                }
            });
        }
</script>--}}




    @endsection

