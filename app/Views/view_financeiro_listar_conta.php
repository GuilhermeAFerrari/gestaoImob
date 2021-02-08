<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo ?></title>
</head>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->
    <script src="assets/js/jquery.js"></script>
<body>
<?php echo $this->include('view_menu'); ?>
<div class="card" style="margin-top: 56px">
    <div class="card-header">
        <h5>Financeiro - Conta bancária</h5>
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

    <div class="col-sm-12">
        <div class="form-actions" style="margin-top: 12px">
        <a href="<?php echo base_url('financeiro-conta') ?>" type="btn" class="btn btn-primary">Adicionar conta bancária</a>
        </div>
        <br/>
    </div>

    <div class="table-sm" style="margin: 10px; font-size:12px !important">
        <table id="tabela" class="table">
            <thead>
                <tr style="text-align: center;
                            white-space: pre;">
                    <th scope="col">Ações</th>
                    <th scope="col">Nome da conta</th>
                    <th scope="col">Agência</th>
                    <th scope="col">Número da conta</th>
                    <th scope="col">Observações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($contas as $conta) : ?>
                    <tr style="text-align: center;">
                        <td>
                            <a href="<?php echo base_url('financeiro-confirmar-deletar-conta-bancaria/' . $conta->id_conta) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </a>
                        </td>
                        <th scope="row"><?php echo $conta->nm_conta ?></th>
                        <td><?php echo $conta->nr_agencia ?></td>
                        <td><?php echo $conta->nr_conta ?></td>
                        <td><?php echo $conta->ds_observacao ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
  </body>
</html>