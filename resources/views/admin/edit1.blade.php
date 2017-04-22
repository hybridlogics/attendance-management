
@extends('layouts.app1')

@section('content')
    @if (Auth::guest())

        <script>window.location.href = '{{route("login")}}';</script>

    @endif

        <br><br>
    <div class="row">
        <div class="col-md-12 col-md-offset-4">
        {!!   Form::open(array('route' => array('user.store'), 'method' => 'POST')) !!}
        <div class="col-md-3">
            <b>Date:</b> <input type="date" name="date" class="form-control input-lg">
            <br>
            <b>Punch In:</b> <input type="time" name="punch_in" class="form-control input-lg">
            <br>
            <b>Punch Out:</b> <input type="time" name="punch_out" class="form-control input-lg">
            <br><br>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('user.index', 'Cancel', array(), array('class' => 'btn btn-danger btn-block')) !!}
                </div>
                <div class="col-sm-6">
                    {{ Form::submit('Save Changes',['class'=>'btn btn-success btn-block']) }}
                </div>
            </div>
        </div>

        {!!   Form::close() !!}
        </div>
    </div>

@endsection
