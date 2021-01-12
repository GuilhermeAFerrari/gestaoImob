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
        <h5>Financeiro - Adicionar Pagamentos</h5>
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
                        <a href="<?php echo base_url('financeiro-pagamentos-listar') ?>" type="btn" class="btn btn-danger">Voltar</a>
                    </div>
                    <br/>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Favorecido</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nm_responsavel" type="text" required="" value="<?php echo isset($contas) ? $contas->nm_responsavel : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Descrição</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="ds_pagamento" type="text" value="<?php echo isset($contas) ? $contas->ds_pagamento : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Centro de custo</label>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="ds_centroCusto">  
                            <option value=""></option>
                            <?php foreach($centroCusto as $centro) :?>
                                <option value="<?php echo $centro->ds_classe . '-' . $centro->ds_descricao ?>"><?php echo $centro->ds_classe . '-' . $centro->ds_descricao ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Vencimento</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="dt_vencimento" type="date" required="" value="<?php echo isset($contas) ? $contas->dt_vencimento : '' ?>">  
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="control-group">
                        <label class="control-label">Pix</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="ds_contaBancaria" type="text" value="<?php echo isset($contas) ? $contas->ds_contaBancaria : '' ?>">  
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">Comissão</label>
                        <div class="controls">
                            <input size="50" class="form-control" step="0.01" name="nr_comissao" type="number" value="<?php echo isset($contas) ? $contas->nr_comissao : '' ?>">  
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">Pagamento quitado</label>
                        <div class="controls">
                            <select class="custom-select mr-sm-2" name="ds_quitado" required="">
                                <?php
                                    if(isset($contas)) {
                                        switch($contas->ds_quitado) {
                                            case 'Sim':
                                                echo '
                                                    <option value="Sim" selected>Sim</option>
                                                    <option value="Nao">Não</option>
                                                ';
                                                break;
                                            case 'Nao':
                                                echo '
                                                    <option value="Sim">Sim</option>
                                                    <option value="Nao" selected>Não</option>
                                                ';
                                                break;
                                            default:
                                                echo '
                                                    <option value=""></option>
                                                    <option value="Sim">Sim</option>
                                                    <option value="Nao">Não</option>
                                                ';
                                        }
                                    }
                                    else {
                                        echo '
                                            <option value=""></option>
                                            <option value="Sim">Sim</option>
                                            <option value="Nao">Não</option>
                                        ';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12" style="magin: 12px">
                    <hr><p><h6>Defina a forma de pagamento</h6></p>
                </div>
                
                <div class="col-sm-3">
                    <div class="control-group">
                        <label class="control-label">Forma de pagamento</label>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="ds_formaPagamento" id="formaPagamento" onchange="verifica()">  
                            <option value=""></option>
                            <option value="a vista">À vista</option>
                            <option value="parcelado">Parcelado</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">Valor líquido</label>
                        <div class="controls">
                            <input size="50" class="form-control" id="valorBruto" disabled="true" step="0.01" name="nr_valorParcela" type="number" value="<?php echo isset($contas) ? $contas->nr_valorBruto : '' ?>">  
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">Valor da parcela</label>
                        <div class="controls">
                            <input size="50" class="form-control" id="valorParcela" disabled="true" step="0.01" name="nr_valorParcela" type="number" value="<?php echo isset($contas) ? $contas->nr_valorParcela : '' ?>">  
                        </div>
                        
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">Quantidade de parcela</label>
                        <div class="controls">
                            <input size="50" class="form-control" id="qtParcela" min="1" disabled="true" name="nr_qtParcela" type="number" value="<?php echo isset($contas) ? $contas->nr_qtParcela : '' ?>">  
                        </div>
                        
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">Dias entre parcelas</label>
                        <div class="controls">
                            <input size="50" class="form-control" id="diferencaDias" type="number" disabled="true" name="nr_diferencaDias" value="<?php echo isset($contas) ? $contas->nr_diferencaDias : '' ?>">  
                        </div>
                        
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="control-group">
                        <label class="control-label">Data de registro</label>
                        <div class="controls">
                            <input size="50" readonly class="form-control" name="dt_registro" type="text" value="<?php echo $dataAtual; ?>">  
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="control-group">
                        <label class="control-label">Observações</label>
                        <div class="controls">
                            <input name="ds_observacao" size="800" class="form-control" value="<?php echo isset($contas) ? $contas->ds_observacao : '' ?>">  
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
</body>
<script>

    function verifica(value){
        
	var input = document.getElementById("formaPagamento").value;
	console.log(input);
    	switch (input) {
        case 'a vista':
        document.getElementById("valorBruto").disabled = false;
        document.getElementById("valorParcela").disabled = true;
        document.getElementById("diferencaDias").disabled = true;
        document.getElementById("qtParcela").disabled = true;
        document.getElementById("valorParcela").value = '';
        document.getElementById("qtParcela").value = '';
        document.getElementById("diferencaDias").value = '';
        break;
        case 'parcelado':
        document.getElementById("diferencaDias").disabled = false;
        document.getElementById("valorBruto").disabled = true;
        document.getElementById("valorBruto").value = '';
        document.getElementById("valorParcela").disabled = false;
        document.getElementById("qtParcela").disabled = false;
        break;
        default:
        document.getElementById("valorParcela").disabled = true;
        document.getElementById("qtParcela").disabled = true;
        document.getElementById("valorBruto").disabled = true;
        document.getElementById("diferencaDias").disabled = true;
        break;
        }
    }
    
</script>
</html>