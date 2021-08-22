<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class UsuarioModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome','email', 'senha'];
    protected $validationRules    = [
        'nome'     => 'required|max_length[100]',
        'email'         => 'required|max_length[40]',
        'senha'         => 'required|max_length[40]',   
    ];
}
 