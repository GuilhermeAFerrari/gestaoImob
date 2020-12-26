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
        <h5>Configurações - Ver empresa</h5>
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
                        <a href="<?php echo base_url('principal') ?>" type="btn" class="btn btn-danger">Voltar</a>
                    </div>
                    <br/>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Nome fantasia</label>
                        <div class="controls">
                            <input size="80" class="form-control" name="nm_fantasia" type="text" required="" value="<?php echo isset($empresa) ? $empresa->nm_fantasia : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Nome razao social</label>
                        <div class="controls">
                            <input size="80" class="form-control" name="nm_razaoSocial" type="text" required="" value="<?php echo isset($empresa) ? $empresa->nm_razaoSocial : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">CNPJ</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="ds_cnpj" type="text" required="" value="<?php echo isset($empresa) ? $empresa->ds_cnpj : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Inscrição estadual</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="ds_inscricaoEstadual" type="text" required="" value="<?php echo isset($empresa) ? $empresa->ds_inscricaoEstadual : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Inscrição municipal</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="ds_inscricaoMunicipal" type="text" required="" value="<?php echo isset($empresa) ? $empresa->ds_inscricaoMunicipal : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">E-mail</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="ds_email" type="email" required="" value="<?php echo isset($empresa) ? $empresa->ds_email : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Telefone</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="nr_telefone" type="text" required="" value="<?php echo isset($empresa) ? $empresa->nr_telefone : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Site</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="nm_site" type="text" required="" value="<?php echo isset($empresa) ? $empresa->nm_site : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12" style="magin: 12px">
                <hr><p><h6>Endereço</h6></p>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Logradouro</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="nm_rua" type="text" required="" value="<?php echo isset($empresa) ? $empresa->nm_rua : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">Número</label>
                        <div class="controls">
                            <input size="5" class="form-control" name="nr_numero" type="text" required="" value="<?php echo isset($empresa) ? $empresa->nr_numero : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Bairro</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="nm_bairro" type="text" required="" value="<?php echo isset($empresa) ? $empresa->nm_bairro : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Cidade</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="nm_cidade" type="text" required="" value="<?php echo isset($empresa) ? $empresa->nm_cidade : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">UF</label>
                        <div class="controls">
                            <input size="2" class="form-control" name="ds_uf" type="text" required="" value="<?php echo isset($empresa) ? $empresa->ds_uf : '' ?>">
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
</body>
</html>