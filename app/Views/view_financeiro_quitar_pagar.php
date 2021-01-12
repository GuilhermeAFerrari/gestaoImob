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
                            <a href="<?php echo base_url('financeiro-quitar-pagar/' . $id_contaPagar) ?>" type="button" class="btn btn-danger" style="margin-left:20px; margin-bottom:10px;">Quitar</a>
                            <a href="<?php echo base_url('financeiro-pagamentos-listar') ?>" type="button" class="btn btn-secondary" style="margin-left:20px; margin-bottom:10px;">Voltar</a>
                          </div>
                            <br/>
                            <input type="hidden" name="id" value="<?php echo $id_contaPagar;?>" />
                            <div class="alert alert-danger">
                              Deseja quitar a conta?
                              <hr>
                              <br />
                              <?php echo 'Responsável: ' . $contaPagar->nm_responsavel ?>
                              <br />
                              <?php echo 'Descrição: ' . $contaPagar->ds_pagamento ?>
                              <br />
                              <?php echo 'Centro de custo: ' . $contaPagar->ds_centroCusto ?>
                              <br />
                              <?php echo 'Valor: ' . $contaPagar->nr_valorParcela ?>
                              <br />
                              <?php echo 'Vencimento: ' . $contaPagar->dt_vencimento ?>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>