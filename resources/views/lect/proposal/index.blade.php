@extends('lect.proposal.default')

  

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-10">

            <div class="card">

                <div class="card-header">Manage Product</div>

  

                <div class="card-body">

                      

                    <a href="{{ route('proposals.create.step.one') }}" class="btn btn-primary pull-right">Create Product</a>

  

                    @if (Session::has('message'))

                        <div class="alert alert-info">{{ Session::get('message') }}</div>

                    @endif

                    <table class="table">

                        <thead class="thead-dark">

                        <tr>

                            <th scope="col">#</th>

                            <th scope="col">Product Name</th>

                            <th scope="col">Product Description</th>

                            <th scope="col">Stock</th>

                            <th scope="col">Amount</th>

                            <th scope="col">Status</th>

                        </tr>

                        </thead>

                        <tbody>

                        @foreach($proposals as $proposal)

                            <tr>

                                <th scope="row">{{$proposal->id}}</th>

                                <td>{{$proposal->name}}</td>

                                <td>{{$proposal->description}}</td>

                                <td>{{$proposal->stock}}</td>

                                <td>{{$proposal->amount}}</td>

                                <td>{{$proposal->status ? 'Active' : 'DeActive'}}</td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection