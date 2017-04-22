<?php


if(!isset($_SESSION['dd'])){

        $_SESSION["dd"] = 1;

}

?>


@extends('layouts.app1')

@section('content')
    @if (Auth::guest())

        <script>window.location.href = '{{route("login")}}';</script>

    @endif

<script>

    function mouseoverPass() {
        var obj = document.getElementById('myPassword');
        obj.type = "text";
    }
    function mouseoutPass() {
        var obj = document.getElementById('myPassword');
        obj.type = "password";
    }


</script>


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-bordered" >
                    <tr>
                        <th align='center' colspan="50px">

                            <div class="row">
                                <div class=" col-md-offset-4">

                                    <h2>Admin View</h2>

                                </div>
                            </div>

                        </th>
                    </tr>
                    {{--<tr>
                        <th align='center' colspan="50px">

                            <div class="row">
                                <div class=" col-md-offset-5">

                            <h3>EMPLOYEES</h3>

                                </div>
                            </div>

                        </th>
                    </tr>--}}
                    <tr align='center'>
                        <th> Sr </th>
                        <th> Name </th>
                        <th> Email </th>
                        <th> Role </th>
                        {{--<th> Password </th>--}}
                        <th> Operations </th>


                    </tr>
                    <tr align='center'>
                    @foreach ($users as $user)

                        <?php $myid = $user->id; ?>
                        <tr>
                            <th>{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <?php
                                    if($user->admin == null || $user->admin == 0){

                                        echo 'Employee';
                                    }elseif($user->admin == 1){

                                        echo 'Admin';
                                    }
                                ?>
                            </td>
                            {{--<td>{{ $user->password }}</td>--}}
                            <td>
                                <button style="font-size:15px" onclick="window.location.href = '{{route("admin.show",$user->id )}}';"><i class="fa fa-search"></i></button>

                                <button style="font-size:15px" onclick="window.location.href = '{{route("pages.edit",$user->id )}}';"><i class="fa fa-trash" ></i></button>

                                <button style="font-size:15px" onclick="window.location.href = '{{route("admin.edit",$user->id )}}';"><i class="fa fa-pencil-square"></i></button>
                            </td>
                        </tr>

                     @endforeach

                    </tr>

                </table>
            </div>
        </div>
    </div>

<?php
if($_SESSION["dd"] == 2){
$_SESSION["dd"] = 1;
echo $_SESSION["dd"];
?>
    <script>
    $(document).ready(function(){
        $("#myModal").modal("show");
    } );
    </script>

    <?php
    }
    ?>

  <?php
  if($_SESSION["dd"] == 3){
  $_SESSION["dd"] = 1;
  echo $_SESSION["dd"];
  ?>
    <script>
        $(document).ready(function(){
            $("#myModal1").modal("show");
        } );
    </script>

    <?php
    }
    ?>




    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {!! Form::model($users11, ['route' => ['admin.update', $users11->id], 'method'=>'PUT']) !!}
                        <div class="col-md-8 col-md-offset-2">
                            {{ Form::label('name', 'Name:') }}
                            {{ Form::text('name', null, ["class" => 'form-control input-lg']) }}
                            <br>
                            {{ Form::label('email', "Email:", ['class' => 'form-spacing-top']) }}
                            {{ Form::text('email', null, ['class' => 'form-control input-lg']) }}
                            <br>

                            {{ Form::label('password', "Password:", ['class' => 'form-spacing-top']) }}

                            <div class="row">
                                <div class="col-sm-10">
                            {{--{{ Form::password('password1',  ['class' => 'form-control input-lg']) }}--}}
                                    <input type="password" name="password1" id="myPassword" class="form-control input-lg" />
                                </div>
                                <div class="col-sm-1">
                                    <button style="font-size:15px" onmouseover="mouseoverPass();" onmouseout="mouseoutPass();"><i class="fa fa-eye"></i></button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    {!! Html::linkRoute('admin.index', 'Cancel', array($users11->id), array('class' => 'btn btn-danger btn-block')) !!}
                                </div>
                                <div class="col-sm-6">
                                    {{ Form::submit('Save Changes',['class'=>'btn btn-success btn-block']) }}
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal1 -->

    <div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirm</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">

                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    {!! Html::linkRoute('admin.index', 'Cancel', array($users11->id), array('class' => 'btn btn-danger btn-block')) !!}
                                </div>
                                <div class="col-sm-6">
                                    {{ Form::open(array('route' => array('admin.destroy', $user->id), 'method' => 'delete')) }}
                                    <button type="submit" class="btn btn-success btn-block">Delete</button>

                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
