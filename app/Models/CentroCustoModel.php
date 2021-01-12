<?php namespace App\Models;

use CodeIgniter\Model;

class CentroCustoModel extends Model {
    protected $table = 'tb_centrocusto';
    protected $primaryKey = 'id_centroCusto';
    protected $allowedFields = [
        'ds_classe', 'ds_descricao'
    ];
    protected $returnType = 'object';
}