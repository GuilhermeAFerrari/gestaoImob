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
        <h5>Agenda - Adicionar contato</h5>
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
                        <a href="<?php echo base_url('agenda-contatos') ?>" type="btn" class="btn btn-danger">Voltar</a>
                    </div>
                    <br/>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nm_contact" type="text" required="" value="<?php echo isset($contato) ? $contato->nm_contact : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Telefone 1</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nr1_contact" type="text" required="" value="<?php echo isset($contato) ? $contato->nr1_contact : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Telefone 2</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nr2_contact" type="text" value="<?php echo isset($contato) ? $contato->nr2_contact : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">E-mail</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="ds_email" type="email" value="<?php echo isset($contato) ? $contato->ds_email : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Rua</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="ds_endereco" type="text" value="<?php echo isset($contato) ? $contato->ds_endereco : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Número</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nr_endereco" type="text" value="<?php echo isset($contato) ? $contato->nr_endereco : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Bairro</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="ds_bairro" type="text" value="<?php echo isset($contato) ? $contato->ds_bairro : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Cidade</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nm_cidade" type="text" value="<?php echo isset($contato) ? $contato->nm_cidade : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">UF</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nm_uf" type="text" value="<?php echo isset($contato) ? $contato->nm_uf : '' ?>">
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
</body>
</html>