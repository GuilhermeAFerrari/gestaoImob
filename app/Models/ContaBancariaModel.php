<?php namespace App\Models;

use CodeIgniter\Model;

class ContaBancariaModel extends Model {
    protected $table = 'tb_contabancaria';
    protected $primaryKey = 'id_conta';
    protected $allowedFields = [
        'nm_conta', 'nr_agencia', 'nr_conta', 'ds_observacao'
    ];
    protected $returnType = 'object';
}