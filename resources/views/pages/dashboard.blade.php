@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-3"><strong>Welcome</strong> {{Auth::user()->name}} </h1>
    <h5 class="h4 text-success"></h5>
        <div class="card col-12 border-l-4 border-b-2 boxxx">
            <div class="card-body row">
                <div class="col mt-0">
                    <h1 class="mt-1 mb-3 h5"> Your next shift </h1> 
                    <h1 class="mt-1 mb-3 h3"> <strong> Tuesday, </strong> </h1> 
                </div>        
                <div class="col mt-0">
                    <h1 class="mt-1 mb-3 h4"> </h1> 
                </div>                                           
            </div>                                   
        </div>

        <div class="card w-100 flex-fill">
            <div class="card-header">
                Your shifts this week
            </div> 
            <div class="card-body table-borderless">                       
                <table class="table table-striped ">
                    <tr>
                        <td><strong> Tuesday, </strong> 28th Nov. 2023</td>
                        <td>Green Wood Vlley</td>
                        <td><i class="text-success" data-feather="check" ></i></td>
                    </tr>
                    <tr>
                        <td><strong> Friday, </strong> 16th Dec. 2023</td>
                        <td>Garden Side</td>
                        <td><i class="text-success" data-feather="check" ></i></td>
                    </tr>
                </table>                        
            </div>                                   
        </div>
    </div>
</div>
    
@endsection