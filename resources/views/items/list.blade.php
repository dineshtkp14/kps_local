@extends('layouts.master')

@section('content')
    <div class="container-fluid m-0 p-0">

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
                                href="{{ url('items/create') }}">Add Items</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-warning btn btn-success dashnavbtnitems mx-2" aria-current="page"
                                href="/stocks">View Stocks</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active text-warning btn btn-success dashnavbtnitems mx-2" aria-current="page"
                                href="/sales">View Sales</a>
                        </li>


                    </ul <div class="d-flex">
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

        <CENTer>
            <h2 class="my-5"> </h2>
        </CENTer>
    </div>

    <div class="listcont">
        <div class="row">
            <div class="col-3">
                <p class="text-success">Total Number of Stock Items: <span
                        class="h4 text-primary">{{ $cou }}</span></p>
            </div>
            <div class="col-3">
                <p class="text-success">Total out Of Stock Items: <span class="h4 text-primary">{{ $x }}</span>
                </p>
            </div>

            <div class="col-3">
                <p class="text-success">Total Warning Items: <span class="h4 text-primary">{{ $war }}</span></p>
            </div>
        </div>
        <div class="row ">
            <div class="col-3 mt-3   ">
                <h4>ITEMS DETAILS</h4>
            </div>

            <div class="col-3 mt-3   ">
            </div>
            <div class="col-2 mt-3   ">
            </div>

            <div class="col-3 m-2 ">
                <div class=" align-self-end">
                    <input class="form-control  border-warning border-2" id="filterInput" type="text"
                        placeholder="Search Here">
                </div>
            </div>

        </div>
        <table class="table table-responsive table-striped table-hover rounded-2">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Distributer Name</th>
                    <th scope="col">Bill No</th>
                    <th scope="col">Batch</th>
                    <th scope="col">Date</th>
                    <th scope="col">Items</th>
                    <th scope="col">Expiry Date</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Cost Rate</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">MRP</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($itm->isNotEmpty())
                    @foreach ($itm as $i)
                        <tr>

                            <td>
                                <div class="td-box">
                                    {{ $i->id }}
                            </td>
    </div>
    <td>
        <div class="td-box">{{ $i->distributer_name }}</div>
    </td>
    <td>
        <div class="td-box">{{ $i->billno }}</div>
    </td>
    <td>
        <div class="td-box">{{ $i->batch }}</div>
    </td>
    <td>
        <div class="td-box">{{ $i->updated_at }}</div>
    </td>
    <td>
        <div class="td-box">{{ $i->items }}</div>
    </td>
    <td>
        <div class="td-box">{{ $i->expiry_date }}</div>
    </td>
    <td>
        <div class="td-box">{{ $i->quantity }}</div>
    </td>
    <td>
        <div class="td-box">{{ $i->rate }}</div>
    </td>
    <td>
        <div class="td-box">{{ $i->total_amt }}</div>
    </td>
    <td>
        <div class="td-box">{{ $i->mrp }}</div>
    </td>
    <td>
        @if (Auth::user()->email == 'kadayat.pharmacy@gmail.com')
            <a href="{{ Route('items.edit', $i->id) }}" class="btn " rel="noopener noreferrer"
                style="background:#389AF5;color:white;">EDIT</a>


            <a href="#" onclick="delfunctionusers({{ $i->id }})" class="btn btn-danger"
                rel="noopener noreferrer">Delete</a>
            <form id="eea{{ $i->id }}" action="{{ route('items.destroy', $i->id) }}" method="post">
                @csrf
                @method('delete')

            </form>
        @endif


    </td>

    </tr>
    @endforeach
@else
    <tr>

        <th>
            <h4>Record not found in our database</h4>
        </th>
    </tr>



    @endif



    </tbody>
    </table>
    </div>
    </div>
@stop
