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
                        <label class="control-label">Locador responsável</label>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="nm_responsavel" required="">  
                            <option value=""></option>
                            <?php foreach($proprietarios as $proprietario) :?>
                                <option value="<?php echo $proprietario->nm_pessoa ?>"><?php echo $proprietario->nm_pessoa ?></option>
                            <?php endforeach; ?>
                        </select>
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
                            <input size="90" class="form-control" name="tp_imovel" type="text" value="<?php echo isset($imovel) ? $imovel->tp_imovel : '' ?>">
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
                                <option value="locacao">Locação</option>
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
                
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">Código CPFL</label>
                        <div class="controls">
                            <input size="15" class="form-control" name="ds_codCpfl" type="text" value="<?php echo isset($imovel) ? $imovel->ds_codCpfl : '' ?>">
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">Código gás</label>
                        <div class="controls">
                            <input size="15" class="form-control" name="ds_codGas" type="text" value="<?php echo isset($imovel) ? $imovel->ds_codGas : '' ?>">
                        </div>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">Nº Matrícula</label>
                        <div class="controls">
                            <input size="15" class="form-control" name="ds_numMatricula" type="text" value="<?php echo isset($imovel) ? $imovel->ds_numMatricula : '' ?>">
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Medidor responsável</label>
                        <div class="controls">
                            <input size="15" class="form-control" name="nm_medidor" type="text" value="<?php echo isset($imovel) ? $imovel->nm_medidor : '' ?>">
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
</body>
</html>