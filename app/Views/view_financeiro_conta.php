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
        <h5>Financeiro - Adicionar conta bancária</h5>
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

    <div class="card-body">
        <form class="form-horizontal" method="post">
            <div class="row align-items-start">
                <div class="col-sm-12">
                    <div class="form-actions">
                        <button type="submit" value="<?php echo $acao ?>"class="btn btn-success"><?php echo $acao ?></button>
                        <a href="<?php echo base_url('financeiro-conta-listar') ?>" type="btn" class="btn btn-danger">Voltar</a>
                    </div>
                    <br/>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Nome da conta</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nm_conta" type="text" required="" value="<?php echo isset($estoque) ? $estoque->NM_Material : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Agência</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nr_agencia" type="text" required="" value="<?php echo isset($estoque) ? $estoque->NM_Material : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Número da conta</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nr_conta" type="text" required="" value="<?php echo isset($estoque) ? $estoque->NM_Material : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="control-group">
                        <label class="control-label">Observações</label>
                        <div class="controls">
                            <textarea name="ds_observacao" size="200" class="form-control" value="<?php echo isset($estoque) ? $estoque->DS_Material : '' ?>"></textarea>  
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
</body>
</html>