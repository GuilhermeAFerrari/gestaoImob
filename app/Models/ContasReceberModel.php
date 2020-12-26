<?php namespace App\Models;

use CodeIgniter\Model;

class ContasReceberModel extends Model {
    protected $table = 'tb_contasReceber';
    protected $primaryKey = 'id_contaReceber';
    protected $allowedFields = [
        'nm_responsavel', 'ds_recebimento', 'ds_centroCusto', 'dt_vencimento', 'ds_formaPagamento',
        'ds_contaBancaria', 'nr_valorBruto', 'nr_juros', 'nr_desconto', 'ds_quitado', 'dt_registro',
        'ds_observacao'
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
        $query = $db->query("SELECT SUM(nr_valorBruto) FROM tb_contasReceber WHERE dt_vencimento between '{$de}' and '{$ate}' AND ds_quitado = 'Nao'");
        return $query->getResultArray();
    }
}