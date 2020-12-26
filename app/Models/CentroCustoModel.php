<?php namespace App\Models;

use CodeIgniter\Model;

class CentroCustoModel extends Model {
    protected $table = 'tb_centroCusto';
    protected $primaryKey = 'id_centroCusto';
    protected $allowedFields = [
        'ds_classe', 'ds_descricao'
    ];
    protected $returnType = 'object';
}