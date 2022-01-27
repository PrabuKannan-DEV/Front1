@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header">
                        <a class='btn btn-primary' href="{{ route('home') }}">Back</a>
                    </div> --}}
                    <div class="card-header d-flex justify-content-between">
                        <h4>Enrollment Details</h4>
                        <a class='btn btn-primary' href="{{ route('home') }}">Back</a>
                    </div>
                    
                    <div class="card-body">
                        <div class="row mb-3">
                            <h4><strong>Scheme:</strong> {{ $enrollment->scheme->name }}</h4>
                        </div>
                        <div class="row">
                            <div class="col">
                                @php
                                    $iom = ($enrollment->scheme->interest / 12) * $enrollment->scheme->amount * $enrollment->scheme->duration;
                                    $pmir = $enrollment->scheme->interest / 2;
                                @endphp
                                <p><strong>Amount:</strong> {{ $enrollment->scheme->amount }}</p>

                                <p><strong>Interest rate: </strong>{{ $enrollment->scheme->interest * 100 }}%</p>
                                <p><strong>Interest Amount on maturity: </strong>
                                    {{ $iom }}
                                </p>
                                <p><strong>Maturity Amount: </strong>
                                    {{ $enrollment->scheme->amount + $iom }}</p>
                            </div>
                            <div class="col">
                                <p><strong>Duration: </strong> {{ $enrollment->scheme->duration }} Months</p>
                                <p><strong>Premature Interest rate: </strong>{{ $pmir * 100 }}%</p>
                                <p><strong>Interest Amount before maturity: </strong>
                                    {{ round((($pmir * $enrollment->scheme->amount) / 12) * Carbon\Carbon::parse($enrollment->deposit_date)->diffInMonths()) }}
                                </p>
                                <p><strong>Total amount before maturity: </strong>
                                {{round($enrollment->scheme->amount + (($pmir * $enrollment->scheme->amount) / 12) * Carbon\Carbon::parse($enrollment->deposit_date)->diffInMonths() - 500) }}
                                    <br>
                                    <small class='text-danger'>(Includes cancellation charge Rs.500)</small>
                                </p>
                            </div>
                        </div>

                        {{-- @if ($enrollment->status == 'Active') --}}
                        @can('withdraw', [\App\Models\Enrollment::class ,$enrollment])
                            <div class="row col-2">
                                <div class="col-3 ml-5">
                                    <a class='btn btn-primary ml-5' @if (Carbon\Carbon::now() < $enrollment->maturity_date)
                                        onclick="return confirm('If withdrawn now you will be given half interest & cancellation charges apply! Are you sure?')"
                                        @endif
                                        href="/enrollments/{{ $enrollment->id }}/withdraw">
                                        Withdraw </a>
                                </div>
                            </div>
                        @endcan    
                        {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>
@endsection
