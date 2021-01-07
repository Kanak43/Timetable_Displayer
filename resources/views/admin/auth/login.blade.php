<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Styles -->
        @include('partials.styles')
        @yield('styles')

        <title>Student Sign In | Timetable</title>
    </head>


    <body class="studentlogin-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4 col-sm-8 col-lg-4 col-md-offset-4 col-sm-offset-2 col-lg-offset-4">
                    <div id="login-form-container">
                        <div class="login-form-header">
                            <h3 class="text-center">Student Login</h3>
                        </div>

                        <div class="login-form-body  ">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                     <form method="POST" action="{{ route('admin.login') }}">
                                        {!! csrf_field() !!}
                                        @include('errors.form_errors')

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="Email" name="email">
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="submit" value="SIGN IN" class="btn btn-lg btn-block btn-custom">
                                        </div>
                                        <div class="form-group">
                                            <!-- <input type="signup" name="signup" value="SIGN UP" class="btn btn-lg btn-block btn-custom"> -->
                                            <button class="btn btn-lg btn-block btn-custom"><a href="{{url('/student/register')}}" >Sign Up</a></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scripts -->
        @include('partials.scripts')
        @yield('scripts')
    </body>
</html>
