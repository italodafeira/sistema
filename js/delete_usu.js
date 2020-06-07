$(document).on('click', '.delete', function() {
    var box  = $(this).parent(".box-btn-usu").parent(".box-dados-usu").parent(".container-box")
    var id   = $(this).attr("id");
    var tipo = $("#tipo").val();
    var data = new FormData();
    var r = confirm("Deseja realmente deletar este usuario?");
    if(r == true){
        data.append('id',id);
        $.ajax({
            url:"http://localhost/sistema/controllers/usuario_controller.php?src="+tipo+"&action=delete",
            type:'POST',
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            success:function(retorno, jqXHR){
                var msg = retorno;
                $('#msg').html(msg); 

                $(".icon-close").click(function(e) {
                    $(e.target).parent(".msg").remove();
                });
                
            },
        })  
    }
});
