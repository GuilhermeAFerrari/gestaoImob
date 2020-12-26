<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo ?></title>
</head>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->
    <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
<body>
<?php echo $this->include('view_menu'); ?>
<div class="card" style="margin-top: 56px">
    <div class="card-header">
        <h5>Contratos - <?php echo $acao ?></h5>
    </div>

    <?php if(!empty($msg)) { ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $msg; ?>
    </div>
    <?php } ?>
    
    <?php if(!empty($erros)) { ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach($erros as $erro) : ?>
            <li><?php echo $erro; ?></li>
        <?php endforeach; ?>
    </div>
    <?php } ?>

    <div class="table-sm" style="margin: 10px">
        <table id="tabela" class="table">
            <thead>
                <tr style="text-align: center;
                            white-space: pre;">
                    <th scope="col">Tipo</th>
                    <th scope="col">Inquilino</th>
                    <th scope="col">Proprietário</th>
                    <th scope="col">Fiador</th>
                    <th scope="col">Resp. Imóvel</th>
                    <th scope="col">Data início</th>
                    <th scope="col">Vendedor</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Data vencimento</th>
                    <th scope="col">Observação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($contratos as $contrato) : ?>
                    <tr style="text-align: center;">
                        <th scope="row"><?php echo $contrato->tp_contrato ?></th>
                        <td><?php echo $contrato->nm_inquilino ?></td>
                        <td><?php echo $contrato->nm_proprietario ?></td>
                        <td><?php echo $contrato->nm_fiador ?></td>
                        <td><?php echo $contrato->ds_imovel ?></td>
                        <td><?php echo $contrato->dt_contrato ?></td>
                        <td><?php echo $contrato->nm_vendedor ?></td>
                        <td><?php echo $contrato->nr_valor ?></td>
                        <td><?php echo $contrato->dt_vencimento ?></td>
                        <td><?php echo $contrato->ds_observacao ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
  </body>
</html>