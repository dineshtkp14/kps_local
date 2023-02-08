<!DOCTYPE html>
<html lang="en">

<head>
    <title>KPS | Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('assets/js/apps.js') }}"></script>
</head>

<body>
    @if (Auth::user())
        <script>
            window.location = "/dashboard";
        </script>
    @endif



    <div class="container-fluid m-0 p-0">


        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-warning" href="{{ url('') }}">KPS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-warning" aria-current="page"
                                href="{{ url('') }}">Kadayat Pharmacy
                                Store</a>
                        </li>



                    </ul>
                    <div class="d-flex">
                        <a class="nav-link active" aria-current="page" href="#"><span class="pe-2 text-white">
                            </span>

                            <a href="{{ url('login') }}"><button
                                    class="btn btn-outline-light btn-primary regnavbtn">User
                                    Login</button></a>
                    </div>
                </div>
            </div>
        </nav>





        <main class="signup-form  " style="margin-top:6%;>
    <div class="cotainer">
            <div class="row justify-content-center m-0 p-0">
                <div class="col-md-5">
                    <div class="card">
                        <h3 class="card-header text-center">Register User</h3>
                        <div class="card-body">
                            <form action="{{ route('postsignup') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Name" id="name" class="form-control"
                                        name="name" autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email_address" class="form-control"
                                        name="email" autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                        name="password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="remember"> Remember Me</label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>




    <div class="container">

        <footer class=" p-4  bg-dark text-white ">
            <div class="d-lg-flex justify-content-between ">
                <div>
                    <span><img src="{{ asset('assets/img/logop.png') }}" alt="" class="footerlogo"></span>
                </div>
                <div class="copyright">
                    <p>Developed and Designed by <a href="www.facebook.com/tkp.dinesh" target="_blank"
                            class="text-info">Dinesh Bajgain</a></p>
                </div>
                <div>
                    <ul class="d-flex gap-3 list-unstyled">
                        <li><a href="https://www.facebook.com/tkp.dinesh" target="blank"><img class="footericons"
                                    src="{{ asset('assets/img/facebook.png') }}" alt=""></a></li>
                        <li><a href="https://www.instagram.com/dinesh_bajgain/" target="blank"><img class="footericons"
                                    src="{{ asset('assets/img/instagram.png') }}" alt=""></a></li>
                        <li><a href="https://www.linkedin.com/in/dinesh-bajgain-017841121/" target="blank"><img
                                    class="footericons" src="{{ asset('assets/img/linkedin.png') }}"
                                    alt=""></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

    </div>
</body>

</html>
