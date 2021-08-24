<?php namespace App\Controllers;
 
use CodeIgniter\API\ResponseTrait;
use App\Models\CursoModel;
use App\Models\CarrinhoModel;
use App\Models\CursoCarrinhoModel;
 
class Carrinho extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $model = new CarrinhoModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    public function create() {
        $model = new CarrinhoModel();
        $data = [
            'id_user'     => $this->request->getVar('id_user')
        ];
    
        if($model->insert($data)){
            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Dados salvos'
                ]
            ];
            return $this->respondCreated($response);
        }

        return $this->fail($model->errors());
    }

    public function show($id = null) {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT carrinho.id, curso_carrinho.id_curso, curso.nome, categoria, descricao, preco FROM curso, carrinho inner join curso_carrinho where curso_carrinho.id_carrinho = '.$id.' and carrinho.id = '.$id.' and curso_carrinho.id_curso = curso.id');
        $result  = $query->getResult();

        if ($result) {
            return $this->respond($result, 200);
        }

        return $this->failNotFound('Nenhum carrinho com id: '.$id);
    }

    public function add() {
        $curso_carrinho = new CursoCarrinhoModel();
        $data_curso_carrinho = [
            'id_curso'     => $this->request->getVar('id_curso'),
            'id_carrinho'    => $this->request->getVar('id_carrinho'),
        ];
    
        if($curso_carrinho->insert($data_curso_carrinho)){
            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Dados salvos'
                ]
            ];
            return $this->respond($response, 201);
        }
    return $this->fail($curso_carrinho->errors());
}

    public function remove() {
        
    }
}