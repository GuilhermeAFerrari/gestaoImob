<?php namespace App\Models;

use CodeIgniter\Model;

class PessoasModel extends Model {
    protected $table = 'tb_pessoas';
    protected $primaryKey = 'id_pessoa';
    protected $allowedFields = [
        'st_pessoa', 'nm_pessoa', 'ds_email', 'nr_telefone1', 'nr_telefone2',
        'nm_rua', 'nm_bairro', 'nm_cidade', 'nm_uf', 'ds_cep', 'ds_complemento', 'nr_numero',
        'tp_pessoa'
    ];
    protected $returnType = 'object';

    public function listarProprietarios() {
        $db = db_connect();
        $builder = $db->table('tb_pessoas p');
        $builder->where('p.tp_pessoa', 'proprietario');
        $query = $builder->get();
        return $query->getResultObject();
    }

    public function listarInquilinos() {
        $db = db_connect();
        $builder = $db->table('tb_pessoas p');
        $builder->where('p.tp_pessoa', 'inquilino');
        $query = $builder->get();
        return $query->getResultObject();
    }

    public function listarFiadores() {
        $db = db_connect();
        $builder = $db->table('tb_pessoas p');
        $builder->where('p.tp_pessoa', 'fiador');
        $query = $builder->get();
        return $query->getResultObject();
    }

    public function listarLeads() {
        $db = db_connect();
        $builder = $db->table('tb_pessoas p');
        $builder->where('p.tp_pessoa', 'lead');
        $query = $builder->get();
        return $query->getResultObject();
    }
}