<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CursoModel;
 
class Cursos extends ResourceController
{
    use ResponseTrait;
    public function index()
    {
        $model = new CursoModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    public function show($name = null) {
        $model = new CursoModel();
        $data = $model->getWhere(['nome' => $name])->getResult();

        if($data){
            return $this->respond($data);
        }

        return $this->failNotFound('Nenhum curso cadastrado com nome '.$name);    
    }
}