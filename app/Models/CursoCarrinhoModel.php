<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class CursoCarrinhoModel extends Model
{
    protected $table = 'curso_carrinho';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_curso','id_carrinho'];
    protected $validationRules    = [
        'id_curso'     => 'required|max_length[50]',
        'id_carrinho'         => 'required|max_length[20]',
    ];
}