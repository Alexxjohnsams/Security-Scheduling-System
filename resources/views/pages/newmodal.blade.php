<!-- Staff present check-->
<div class="modal fade" id="reportmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Report shift status</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('report.update')}}" method="POST">
            @csrf
        <div class="modal-body">          
            <div class="mb-3">   
              <input type="text" id="report_id" name="id">         
                <label for="name" class="form-label">Description</label>    
                <select name="status" id="staff_status" class="form-select">
                    <option value="completed">Completed</option>
                    <option value="absent">Absent</option>
              </select>                 
            </div>     
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Send</button>
        </form>
        </div>
      </div>
    </div>
  </div>