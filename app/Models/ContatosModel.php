<?php namespace App\Models;

use CodeIgniter\Model;

class ContatosModel extends Model {
    protected $table = 'tb_contacts';
    protected $primaryKey = 'id_contact';
    protected $allowedFields = [
        'nm_contact', 'nr1_contact', 'nr2_contact', 'ds_email', 'ds_endereco',
        'nr_endereco', 'ds_bairro', 'nm_cidade', 'nm_uf', 'tp_garantia'
    ];
    protected $returnType = 'object';
}