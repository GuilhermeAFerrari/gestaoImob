<?php namespace App\Models;

use CodeIgniter\Model;

class imoveisModel extends Model {
    protected $table = 'tb_imoveis';
    protected $primaryKey = 'id_imovel';
    protected $allowedFields = [
        'nm_responsavel', 'nm_endereco', 'nm_bairro', 'nm_cidade', 'ds_uf',
        'ds_cep', 'tp_imovel', 'nr_dormitorios', 'nr_areaConstruida', 'nr_areaTotal',
        'tp_negocio', 'nr_valor', 'ds_codCpfl', 'ds_codGas', 'ds_numMatricula', 'nm_medidor'
    ];
    protected $returnType = 'object';
}
