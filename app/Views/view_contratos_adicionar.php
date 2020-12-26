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
        <h5>Agenda - Formalizar contrato</h5>
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
                        <label class="control-label">Tipo de contrato</label>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="tp_contrato" required="">  
                            <option value=""></option>
                            <option value="aluguel">Aluguel</option>
                            <option value="venda">Venda</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Inquilino</label>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="nm_inquilino" required="">  
                            <option value=""></option>
                            <?php foreach($inquilinos as $inquilino) :?>
                                <option value="<?php echo $inquilino->nm_pessoa ?>"><?php echo $inquilino->nm_pessoa ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Proprietário</label>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="nm_proprietario" required="">  
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
                        <label class="control-label">Fiador</label>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="nm_fiador">  
                            <option value=""></option>
                            <?php foreach($fiadores as $fiador) :?>
                                <option value="<?php echo $fiador->nm_pessoa ?>"><?php echo $fiador->nm_pessoa ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Imóvel</label>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="ds_imovel" required="">  
                            <option value=""></option>
                            <?php foreach($imoveis as $imovel) :?>
                                <option value="<?php echo $imovel->nm_responsavel . '-' . $imovel->nm_endereco ?>"><?php echo $imovel->nm_responsavel . '-' . $imovel->nm_endereco ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Data contrato</label>
                        <div class="controls">
                            <input class="form-control" required="" name="dt_contrato" type="date" value="<?php echo isset($contrato) ? $contrato->dt_contrato : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Nome do vendedor</label>
                        <div class="controls">
                            <input size="150" class="form-control" required="" name="nm_vendedor" type="text" value="<?php echo isset($contrato) ? $contrato->nm_vendedor : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Valor</label>
                        <div class="controls">
                            <input step="0.10" class="form-control" required="" name="nr_valor" type="number" value="<?php echo isset($contrato) ? $contrato->nr_valor : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Data de vencimento</label>
                        <div class="controls">
                            <input class="form-control" required="" name="dt_vencimento" type="date" value="<?php echo isset($contrato) ? $contrato->dt_vencimento : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Status contrato</label>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="st_contrato" required="">  
                            <option value=""></option>
                            <option value="pendente">Pendente</option>
                            <option value="ativo">Ativo</option>
                            <option value="encerrado">Encerrado</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="control-group">
                        <label class="control-label">Observações</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="ds_observacao" type="text" value="<?php echo isset($contrato) ? $contrato->ds_observacao : '' ?>">
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
</body>
</html>