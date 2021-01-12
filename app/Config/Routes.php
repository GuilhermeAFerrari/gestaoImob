<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// rotas de login
$routes->get('/', 'Login::index');
$routes->get('principal', 'Home::principal');
$routes->get('logout', 'Login::logout');

// rotas financeiro
$routes->get('financeiro-pagamentos-listar', 'Financeiro::listarPagamentos');
$routes->add('financeiro-pagamentos', 'Financeiro::adicionarPagamentos');
$routes->add('financeiro-pagamentos-editar/(:num)', 'Financeiro::editarPagamentos/$1');
$routes->add('financeiro-confirmar-deletar-pagamentos/(:num)', 'Financeiro::confirmarExcluirPagamentos/$1');
$routes->add('financeiro-deletar-pagamentos/(:num)', 'Financeiro::excluirPagamentos/$1');
$routes->get('financeiro-recebimentos-listar', 'Financeiro::listarRecebimentos');
$routes->add('financeiro-recebimentos', 'Financeiro::adicionarRecebimentos');
$routes->add('financeiro-recebimentos-editar/(:num)', 'Financeiro::editarRecebimentos/$1');
$routes->add('financeiro-confirmar-deletar-recebimentos/(:num)', 'Financeiro::confirmarExcluirRecebimentos/$1');
$routes->add('financeiro-deletar-recebimentos/(:num)', 'Financeiro::excluirRecebimento/$1');
$routes->get('financeiro-centro-custo-listar', 'Financeiro::listarCentroCusto');
$routes->add('financeiro-centro-custo', 'Financeiro::adicionarCentroCusto');
$routes->add('financeiro-centro-custo-editar/(:num)', 'Financeiro::editarCentroCusto/$1');
$routes->add('financeiro-confirmar-deletar-centro-custo/(:num)', 'Financeiro::confirmarExcluirCentroCusto/$1');
$routes->add('financeiro-centro-custo-deletar/(:num)', 'Financeiro::excluirCentroCusto/$1');
$routes->get('financeiro-conta-listar', 'Financeiro::listarContaBancaria');
$routes->add('financeiro-conta', 'Financeiro::adicionarContaBancaria');
$routes->add('financeiro-confirmar-deletar-conta-bancaria/(:num)', 'Financeiro::confirmarExcluirContaBancaria/$1');
$routes->add('financeiro-deletar-conta-bancaria/(:num)', 'Financeiro::excluirContaBancaria/$1');
$routes->add('financeiro-resumo', 'Financeiro::resumoFinanceiro');
$routes->add('financeiro-resumo-centro-de-custo', 'Financeiro::resumoFinanceiroCentroCusto');
$routes->add('financeiro-confirmar-quitar-receber/(:num)', 'Financeiro::confirmarQuitarFinanceiroReceber/$1');
$routes->add('financeiro-quitar-receber/(:num)', 'Financeiro::quitarFinanceiroReceber/$1');
$routes->add('financeiro-confirmar-quitar-pagar/(:num)', 'Financeiro::confirmarQuitarFinanceiroPagar/$1');
$routes->add('financeiro-quitar-pagar/(:num)', 'Financeiro::quitarFinanceiroPagar/$1');

// rotas imovel
$routes->get('cadastros-imovel', 'Imoveis::listarImoveis');
$routes->add('imoveis-adicionar', 'Imoveis::adicionarImoveis');
$routes->add('imoveis-editar/(:num)', 'Imoveis::editarImoveis/$1');
$routes->add('imoveis-confirmar-deletar/(:num)', 'Imoveis::confirmarExcluirImovel/$1');
$routes->add('imoveis-deletar/(:num)', 'Imoveis::excluirImoveis/$1');

// rotas configurações
$routes->add('configuracoes-empresa', 'Empresa::verEmpresa');
$routes->get('configuracoes-usuario', 'User::listarUsuarios');
$routes->add('configuracoes-usuario-adicionar', 'User::adicionarUsuarios');
$routes->add('configuracoes-usuario-editar/(:num)', 'User::editarUsuarios/$1');
$routes->add('configuracoes-confirmar-deletar/(:num)', 'User::confirmarExcluirUsuario/$1');
$routes->add('configuracoes-usuario-deletar/(:num)', 'User::excluirUsuario/$1');

// rotas agenda
$routes->get('agenda-contatos', 'Contatos::listarContatos');
$routes->add('agenda-contatos-editar/(:num)', 'Contatos::editarContatos/$1');
$routes->add('agenda-contatos-adicionar', 'Contatos::adicionarContatos');
$routes->add('agenda-confirmar-deletar-contato/(:num)', 'Contatos::confirmarExcluirContato/$1');
$routes->add('agenda-contatos-deletar/(:num)', 'Contatos::excluirContato/$1');
$routes->get('agenda-notas', 'Notas::listarNotas');
$routes->add('agenda-notas-adicionar', 'Notas::adicionarNotas');
$routes->add('agenda-confirmar-deletar/(:num)', 'Notas::confirmarExcluirNota/$1');
$routes->add('agenda-notas-deletar/(:num)', 'Notas::excluirNota/$1');

// rotas cadastros
$routes->get('cadastros-proprietario', 'Pessoas::listarProprietarios');
$routes->get('cadastros-inquilino', 'Pessoas::listarInquilinos');
$routes->get('cadastros-fiador', 'Pessoas::listarFiadores');
$routes->get('cadastros-lead', 'Pessoas::listarLeads');
$routes->add('cadastros-pessoas-adicionar', 'Pessoas::adicionarPessoa');
$routes->add('cadastros-pessoas-editar/(:num)', 'Pessoas::editarPessoa/$1');
$routes->add('cadastros-pessoas-confirmar-deletar/(:num)', 'Pessoas::confirmarExcluirPessoa/$1');
$routes->add('cadastros-pessoas-deletar/(:num)', 'Pessoas::excluirPessoa/$1');

//rotas contratos
$routes->add('cadastros-contratos', 'Contratos::cadastrarContratos');
$routes->get('contratos-ativo', 'Contratos::listarAtivos');
$routes->get('contratos-pendente', 'Contratos::listarPendentes');
$routes->get('contratos-encerrado', 'Contratos::listarEncerrados');
$routes->get('contratos-visualizar/(:num)', 'Contratos::visualizar/$1');
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
