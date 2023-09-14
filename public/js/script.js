$(document).ready(function(){
    
    // $('#btn_info').click(function(e){
    //     e.preventDefault();
    //     $('#info').modal('show');
    // })

    // delete Case
    $('.btnDeleteOfficer').click(function (e){
        e.preventDefault();
       let id = $(this).attr('data-id');
        $('#btn_delete').attr('data-id', id);
        // $('#deleteCase').modal('show');
    })

    $('#btn_delete').click(function (e){
        let id = $(this).attr('data-id');
            
        $.ajax({
            type: 'GET',
            async: 'false',
            url: '/officer/delete/'+ id,
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

    // edit Location
    $('.btnEditLocation').click(function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            async: false,
            url: '/locations/edit/' + id,
            success: function(respone) {
                $('#location_id').val(respone['id']);
                $('#location_name').val(respone['location_name']);
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
            url: '/shifts/' + id,
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