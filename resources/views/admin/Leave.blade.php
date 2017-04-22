
@extends('layouts.app1')

@section('content')
    @if (Auth::guest())

        <script>window.location.href = '{{route("login")}}';</script>

    @endif

        <br><br>
    <div class="row">
        <div class="col-md-12 col-md-offset-4">
            {{--{!! Form::open(['route' => 'leave']) !!}--}}
        {!!   Form::open(array('route' => array('leaves.store'), 'method' => 'post')) !!}
        <div class="col-md-3">
            <b>Date:</b> <input type="date" name="date" class="form-control input-lg">
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
