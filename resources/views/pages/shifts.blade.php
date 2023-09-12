@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-3"><strong><i class="text-success" data-feather="shield"></i> Shifts</strong></h1>
    <h5 class="h4 text-success"></h5>
        <div class="card col-12 border-l-4 border-b-2 boxxx">
            <div class="card-body row">
                <div class="col mt-0">
                    <h1 class="mt-1 mb-3 h5"> Today, </h1> 
                    <h1 class="mt-1 mb-3 h3"> <strong> {{$day}}, </strong> {{$daydate}} </h1> 
                </div>        
                <div class="col mt-0">
                    <h1 class="mt-1 mb-3 h4"> </h1> 
                </div>                                           
            </div>                                   
        </div>

        <div class="card w-100 flex-fill">
            <div class="card-header">
                <div class="row justify-between">
                    <div class="col">
                        Today's shifts
                    </div>
                    <div class="col text-end">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newshift">
                            <i class="" data-feather="plus"></i> Assign
                        </button>
                    </div>
                </div>
            </div> 
            <div class="card-body table-borderless">
                @if($message)  
                    <div class="p-3 rounded-3 alert-div text-warning">
                         {{$message}}
                    </div>
                @else                     
                <table class="table table-striped">
                    <tr>
                        <th>Officer Name</th>
                        <th>Scheduled Location</th>
                        <th></th>
                    </tr>
                    @foreach($shifts as $shift)
                    <tr>
                        <td>{{$shift -> officer_name}}</td>
                        <td>{{$shift -> location}}</td>                        
                        <td>
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
                @endif                      
            </div>
                <div class="card-footer row justify-between d-flex">
                    <div class="col">
                        <a class="btn btn-outline-danger" href="{{route("pendingshifts")}}">Pening Shifts <i class="" data-feather="arrow-right"></i></a>
                    </div>
                    <div class="col text-end">
                        <a class="btn btn-outline-success" href="{{route("allshifts")}}">See all shifts <i class="" data-feather="arrow-right"></i></a>
                    </div>
                </div>                            
        </div>
    </div>
</div>
    
@endsection