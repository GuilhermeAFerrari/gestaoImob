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
                <h3 class="well">Quitar conta</h3>
            </div>

            <div class="card-body">
                <form class="form-horizontal" method="post">
                    <div class="row align-items-start">
                        <div class="col-sm-12">
                          <div class="form actions">
                            <a href="<?php echo base_url('financeiro-quitar-receber/' . $id_contaReceber) ?>" type="button" class="btn btn-danger" style="margin-left:20px; margin-bottom:10px;">Quitar</a>
                            <a href="<?php echo base_url('financeiro-recebimentos-listar') ?>" type="button" class="btn btn-secondary" style="margin-left:20px; margin-bottom:10px;">Voltar</a>
                          </div>
                            <br/>
                            <input type="hidden" name="id" value="<?php echo $id_contaReceber;?>" />
                            <div class="alert alert-danger">
                              Deseja quitar a conta?
                              <hr>
                              <br />
                              <?php echo 'Responsável: ' . $contaReceber->nm_responsavel ?>
                              <br />
                              <?php echo 'Descrição: ' . $contaReceber->ds_recebimento ?>
                              <br />
                              <?php echo 'Centro de custo: ' . $contaReceber->ds_centroCusto ?>
                              <br />
                              <?php echo 'Valor: ' . $contaReceber->nr_valorParcela ?>
                              <br />
                              <?php echo 'Vencimento: ' . $contaReceber->dt_vencimento ?>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>