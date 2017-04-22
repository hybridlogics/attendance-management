
@extends('layouts.app1')

@section('content')
    @if (Auth::guest())

        <script>window.location.href = '{{route("login")}}';</script>

    @endif
<?php
session_start();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-2 ">
    {!! Html::linkRoute('user.index', '< BACK', array(), array('class' => 'btn btn-success ')) !!}

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


                            {!! Form::open(['route' => ['user.destroy', $record->id],'method' => 'DELETE']) !!}
                            <div class="row">
                                <div class="col-sm-2">
                                    {!! Html::linkRoute('user.edit', 'Edit', array($record->id), array('class' => 'btn btn-success btn-block')) !!}
                                </div>
                                <div class="col-sm-2">


                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                                    {!! Form::close() !!}
                                </div>
                            </div>

                        </div>
                          <script>
                              function myFunction() {
                                  window.location.href = '{{route("user.edit", $record->id)}}';
                              }
                              function myFunction1() {
                                  window.location.href = '{{route("user.destroy", $record->id)}}';



                              }
                          </script>
                      </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
