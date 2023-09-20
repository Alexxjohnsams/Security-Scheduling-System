@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-3"><strong><i class="text-success" data-feather="shield"></i> Shift History</strong></h1>
    @if($message)
        <div class="p-3 rounded-3 alert-div text-warning">
            {{$message}}
        </div>
    @else
        <div class="card col-12 border-l-4 border-b-2 boxxx">
            <div class="card-body row">
                <div class="col-sm-6 mt-0">
                    <h1 class="mt-1 mb-sm-3 h5"> Total shift </h1> 
                    <h1 class="mt-1 mb-3 h3"> You have completed <strong class="text-success"> {{$usershiftcout}} </strong> so fars  </h1> 
                </div>        
                <div class="col-sm-6 mt-0">
                    <h1 class="mt-1 mb-sm-3 h5"> Missed shifts </h1> 
                    <h1 class="mt-1 mb-3 h3"> You have missed <strong class="text-danger"> {{$getAbscentCount}} </strong> so far </h1> 
                </div>                                           
            </div>                                   
        </div>

        <div class="card w-100 flex-fill">
            <div class="card-header">
                Your completed shifts
            </div> 
            
            <div class="card-body table-borderless">
                @if($shift_message)
                    <div class="p-3 rounded-3 alert-div text-warning">
                        {{$shift_message}}
                    </div>
                @else                       
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
                </table
                 @endif                       
            </div> 
                                              
        </div>
        @endif
    </div>
</div>
    
@endsection