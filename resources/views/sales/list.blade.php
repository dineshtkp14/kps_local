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
                                href="/dashboard">Dashboard</a>
                        </li>



                    </ul>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-warning btn btn-success dashnavbtnitems mx-2" aria-current="page"
                                href="/items">View Items</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-warning btn btn-success dashnavbtnitems mx-2" aria-current="page"
                                href="/items/create">Add Items</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-warning btn btn-success dashnavbtnitems mx-2" aria-current="page"
                                href="/stocks">View Stocks</a>
                        </li>

                       
   
                   
                    </ul
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
                    <h4>VIEW SALES DETAILS</h4>
                </div>
                <div class="col-3 m-2  ">
                    <input class="form-control  border-warning" id="filterInput" type="text" placeholder="Search Here">
                </div>

            </div>
            <table class="table table-responsive table-striped table-hover rounded-2">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Items ID</th>
                        <th scope="col">Items</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Rate</th>
                        <th scope="col">Amount</th>

                        <th scope="col">Discount</th>

                        <th scope="col">Total Amount</th>

                        <th scope="col">Date</th>

                    </tr>
                </thead>
                <tbody>
                    @if ($itm->isNotEmpty())
                        @foreach ($itm as $i)
                            <tr>

                                <td>{{ $i->id }}</td>
                                <td>{{ $i->items_id }}</td>
                                <td>{{ $i->items }}</td>
                                <td>{{ $i->quantity }}</td>
                                <td>{{ $i->rate }}</td>
                                <td>{{ $i->amount }}</td>
                                <td>{{ $i->discount }}</td>
                                <td>{{ $i->total_amt }}</td>
                                <td>{{ $i->created_at }}</td>



                            </tr>
                        @endforeach
                    @else
                        <tr>

                            <th>
                                <h5>Record not found in our database</h5>
                            </th>
                        </tr>



                    @endif

                </tbody>
            </table>
        </div>
    </div>
@stop
