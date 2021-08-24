<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class CarrinhoModel extends Model
{
    protected $table = 'carrinho';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_user', 'total'];
    protected $validationRules    = [
        'id_user'     => 'required|max_length[50]',
    ];
}