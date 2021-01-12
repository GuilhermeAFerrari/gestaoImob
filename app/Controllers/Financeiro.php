<?php namespace App\Controllers;

class Financeiro extends BaseController
{
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		$this->session = \Config\Services::session();
	}

	public function listarPagamentos()
	{
		$pagamentos = new \App\Models\ContasPagarModel();
		$data['pagamentos'] = $pagamentos->listarPorResponsavel();
		$data['titulo'] = 'IMob - Pagamentos';
		$data['msg'] = $this->session->getFlashdata('msg');
		return view('view_financeiro_listar_pagamentos', $data);
	}
	
	public function adicionarPagamentos()
	{
	    $centroCusto = new \App\Models\CentroCustoModel();
        $data['centroCusto'] = $centroCusto->findAll();
        $data['titulo'] = 'IMob - Pagamentos';
        $data['acao'] = 'Salvar';
        $data['dataAtual'] = date('d/m/Y H:i:s');

        if($this->request->getMethod() == 'post') {
            
            $formaPagamento = $this->request->getPost('ds_formaPagamento');

            if($formaPagamento == 'parcelado') {
                $valorDaParcela = $this->request->getPost('nr_valorParcela');
                $quantidadeDeParcela = $this->request->getPost('nr_qtParcela');
                $diasEntreParcelas = $this->request->getPost('nr_diferencaDias');
                $dataVencimento = $this->request->getPost('dt_vencimento');
                $somaDias = 0;
                
                for($i = 0; $i <$quantidadeDeParcela; $i++) {
                    $pagamento = new \App\Models\ContasPagarModel();
                    $pagamento->set('nm_responsavel', $this->request->getPost('nm_responsavel'));
                    $pagamento->set('ds_recebimento', $this->request->getPost('ds_recebimento'));
                    $pagamento->set('ds_centroCusto', $this->request->getPost('ds_centroCusto'));
                    $pagamento->set('dt_vencimento', date('Y-m-d', strtotime("$somaDias days",strtotime($dataVencimento))));
                    $pagamento->set('nr_numeroParcela', $i+1);
                    $pagamento->set('ds_contaBancaria', $this->request->getPost('ds_contaBancaria'));
                    $pagamento->set('nr_comissao', $this->request->getPost('nr_comissao'));
                    $pagamento->set('ds_quitado', $this->request->getPost('ds_quitado'));
                    $pagamento->set('ds_formaPagamento', $this->request->getPost('ds_formaPagamento'));
                    $pagamento->set('nr_valorParcela', $this->request->getPost('nr_valorParcela'));
                    $pagamento->set('nr_qtParcela', $this->request->getPost('nr_qtParcela'));
                    $pagamento->set('dt_registro', $this->request->getPost('dt_registro'));
                    $pagamento->set('nr_diferencaDias', $this->request->getPost('nr_diferencaDias'));
                    $pagamento->set('ds_observacao', $this->request->getPost('ds_observacao'));
                    $pagamento->insert();
                    $somaDias += $diasEntreParcelas;
                   
                }
                
                $data['msg'] = 'Inserido com sucesso';
                return view('view_financeiro_pagamentos', $data);
            } 
            else {
                $pagamento = new \App\Models\ContasPagarModel();
                $pagamento->set('nm_responsavel', $this->request->getPost('nm_responsavel'));
                $pagamento->set('ds_pagamento', $this->request->getPost('ds_pagamento'));
                $pagamento->set('ds_centroCusto', $this->request->getPost('ds_centroCusto'));
                $pagamento->set('dt_vencimento', $this->request->getPost('dt_vencimento'));
                $pagamento->set('ds_contaBancaria', $this->request->getPost('ds_contaBancaria'));
                $pagamento->set('nr_comissao', $this->request->getPost('nr_comissao'));
                $pagamento->set('ds_quitado', $this->request->getPost('ds_quitado'));
                $pagamento->set('ds_formaPagamento', $this->request->getPost('ds_formaPagamento'));
                $pagamento->set('nr_valorParcela', $this->request->getPost('nr_valorParcela'));
                $pagamento->set('nr_qtParcela', $this->request->getPost('nr_qtParcela'));
                $pagamento->set('dt_registro', $this->request->getPost('dt_registro'));
                $pagamento->set('ds_observacao', $this->request->getPost('ds_observacao'));
                
                if($pagamento->insert()) {
                    //deu certo
                    $data['msg'] = 'Inserido com sucesso';
                }
                else {
                    //nao deu certo
                    $data['msg'] = 'Erro ao inserir';
                    $data['erros'] = $pagamento->errors();
                }
                $data['msg'] = 'Inserido com sucesso';
                return view('view_financeiro_pagamentos', $data);
            }
            
        }
        return view('view_financeiro_pagamentos', $data);
    }
    
    public function editarPagamentos($id_contaPagar)
    {
        $centroCusto = new \App\Models\CentroCustoModel();
        $data['centroCusto'] = $centroCusto->findAll();
        $data['titulo'] = 'IMob - Pagamentos';
        $data['acao'] = 'Editar';
        $data['dataAtual'] = date('d/m/Y H:i:s');
		$data['msg'] = '';
        $data['erros'] = '';

		$contasPagar = new \App\Models\ContasPagarModel();
        $conta = $contasPagar->find($id_contaPagar);

        if($this->request->getMethod() === 'post') {
            //quando o form for submetido
            $conta->nm_responsavel = $this->request->getPost('nm_responsavel');
            $conta->ds_pagamento = $this->request->getPost('ds_pagamento');
            $conta->ds_centroCusto = $this->request->getPost('ds_centroCusto');
            $conta->dt_vencimento = $this->request->getPost('dt_vencimento');
            $conta->nr_comissao = $this->request->getPost('nr_comissao');
            $conta->ds_formaPagamento = $this->request->getPost('ds_formaPagamento');
            $conta->ds_contaBancaria = $this->request->getPost('ds_contaBancaria');
            $conta->nr_valorBruto = $this->request->getPost('nr_valorBruto');
            $conta->nr_juros = $this->request->getPost('nr_juros');
            $conta->nr_desconto = $this->request->getPost('nr_desconto');
            $conta->ds_quitado = $this->request->getPost('ds_quitado');
            $conta->dt_registro = $this->request->getPost('dt_registro');
            $conta->ds_observacao = $this->request->getPost('ds_observacao');

            if($contasPagar->update($id_contaPagar, $conta)) {
                $data['msg'] = 'Alterado com sucesso';
            }
            else {
                $data['msg'] = 'Erro ao alterar';
                $data['erros'] = $contasPagar->errors();
            }
        }

        $data['contas'] = $conta;
        return view('view_financeiro_pagamentos', $data);
    }
    
	public function confirmarExcluirPagamentos($id_contaPagar)
	{
        if(is_null($id_contaPagar)) {
            //redirecionar para a view de usuários - 'view_list_estoque'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Item não encontrado');
            return redirect()->to(base_url('financeiro-pagamentos-listar'));
        }
        $contasPagar = new \App\Models\ContasPagarModel();
        $data['contaPagar'] = $contasPagar->find($id_contaPagar);
        $data['id_contaPagar'] = $id_contaPagar;
        $data['titulo'] = 'IMob - Pagamentos';
        return view('view_financeiro_deletar_pagamento', $data);
    }

    public function excluirPagamentos($id_contaPagar = null)
    {
        if(is_null($id_contaPagar)) {
            //redirecionar para a view de usuários - 'view_list_usuario'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Nota não encontrada');
            return redirect()->to(base_url('financeiro-pagamentos-listar'));
        }
        $data['titulo'] = 'IMob - Pagamentos';
        $data['acao'] = 'Excluir';

        $contasPagar = new \App\Models\ContasPagarModel();
        if($contasPagar->delete($id_contaPagar)) {
            $this->session->setFlashdata('msg', 'Excluído com sucesso');
        }
        else {
            $this->session->setFlashdata('msg', 'Erro ao excluir');
        }
        return redirect()->to(base_url('financeiro-pagamentos-listar'));
    }
	
	public function listarRecebimentos()
	{
        $recebimentos = new \App\Models\ContasReceberModel();
		$data['recebimentos'] = $recebimentos->listarPorResponsavel();
        $data['titulo'] = 'IMob - Recebimentos';
        $data['msg'] = $this->session->getFlashdata('msg');
		return view('view_financeiro_listar_recebimentos', $data);
	}

	public function adicionarRecebimentos()
	{
        $centroCusto = new \App\Models\CentroCustoModel();
        $contaBancaria = new \App\Models\ContaBancariaModel();
        $data['centroCusto'] = $centroCusto->findAll();
        $data['contaBancaria'] = $contaBancaria->findAll();
        $data['titulo'] = 'IMob - Recebimentos';
        $data['acao'] = 'Salvar';
        $data['dataAtual'] = date('d/m/Y H:i:s');

        if($this->request->getMethod() == 'post') {
            
            $formaPagamento = $this->request->getPost('ds_formaPagamento');

            if($formaPagamento == 'parcelado') {
                $valorDaParcela = $this->request->getPost('nr_valorParcela');
                $quantidadeDeParcela = $this->request->getPost('nr_qtParcela');
                $diasEntreParcelas = $this->request->getPost('nr_diferencaDias');
                $dataVencimento = $this->request->getPost('dt_vencimento');
                $somaDias = 0;
                
                for($i = 0; $i <$quantidadeDeParcela; $i++) {
                    $recebimento = new \App\Models\ContasReceberModel();
                    $recebimento->set('nm_responsavel', $this->request->getPost('nm_responsavel'));
                    $recebimento->set('ds_recebimento', $this->request->getPost('ds_recebimento'));
                    $recebimento->set('ds_centroCusto', $this->request->getPost('ds_centroCusto'));
                    $recebimento->set('dt_vencimento', date('Y-m-d', strtotime("$somaDias days",strtotime($dataVencimento))));
                    $recebimento->set('nr_numeroParcela', $i+1);
                    $recebimento->set('ds_contaBancaria', $this->request->getPost('ds_contaBancaria'));
                    $recebimento->set('nr_comissao', $this->request->getPost('nr_comissao'));
                    $recebimento->set('ds_quitado', $this->request->getPost('ds_quitado'));
                    $recebimento->set('ds_formaPagamento', $this->request->getPost('ds_formaPagamento'));
                    $recebimento->set('nr_valorParcela', $this->request->getPost('nr_valorParcela'));
                    $recebimento->set('nr_qtParcela', $this->request->getPost('nr_qtParcela'));
                    $recebimento->set('dt_registro', $this->request->getPost('dt_registro'));
                    $recebimento->set('nr_diferencaDias', $this->request->getPost('nr_diferencaDias'));
                    $recebimento->set('ds_observacao', $this->request->getPost('ds_observacao'));
                    $recebimento->insert();
                    $somaDias += $diasEntreParcelas;
                }
                
                $data['msg'] = 'Inserido com sucesso';
                return view('view_financeiro_recebimentos', $data);
            } 
            else {
                $recebimento = new \App\Models\ContasReceberModel();
                $recebimento->set('nm_responsavel', $this->request->getPost('nm_responsavel'));
                $recebimento->set('ds_recebimento', $this->request->getPost('ds_recebimento'));
                $recebimento->set('ds_centroCusto', $this->request->getPost('ds_centroCusto'));
                $recebimento->set('dt_vencimento', $this->request->getPost('dt_vencimento'));
                $recebimento->set('ds_contaBancaria', $this->request->getPost('ds_contaBancaria'));
                $recebimento->set('nr_comissao', $this->request->getPost('nr_comissao'));
                $recebimento->set('ds_quitado', $this->request->getPost('ds_quitado'));
                $recebimento->set('ds_formaPagamento', $this->request->getPost('ds_formaPagamento'));
                $recebimento->set('nr_valorParcela', $this->request->getPost('nr_valorParcela'));
                $recebimento->set('nr_qtParcela', $this->request->getPost('nr_qtParcela'));
                $recebimento->set('dt_registro', $this->request->getPost('dt_registro'));
                $recebimento->set('ds_observacao', $this->request->getPost('ds_observacao'));
                
                if($recebimento->insert()) {
                    //deu certo
                    $data['msg'] = 'Inserido com sucesso';
                }
                else {
                    //nao deu certo
                    $data['msg'] = 'Erro ao inserir';
                    $data['erros'] = $recebimento->errors();
                }
                $data['msg'] = 'Inserido com sucesso';
                return view('view_financeiro_recebimentos', $data);
            }
            
        }
        return view('view_financeiro_recebimentos', $data);
    }
    
    public function editarRecebimentos($id_contaReceber)
    {
        $centroCusto = new \App\Models\CentroCustoModel();
        $contaBancaria = new \App\Models\ContaBancariaModel();
        $data['centroCusto'] = $centroCusto->findAll();
        $data['contaBancaria'] = $contaBancaria->findAll();
        $data['titulo'] = 'IMob - Recebimentos';
        $data['acao'] = 'Editar';
        $data['dataAtual'] = date('d/m/Y H:i:s');
		$data['msg'] = '';
        $data['erros'] = '';

		$contasReceber = new \App\Models\ContasReceberModel();
        $conta = $contasReceber->find($id_contaReceber);

        if($this->request->getMethod() === 'post') {
            //quando o form for submetido
            $conta->nm_responsavel = $this->request->getPost('nm_responsavel');
            $conta->ds_recebimento = $this->request->getPost('ds_recebimento');
            $conta->ds_centroCusto = $this->request->getPost('ds_centroCusto');
            $conta->dt_vencimento = $this->request->getPost('dt_vencimento');
            $conta->ds_contaBancaria = $this->request->getPost('ds_contaBancaria');
            $conta->nr_comissao = $this->request->getPost('nr_comissao');
            $conta->ds_quitado = $this->request->getPost('ds_quitado');
            $conta->ds_formaPagamento = $this->request->getPost('ds_formaPagamento');
            $conta->nr_valorBruto = $this->request->getPost('nr_valorBruto');
            $conta->nr_valorParcela = $this->request->getPost('nr_valorParcela');
            $conta->nr_qtParcela = $this->request->getPost('nr_qtParcela');
            $conta->dt_registro = $this->request->getPost('dt_registro');
            $conta->ds_observacao = $this->request->getPost('ds_observacao');

            if($contasReceber->update($id_contaReceber, $conta)) {
                $data['msg'] = 'Alterado com sucesso';
            }
            else {
                $data['msg'] = 'Erro ao alterar';
                $data['erros'] = $contasReceber->errors();
            }
        }

        $data['contas'] = $conta;
        return view('view_financeiro_recebimentos', $data);
    }

    public function confirmarExcluirRecebimentos($id_contaReceber)
	{
        if(is_null($id_contaReceber)) {
            //redirecionar para a view de usuários - 'view_list_estoque'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Item não encontrado');
            return redirect()->to(base_url('financeiro-recebimentos-listar'));
        }
        $contasReceber = new \App\Models\ContasReceberModel();
        $data['contaReceber'] = $contasReceber->find($id_contaReceber);
        $data['id_contaReceber'] = $id_contaReceber;
        $data['titulo'] = 'IMob - Recebimentos';
        return view('view_financeiro_deletar_recebimento', $data);
    }

    public function excluirRecebimento($id_contaReceber = null)
    {
        if(is_null($id_contaReceber)) {
            //redirecionar para a view de usuários - 'view_list_usuario'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Nota não encontrada');
            return redirect()->to(base_url('financeiro-recebimentos-listar'));
        }

        $data['titulo'] = 'IMob - Recebimentos';
        $data['acao'] = 'Excluir';

        $contasReceber = new \App\Models\ContasReceberModel();
        if($contasReceber->delete($id_contaReceber)) {
            $this->session->setFlashdata('msg', 'Excluído com sucesso');
        }
        else {
            $this->session->setFlashdata('msg', 'Erro ao excluir');
        }
        return redirect()->to(base_url('financeiro-recebimentos-listar'));
    }
    
    public function confirmarQuitarFinanceiroReceber($id_contaReceber)
	{
        if(is_null($id_contaReceber)) {
            //redirecionar para a view de usuários - 'view_list_estoque'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Item não encontrado');
            return redirect()->to(base_url('financeiro-recebimentos-listar'));
        }
        $contasReceber = new \App\Models\ContasReceberModel();
        $data['contaReceber'] = $contasReceber->find($id_contaReceber);
        $data['id_contaReceber'] = $id_contaReceber;
        $data['titulo'] = 'IMob -Quitar Financeiro';
        return view('view_financeiro_quitar_receber', $data);
    }
    
    public function quitarFinanceiroReceber($id_contaReceber = null)
    {
        if(is_null($id_contaReceber)) {
            //redirecionar para a view de usuários - 'view_list_usuario'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Nota não encontrada');
            return redirect()->to(base_url('financeiro-recebimentos-listar'));
        }
        $data['titulo'] = 'IMob - Quitar financeiro';
        $data['acao'] = 'Quitar';
        
        $contasReceber = new \App\Models\ContasReceberModel();
        $conta = $contasReceber->find($id_contaReceber);

        $conta->ds_quitado = 'Sim';
        if($contasReceber->update($id_contaReceber, $conta)) {
            $this->session->setFlashdata('msg', 'Quitado com sucesso');
            return redirect()->to(base_url('financeiro-recebimentos-listar'));
        }
        else {
            $data['msg'] = 'Erro ao alterar';
            $data['erros'] = $contasReceber->errors();
        }
    }
    
    public function confirmarQuitarFinanceiroPagar($id_contaPagar)
	{
        if(is_null($id_contaPagar)) {
            //redirecionar para a view de usuários - 'view_list_estoque'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Item não encontrado');
            return redirect()->to(base_url('financeiro-pagamentos-listar'));
        }
        $contasPagar = new \App\Models\ContasPagarModel();
        $data['contaPagar'] = $contasPagar->find($id_contaPagar);
        $data['id_contaPagar'] = $id_contaPagar;
        $data['titulo'] = 'IMob -Quitar Financeiro';
        return view('view_financeiro_quitar_pagar', $data);
    }
    
    public function quitarFinanceiroPagar($id_contaPagar = null)
    {
        if(is_null($id_contaPagar)) {
            //redirecionar para a view de usuários - 'view_list_usuario'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Nota não encontrada');
            return redirect()->to(base_url('financeiro-pagamentos-listar'));
        }
        $data['titulo'] = 'IMob - Quitar financeiro';
        $data['acao'] = 'Quitar';
        
        $contasPagar = new \App\Models\ContasPagarModel();
        $conta = $contasPagar->find($id_contaPagar);

        $conta->ds_quitado = 'Sim';
        if($contasPagar->update($id_contaPagar, $conta)) {
            $this->session->setFlashdata('msg', 'Quitado com sucesso');
            return redirect()->to(base_url('financeiro-pagamentos-listar'));
        }
        else {
            $data['msg'] = 'Erro ao alterar';
            $data['erros'] = $contasPagar->errors();
        }
    }
    
    
    
    

	public function listarCentroCusto()
	{
		$centroCusto = new \App\Models\CentroCustoModel();
		$data['centros'] = $centroCusto->findAll();
		$data['titulo'] = 'IMob - Centro de custo';
		$data['msg'] = $this->session->getFlashdata('msg');
		return view('view_financeiro_listar_centro_custo', $data);
	}

	public function adicionarCentroCusto()
	{
        $data['titulo'] = 'IMob - Centro de custo';
        $data['acao'] = 'Salvar';
		$data['msg'] = '';
        $data['erros'] = '';

		if($this->request->getMethod() == 'post') {
            $centro = new \App\Models\CentroCustoModel();
            $centro->set('ds_classe', $this->request->getPost('ds_classe'));
            $centro->set('ds_descricao', $this->request->getPost('ds_descricao'));
            
            if($centro->insert()) {
                //deu certo
                $data['msg'] = 'Inserido com sucesso';
            }
            else {
                //nao deu certo
                $data['msg'] = 'Erro ao inserir';
                $data['erros'] = $centro->errors();
            }
		}
		return view('view_financeiro_centro_custo', $data);
	}

	public function editarCentroCusto($id_centroCusto)
    {
        $data['titulo'] = 'IMob - Centro de custo';
		$data['acao'] = 'Editar';
		$data['msg'] = '';
        $data['erros'] = '';

		$centroModel = new \App\Models\CentroCustoModel();
        $centro = $centroModel->find($id_centroCusto);

        if($this->request->getMethod() === 'post') {
            //quando o form for submetido
            $centro->ds_classe = $this->request->getPost('ds_classe');
            $centro->ds_descricao = $this->request->getPost('ds_descricao');

            if($centroModel->update($id_centroCusto, $centro)) {
                $data['msg'] = 'Alterado com sucesso';
            }
            else {
                $data['msg'] = 'Erro ao alterar';
                $data['erros'] = $centroModel->errors();
            }
        }

        $data['centro'] = $centro;
        return view('view_financeiro_centro_custo', $data);
	}

	public function confirmarExcluirCentroCusto($id_centroCusto)
	{
        if(is_null($id_centroCusto)) {
            //redirecionar para a view de usuários - 'view_list_estoque'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Item não encontrado');
            return redirect()->to(base_url('financeiro-centro-custo-listar'));
        }
        $data['id_centroCusto'] = $id_centroCusto;
        $data['titulo'] = 'IMob - Centro Custo';
        return view('view_delete_centro_custo', $data);
    }
	
	public function excluirCentroCusto($id_centroCusto = null)
    {
        if(is_null($id_centroCusto)) {
            //redirecionar para a view de usuários - 'view_list_usuario'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Nota não encontrada');
            return redirect()->to(base_url('financeiro-centro-custo-listar'));
        }
        $data['titulo'] = 'IMob - Centro Custo';
        $data['acao'] = 'Excluir';

        $centroCusto = new \App\Models\CentroCustoModel();
        if($centroCusto->delete($id_centroCusto)) {
            $this->session->setFlashdata('msg', 'Excluído com sucesso');
        }
        else {
            $this->session->setFlashdata('msg', 'Erro ao excluir');
        }
        return redirect()->to(base_url('financeiro-centro-custo-listar'));
	}

	public function listarContaBancaria()
	{
		$contasModel = new \App\Models\ContaBancariaModel();
		$data['contas'] = $contasModel->findAll();
		$data['titulo'] = 'IMob - Recebimentos';
		$data['msg'] = $this->session->getFlashdata('msg');
		return view('view_financeiro_listar_conta', $data);
	}

	public function adicionarContaBancaria()
	{
        $data['titulo'] = 'IMob - Recebimentos';
        $data['acao'] = 'Salvar';
		$data['msg'] = '';
        $data['erros'] = '';

		if($this->request->getMethod() == 'post') {
            $conta = new \App\Models\ContaBancariaModel();
            $conta->set('nm_conta', $this->request->getPost('nm_conta'));
            $conta->set('nr_agencia', $this->request->getPost('nr_agencia'));
			$conta->set('nr_conta', $this->request->getPost('nr_conta'));
			$conta->set('ds_observacao', $this->request->getPost('ds_observacao'));
            
            if($conta->insert()) {
                //deu certo
                $data['msg'] = 'Inserido com sucesso';
            }
            else {
                //nao deu certo
                $data['msg'] = 'Erro ao inserir';
                $data['erros'] = $notas->errors();
            }
		}
		return view('view_financeiro_conta', $data);
    }
    
    public function confirmarExcluirContaBancaria($id_conta)
	{
        if(is_null($id_conta)) {
            //redirecionar para a view de usuários - 'view_list_estoque'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Item não encontrado');
            return redirect()->to(base_url('financeiro-conta-listar'));
        }
        $data['id_conta'] = $id_conta;
        $data['titulo'] = 'IMob - Conta bancária';
        return view('view_delete_conta_bancaria', $data);
    }
	
	public function excluirContaBancaria($id_conta = null)
    {
        if(is_null($id_conta)) {
            //redirecionar para a view de usuários - 'view_list_usuario'
            //definir uma msg via sessao
            $this->session->setFlashdata('msg', 'Nota não encontrada');
            return redirect()->to(base_url('financeiro-conta-listar'));
        }
        $data['titulo'] = 'IMob - Conta bancária';
        $data['acao'] = 'Excluir';

        $contaBancaria = new \App\Models\ContaBancariaModel();
        if($contaBancaria->delete($id_conta)) {
            $this->session->setFlashdata('msg', 'Excluído com sucesso');
        }
        else {
            $this->session->setFlashdata('msg', 'Erro ao excluir');
        }
        return redirect()->to(base_url('financeiro-conta-listar'));
	}

	public function resumoFinanceiro()
	{
        $data['titulo'] = 'IMob - Resumo financeiro';
        $data['acao'] = 'Filtrar';

        if($this->request->getMethod() == 'post') {
            $de = $this->request->getPost('dt_inicio');
            $ate = $this->request->getPost('dt_fim');

            $pagar = new \App\Models\ContasPagarModel();
            $resultadoPagar = $pagar->somaPagarData($de, $ate);
            $receber = new \App\Models\ContasReceberModel();
            $resultadoReceber = $receber->somaReceberData($de, $ate);

            if(is_null($resultadoPagar)) {
                $resultadoPagar['SUM(nr_valorParcela)'] = 1;
            }
            if(is_null($resultadoReceber)) {
                $resultadoReceber['SUM(nr_valorParcela)'] = 1;
            }
            $data['de'] = $de;
            $data['ate'] = $ate;
            $data['resultadoPagar'] = $resultadoPagar;
            $data['resultadoReceber'] = $resultadoReceber;
            /*var_dump($resultadoPagar);
            var_dump($resultadoReceber);*/
		}

		return view('view_financeiro_resumo', $data);
    }
    
    public function resumoFinanceiroCentroCusto()
	{
        $data['titulo'] = 'IMob - Resumo financeiro';
        $data['acao'] = 'Filtrar';

        if($this->request->getMethod() == 'post') {
            $de = $this->request->getPost('dt_inicio');
            $ate = $this->request->getPost('dt_fim');
            $radioPagar = $this->request->getPost('radioPagar');
            $radioReceber = $this->request->getPost('radioReceber');
            
            if($radioPagar == 'on') {
                $pagar = new \App\Models\ContasPagarModel();
                $resultadoPagar = $pagar->somaPagarDataCentroCusto($de, $ate);
                $data['de'] = $de;
                $data['ate'] = $ate;
                $data['resultado'] = $resultadoPagar;
            }
            else if($radioReceber == 'on'){
                $receber = new \App\Models\ContasReceberModel();
                $resultadoReceber = $receber->somaReceberDataCentroCusto($de, $ate);
                $data['de'] = $de;
                $data['ate'] = $ate;
                $data['resultado'] = $resultadoReceber;
            }
		}

		return view('view_financeiro_resumo_centro_custo', $data);
    }
    
    public function calculoResumoFinanceiro() {

    }
}
