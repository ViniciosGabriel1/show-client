<?php

namespace App\Http\Controllers;

use App\Imports\ClientesImport;
use App\Models\Clientes;
use App\Services\ClientesService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ClientesController extends Controller
{
    private $clientes;

    public function __construct(ClientesService $clientes)
    {
        $this->clientes = $clientes;
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function carregarEstrutura(Request $request)
    {
        // dd($request);
        // Captura a categoria enviada pela requisição
        $categoria = $request->input('categoria');
        // $estrutura = $request->input('estrutura');
        $caso = $request->input('caso');
        $corCard = $request->input('corCard');
        
        $estrutura = $this->clientes->montarEstrutura($categoria,$corCard);
        // dd($estrutura);
        
        // Retorna os clientes como um JSON para o JavaScript tratar
        return response()->json($estrutura);

    }

    
    public function excluirCliente(Request $request){
        // dd($request);
        $id_cliente = $request->input('id_cliente'); // Obtendo o ID do cliente do request
        $categoria = $request->input('categoria'); // Obtendo o ID do cliente do request
        $corCard = $request->input('corCard'); // Obtendo o ID do cliente do request

       $this->clientes->deletarCliente($id_cliente);

        $estrutura = $this->clientes->montarEstrutura($categoria,$corCard);

        return response()->json($estrutura);


    }

    public function atualizarCliente(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:20',
            'cnpj' => 'required|string|max:18',
            'categoria' => 'required|string|max:100',
            'endereco' => 'nullable|string|max:255',
        ]);
    
        try {
            $cliente = $this->clientes->buscarClientePorId($request->id_cliente);
    
            // Atualiza os dados do cliente com os dados do request
            $cliente->update([
                'nome' => $request->nome,
                'email' => $request->email,
                'telefone' => $request->telefone,
                'cnpj' => $request->cnpj,
                'categoria' => $request->categoria,
                'endereco' => $request->endereco,
            ]);
    
            // Retorna uma mensagem de sucesso com redirect
            return redirect()->back()->with('success', 'Cliente atualizado com sucesso!');
    
        } catch (\Exception $e) {
            // Retorna uma mensagem de erro com redirect
            return redirect()->back()->with('error', 'Erro ao atualizar o cliente.');
        }
    }
    
    




    public function importClientes(Request $request)
    {
        // dd($request->input('id_usuario')); // Você pode usar isso para debugar
    
        // Valida o arquivo enviado
        $request->validate([
            'import_file' => 'required|mimes:xlsx,xls,csv',
        ]); 
    
        // Obtém o id_usuario do request
        $id_usuario = $request->input('id_usuario');
    
        // Importa os clientes
        Excel::import(new ClientesImport($id_usuario), $request->file('import_file'));
    
        // Redireciona com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Clientes importados com sucesso!');
    }



    

}
