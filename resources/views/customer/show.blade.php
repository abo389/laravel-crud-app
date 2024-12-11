@extends('layout.app')

@section('content')
        <div class="row py-5 px-4">
        <div class="col-md-5 mx-auto"> <!-- Profile widget -->
            <a href="{{ route("customer.index") }}" class="btn mb-3" style="background-color: #4643d3; color: white;"><i class="fas fa-chevron-left"></i> Back</a>
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="bg-black px-4 pt-0 pb-4 cover">
                    <div class="media align-items-end profile-head d-flex">
                        <div class="profile mr-3">
                            <img
                                src="{{ asset("/images/".$customer->image) }}"
                                alt="..." width="130" class="rounded mb-2 img-thumbnail">
                        </div>
                        <div class="media-body m-5 text-white">
                            <h4 class="mt-0 mb-0">{{ $customer->firstName . " " . $customer->lastName }}</h4>
                            <p class="small ">{{ $customer->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3">
                    <div class="p-4 rounded shadow-sm bg-light">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td style="width: 250px;">First Name</td>
                                    <td>{{ $customer->firstName }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">Last Name</td>
                                    <td>{{ $customer->lastName }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">Email</td>
                                    <td>{{ $customer->email }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">Phone</td>
                                    <td>{{ $customer->phone }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">Account Number</td>
                                    <td>{{ $customer->bank }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">About</td>
                                    <td>{{ $customer->about }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


