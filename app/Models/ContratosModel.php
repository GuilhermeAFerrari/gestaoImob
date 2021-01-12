<?php namespace App\Models;

use CodeIgniter\Model;

class ContratosModel extends Model {
    protected $table = 'tb_contratos';
    protected $primaryKey = 'id_contrato';
    protected $allowedFields = [
        'tp_contrato', 'nm_inquilino', 'nm_inquilino2', 'nm_inquilino3', 'nm_proprietario', 'nm_proprietario2', 'nm_proprietario3', 'ds_imovel', 'dt_contrato',
        'nm_corretorResponsavel', 'st_contrato', 'nr_valor', 'dt_vencimento', 'ds_observacao', 'nm_fiador', 'nm_fiador2', 'nm_fiador3', 'tp_garantia'
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