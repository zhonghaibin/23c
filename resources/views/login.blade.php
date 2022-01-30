<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=no,
    width=device-width,initial-scale=1.0" />
    <meta property="lang" content="en"/>
    <link href="{{ asset('assets/css/app.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/bootstrap.css')}}"  rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/icons.min.css')}}"  rel="stylesheet" type="text/css"/>
</head>
<body style="padding: 0px">
<div class="min-h-screen flex flex-col  items-center default-bg">
    <div class="login-box">
        <!-- 登录表单 -->
        <form method="POST"  action="{{ route('authenticate') }}" id="loginForm">
            @csrf
            <div class="form-group" style="text-align: center;">
                <input type="text" class="form-control" id="user_id"
                       style="display:inline;width:200px;" autocomplete="off" name="user_id"
                       placeholder="User-Id"/>
                <div>
                    @error('user_id_msg')
                    <strong style="color: red">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="form-group" style="text-align: center;">
                <input type="password" class="form-control" id="password"
                       style="display:inline;width:200px;" autocomplete="off" name="password"
                       placeholder="Password"/>
                <div>
                    @error('password_msg')
                    <strong style="color: red">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="form-group" style="text-align: center">
                <button type="submit" class="login-bt_yellow btn" STYLE="color: #1a1e24" onclick="lsRememberMe()" value="Login">LOGIN</button>
            </div>
        </form>
    </div>

</div>

</body>
</html>
<script src="{{ asset('assets/js/jquery/jquery-1.11.1.min.js')}}" ></script>
<script src="{{ asset('assets/js/vendor.min.js')}}" ></script>
<script src="{{ asset('assets/js/app.min.js')}}" ></script>
<script>
    function lsRememberMe() {
        $('#loginForm').submit();
    }
</script>
