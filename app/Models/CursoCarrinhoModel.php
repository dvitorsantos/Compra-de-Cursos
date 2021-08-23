<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class CursoCarrinhoModel extends Model
{
    protected $table = 'cursoCarrinho';
    protected $primaryKey = 'id';
    protected $allowedFields = ['idCurso','idCarrinho'];
    protected $validationRules    = [
        'idCurso'     => 'required|max_length[50]',
        'idCarrinho'         => 'required|max_length[20]',
    ];
}