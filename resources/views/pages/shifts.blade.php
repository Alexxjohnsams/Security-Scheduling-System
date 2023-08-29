@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-3"><strong><i class="text-success" data-feather="shield"></i> Shifts</strong></h1>
    <h5 class="h4 text-success"></h5>
        <div class="card col-12 border-l-4 border-b-2 boxxx">
            <div class="card-body row">
                <div class="col mt-0">
                    <h1 class="mt-1 mb-3 h5"> Today, </h1> 
                    <h1 class="mt-1 mb-3 h3"> <strong> Tuesday, </strong> 28th Nov. 2023 </h1> 
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
                <table class="table table-striped ">
                    <tr>
                        <th>Officer Name</th>
                        <th>Scheduled Location</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Alex Alexx</td>
                        <td>Green Wood Vlley</td>                        
                        <td>
                            <button class="btn btn-sm btn-outline-success">
                                <i class="" data-feather="edit-2"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="" data-feather="trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Samson Johnson</td>
                        <td>Garden Side</td>
                        <td>
                            <button class="btn btn-sm btn-outline-success">
                                <i class="" data-feather="edit-2"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="" data-feather="trash"></i>
                            </button>
                        </td>
                    </tr>
                </table>                        
            </div>  
            <div class="card-header">
                <button class="btn text-success">See all shifts <i class="text-success" data-feather="arrow-right"></i></button>
            </div>                                  
        </div>
    </div>
</div>
    
@endsection