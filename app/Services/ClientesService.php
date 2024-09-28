<?php

namespace App\Services;

use App\Models\Clientes;
use Illuminate\Support\Facades\Auth;

class ClientesService
{

    private $repo;

    public function __construct(Clientes $repo)
    {
        $this->repo = $repo;
    }

    public function montarEstrutura($categoria, $corCard)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Usuário não autenticado'], 401);
        }

        $usuarioId = Auth::id();
        $clientes = $this->repo::where('categoria', $categoria)
            ->where('id_usuario', $usuarioId)
            ->get();

        $html = '<h1 class="text-2xl font-bold text-gray-800 mb-6">' . $categoria . '</h1>';

        if ($clientes->isEmpty()) {
            $html .= '<div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">';
            $html .= '<strong class="font-bold">Nenhum cliente encontrado!</strong>';
            $html .= '<span class="block sm:inline">Por favor, adicione novos clientes.</span>';
            $html .= '</div>';
        } else {
            $html .= '<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">';

            foreach ($clientes as $cliente) {
                $whatsappLink = 'https://wa.me/' . preg_replace('/\D/', '', $cliente->telefone);
                $html .= '<div class="bg-' . $corCard . '-100 shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105 duration-300">';
                $html .= '<h3 class="text-xl font-bold text-gray-800">' . $cliente->nome . '</h3>';
                $html .= '<p class="text-sm text-gray-600">' . $cliente->email . '</p>';
                $html .= '<p class="text-xs text-gray-500">CNPJ: ' . $cliente->cnpj . '</p>'; // Exibindo CNPJ
                $html .= '<p class="text-xs text-gray-500">Endereço: ' . $cliente->endereco . '</p>'; // Exibindo Endereço

                // Adiciona o ícone do WhatsApp como um link
                $html .= '<a href="' . $whatsappLink . '" target="_blank" class="whatsapp-icon mt-2 inline-block hover:scale-110 transition-transform">
                            <i class="fab fa-whatsapp fa-2x"></i>
                          </a>';

                $html .= '<input type="hidden" class="cliente-id" value="' . $cliente->id . '">';

                $html .= '<div class="mt-4 flex space-x-4">';
                $html .= '<button onclick="modulo_bloco(' . $cliente->id . ', \'excluirCliente\', \'' . $categoria . '\', \'' . $corCard . '\')" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition-all">Excluir</button>';
                $html .= '<button onclick="openEditModal(' . $cliente->id . ', \'' . addslashes($cliente->nome) . '\', \'' . addslashes($cliente->email) . '\', \'' . addslashes($cliente->telefone) . '\', \'' . addslashes($cliente->cnpj) . '\', \'' . addslashes($cliente->categoria) . '\', \'' . addslashes($cliente->endereco) . '\')" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-all ml-2">Editar</button>'; // Adicionando ml-2
                $html .= '</div>';

                $html .= '</div>';
            }

            $html .= '</div>';
        }

        return response()->json(['html' => $html]);
    }



    public function deletarCliente($id_cliente)
    {
        // Buscando o cliente pelo ID usando o repositório
        $cliente = $this->repo::find($id_cliente);

        if ($cliente) {
            $cliente->delete(); // Deletando o cliente
            return ['success' => true, 'message' => 'Cliente excluído com sucesso'];
        }

        return ['success' => false, 'message' => 'Cliente não encontrado'];
    }


    public function buscarClientePorId($id){
        $cliente =$this->repo::findOrFail($id);
        return $cliente;
    }
}
