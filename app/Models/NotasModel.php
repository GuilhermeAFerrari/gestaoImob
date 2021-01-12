<?php namespace App\Models;

use CodeIgniter\Model;

class NotasModel extends Model {
    protected $table = 'tb_notas';
    protected $primaryKey = 'id_nota';
    protected $allowedFields = [
        'ds_nota', 'nm_responsavel', 'tp_nota', 'dt_data'
    ];
    protected $returnType = 'object';
}