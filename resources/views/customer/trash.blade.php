@extends('layout.app')

@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <h3>Customers</h3>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                    <div class="col-md-2">
                        <a href="{{ route("customer.index") }}" class="btn" style="background-color: #4643d3; color: white;"><i class="fas fa-chevron-left"></i> Back</a>
                    </div>
                    <div class="col-md-7">
                        <form action="{{ route("customer.index") }}" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" value="{{ request()->search }}" name="search" class="form-control" placeholder="Search anything..." aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">

                        <div class="input-group mb-3">
                            <form action="{{ route("customer.index") }}" method="GET" id="orderForm">
                                <select onchange="$('#orderForm').submit()" class="form-select" name="order">
                                    <option @selected(request()->order == "DESC") value="DESC">Newest to Oldest</option>
                                    <option @selected(request()->order == "ASC") value="ASC">Oldest to Newest</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    </div>
                      
                </div>
                <div class="card-body">
                    <table class="table table-bordered" style="border: 1px solid #dddddd">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">BAN</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $k => $d)
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $d->firstName }}</td>
                                <td>{{ $d->lastName }}</td>
                                <td>{{ $d->phone }}</td>
                                <td>{{ $d->email }}</td>
                                <td>{{ $d->bank }}</td>
                            <td>
                                <a href="{{ route("customer.restore", $d->id) }}" style="color: #2c2c2c;" class="ms-1 me-1"><i class="fas fa-redo"></i></a>
                        
                                <form class="d-inline" action="{{ route("customer.forceDestroy",$d->id) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" style="color: #2c2c2c;border: none;" class="bg-white mx-1"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                            @endforeach                        
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection
