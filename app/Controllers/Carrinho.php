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
                    'success' => 'Carrinho criado.'
                ]
            ];
            return $this->respondCreated($response);
        }

        return $this->fail($model->errors());
    }

    public function show($id = null) {
        $db = \Config\Database::connect();
        $produtos = $db->query('SELECT carrinho.id, curso_carrinho.id_curso, curso.nome, categoria, descricao, preco FROM curso, carrinho inner join curso_carrinho where curso_carrinho.id_carrinho = '.$id.' and carrinho.id = '.$id.' and curso_carrinho.id_curso = curso.id');
        $total = $db->query('SELECT `total` FROM `carrinho` WHERE `carrinho`.`id` = '.$id.'; ');
        $result_total = $total->getResult();
        $result_produtos  = $produtos->getResult();

        if ($result_total and $result_produtos) {
            $data = ["produtos" => $result_produtos, "total" => $result_total];
            return $this->respond($data, 200);
        }

        return $this->failNotFound('Nenhum carrinho com id: '.$id);
    }

    public function add() {
        $curso_carrinho = new CursoCarrinhoModel();
        $id_curso = $this->request->getVar('id_curso');
        $id_carrinho = $this->request->getVar('id_carrinho');
        $data_curso_carrinho = [
            'id_curso'     => $id_curso,
            'id_carrinho'    => $id_carrinho
        ];

        $db = \Config\Database::connect();
        $total = $db->query('SELECT `total` FROM `carrinho` WHERE `carrinho`.`id` = '.$id_carrinho.'');
        $preco = $db->query('SELECT `preco` FROM `curso` WHERE `curso`.`id` = '.$id_curso.';');

        $total_result = $total->getResult();
        $preco_result = $preco->getResult();

        $soma_preco_com_total = $preco_result[0]->preco + $total_result[0]->total;

        $query = $db->query('UPDATE `carrinho` SET `total` = '.$soma_preco_com_total.' WHERE `carrinho`.`id` = '.$id_carrinho.';');
        
        if ($query) {
            $curso_carrinho->insert($data_curso_carrinho);
                $response = [
                    'status'   => 201,
                    'error'    => null,
                    'messages' => [
                        'success' => 'Curso adicionado ao carrinho.'
                    ]
                ];
                return $this->respondCreated($response);
        }
        return $this->fail($curso_carrinho->errors());
}

    public function remove() {
        $id_curso = $this->request->getVar('id_curso');
        $id_carrinho = $this->request->getVar('id_carrinho');
        $db = \Config\Database::connect();
        $total = $db->query('SELECT `total` FROM `carrinho` WHERE `carrinho`.`id` = '.$id_carrinho.'');
        $preco = $db->query('SELECT `preco` FROM `curso` WHERE `curso`.`id` = '.$id_curso.';');

        $total_result = $total->getResult();
        $preco_result = $preco->getResult();

        $subtracao_total = $total_result[0]->total - $preco_result[0]->preco;

        $query_update = $db->query('UPDATE `carrinho` SET `total` = '.$subtracao_total.' WHERE `carrinho`.`id` = '.$id_carrinho.';');
        $query_remove = $db->query('DELETE FROM curso_carrinho WHERE id_curso = '.$id_curso.' and id_carrinho = '.$id_carrinho.';');
        if ($query_update) {
            if ($query_remove) {
                $response = [
                    'status'   => 201,
                    'error'    => null,
                    'messages' => [
                        'success' => 'Curso removido do carrinho.'
                    ]
                ];
                return $this->respond($response);
            }  
        }
        return $this->respond('Falha ao remover curso do carrinho.');
    }
}