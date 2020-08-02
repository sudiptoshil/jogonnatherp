<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Login</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
<link href="{{asset('/')}}assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="{{asset('/')}}assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="{{asset('/')}}assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="{{asset('/')}}css/style.css" rel="stylesheet" />
   <link href="{{asset('/')}}css/style-responsive.css" rel="stylesheet" />
   <link href="{{asset('/')}}css/style-default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="lock">
    <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="">
            <img class="center" alt="logo" src="{{asset('/')}}img/logo.png">
        </a>
        <!-- END LOGO -->
    </div>
    <h3 align="center" style="color:red">{{Session::get('message')}}</h3>

    <div class="login-wrap">
        <div class="metro single-size red">
            <div class="locked">
                <i class="icon-lock"></i>
                <span>Login</span>
            </div>
        </div>
        <div class="metro double-size green">
        <form action="{{route('admin-login-process')}}" method="post">
            @csrf
                <div class="input-append lock-input">
                    <input type="text" name="email" class="" placeholder="email">
                </div>
           
        </div>
        <div class="metro double-size yellow">
            
                <div class="input-append lock-input">
                    <input type="password" name="password" class="" placeholder="Password">
                </div>
            
        </div>
        <div class="metro single-size terques login">
            
                <button type="submit" class="btn login-btn">
                    Login
                    <i class=" icon-long-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</body>
<!-- END BODY -->
</html>