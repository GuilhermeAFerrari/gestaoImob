<?php namespace App\Models;

use CodeIgniter\Model;

class ContratosModel extends Model {
    protected $table = 'tb_contratos';
    protected $primaryKey = 'id_contrato';
    protected $allowedFields = [
        'tp_contrato', 'nm_inquilino', 'nm_proprietario', 'nm_fiador', 'ds_imovel', 'dt_contrato',
        'nm_vendedor', 'st_contrato', 'nr_valor', 'dt_vencimento', 'ds_observacao'
    ];
    protected $returnType = 'object';

    public function listarAtivos() {
        $db = db_connect();
        $builder = $db->table('tb_contratos c');
        $builder->where('c.st_contrato', 'ativo');
        $query = $builder->get();
        return $query->getResultObject();
    }

    public function listarPendentes() {
        $db = db_connect();
        $builder = $db->table('tb_contratos c');
        $builder->where('c.st_contrato', 'pendente');
        $query = $builder->get();
        return $query->getResultObject();
    }

    public function listarEncerrados() {
        $db = db_connect();
        $builder = $db->table('tb_contratos c');
        $builder->where('c.st_contrato', 'encerrado');
        $query = $builder->get();
        return $query->getResultObject();
    }
}