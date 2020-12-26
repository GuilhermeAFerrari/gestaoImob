<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo ?></title>
</head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
<body>
<?php echo $this->include('view_menu'); ?>
<div class="card" style="margin-top: 56px">
    <div class="card-header">
        <h5>Cadastros - Adicionar imóveis</h5>
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
                        <a href="<?php echo base_url('cadastros-imovel') ?>" type="btn" class="btn btn-danger">Voltar</a>
                    </div>
                    <br/>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Nome responsável</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nm_responsavel" type="text" required="" value="<?php echo isset($imovel) ? $imovel->nm_responsavel : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Endereço</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nm_endereco" type="text" required="" value="<?php echo isset($imovel) ? $imovel->nm_endereco : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Bairro</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nm_bairro" type="text" value="<?php echo isset($imovel) ? $imovel->nm_bairro : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Cidade</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nm_cidade" type="text" value="<?php echo isset($imovel) ? $imovel->nm_cidade : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">UF</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="ds_uf" type="text" value="<?php echo isset($imovel) ? $imovel->ds_uf : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="control-group">
                        <label class="control-label">CEP</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="ds_cep" type="text" value="<?php echo isset($imovel) ? $imovel->ds_cep : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="control-group">
                        <label class="control-label">Tipo de imóvel</label>
                        <div class="controls">
                            <select class="custom-select mr-sm-2" name="tp_imovel" required="">
                                <option value=""></option>
                                <option value="casa">Casa</option>
                                <option value="apartamento">Apartamento</option>
                                <option value="comercial">Comercial</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">Quantidade dormitórios</label>
                        <div class="controls">
                            <input size="15" class="form-control" name="nr_dormitorios" type="number" value="<?php echo isset($imovel) ? $imovel->nr_dormitorios : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">Área construída - M²</label>
                        <div class="controls">
                            <input size="15" class="form-control" step="0.01" name="nr_areaConstruida" type="number" value="<?php echo isset($imovel) ? $imovel->nr_areaConstruida : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">Área total - M²</label>
                        <div class="controls">
                            <input size="15" class="form-control" step="0.01" name="nr_areaTotal" type="number" value="<?php echo isset($imovel) ? $imovel->nr_areaTotal : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Tipo de negócio</label>
                        <div class="controls">
                            <select class="custom-select mr-sm-2" name="tp_negocio">
                                <option value=""></option>
                                <option value="venda">Venda</option>
                                <option value="aluguel">Aluguel</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">valor</label>
                        <div class="controls">
                            <input size="15" class="form-control" step="0.01" name="nr_valor" type="number" value="<?php echo isset($imovel) ? $imovel->nr_valor : '' ?>">
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
</body>
</html>