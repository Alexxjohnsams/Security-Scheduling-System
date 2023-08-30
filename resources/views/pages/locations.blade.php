@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-3"><strong><i class="text-success" data-feather="map-pin"></i> All Locations</strong></h1> 
        <div class="card w-100 flex-fill">
            <div class="card-header">
                <div class="row justify-between">
                    <div class="col">
                        All available Locations
                    </div>
                    <div class="col text-end">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newlocation">
                            <i class="" data-feather="plus"></i> Add New
                        </button>
                    </div>
                </div>
            </div> 
            <div class="card-body table-borderless">                       
                <table class="table table-striped ">
                    <tr>
                        <th>Name</th>
                        <th></th>
                    </tr>
                    @foreach ($locations as $location) 
                    <tr>                        
                        <td>{{$location -> location_name}}</td>                        
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
            </div>                                   
        </div>
    </div>
</div>
    
@endsection