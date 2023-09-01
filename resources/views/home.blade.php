@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-3"><strong>Welcome</strong> {{Auth::user()->name}}</h1>

    <div class="">
        <div class="w-100">
            <div class="row justify-content-between">
                    <div class="card col-sm-3 ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title text-black">Total officers</h5>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 display-6">{{$officers}}</h1>                            
                        </div>
                    </div>
                    <div class="card col-sm-3 ">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title text-black">All Locations</h5>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 display-6">{{$locationscount}}</h1>
                        </div>
                    </div>
                    <div class="card col-sm-3 ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title text-black">Unapproved Officers</h5>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 display-6">{{$countusers}}</h1>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container">
            <h1 class="h3 mb-3 pt-3"><strong>Unapproved</strong> Officers</h1>
            <div class="row card">
                <div class="col-12 table-responsive">
                    <table class="table table-borderless my-0">
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th></th>
                        </tr>
                        <?php
                            $n = 1;
                        ?>
                        @foreach ($newusers as $user)
                        <tr>
                            <td>{{$n++}}</td>
                            <td>{{$user -> name}}</td>
                            <td>{{$user -> email}}</td>
                            <td>{{$user -> phone}}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-success btnEditRole" data-id="{{$user -> id}}" data-bs-toggle="modal" data-bs-target="#rolemodal">
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
@include('pages.modal')
@endsection


