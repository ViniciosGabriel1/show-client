<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastrar Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <section class="bg-white shadow-md rounded-lg p-6">
                <header class="mb-4">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Importar Clientes
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Selecione um arquivo para importar os clientes. Certifique-se de que o arquivo esteja no formato correto.
                    </p>
                </header>
    
                <form method="POST" action="{{ url('dashboard/importClientes') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf
                    
                    <input type="hidden" name="id_usuario" value="{{ auth()->user()->id }}"> <!-- Adicione o id do usuário autenticado -->
                    
                    <div class="mb-4">
                        <label for="import_file" class="block text-sm font-medium text-gray-700 mb-1">Escolha um arquivo:</label>
                        <input type="file" class="form-control border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 w-full" name="import_file" id="import_file" required>
                    </div>
    
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 text-white font-semibold py-2 px-4">
                        Importar
                    </button>
                </form>
            </section>
        </div>
    </div>
    
    
</x-app-layout>
