@extends('user_master')
@section('user_content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Edit Profile</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">

                    <h2>Edit Profile</h2>
                    @if (Session::has('userEdit_status'))
                    <div class="alert alert-success" style="text-align: center">{{ Session::get('userEdit_status') }}</div>
                    @endif
                    @if (count($errors) > 0)
                    <div class="alert alert-danger" style="text-align: center">
                        @foreach ($errors->all() as $err)
                        {{ $err }}
                        <br>
                        @endforeach
                    </div>
                    @endif
                    @if(Auth::check())
                    <form action="{{route('userEdit',Auth::user()->id_user)}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="group-input">
                            <label for="username">Username</label>
                            <input class="form-control" value="{{Auth::user()->user_name}}" name="name" required="true">
                        </div>
                        <div class="group-input">
                            <label for="username">Email address</label>
                            <input readonly type="email" value="{{Auth::user()->email}}" class="form-control"
                                name="email" required="true">
                        </div>
                        <div class="group-input">
                            <label for="con-pass">Address</label>
                            <input id="con-pass" value="{{Auth::user()->address}}" name="address" required="true">
                        </div>
                        <div class="group-input">
                            <label for="con-pass">Phone</label>
                            <input id="con-pass" value="{{Auth::user()->phone}}" name="phone" required="true">
                        </div>
                        <div class="group-input">
                            <label for="con-pass">Gender</label>
                        </div>
                        <label class="lbsRadio">
                            <input type="radio" name="rd_gioitinh" value="male" @if(Auth::user()->gender=='male')
                            checked @endif> Male</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="lbsRadio">
                            <input type="radio" name="rd_gioitinh" value="female" @if(Auth::user()->gender=='female')
                            checked @endif> Female</label>
                        <button type="submit" class="site-btn register-btn">EDIT</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

@endsection