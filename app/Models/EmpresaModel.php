<?php namespace App\Models;

use CodeIgniter\Model;

class EmpresaModel extends Model {
    protected $table = 'tb_empresa';
    protected $primaryKey = 'id_empresa';
    protected $allowedFields = [
        'nm_fantasia', 'nm_razaoSocial', 'ds_cnpj', 'ds_inscricaoEstadual', 'ds_inscricaoMunicipal',
        'ds_email', 'nr_telefone', 'nm_site', 'nm_rua', 'nr_numero', 'nm_bairro',
        'nm_cidade', 'ds_uf'
    ];
    protected $returnType = 'object';
}