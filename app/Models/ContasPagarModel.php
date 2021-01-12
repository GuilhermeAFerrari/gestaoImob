<?php namespace App\Models;

use CodeIgniter\Model;

class ContasPagarModel extends Model {
    protected $table = 'tb_contaspagar';
    protected $primaryKey = 'id_contaPagar';
    protected $allowedFields = [
        'nm_responsavel', 'ds_pagamento', 'ds_centroCusto', 'dt_vencimento', 'ds_formaPagamento',
        'ds_contaBancaria', 'ds_quitado', 'dt_registro', 'ds_observacao', 'nr_comissao', 'nr_valorParcela',
        'nr_qtParcela', 'nr_numeroParcela', 'nr_diferencaDias'
    ];
    protected $returnType = 'object';

    public function somaPagarData($de, $ate) {
        /*$db = db_connect();
        $builder = $db->table('tb_contasPagar p');
        $builder->selectSum('p.nr_valorBruto');
        //$builder->where('p.dt_vencimento', BETWENN '{$de}' AND '{$ate}');
        $builder->where('p.dt_vencimento', $de);
        $builder->where('p.dt_vencimento', $ate);
        $query = $builder->get();
        return $query->getResultArray();*/

        $db = db_connect();
        $query = $db->query("SELECT SUM(nr_valorParcela) FROM tb_contaspagar WHERE dt_vencimento between '{$de}' and '{$ate}' AND ds_quitado = 'Nao'");
        return $query->getResultArray();
    }
    
    public function somaPagarDataCentroCusto($de, $ate) {
        $db = db_connect();
        $query = $db->query("SELECT ds_centroCusto, SUM(nr_valorParcela) FROM tb_contaspagar
        WHERE dt_vencimento between '{$de}' and '{$ate}' AND ds_quitado = 'Nao' GROUP BY ds_centroCusto");
        return $query->getResultArray();
    }
    
    public function listarPorResponsavel() {
        $db = db_connect();
        $builder = $db->table('tb_contaspagar');
        $builder->orderBy('nm_responsavel', 'ASC');
        $builder->orderBy('nr_numeroParcela', 'ASC');
        $query = $builder->get();
        return $query->getResultObject();
    }
}