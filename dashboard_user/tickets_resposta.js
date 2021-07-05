
    $(document).ready(function(){
        var id=0;
        var admin=0;
        $("button[data-toggle=modal]").click(function(){
            //id=$(this).closest('tr').data('id');
            id=$(this).attr('ticket-id');
            admin=$(this).attr('admin-id');
            assunto=$(this).closest("tr").find('td.assunto').text();
            assunto = assunto.replace("                                ", "");
            assunto = assunto.replace("                            ", "");

            mensagem=$(this).closest("tr").find('td.mensagem').text();
            mensagem = mensagem.replace("                                ", "");
            mensagem = mensagem.replace("                            ", "");


            prioridade=$(this).closest("tr").find('td.prioridade').text();
            prioridade = prioridade.replace("                                ", "");
            prioridade = prioridade.replace("                            ", "");

            reply=$(this).closest("tr").find("td.reply").text();

            reply = reply.replace("                                ", "");
            reply = reply.replace("                            ", "");


            modal_body="<div class='form-group'><label class='col-md-3 control-label'><input type='hidden' id='id' value='"+id+"'><input type='hidden' id='admin' value='"+admin+"'>Assunto</label><div class='col-md-9'><input disabled type='text' class='form-control' placeholder='Assunto' id='assunto_val' value='"+assunto+"'></div></div>";
            modal_body += "<div class='form-group'><label class='col-md-3 control-label'>Mensagem</label><div class='col-md-9'><input disabled type='text' class='form-control ' placeholder='Mensagem' id='mensagem_val' value='"+mensagem+"'></div></div>";
            modal_body += "<div class='form-group'><label class='col-md-3 control-label'>Prioridade</label><div class='col-md-9'><input disabled type='text' class='form-control ' placeholder='Prioridade' id='prioridade_val' value='"+prioridade+"'></div></div>";
            modal_body += "<div class='form-group'><label class='col-md-3 control-label'>Resposta</label><div class='col-md-9'><textarea name='textarea' id='reply_val' rows='10' cols='50'>"+reply+"</textarea></div></div>";
            $("#modal-default .modal-body").html(modal_body);
            // console.log(assunto);
            // alert(assunto);

        });

        $('.modal-footer .btn-primary').click(function(){
            assunto=$("#assunto_val").val();
            mensagem=$("#mensagem_val").val();
            prioridade=$('#prioridade_val').val();
            reply=$('#reply_val').val();
            id=$('#id').val();
            admin=$('#admin').val();
            $.ajax({
                url:'functions/my_ajax.php',
                method:'post',
                dataType:'json',
                data:{
                    'id':id,
                    'assunto':assunto,
                    'mensagem':mensagem,
                    'prioridade':prioridade,
                    'reply':reply,
                    'admin': admin
                },
                success:function(res){
                    if (res.res=='ok'){
                        location.reload(true);
                    }
                }

            });
        });
    });
