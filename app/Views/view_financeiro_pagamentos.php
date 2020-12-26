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
                        <label class="control-label">Responsável do pagamento</label>
                        <div class="controls">
                            <input size="150" class="form-control" name="nm_responsavel" type="text" required="" value="<?php echo isset($contas) ? $contas->nm_responsavel : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Descrição do pagamento</label>
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
                            <input size="50" class="form-control" name="dt_vencimento" type="date" value="<?php echo isset($contas) ? $contas->dt_vencimento : '' ?>">  
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="control-group">
                        <label class="control-label">Forma de pagamento</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="ds_formaPagamento" type="text" value="<?php echo isset($contas) ? $contas->ds_formaPagamento : '' ?>">  
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="control-group">
                        <label class="control-label">Conta bancária</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="ds_contaBancaria" type="text" value="<?php echo isset($contas) ? $contas->ds_contaBancaria : '' ?>">  
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">Valor bruto</label>
                        <div class="controls">
                            <input size="50" class="form-control" step="0.01" name="nr_valorBruto" type="number" value="<?php echo isset($contas) ? $contas->nr_valorBruto : '' ?>">  
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">Juros</label><small> - (Informe % ou R$)</small>
                        <div class="controls">
                            <input size="50" class="form-control" name="nr_juros" type="text" value="<?php echo isset($contas) ? $contas->nr_juros : '' ?>">  
                        </div>
                        
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="control-group">
                        <label class="control-label">Desconto</label><small> - (Informe % ou R$)</small>
                        <div class="controls">
                            <input size="50" class="form-control" name="nr_desconto" type="text" value="<?php echo isset($contas) ? $contas->nr_desconto : '' ?>">  
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
</html>