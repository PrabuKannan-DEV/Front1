@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header">
                    <a class='btn btn-primary' href ="{{ route('schemes') }}">Back</a>
                </div>
                <div class="card">
                    <strong>
                        <div class="card-header">Scheme Details</div>
                    </strong>
                    <div class ="card-body">
                        <p><strong>Name:</strong> {{ $scheme->name }}</p>
                        <p><strong>Amount:</strong>{{ $scheme->amount }}</p>
                        <p><strong>Duration:</strong> {{ $scheme->duration }}</p>
                        <p><strong>Interest rate:</strong> {{ $scheme->interest*100}}%</p>
                    </div>
                    <div class = "card-footer">
                        <a class="btn btn-primary"
                         href ="{{ route('deposits.store',['scheme_id' => $scheme->id]) }}">Deposit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
