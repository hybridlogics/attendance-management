
@extends('layouts.app')

@section('content')
@if (Auth::guest())

    <script>window.location.href = '{{route("login")}}';</script>

@endif

@include('partials.view Table_partial')

<div class="row">
    <div class="col-md-10 col-md-offset-1">

            @include('partials.monthchart')

    </div>
</div>
    <br><br>

@endsection
