
@extends('layouts.app1')

@section('content')
    @if (Auth::guest())

        <script>window.location.href = '{{route("login")}}';</script>

    @endif


    <div class="row">
        <div class="col-md-12 col-md-offset-4">
        {!! Form::model($record, ['route' => ['user.update', $record->id], 'method'=>'PUT']) !!}
        <div class="col-md-3">
            {{ Form::label('punch_in', 'Punch In:') }}
            {{ Form::time('punch_in', null, ["class" => 'form-control input-lg']) }}
            <br>
            {{ Form::label('punch_out', "Punch Out:", ['class' => 'form-spacing-top']) }}
            {{ Form::time('punch_out', null, ['class' => 'form-control input-lg']) }}
            <br>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('user.index', 'Cancel', array($record->id), array('class' => 'btn btn-danger btn-block')) !!}
                </div>
                <div class="col-sm-6">
                    {{ Form::submit('Save Changes',['class'=>'btn btn-success btn-block']) }}
                </div>
            </div>
        </div>

        {!! Form::close() !!}
        </div>
    </div>

@endsection


