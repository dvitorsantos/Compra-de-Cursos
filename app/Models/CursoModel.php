<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class CursoModel extends Model
{
    protected $table = 'curso';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome','descricao', 'categoria', 'preco'];
    protected $validationRules    = [
        'nome'     => 'required|max_length[50]',
        'descricao'         => 'required|max_length[20]',
        'categoria'         => 'required|max_length[20]',   
        'preco'         => 'required|decimal',
    ];
}
 