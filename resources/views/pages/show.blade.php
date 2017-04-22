
@extends('layouts.app')

@section('content')
    @if (Auth::guest())

        <script>window.location.href = '{{route("login")}}';</script>

    @endif


    <div class="container">
        <div class="row">
            <div class="col-md-2 ">
                {!! Html::linkRoute('pages.index', '< BACK', array(), array('class' => 'btn btn-success ')) !!}

            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Time</div>
                      <div class="panel-body">
                          <b>Punch In:</b> &ensp;&ensp;&ensp;{{ $record->punch_in }}<br>
                          <b>Punch Out:</b>&ensp;&ensp;{{ $record->punch_out }}<br>
                          <b>Duration:</b> &ensp;&ensp;&ensp;{{ $record->duration }}<br><br><br>

                        <div class="container">

                        </div>

                      </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
