<?php

namespace App\Imports;

use App\Models\Cliente; // Verifique se este é o modelo correto
use App\Models\Clientes;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;

class ClientesImport implements ToCollection
{
    protected $id_usuario;

    // Adicione um construtor para receber o id_usuario
    public function __construct($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @param Collection $rows
     *
     * @return void
     */
    public function collection(Collection $rows)
    {
        // Ignora a primeira linha que contém os cabeçalhos
        $header = true;
        foreach ($rows as $row) {
            if ($header) {
                // Ignora a primeira linha (cabeçalhos)
                $header = false;
                continue;
            }
    
            // Verifica se a linha não está vazia e contém valores
            if (!empty($row[0]) && !is_null($row[0])) { 
                // Cria um novo cliente com o id_usuario
                Clientes::create([
                    'id_usuario' => $this->id_usuario, // Adiciona o id_usuario
                    'nome' => $row[0],
                    'email' => $row[1],
                    'telefone' => $row[2],
                    'cnpj' => $row[3],
                    'categoria' => $row[4],
                    'endereco' => $row[5]
                ]);
            } else {
                // Ignora linhas vazias
            }
        }
    }
    
    
}
