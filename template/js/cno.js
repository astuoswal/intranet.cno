$(document).ready(function(){
    dataTable.ajax.reload();
})

// System
var dataTable = $('#rolUser').DataTable({
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
        url:"/intranet.cno/module/system/roluser.php",
        type:"POST"
    },
    "columnDefs":[
        {
            "targets":[0],
            "orderable":false
        },
    ],
    "language": {
        "url": "/intranet.cno/template/vendor/datatables/spanish.json"
    },
    drawCallback: function () {
        updateSelectRol()
        
    }
});

function updateSelectRol(){
    $.ajax({
        type: 'POST',
        url: '/intranet.cno/module/system/selectRol.php',
    })
    .done(function(result){
        $('.selectRol').append(result)
    })
    .fail(function(){
        alert('Hubo un error al actualizar los roles')
    })
}

function updateRolUser(indicador, column_name, value)
{
    $.ajax({
        url:"/intranet.cno/module/system/updateRolUser.php",
        method:"POST",
        data:{indicador:indicador, column_name:column_name, value:value},
        success:function(data)
        {
            $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
            dataTable.ajax.reload()
        }
    });

    setInterval(function(){
        $('#alert_message').html('');
    }, 5000);
}

$(document).on('change', '.update', function(){
      var id = $(this).data("indicador");
      var column_name = $(this).data("column");
      var value = $(this).val();
      updateRolUser(id, column_name, value);
    });
                                        