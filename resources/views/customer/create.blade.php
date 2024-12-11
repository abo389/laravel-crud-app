@extends('layout.app')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <h3>Customers</h3>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ route("customer.index") }}" class="btn" style="background-color: #4643d3; color: white;"><i class="fas fa-chevron-left"></i> Back</a>
                    </div>
                </div>
            </div>
            <form class="card-body" action="{{ route("customer.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="">Image</label>
                            <input name="image" type="file" class="form-control">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input value="{{ old("fname") }}" name="fname" type="text" class="form-control">
                            @error('fname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input value="{{ old("lname") }}" name="lname" type="text" class="form-control">
                            @error('lname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input value="{{ old("email") }}" name="email" type="email" class="form-control">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input value="{{ old("phone") }}" name="phone" type="phone" class="form-control">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="">Bank Account Number</label>
                            <input value="{{ old("bank") }}" name="bank" type="number" min=10 class="form-control">
                            @error('bank')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="">About</label>
                            <textarea name="about" type="number" min=10 class="form-control">{{ old("about") }}</textarea>
                            @error('about')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
