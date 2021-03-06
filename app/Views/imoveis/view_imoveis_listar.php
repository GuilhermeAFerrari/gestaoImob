<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo ?></title>
</head>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->
    <script src="assets/js/jquery.js"></script>
<body>
<?php echo $this->include('view_menu'); ?>
<div class="card" style="margin-top: 56px">
    <div class="card-header">
        <h5>Cadastros - Imóveis</h5>
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

    <div class="col-sm-12">
        <div class="form-actions" style="margin-top: 12px">
        <a href="<?php echo base_url('imoveis-adicionar') ?>" type="btn" class="btn btn-primary"><?php echo $acao ?></a>
        </div>
        <br/>
    </div>

    <div class="table-sm" style="margin: 10px; font-size:12px !important">
        <table id="tabela" class="table">
            <thead>
                <tr style="text-align: center;
                            white-space: pre;">
                    <th scope="col">Ações</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">UF</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Tipo de imóvel</th>
                    <th scope="col">Nº dormitórios</th>
                    <th scope="col">Área construída</th>
                    <th scope="col">Área total</th>
                    <th scope="col">Tipo de negócio</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Cód CPFL</th>
                    <th scope="col">Cód GÁS</th>
                    <th scope="col">Matrícula</th>
                    <th scope="col">Medidor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($imoveis as $imovel) : ?>
                    <tr style="text-align: center;">
                        <td>
                            <a href="<?php echo base_url('imoveis-editar/' . $imovel->id_imovel) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </a>
                            <a href="<?php echo base_url('imoveis-confirmar-deletar/' . $imovel->id_imovel) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </a>
                        </td>
                        <th scope="row"><?php echo $imovel->nm_responsavel ?></th>
                        <td><?php echo $imovel->nm_endereco ?></td>
                        <td><?php echo $imovel->nm_bairro ?></td>
                        <td><?php echo $imovel->nm_cidade ?></td>
                        <td><?php echo $imovel->ds_uf ?></td>
                        <td><?php echo $imovel->ds_cep ?></td>
                        <td><?php echo $imovel->tp_imovel ?></td>
                        <td><?php echo $imovel->nr_dormitorios ?></td>
                        <td><?php echo $imovel->nr_areaConstruida ?></td>
                        <td><?php echo $imovel->nr_areaTotal ?></td>
                        <td><?php echo $imovel->tp_negocio ?></td>
                        <td><?php echo $imovel->nr_valor ?></td>
                        <td><?php echo $imovel->ds_codCpfl ?></td>
                        <td><?php echo $imovel->ds_codGas ?></td>
                        <td><?php echo $imovel->ds_numMatricula ?></td>
                        <td><?php echo $imovel->nm_medidor ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
  </body>
</html>