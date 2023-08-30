<!-- Button trigger modal -->
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
                <select name="officer_name" id="" class="form-select">
                    <option value="" disabled selected>select name...</option>
                    @foreach ($users as $user)
                        <option value="{{$user -> name}}">{{$user -> name}}</option>
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
        </form>
        </div>
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
        </form>
        </div>
      </div>
    </div>
  </div>