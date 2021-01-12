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
        <h5>Configurações - Adicionar usuários</h5>
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
                        <a href="<?php echo base_url('configuracoes-usuario') ?>" type="btn" class="btn btn-danger">Voltar</a>
                    </div>
                    <br/>
                </div>
                <div class="col-sm-3">
                    <div class="control-group">
                        <label class="control-label">Nome do usuário</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nm_user" type="text" required="" value="<?php echo isset($user) ? $user->nm_user : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="control-group">
                        <label class="control-label">Login</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="ds_login" type="text" required="" value="<?php echo isset($user) ? $user->ds_login : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="control-group">
                        <label class="control-label">Senha</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="ds_password" type="text" required="" value="<?php echo isset($user) ? $user->ds_password : '' ?>">
                        </div>
                        <small><i>A senha será criptografada no banco de dados.</i></small>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="control-group">
                        <label class="control-label">Tipo</label>
                        <div class="controls">
                            <select class="custom-select mr-sm-2" name="tp_user" required="">
                                <option value=""></option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
</body>
</html>