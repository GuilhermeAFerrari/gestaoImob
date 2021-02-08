<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo ?></title>
</head>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->
    <script src="assets/js/jquery.js"></script>
    
<body>
<?php echo $this->include('view_menu'); ?>
<div style="margin-top: 56px">
    <div class="card-header">
        <h5>Financeiro - Resumo diário</h5>
    </div>

    <form class="form-horizontal" method="post">
      <div class="row align-items-start" style="margin-left: 24px">
        <div class="col-sm-3">
          <div class="control-group">
              <label class="control-label">Filtrar de:</label>
              <div class="controls">
                  <input class="form-control" required="" name="dt_inicio" type="date">
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="control-group">
              <label class="control-label">Filtrar até:</label>
              <div class="controls">
                  <input class="form-control" required="" name="dt_fim" type="date">
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="controls" style="margin-top: 24px">
            <button type="submit" class="btn btn-success"><?php echo $acao ?></button>
          </div>
        </div>
      </div>
    </form>
    
    <div class="col-sm-12" style="text-decoration: underline;">
        <hr>
        <h6>Valores a pagar - De: <?php echo isset($de) ? $de : '' ?> - Até: <?php echo isset($ate) ? $ate : '' ?></h6>
    </div>

    <div class="table-sm" style="margin: 10px; font-size:12px !important">
        <table class="table table-striped">
            <thead>
                <tr style="text-align: center;
                            white-space: pre;">
                    <th scope="col">Favorecido</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Centro de custo</th>
                    <th scope="col">Vencimento</th>
                    <th scope="col">Forma</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Nr parcela</th>
                    <th scope="col">Qnt parcela</th>
                    <th scope="col">Comissão</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($resultadoP)) : ?>
                <?php foreach($resultadoP as $pagamento) : ?>
                    <tr style="text-align: center;">
                        <th scope="row"><?php echo $pagamento->nm_responsavel ?></th>
                        <td><?php echo $pagamento->ds_pagamento ?></td>
                        <td><?php echo $pagamento->ds_centroCusto ?></td>
                        <td><?php echo $pagamento->dt_vencimento ?></td>
                        <td><?php echo $pagamento->ds_formaPagamento ?></td>
                        <td><?php echo $pagamento->nr_valorParcela ?></td>
                        <td><?php echo $pagamento->nr_numeroParcela ?></td>
                        <td><?php echo $pagamento->nr_qtParcela ?></td>
                        <td><?php echo $pagamento->nr_comissao ?></td>
                    </tr>
                <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
        
        <div class="col-sm-12" style="text-decoration: underline;">
            <hr>
            <h6>Valores a receber - De: <?php echo isset($de) ? $de : '' ?> - Até: <?php echo isset($ate) ? $ate : '' ?></h6>
        </div>
    
        <table class="table table-striped">
            <thead>
                <tr style="text-align: center;
                            white-space: pre;">
                    <th scope="col">Favorecido</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Centro de custo</th>
                    <th scope="col">Vencimento</th>
                    <th scope="col">Forma</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Nr parcela</th>
                    <th scope="col">Qnt parcela</th>
                    <th scope="col">Comissão</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($resultadoR)) : ?>
                <?php foreach($resultadoR as $recebimento) : ?>
                    <tr style="text-align: center;">
                        <th scope="row"><?php echo $recebimento->nm_responsavel ?></th>
                        <td><?php echo $recebimento->ds_recebimento ?></td>
                        <td><?php echo $recebimento->ds_centroCusto ?></td>
                        <td><?php echo $recebimento->dt_vencimento ?></td>
                        <td><?php echo $recebimento->ds_formaPagamento ?></td>
                        <td><?php echo $recebimento->nr_valorParcela ?></td>
                        <td><?php echo $recebimento->nr_numeroParcela ?></td>
                        <td><?php echo $recebimento->nr_qtParcela ?></td>
                        <td><?php echo $recebimento->nr_comissao ?></td>
                    </tr>
                <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
    
    </div>
  </body>
</html>