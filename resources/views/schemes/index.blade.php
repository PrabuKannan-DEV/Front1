@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    @if ($user->user_type == 'admin')
                        <a class='btn btn-primary mt-1' href='{{ route('schemes.create') }}'> Add New Scheme
                        </a>
                    @endif
                </div>
                <div class="card mt-1">
                    <strong>
                        <div class="card-header">All Schemes</div>
                        <a href = '/' class='btn btn-primary'>Back</a>
                    </strong>
                    <div class="card-body">
                        {{-- <ul class='list-group'>
                                @foreach ($schemes as $scheme)
                                    <li class='list-group-item'>
                                        <a href="schemes/{{ $scheme->id }}">{{ $scheme->name }}</a>
                                    </li>
                                @endforeach
                            </ul> --}}
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Interest</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schemes as $scheme)
                                    <tr>
                                        <th scope="row"> <a href="schemes/{{ $scheme->id }}">{{ $scheme->name }}
                                            </a></th>
                                        <td>{{ $scheme->amount }}</td>
                                        <td>{{ $scheme->duration }}</td>
                                        <td>{{ $scheme->interest*100}} %</td>
                                        <td><a class="btn btn-primary"
                                                href="{{ route('deposits.store', ['scheme_id' => $scheme->id]) }}">Deposit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
