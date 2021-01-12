<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo ?></title>
</head>
    <script src="assets/js/jquery.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<body>
<?php echo $this->include('view_menu'); ?>
<div class="card" style="margin-top: 56px">
    <div class="card-header">
        <h5>Cadastros - Adicionar</h5>
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
                        <a href="<?php echo base_url('cadastros-proprietario') ?>" type="btn" class="btn btn-secondary">Locadores</a>
                        <a href="<?php echo base_url('cadastros-inquilino') ?>" type="btn" class="btn btn-secondary">Locatários</a>
                        <a href="<?php echo base_url('cadastros-fiador') ?>" type="btn" class="btn btn-secondary">Fiadores</a>
                        <a href="<?php echo base_url('cadastros-lead') ?>" type="btn" class="btn btn-secondary">Leads</a>
                    </div>
                    <br/>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nm_pessoa" type="text" required="" value="<?php echo isset($pessoas) ? $pessoas->nm_pessoa : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">E-mail</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="ds_email" type="email" value="<?php echo isset($pessoas) ? $pessoas->ds_email : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Telefone primário</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nr_telefone1" type="text" value="<?php echo isset($pessoas) ? $pessoas->nr_telefone1 : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Telefone secundário</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nr_telefone2" type="text" value="<?php echo isset($pessoas) ? $pessoas->nr_telefone2 : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Rua</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nm_rua" type="text" value="<?php echo isset($pessoas) ? $pessoas->nm_rua : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">Número</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nr_numero" type="text" value="<?php echo isset($pessoas) ? $pessoas->nr_numero : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Bairro</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nm_bairro" type="text" value="<?php echo isset($pessoas) ? $pessoas->nm_bairro : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Cidade</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nm_cidade" type="text" value="<?php echo isset($pessoas) ? $pessoas->nm_cidade : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">UF</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nm_uf" type="text" value="<?php echo isset($pessoas) ? $pessoas->nm_uf : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">CEP</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="ds_cep" type="text" value="<?php echo isset($pessoas) ? $pessoas->ds_cep : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="control-group">
                        <label class="control-label">Complemento</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="ds_complemento" type="text" value="<?php echo isset($pessoas) ? $pessoas->ds_complemento : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="control-group">
                        <label class="control-label">Tipo</label>
                        <div class="controls">
                            <select class="custom-select mr-sm-2" name="tp_pessoa" required="">
                                <option value=""></option>
                                <option value="locador">Locador</option>
                                <option value="locatario">Locatário</option>
                                <option value="fiador">Fiador</option>
                                <option value="lead">Lead</option>
                            </select>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
</body>
</html>