@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-3"><strong><i class="text-success" data-feather="shield"></i> All Shifts</strong></h1>

        <div class="card w-100 flex-fill">
            <div class="card-body table-borderless">                       
                <table class="table table-striped ">
                    <tr>
                        <th>Officer Name</th>
                        <th>Scheduled Location</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    @foreach($shifts as $shift)
                    <tr>
                        <td>{{$shift -> officer_name}}</td>
                        <td>{{$shift -> location}}</td>      
                        <td><strong>{{$shift -> date}}</strong></td>  
                        <td>
                            <?php
                                $status = $shift -> shift_status;
                                if ($status === 'pending') {
                                    echo "<span class='badge rounded-pill bg-warning text-dark'>pending</span>";
                                } elseif ($status === 'completed') {
                                    echo "<span class='badge rounded-pill bg-success'>completed</span>";
                                } else {
                                    echo "<span class='badge rounded-pill bg-danger'>absent</span>";
                                }
                            ?>   
                        </td>                   
                        <td class="text-end">
                            <?php
                            $statuss = $shift -> shift_status;
                            ?>
                            @if ($statuss == 'pending')
                                  <button class='btn btn-sm btn-outline-success shiftEdit' data-id='{{$shift -> id}}'> <i data-feather='edit-2'></i> </button>
                                  <button class='btn btn-sm btn-outline-danger shiftDelete ml-1' data-id='{{$shift -> id}}'> <i data-feather='trash'></i> </button>
                             @else 
                                  <button class='btn btn-sm btn-outline-danger shiftDelete' data-id='{{$shift -> id}}'> <i data-feather='trash'></i> </button>
                            @endif
                        </td>
                    </tr> 
                    @endforeach                   
                </table>                        
            </div>                               
        </div>
    </div>
</div>
@include('pages.modal')
@endsection