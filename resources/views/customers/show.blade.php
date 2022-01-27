@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <strong>
                        <div class="card-header">{{ $customer->name }}'s Details</div>
                    </strong>
                    <div class ="card-body">
                        <p>Name: {{ $customer->name }}</p>
                        <p>Phone Number: {{ $customer->phone_number }}</p>
                        <p>Address: {{ $customer->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
