<?php namespace App\Controllers;
 
use CodeIgniter\API\ResponseTrait;
use App\Models\CursoModel;
use App\Models\CarrinhoModel;
 
class Carrinho extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $model = new CursoModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    public function create() {
        $cursoModel = new CursoModel();
        $carrinhoModel = new CarrinhoModel();
        $data = $this->request->getJSON();
        foreach ($data as $element) {
            $id = $element->id;
            $isCurso = $cursoModel->getWhere(['id' => $id])->getResult();
            if (!$isCurso) {
                $response = [
                    'status'   => 404,
                    'error'    => null,
                    'messages' => [
                        'error' => 'id do curso incorreto'
                    ]
                ];
                return $this->respond($response);
            }
          }
        $total = 0;
        foreach ($data as $element) {
            $total += $element->preco;
        }

        return $this->respond($total);
    }
}