@extends('layouts.app1')

@section('content')
    @if (Auth::guest())

        <script>window.location.href = '{{route("login")}}';</script>

    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

          {!! $chart->render() !!}

            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <div class="col-md-10 col-md-offset-0">
                        <button   id="1" > <b>&lArr;</b> </button>
                    </div>

                    <div class="col-md-2 col-md-offset-0">
                        <a   id="2" > <b>&rArr;</b> </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection