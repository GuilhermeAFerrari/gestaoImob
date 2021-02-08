<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo ?></title>
</head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="assets/js/jquery.js"></script>
<body>
<?php echo $this->include('view_menu'); ?>
<div class="card" style="margin-top: 56px">
    <div class="card-header">
        <h5>Financeiro - Ajuste valor</h5>
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
    
    <?php
    
    if(isset($contas->nr_valorBruto)) {
        $valor = 'nr_valorBruto';
    } else {
        $valor = 'nr_valorParcela';
    }
    
    ?>

    <div class="card-body">
        <form class="form-horizontal" method="post">
            <div class="row align-items-start">
                <div class="col-sm-12">
                    <div class="form-actions">
                        <button type="submit" value="<?php echo $acao ?>"class="btn btn-success"><?php echo $acao ?></button>
                        <a href="<?php echo base_url('financeiro-pagamentos-listar') ?>" type="btn" class="btn btn-danger">Voltar</a>
                    </div>
                    <br/>
                </div>
                <div class="col-sm-3">
                    <div class="control-group">
                        <label class="control-label">Novo valor</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="<?php echo $valor ?>" type="text" required="" value="<?php echo $contas->$valor ?>">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>