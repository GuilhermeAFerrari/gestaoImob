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
        <h5>Informações de contrato</h5>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post">
            <div class="row align-items-start">
                <div class="col-sm-12">
                    <div class="form-actions">
                        <a href="<?php echo base_url('principal') ?>" type="btn" class="btn btn-danger">Voltar</a>
                    </div>

                </div>
                
                <div class="col-sm-12">
                    <hr><p><h5>Locadores</h5></p>
                </div>
                
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="font-weight-bold">Locador principal:</label>
                        <label class="carousel-inner"><?php echo $contratos->nm_proprietario ?></label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="font-weight-bold">Locador 2:</label>
                        <label class="carousel-inner"><?php echo $contratos->nm_proprietario2 ?></label>
                    </div>
                </div>
                
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="font-weight-bold">Locador 3:</label>
                        <label class="carousel-inner"><?php echo $contratos->nm_proprietario3 ?></label>
                    </div>
                </div>
                
                
                <div class="col-sm-12">
                    <hr><p><h5>Locatários</h5></p>
                </div>
                
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="font-weight-bold">Locatário principal:</label>
                        <label class="carousel-inner"><?php echo $contratos->nm_inquilino ?></label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="font-weight-bold">Locatário 2:</label>
                        <label class="carousel-inner"><?php echo $contratos->nm_inquilino2 ?></label>
                    </div>
                </div>
                
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="font-weight-bold">Locatário 3:</label>
                        <label class="carousel-inner"><?php echo $contratos->nm_inquilino3 ?></label>
                    </div>
                </div>
                
                <div class="col-sm-12">
                    <hr><p><h5>Tipo e imóvel</h5></p>
                </div>
                
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="font-weight-bold">Tipo de contrato:</label>
                        <label class="carousel-inner"><?php echo $contratos->tp_contrato ?></label>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="font-weight-bold">Status do contrato:</label>
                        <label class="carousel-inner"><?php echo $contratos->st_contrato ?></label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="font-weight-bold">Imóvel:</label>
                        <label class="carousel-inner"><?php echo $contratos->ds_imovel ?></label>
                    </div>
                </div>
                
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="font-weight-bold">Data do contrato:</label>
                        <label class="carousel-inner"><?php echo $contratos->dt_contrato ?></label>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="font-weight-bold">Vencimento:</label>
                        <label class="carousel-inner"><?php echo $contratos->dt_vencimento ?></label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="font-weight-bold">Corretor responsável:</label>
                        <label class="carousel-inner"><?php echo $contratos->nm_corretorResponsavel ?></label>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="font-weight-bold">Valor:</label>
                        <label class="carousel-inner"><?php echo $contratos->nr_valor ?></label>
                    </div>
                </div>
                
                <div class="col-sm-12">
                    <hr><p><h5>Garantia</h5></p>
                </div>
                
                <div class="col-sm-12">
                    <div class="control-group">
                        <label class="font-weight-bold">Tipo de garantia:</label>
                        <label class="carousel-inner"><?php echo $contratos->tp_garantia ?></label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="font-weight-bold">Fiador principal:</label>
                        <label class="carousel-inner"><?php echo $contratos->nm_fiador ?></label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="font-weight-bold">Fiador 2:</label>
                        <label class="carousel-inner"><?php echo $contratos->nm_fiador2 ?></label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="font-weight-bold">Fiador 3:</label>
                        <label class="carousel-inner"><?php echo $contratos->nm_fiador3 ?></label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="control-group">
                        <label class="font-weight-bold">Observações:</label>
                        <label class="carousel-inner"><?php echo $contratos->ds_observacao ?></label>
                    </div>
                </div>
                
        </form>
    </div>
</div>
</body>
</html>