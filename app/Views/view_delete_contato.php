<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo ?></title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 
    <div class="container">
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well">Excluir</h3>
            </div>

            <div class="card-body">
                <form class="form-horizontal" method="post">
                    <div class="row align-items-start">
                        <div class="col-sm-12">
                          <div class="form actions">
                            <a href="<?php echo base_url('agenda-contatos-deletar/' . $id_contact) ?>" type="button" class="btn btn-danger" style="margin-left:20px; margin-bottom:10px;">Excluir</a>
                            <a href="<?php echo base_url('agenda-contatos') ?>" type="button" class="btn btn-secondary" style="margin-left:20px; margin-bottom:10px;">Voltar</a>
                          </div>
                            <br/>
                            <input type="hidden" name="id" value="<?php echo $id_contact;?>" />
                            <div class="alert alert-danger">
                              Deseja excluir o registro?
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>