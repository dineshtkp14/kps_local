@extends('layouts.master')

@section('content')
    <div class="container-fluid">


        @php
            function covertintodec($x, $z = 2)
            {
                return number_format((float) $x, $z, '.', '');
            }
            
        @endphp


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

                        <li class="nav-item">
                            <a class="nav-link active text-warning btn btn-success dashnavbtnitems mx-2" aria-current="page"
                                href="/sales">View Sales</a>
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


        <div class="container">
            <a href="/stocks"><button class="btn btn-success  rounded mt-5">
                    <-Back</button></a>
                    
            <span class="my-5">

            <CENTer><h3>SELL ITEMS </h3></CENTer>
                </span>
            <span class="text-success float-end">Total No of Stocks: <span class="h4 text-primary">{{$itm->quantity}}</span></span>




        </div>




        <div class="container mt-5 ">
            @if (Session::has('success'))
                <div class="alert alert-success w-50">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>




        <div class="container mt-2  w-75">
            <form class="row g-3" action="{{ route('sales.store') }}" method="post">
                @csrf


                <div class="col-md-12">
                    <!-- <label for="inputEmail4" class="form-label">Items ID</label> -->
                    <input type="hidden" class="form-control @error('items_id') is-invalid @enderror" id=""
                        name="items_id" value="{{ old('items_id', $itm->id) }}">
                    @error('dn')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror

                </div>



                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Items</label>
                    <input type="text" class="form-control @error('items') is-invalid @enderror" id=""
                        name="items" value="{{ old('items', $itm->items) }}" style="pointer-events:none;">
                    @error('dn')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror

                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Quantity</label>
                    <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="inputPassword4"
                        name="quantity" value="{{ old('quantity') }}">
                    @error('quantity')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputAddress" class="form-label">Rate</label>
                    <input type="text" class="form-control @error('rate') is-invalid @enderror" id="inputAddress"
                        name="rate" placeholder="" value="{{ old('rate', covertintodec($itm->mrp)) }}">
                    @error('rate')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Discount in Percent</label>
                    <input type="text" class="form-control @error('discount') is-invalid @enderror" id=""
                        name="discount" value="{{ old('discount') }}">
                    @error('discount')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>




                <div class="d-grid gap-2 pt-2 pb-4">
                    <button type="submit" class="btn btn-lg btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@stop
