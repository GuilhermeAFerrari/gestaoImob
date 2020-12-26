<?php namespace App\Models;

use CodeIgniter\Model;

class ContasPagarModel extends Model {
    protected $table = 'tb_contasPagar';
    protected $primaryKey = 'id_contaPagar';
    protected $allowedFields = [
        'nm_responsavel', 'ds_pagamento', 'ds_centroCusto', 'dt_vencimento', 'ds_formaPagamento',
        'ds_contaBancaria', 'nr_valorBruto', 'nr_juros', 'nr_desconto', 'ds_quitado', 'dt_registro',
        'ds_observacao'
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
        $query = $db->query("SELECT SUM(nr_valorBruto) FROM tb_contasPagar WHERE dt_vencimento between '{$de}' and '{$ate}' AND ds_quitado = 'Nao'");
        return $query->getResultArray();
    }
}