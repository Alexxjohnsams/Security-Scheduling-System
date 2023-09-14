@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-3"><strong><i class="text-success" data-feather="shield"></i> All pending Shifts</strong></h1>

        <div class="card w-100 flex-fill">
            <div class="card-body table-borderless">                       
                <table class="table table-striped ">
                    <tr>
                        <th>Officer Name</th>
                        <th>Scheduled Location</th>
                        <th>Date</th>
                        <th></th
                    </tr>
                    @foreach($shifts as $shift)
                    <tr>
                        <td>{{$shift -> officer_name}}</td>
                        <td>{{$shift -> location}}</td>      
                        <td><strong>{{$shift -> date}}</strong></td>                    
                        <td>
                            <button class="btn btn-sm btn-outline-success">
                                <i class="" data-feather="edit-2"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" data-id="{{$shift -> id}}" data-bs-toggle="modal" data-bs-target="#deleteModal">
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
    

@inlude('pages.modal')
@endsection