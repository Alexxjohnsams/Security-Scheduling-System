  <!-- New Schedule-->
  <div class="modal fade" id="newshift" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Schedule an Officer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('shifts.store')}}" method="POST">
          @csrf
        <div class="modal-body">  
            <div class="mb-3">
                <label for="officer_name" class="form-label">Officer name</label>    
                <select name="officer_name" id="officer_name" class="form-select staff">
                    <option value="" disabled selected>select name...</option>
                    @foreach ($users as $user)
                        <option value="{{$user -> id}}">{{$user -> name}}</option>
                        
                    @endforeach
                </select>                
              </div>   
              <div class="mb-3">
                <label for="location" class="form-label">Location</label>    
                <select name="location" id="" class="form-select">
                    <option value="" disabled selected>select location...</option>
                    @foreach ($locations as $location)
                        <option value="{{$location -> location_name}}">{{$location -> location_name}}</option>
                    @endforeach
                </select>                
              </div> 
              <div class="mb-3">
                <label for="date" class="form-label">Schedule Date</label>    
                <input name="date" type="date" class="form-control">               
              </div>    
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Asign</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>


  <!-- New Location-->
  <div class="modal fade" id="newlocation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add new Locations</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('locations.store')}}" method="POST">
            @csrf
        <div class="modal-body">          
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>    
                <input type="text" name="location_name" class="form-control" placeholder="input location name" required>                
            </div>     
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>


<!-- Role Edit Modal-->
<div class="modal fade" id="rolemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Review Officer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('role.update')}}" method="POST">
          @csrf
      <div class="modal-body">          
          <div class="mb-3">   
            <input type="hidden" id="role_id" name="id">         
              <label for="name" class="form-label">Action</label>    
              <select name="role" id="role" class="form-select">
                  <option value="officer">Approve</option>
                  <option value="user">Disapprove</option>
            </select>                 
          </div>     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
      </form>
     
    </div>
  </div>
</div>



 <!-- Edit Schedule-->
 <div class="modal fade editShiftModal" id="editshift" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Scheduled shift</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('shifts.updateShift')}}" method="POST">
        @csrf
      <div class="modal-body">  
          <div class="mb-3">
            <input type="hidden" id="shift_update_id" name="shift_update_id">
              <label for="officer_name" class="form-label">Officer name</label>    
              <select name="officer_name" id="edit_officer_name" class="form-select staff">
                  <option value="" disabled selected>select name...</option>
                  @foreach ($users as $user)
                      <option value="{{$user -> name}}">{{$user -> name}}</option>
                  @endforeach
              </select>                
            </div>   
            <div class="mb-3">
              <label for="location" class="form-label">Location</label>    
              <select name="location" id="edit_shift_location" class="form-select">
                  <option value="" disabled selected>select location...</option>
                  @foreach ($locations as $location)
                      <option value="{{$location -> location_name}}">{{$location -> location_name}}</option>
                  @endforeach
              </select>                
            </div> 
            <div class="mb-3">
              <label for="date" class="form-label">Schedule Date</label>    
              <input name="date" id="edit_shift_date"  type="date" class="form-control">               
            </div>    
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>
      
    </div>
  </div>
</div>



 <!-- delete Schedule-->
 <div class="modal fade" id="deleteShift" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Delete Scheduled shift</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <form action="{{route('shifts.destroy')}}" method="POST">
        @csrf
      <div class="modal-body">  
          <div class="mb-3">
          <h4 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this shift?</h4>
             <input type="hidden" id="shift_del_id" name="shift_del_id">          
            </div>   
           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Delete</button>
     </div>
      </form>
    </div>
  </div>
</div>