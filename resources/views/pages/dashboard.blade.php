@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-3"><strong>Welcome</strong> <span class="text-uppercase">{{Auth::user()->name}}  </span></h1>
    @if($message)  
        <div class="p-3 rounded-3 alert-div text-warning">
                {{$message}} 
        </div>
    @else 
        <div class="card col-12 border-l-4 border-b-2 boxxx">
            <div class="card-body row">
                <div class="col mt-0">
                    <h1 class="mt-1 mb-3 h5">Your next shift </h1> 
                    
                    @if($next_message)
                    <div class="p-3 text-warning">
                        {{$next_message}} 
                    </div>
                    @else
                        <h1 class="mt-1 mb-3 h3"> {{$Nextshift-> date}} </h1>
                    @endif
                </div>       
                                                         
            </div>                                   
        </div>

        <div class="card w-100 flex-fill">
            <div class="card-header">
                Your pending shifts
            </div> 
            <div class="card-body table-borderless">   
                @if($pending_message)  
                    <div class="p-3 rounded-3 alert-div text-warning">
                        {{$pending_message}} 
                    </div>
                @else
                <table class="table table-striped ">
                    @foreach($getpendingShifts as $pending)
                    <tr>
                        <td><strong>{{$pending -> date}}</strong></td>
                        <td>{{$pending -> location}}</td>
                        <td>
                            <button class="btn btn-sm btn-success btnReportStatus" data-id="{{$pending -> id}}" data-bs-toggle="modal" data-bs-target="#reportmodal">
                                Report 
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </table> 
                @endif                       
            </div>                                   
        </div>
        @endif
    </div>
</div>

@include('pages.newmodal')
@endsection
