<?php namespace App\Models;

use CodeIgniter\Model;

class ContasReceberModel extends Model {
    protected $table = 'tb_contasreceber';
    protected $primaryKey = 'id_contaReceber';
    protected $allowedFields = [
        'nm_responsavel', 'ds_recebimento', 'ds_centroCusto', 'dt_vencimento', 'ds_formaPagamento',
        'ds_contaBancaria', 'ds_quitado', 'dt_registro', 'nr_qtParcela', 'nr_valorParcela',
        'ds_observacao', 'nr_comissao', 'nr_diferencaDias', 'nr_numeroParcela', 'dt_quitado'
    ];
    protected $returnType = 'object';

    public function somaReceberData($de, $ate) {
        /*$db = db_connect();
        $builder = $db->table('tb_contasReceber r');
        $builder->selectSum('r.nr_valorBruto');
        //$builder->where('p.dt_vencimento', BETWENN '{$de}' AND '{$ate}');
        $builder->where('r.dt_vencimento', $de);
        $builder->where('r.dt_vencimento', $ate);
        $query = $builder->get();
        return $query->getResultArray();*/

        $db = db_connect();
        $query = $db->query("SELECT SUM(nr_valorParcela) FROM tb_contasreceber WHERE dt_vencimento between '{$de}' and '{$ate}' AND ds_quitado = 'Nao'");
        return $query->getResultArray();
    }
    
    public function somaReceberDataCentroCusto($de, $ate) {
        $db = db_connect();
        $query = $db->query("SELECT ds_centroCusto, SUM(nr_valorParcela) FROM tb_contasreceber
        WHERE dt_vencimento between '{$de}' and '{$ate}' AND ds_quitado = 'Nao' GROUP BY ds_centroCusto");
        return $query->getResultArray();
    }
    
    public function listarReceberPorData($de, $ate) {
        $db = db_connect();
        $query = $db->query("SELECT * FROM tb_contasreceber
        WHERE dt_vencimento between '{$de}' and '{$ate}' AND ds_quitado = 'Nao'");
        return $query->getResultObject();
    }
    
    public function listarPorResponsavel() {
        $db = db_connect();
        $builder = $db->table('tb_contasreceber');
        $builder->orderBy('nm_responsavel', 'ASC');
        $builder->orderBy('nr_numeroParcela', 'ASC');
        $query = $builder->get();
        return $query->getResultObject();
    }
}