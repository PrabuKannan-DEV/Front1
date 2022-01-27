@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <strong>
                        <div class="card-header">Create New Customer</div>
                    </strong>
                    <form action="/customers" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name='name' type="text" class="form-control" id="name" value="{{ old('name') }}"
                                aria-describedby="nameHelp" placeholder="Enter name">
                            <br>
                            @error('name')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input name='phone_number' type="number" class="form-control" id="phone_number"
                                value="{{ old('phone_number') }}" aria-describedby="phone_numberHelp"
                                placeholder="Enter phone_number">
                            </small>
                            <br>
                            @error('phone_number')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input name='address' type="text" class="form-control" id="address"
                                value="{{ old('address') }}" aria-describedby="addressHelp" placeholder="Enter address">
                            </small>
                            <br>
                            @error('address')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Create Customer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
