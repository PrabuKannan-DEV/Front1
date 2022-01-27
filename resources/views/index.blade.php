@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3>My Deposits</h3>
                            <a class='btn btn-primary' href='{{ route('schemes') }}'> All Schemes
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="col-md-8">
                            <form action='/' method='post' class="row">
                                @csrf
                                <div class="col-5 mt-2">
                                    <select name='status' class="form-select">
                                        <option value="" selected>Filter by Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-3 mb-2">
                                    <button type="submit" class="btn btn-primary m-2">Submit</button>
                                </div>
                            </form>
                        </div>
                        <hr>
                        @if ($enrollments)
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Scheme</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Interest</th>
                                        <th scope="col">Deposit date</th>
                                        <th scope="col">Maturity/<br>Withdrawal Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enrollments as $enrollment)
                                        <tr>
                                            <td><a href='{{ route('enrollments.show', ['enrollment' => $enrollment->id]) }}'>{{ $enrollment->scheme->name }}
                                                </a></td>
                                            <td>{{ $enrollment->scheme->amount }}</td>
                                            <td>{{ $enrollment->scheme->interest * 100 }}%</td>
                                            {{-- <td>{{ $enrollment->deposit_date }}</td> --}}
                                            <td>{{ Carbon\Carbon::parse($enrollment->deposit_date)->format('d-m-Y') }}</td>
                                            {{-- <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime( $enrollment->deposit_date))->format('d-m-Y')}}</td> --}}
                                            {{-- <td>{{ $enrollment->withdrawal_date ?? $enrollment->maturity_date }} --}}
                                            <td>{{ Carbon\Carbon::parse($enrollment->withdrawal_date ?? $enrollment->maturity_date)->format('d-m-Y') }}
                                            </td>
                                            </td>
                                            <td>{{ $enrollment->status }}</td>
                                            <td>
                                                @can('closed', [\App\Models\Enrollment::class, $enrollment])
                                                    Withdrawn
                                                @endcan
    
                                                {{-- @if ($enrollment->status == 'Active') --}}
                                                @can('withdraw', [\App\Models\Enrollment::class, $enrollment])
                                                    <a class='btn btn-primary' @if (Carbon\Carbon::now() < $enrollment->maturity_date)
                                                        onclick="return confirm('If withdrawn now you will be given half interest &
                                                        cancellation charges apply! Are you sure?')"
                                        @endif
                                        href="{{ route('withdraw', ['enrollment' => $enrollment->id]) }}">
                                        Withdraw </a>
                                    @endcan
                                    {{-- @endif --}}
                                    </td>
                                    </tr>
                        @endforeach
                        </tbody>
                        </table>
                    @else
                        <h2>Start investing now!!!</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
