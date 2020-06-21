@extends('layouts.app')

@section('content')
<div class="container">
    <!-- email modal -->
      <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <p>we just send you an email verification code to your email please verify !!</p>
                <input type="text" class="form-control ent_vercode" value="" name="ver-code" placeholder="Verification code"/></br>
                <input type="submit" class="btn btn-success btn-block ver_check" value="submit">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            
            </div>
        </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <!-- check user status with email verification -->
                
                @if(Auth::user()->user_status =='0')         
                    <div class="card-body">
                       <p> To complete your registration please verify your email first </p>

                        <input type="text" class="form-control" name="user_mail" value="{{Auth::user()->email}}" disabled/><br>
                        <button class="btn btn-primary verify_mail"  data-toggle="modal" data-target="#myModal">Verify</button>
                    </div>        
                @else
                    <div class="card-body">
                        @if (session('status'))
                        
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                       Registartion is completed and You are logged in! 
                    </div>      
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
