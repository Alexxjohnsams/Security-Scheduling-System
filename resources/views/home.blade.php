@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-3"><strong>Welcome</strong> {{Auth::user()->name}}</h1>

    <div class="">
        <div class="w-100">
            <div class="row gx-4">
                    <div class="card col-sm-4 boxxx">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title text-black">Total officers</h5>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 display-6">10</h1>                            
                        </div>
                    </div>
                    <div class="card col-sm-4 boxxx">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title text-black">All Locations</h5>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 display-6">4</h1>
                        </div>
                    </div>
                    <div class="card col-sm-4 box-red">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title text-black">Unapproved Officers</h5>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 display-6">4</h1>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container">
            <h1 class="h3 mb-3 pt-3"><strong>Newly Registered</strong> Officers</h1>
            <div class="row card">
                <div class="col-12 table-responsive">
                    <table class="table table-borderless my-0">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th></th>
                        </tr>
                        
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user -> name}}</td>
                            <td>{{$user -> email}}</td>
                            <td>{{$user -> phone}}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-success">
                                    <i class="" data-feather="edit-2"></i>
                                </button>
                            </td>
                        </tr>  
                        @endforeach
                                               
                    </table>
                </div>
            </div>
        
        </div>
    </div>
</div>
@endsection
