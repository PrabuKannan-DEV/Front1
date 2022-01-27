@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <a class='btn btn-primary' href='{{'schemes'}}'> All Schemes
                        </a>
                        <a class='btn btn-primary' href='/customers/create'>Add Customers
                        </a>
                    </div>

                    <div class="card mt-4">
                       <strong> <div class="card-header">My Customers</div>
                       </strong>
                        <div class="card-body">
                            <ul class='list-group'>
                                @foreach ($customers as $customer)
                                    <li class='list-group-item'>
                                        <a href="{{ route('customers.show', ['customer'=>$customer->id])  }}">{{ $customer->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            {{-- <div class="d-flex justify-content-center">
                                {!! $customers->links() !!}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
