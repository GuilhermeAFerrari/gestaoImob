<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model {
    protected $table = 'tb_users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'nm_user', 'ds_login', 'ds_password', 'tp_user', 'st_user'
    ];
    protected $returnType = 'object';
}