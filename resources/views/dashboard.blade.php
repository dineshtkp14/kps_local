@extends('layouts.master')

@section('content')
    <div class="container-fluid">


        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-warning" href="/dashboard">KPS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-warning " aria-current="page" href="">Kadayat pharmacy
                                store</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-warning btn btn-success dashnavbtn mx-3" aria-current="page"
                                href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>



                    </ul>
                    <div class="d-flex">
                        <a class="nav-link active" aria-current="page" href="#"><span class="pe-2 text-white">
                                Welcome {{ Auth::user()->name }}</span>
                            @if (Auth::user()->email == 'Kadayat.pharmacy@gmail.com')
                                <img src="{{ asset('assets/img/naresh.png') }}" alt="" style="width:50px; "
                                    class="rounded-circle bg-light">
                        </a>
                    @else
                        <img src="{{ asset('assets/img/noimg.png') }}" alt="" style="width:50px;"
                            class="rounded-circle"></a>
                        @endif
                        <a href="{{ route('signout') }}"><button
                                class="btn btn-outline-light btn-primary navlogoutbtn">Logout</button></a>
                    </div>
                </div>
            </div>
        </nav>










        <div class="container">


            <h2 class="mt-5">
                <center>Dashboard </center>
            </h2>


            <div class="row g-5">


                <div class="col-12 col-md-6 col-lg-4 ">
                    <a href="{{ Route('items.create') }}">
                        <div class="card text-center dashcard" style="padding:50px;">
                            <div class="card-body">
                                <h5 class="card-title">Add Items</h5>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ Route('items.index') }}">
                        <div class="card text-center dashcard" style="padding:50px;">
                            <div class="card-body">
                                <h5 class="card-title">View Items</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ Route('stocks.index') }}">
                        <div class="card text-center dashcard" style="padding:50px;">
                            <div class="card-body">
                                <h5 class="card-title">View Stock</h5>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ Route('sales.index') }}">
                        <div class="card text-center dashcard" style="padding:50px;">
                            <div class="card-body">
                                <h5 class="card-title">View Sales Items</h5>
                            </div>
                        </div>
                    </a>
                </div>




                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ Route('change-password') }}">
                        <div class="card text-center dashcard" style="padding:50px;">
                            <div class="card-body">
                                <h5 class="card-title">Change Password</h5>
                            </div>
                        </div>
                    </a>
                </div>

                @if (Auth::user()->email == 'kadayat.pharmacy@gmail.com')
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="/viewuser" rel="noopener noreferrer">
                            <div class="card text-center dashcard" style="padding:50px;">
                                <div class="card-body">
                                    <h5 class="card-title">View Users</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif



            </div>




        </div>


    </div>

@stop
