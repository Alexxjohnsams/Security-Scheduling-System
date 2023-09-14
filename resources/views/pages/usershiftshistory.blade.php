@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-3"><strong><i class="text-success" data-feather="shield"></i> {{$officername}}</strong></h1>

        <div class="card w-100 flex-fill">
            <div class="card-body table-borderless">  
                @if($shiftcountmessage)   
                    <div class="p-3 rounded-3 alert-div text-warning">
                        {{$shiftcountmessage}}
                    </div>
                @else
                <table class="table table-striped ">
                    <tr>
                        <th>Scheduled Location</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th></th
                    </tr>
                    @foreach($shifts as $shift)
                    <tr>
                        <td>{{$shift -> location}}</td>      
                        <td><strong>{{$shift -> date}}</strong></td>  
                        <td>
                            <?php
                                $status = $shift -> shift_status;
                                if ($status === 'pending') {
                                    echo "<span class='badge rounded-pill bg-warning text-dark'>pending</span>";
                                } elseif ($status === 'completed') {
                                    echo "<span class='badge rounded-pill bg-success text-dark'>completed</span>";
                                } else {
                                    echo "<span class='badge rounded-pill bg-danger'>absent</span>";
                                }
                            ?>   
                        </td>                   
                        <td>
                            <button class="btn btn-sm btn-outline-danger" data-id="{{$shift -> id}}" data-bs-toggle="modal" data-bs-target="#deleteModal">
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