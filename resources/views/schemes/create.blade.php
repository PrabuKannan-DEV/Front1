@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <strong>
                        <div class="card-header">Create New Scheme</div>
                    </strong>
                    <form action="{{ route('schemes.store') }}" method="post">
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
                            <label for="amount">Amount</label>
                            <input name='amount' type="number" class="form-control" id="amount"
                                value="{{ old('amount') }}" aria-describedby="phone_numberHelp"
                                placeholder="Enter amount">
                            </small>
                            <br>
                            @error('amount')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input name='duration' type="number" class="form-control" id="duration"
                                value="{{ old('duration') }}" aria-describedby="durationHelp" placeholder="Enter number of months">
                            </small>
                            <br>
                            @error('duration')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="interest">Interest</label>
                            <input name='interest' type="number" class="form-control" id="interest"
                                value="{{ old('interest') }}" aria-describedby="interestHelp" placeholder="Enter interest percent">
                            </small>
                            <br>
                            @error('duration')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save Scheme</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
