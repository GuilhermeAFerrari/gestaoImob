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
                
                <div class="col-sm-12" style="magin: 12px">
                    <hr><p><h6>Defina o locador</h6></p>
                </div>
                
                <div class="col-sm-6">
                    <div class="control-group">
                        <label class="control-label">Locador principal</label>
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
                <div class="col-sm-6">
                    <div class="control-group">
                        <label class="control-label">Locador 2</label><small> (Não obrigatório)</small>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="nm_proprietario2" required="">  
                            <option value=""></option>
                            <?php foreach($proprietarios as $proprietario) :?>
                                <option value="<?php echo $proprietario->nm_pessoa ?>"><?php echo $proprietario->nm_pessoa ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="control-group">
                        <label class="control-label">Locador 3</label><small> (Não obrigatório)</small>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="nm_proprietario3" required="">  
                            <option value=""></option>
                            <?php foreach($proprietarios as $proprietario) :?>
                                <option value="<?php echo $proprietario->nm_pessoa ?>"><?php echo $proprietario->nm_pessoa ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12" style="magin: 12px">
                    <hr><p><h6>Defina o imóvel e o tipo de contrato</h6></p>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Imóvel</label><small> (Referente ao locador principal)</small>
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
                        <label class="control-label">Tipo de contrato</label>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="tp_contrato" required="">  
                            <option value=""></option>
                            <option value="locacao">Locação</option>
                            <option value="venda">Venda</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12" style="magin: 12px">
                    <hr><p><h6>Defina o locatário</h6></p>
                </div>
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Locatário principal</label>
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
                        <label class="control-label">Locatário 2</label><small> (Não obrigatório)</small>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="nm_inquilino2" required="">  
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
                        <label class="control-label">Locatário 3</label><small> (Não obrigatório)</small>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="nm_inquilino3" required="">  
                            <option value=""></option>
                            <?php foreach($inquilinos as $inquilino) :?>
                                <option value="<?php echo $inquilino->nm_pessoa ?>"><?php echo $inquilino->nm_pessoa ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12" style="magin: 12px">
                    <hr><p><h6>Defina o tipo de garantia</h6></p>
                </div>
                
                <div class="col-sm-3">
                    <div class="control-group">
                        <label class="control-label">Tipo</label>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="tp_garantia" id="tipo" onchange="verifica()">  
                            <option value=""></option>
                            <option value="fiador">Fiador</option>
                            <option value="seguro fianca">Seguro Fiança</option>
                            <option value="caucao">Caução</option>
                            <option value="fianca">Fiança</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                </div>
                
                <!--Select do fiador-->
                <div class="col-sm-4">
                    <div class="control-group">
                        <label class="control-label">Fiador principal</label>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="nm_fiador" id="selectFiador" disabled="true">
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
                        <label class="control-label">Fiador 2</label><small> (Não obrigatório)</small>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="nm_fiador2" id="selectFiador2" disabled="true">
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
                        <label class="control-label">Fiador 3</label><small> (Não obrigatório)</small>
                        <div class="controls">
                        <select class="custom-select mr-sm-2" name="nm_fiador3" id="selectFiador3" disabled="true">
                            <option value=""></option> 
                            <?php foreach($fiadores as $fiador) :?>
                                <option value="<?php echo $fiador->nm_pessoa ?>"><?php echo $fiador->nm_pessoa ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-9">
                    <div class="control-group">
                        <label class="control-label">Observações</label><small> (Seguro fiança, caução, fiança)</small>
                        <div class="controls">
                            <input size="350" class="form-control" name="ds_observacao" id="selectObs" type="text" disabled="true" value="<?php echo isset($contrato) ? $contrato->ds_observacao : '' ?>">
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12" style="magin: 12px">
                    <hr><p><h6>Defina os demais dados</h6></p>
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
                        <label class="control-label">Corretor responsável</label>
                        <div class="controls">
                            <input size="150" class="form-control" required="" name="nm_corretorResponsavel" type="text" value="<?php echo isset($contrato) ? $contrato->nm_corretorResponsavel : '' ?>">
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
                        <label class="control-label">Data de vencimento</label><small> (Meses)</small>
                        <div class="controls">
                            <input class="form-control" required="" name="dt_vencimento" type="number" value="<?php echo isset($contrato) ? $contrato->dt_vencimento : '' ?>">
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
        </form>
    </div>
</div>
</body>
<script>
    
    function verifica(value){
	var input = document.getElementById("tipo").value;
	
	switch (input) {
    case 'fiador':
    document.getElementById("selectFiador").disabled = false;
    document.getElementById("selectFiador2").disabled = false;
    document.getElementById("selectFiador3").disabled = false;
    document.getElementById("selectObs").disabled = true;
    document.getElementById("selectObs").value = '';
    break;
    case 'seguro fianca':
    document.getElementById("selectFiador").disabled = true;
    document.getElementById("selectFiador2").disabled = true;
    document.getElementById("selectFiador3").disabled = true;
    document.getElementById("selectFiador").value = '';
    document.getElementById("selectFiador2").value = '';
    document.getElementById("selectFiador3").value = '';
    document.getElementById("selectObs").disabled = false;
    break;
    case 'caucao':
    document.getElementById("selectFiador").disabled = true;
    document.getElementById("selectFiador2").disabled = true;
    document.getElementById("selectFiador3").disabled = true;
    document.getElementById("selectFiador").value = '';
    document.getElementById("selectFiador2").value = '';
    document.getElementById("selectFiador3").value = '';
    document.getElementById("selectObs").disabled = false;
    break;
    case 'fianca':
    document.getElementById("selectFiador").disabled = true;
    document.getElementById("selectFiador2").disabled = true;
    document.getElementById("selectFiador3").disabled = true;
    document.getElementById("selectFiador").value = '';
    document.getElementById("selectFiador2").value = '';
    document.getElementById("selectFiador3").value = '';
    document.getElementById("selectObs").disabled = false;
    break;
    default:
    document.getElementById("selectFiador").disabled = true;
    document.getElementById("selectFiador2").disabled = true;
    document.getElementById("selectFiador3").disabled = true;
    document.getElementById("selectFiador").value = '';
    document.getElementById("selectFiador2").value = '';
    document.getElementById("selectFiador3").value = '';
    document.getElementById("selectObs").disabled = true;
}

        if(input == 'fiador'){
            document.getElementById("selectFiador").disabled = false;
        }
    };
    
</script>
</html>