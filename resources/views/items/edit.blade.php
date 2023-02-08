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
            <a href="/items"><button class="btn btn-success  rounded mt-5"> <-Back</button></a>
                    
            <CENTer> <span class="my-5">
                    <h3>EDIT ITEMS DETAILS</h3>
                </span></CENTer>
        </div>




        <div class="container mt-2">



            <form class="row g-3" action="{{ route('items.update', $itm->id) }}" method="post">
                @csrf
                @method('put')
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Distributer Name</label>
                    <input type="text" class="form-control @error('dn') is-invalid @enderror" id=""
                        name="dn" value="{{ old('dn', $itm->distributer_name) }}">
                    @error('dn')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror

                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Bill No</label>
                    <input type="text" class="form-control @error('billno') is-invalid @enderror" id="inputPassword4"
                        name="billno" value="{{ old('billno', $itm->billno) }}">
                    @error('billno')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputAddress" class="form-label">Batch</label>
                    <input type="text" class="form-control @error('batch') is-invalid @enderror" id="inputAddress"
                        name="batch" placeholder="" value="{{ old('batch', $itm->batch) }}">
                    @error('batch')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Items</label>
                    <input type="text" class="form-control @error('items') is-invalid @enderror" id=""
                        name="items" value="{{ old('items', $itm->items) }}">
                    @error('items')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="inputZip" class="form-label">Expiry Date</label>
                    <input type="text" class="form-control @error('expdate') is-invalid @enderror" id="inputZip"
                        name="expdate" value="{{ old('expdate', $itm->expiry_date) }}">
                    @error('expdate')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label for="inputZip" class="form-label">Quantity</label>
                    <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="inputZip"
                        name="quantity" value="{{ old('quantity', $itm->quantity) }}">
                    @error('quantity')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputZip" class="form-label">Rate</label>
                    <input type="text" class="form-control @error('rate') is-invalid @enderror" id="inputZip"
                        name="rate" value="{{ old('rate', $itm->rate) }}">
                    @error('rate')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="inputZip" class="form-label">MRP</label>
                    <input type="text" class="form-control @error('mrp') is-invalid @enderror" id="inputZip"
                        name="mrp" value="{{ old('mrp', $itm->mrp) }}">
                    @error('mrp')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>



                <div class="d-grid gap-2 pt-2 pb-4">
                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@stop
