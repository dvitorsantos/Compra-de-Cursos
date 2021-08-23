<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class CarrinhoModel extends Model
{
    protected $table = 'curso';
    protected $primaryKey = 'id';
    protected $allowedFields = ['status', 'total'];
    protected $validationRules    = [
        'status'     => 'required|max_length[50]',
        'total'         => 'required|decimal',
    ];
}