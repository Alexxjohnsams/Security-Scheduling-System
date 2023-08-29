@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-3"><strong><i class="text-success" data-feather="user"></i> All Officers</strong></h1> 
        <div class="card w-100 flex-fill">
            <div class="card-header">
                List of all Officers
            </div> 
            <div class="card-body table-borderless">                       
                <table class="table table-striped ">
                    <tr>
                        <th>Officer Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Alex Alexx</td>
                        <td>09012345678</td>
                        <td>Lex@gmail.com</td>                         
                        <td>
                            <button class="btn btn-sm btn-outline-success">
                                <i class="" data-feather="align-center"></i>
                            </button>
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
                        <td>Aragba</td>
                        <td>Lex@gmail.com</td> 
                        <td>
                            <button class="btn btn-sm btn-outline-success">
                                <i class="" data-feather="align-center"></i>
                            </button>
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
        </div>
    </div>
</div>
    
@endsection