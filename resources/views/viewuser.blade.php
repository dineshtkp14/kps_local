@extends('layouts.master')

@section('content')
    @if (Auth::user()->email != 'kadayat.pharmacy@gmail.com')
        <script>
            window.location = "/dashboard";
        </script>
    @endif

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
                                href="/dashboard">Dashboard</a>
                        </li>



                    </ul>
                    <div class="d-flex">
                        <a class="nav-link active" aria-current="page" href="#"><span class="pe-2 text-white">
                                Welcome {{ Auth::user()->name }}</span>
                            @if (Auth::user()->email == 'kadayat.pharmacy@gmail.com')
                                <img src="{{ asset('assets/img/naresh.png') }}" alt="" style="width:50px;"
                                    class="rounded-circle">
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



        <div class="container mt-5 ">
            @if (Session::has('success'))
                <div class="alert alert-success w-50">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>





        <div class="container">



            <div class="row justify-content-between">
                <div class="col-3 mt-3   ">
                    <h4>VIEW USERS</h4>
                </div>
                <div class="col-3 m-2  ">
                    <input class="form-control  border-warning" id="filterInput" type="text" placeholder="Search Here">
                </div>

            </div>


            <div class="tablebox">
                <table class="table table-responsive table-striped table-hover" id="example">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col"> User ID</th>


                            <th scope="col"> NAME</th>


                            <th scope="col">EMAIL</th>


                            <th scope="col">ACTION</th>


                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($itm as $i)
                            <tr>

                                <td>
                                    <div class="td-box">
                                        <p>
                                            {{ $i->id }}
                                        </p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td-box">
                                        <p>
                                            {{ $i->name }}
                                        </p>
                                    </div>
                                </td>

                                <td>
                                    <div class="td-box">
                                        <p>
                                            {{ $i->email }}

                                        </p>
                                    </div>
                                </td>
                                <td>
                                    @if (Auth::user()->email == 'kadayat.pharmacy@gmail.com')
                                        <a href="#" onclick="delfunction({{ $i->id }})" class="btn btn-danger"
                                            rel="noopener noreferrer">Delete</a>
                                        <form id="eea{{ $i->id }}" action="{{ route('users.destroy', $i->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')

                                        </form>
                                    @endif


                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
