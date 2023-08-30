@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-3"><strong><i class="text-success" data-feather="user"></i> All Officers</strong></h1> 
        <div class="card w-100 flex-fill">
            <div class="card-header">
                List of all Officers
            </div> 
            <div class="card-body table-borderless">                       
                <table class="table table-striped ">
                    <tr>
                        <th>Officer Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user -> name}}</td>
                        <td>{{$user -> phone}}</td>
                        <td>{{$user -> email}}</td>                         
                        <td>
                            <button class="btn btn-sm btn-outline-success">
                                <i class="" data-feather="align-center"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-success">
                                <i class="" data-feather="edit-2"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="" data-feather="trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </table>                        
            </div>                                   
        </div>
    </div>
</div>
    
@endsection