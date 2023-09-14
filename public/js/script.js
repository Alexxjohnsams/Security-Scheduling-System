
    document.addEventListener("DOMContentLoaded", function() {
      $('.shiftDelete').click(function (e){
          e.preventDefault();
          let id = $(this).attr('data-id');
          $('#shift_del_id').val(id); // Changed 'va' to 'val'
          $('#deleteShift').modal('show');
      });

      $('.shiftEdit').on('click touchstart tap',function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        
        $.ajax({
            type: 'GET',
            async: false,
            url: '/shift/edit/'+id,
            success: function(response) {
                alert(officer_name);
                $('#shift_update_id').val(id);
                $('#edit_officer_name').val(response.officer_name);
                $('#edit_shift_location').val(response.location);
                $('#edit_shift_date').val(response.formated_date);
            },
            error: function(response) {
                alert(response.responseText);
            }
        });
        $('.editShiftModal').modal('show');
    });
  
    // $('#btn_info').click(function(e){
    //     e.preventDefault();
    //     $('#info').modal('show');
    // })

    // delete Case
    $('.btnDeleteCase').click(function (e){
        e.preventDefault();
       let id = $(this).attr('data-id');
        $('#deleteCaseFile').attr('data-id', id);
        // $('#deleteCase').modal('show');
    })

    $('#deleteCaseFile').click(function (e){
        let id = $(this).attr('data-id');
            
        $.ajax({
            type: 'GET',
            async: 'false',
            url: '/case/delete/'+ id,
            success: function(response) {
                window.location.reload();
            },
            error: function(response) {
                alert(response.responeText);
            }
        });

    })


     // delete Case
     $('.btnDeleteUser').click(function (e){
        e.preventDefault();
       let id = $(this).attr('data-id');
        $('#deleteUserBtn').attr('data-id', id);
        // $('#deleteCase').modal('show');
    })

    $('#deleteUserBtn').click(function (e){
        let id = $(this).attr('data-id');
            
        $.ajax({
            type: 'GET',
            async: 'false',
            url: '/users/delete/'+ id,
            success: function(response) {
                window.location.reload();
            },
            error: function(response) {
                alert(response.responeText);
            }
        });

    })

    $('.btnEditRole').click(function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            async: false,
            url: '/officer/edit/' + id,
            success: function(respone) {
                $('#role_id').val(respone['id']);
                $('#role').val(respone['role']);
            },
            error: function(response) {
                alert(response.responeText);
            }
        });
    })

    $('.btnReportStatus').click(function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            async: false,
            url: '/shifts/edit/' + id,
            success: function(respone) {
                $('#report_id').val(respone['id']);
                $('#status').val(respone['shift_status']);
            },
            error: function(response) {
                alert(response.responeText);
            }
        });
    })
});