@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-3"><strong><i class="text-success" data-feather="user"></i> All Officers</strong></h1> 
        <div class="card w-100 flex-fill">
            <div class="card-header">
                List of all Officers
            </div> 
            <div class="card-body table-borderless">   
            @if($message) 
                <div class="p-3 rounded-3 alert-div text-warning">
                    {{$message}}
                </div>
            @else                    
                <table class="table table-striped ">
                    <tr>
                        <th>Officer Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>status</th>
                        <th></th>
                    </tr>
                    
                    @foreach ($allusers as $user)
                    
                    <tr>
                        <td>{{$user -> name}}</td>
                        <td>{{$user -> phone}}</td>
                        <td>{{$user -> email}}</td>
                        <td>
                            <?php
                                $role = $user -> role;
                                if ($role === 'user') {
                                    echo "<span class='badge rounded-pill bg-warning text-dark'>Unpproved</span>";
                                } else {
                                    echo "<span class='badge rounded-pill bg-success'>approved</span>";
                                }
                            ?>
                        </td>                          
                        <td>
                            <button class="btn btn-sm btn-outline-success">
                                <i class="" data-feather="align-center"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-success btnEditRole" data-id="{{$user -> id}}" data-bs-toggle="modal" data-bs-target="#rolemodal">
                                <i class="" data-feather="edit-2"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="" data-feather="trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </table>  
                @endif                      
            </div>                                   
        </div>
    </div>
</div>

@include('pages.modal')
@endsection