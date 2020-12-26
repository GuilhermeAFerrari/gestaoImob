<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Gestão IMob - Principal</title>
	<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
</head>
<body>
	<?php echo $this->include('view_menu'); ?>
	<div class="card" style="margin-top: 56px">
        <div class="card-header">
            <h5>Olá <?php echo $_SESSION['activeUser']?>, abaixo estão listadas as suas reuniões e notas.</h5>
        </div>
    </div>
    <div class="card-body">
        <div class="row align-items-start">
            <?php foreach($notas as $nota) : ?>
                <div class="col-sm-4" style="margin-bottom: 12px">
                    <div class="card">
                        <div class="card-body"  style="background-color: #FFFFA5 ">
                            <h5 class="card-title"><?php echo $nota->tp_nota ?></h5>
                            <p class="card-text"><b><?php echo 'Responsável: </b>' . $nota->nm_responsavel ?></p>
                            <p class="card-text"><?php echo $nota->ds_nota ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</body>
</html>
