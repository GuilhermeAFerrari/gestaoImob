<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title><?php echo $titulo?></title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/sigin.css" rel="stylesheet">
</head>

    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
        }
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
      </style>

<body class="text-center">

    <form class="form-signin" method="POST" action="<?php echo base_url('login/validarLogin'); ?>">
        <img class="mb-4" src="assets/logo.png" alt="Gestão IMob" width="100%" height="100%">
        <h1 class="h3 mb-3 font-weight-normal">Gestão IMob</h1>
        <label for="user" class="sr-only">Usuário</label>
        <input type="text" name="login" id="login" class="form-control" style="margin-bottom: 12px;" placeholder="Insira seu usuário" required autofocus>
        <label for="password" class="sr-only">Senha</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Insira sua senha" required>
        <?php if(!empty($msg)) { ?>
            <div class="alert alert-dark" role="alert">
                <?php echo $msg; ?>
            </div>
            <?php } ?>
        <button class="btn btn-lg btn-dark btn-block" type="submit">Acessar</button>
    </form>
</body>

</html>