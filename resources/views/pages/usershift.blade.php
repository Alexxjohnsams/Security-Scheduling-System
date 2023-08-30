@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-3"><strong><i class="text-success" data-feather="shield"></i> Shift History</strong></h1>
    <h5 class="h4 text-success"></h5>
        <div class="card col-12 border-l-4 border-b-2 boxxx">
            <div class="card-body row">
                <div class="col mt-0">
                    <h1 class="mt-1 mb-3 h5"> Total shift </h1> 
                    <h1 class="mt-1 mb-3 h3"> Your total completed shift is <strong> {{$usershiftcout}} </strong>  </h1> 
                </div>        
                <div class="col mt-0">
                    <h1 class="mt-1 mb-3 h4"> </h1> 
                </div>                                           
            </div>                                   
        </div>

        <div class="card w-100 flex-fill">
            <div class="card-header">
                Your completed shifts
            </div> 
            <div class="card-body table-borderless">                       
                <table class="table table-striped ">
                     
                    <tr>
                        <th>Date</th>
                        <th>Location</th>
                    </tr>
                    @foreach ($shifts as $shift) 
                    <tr>
                        <td>{{$shift -> date}}</td>
                        <td>{{$shift -> location}}</td> 
                    </tr>
                    @endforeach
                </table>                        
            </div>                                   
        </div>
    </div>
</div>
    
@endsection