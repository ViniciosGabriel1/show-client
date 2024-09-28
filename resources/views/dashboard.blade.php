
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div
                    class="text-center bg-blue-100 rounded-lg p-6 shadow-md transition-transform transform hover:scale-105">
                    <div class="mb-4">
                        <i class="fas fa-laptop-code text-4xl text-blue-600"></i> <!-- Ícone de Tecnologia -->
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Tecnologia</h3>
                    <p class="mt-2 mb-6 text-gray-600">Inovações e soluções digitais</p>
                    <button id="Tecnologia"
                        class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"
                        onclick="verClientes('carregarEstrutura','Tecnologia','blue')">Ver Clientes</button>
                </div>
                <div
                    class="text-center bg-green-100 rounded-lg p-6 shadow-md transition-transform transform hover:scale-105">
                    <div class="mb-4">
                        <i class="fas fa-utensils text-4xl text-green-600"></i> <!-- Ícone de Alimentação -->
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Alimentação</h3>
                    <p class="mt-2 mb-6 text-gray-600">Comida saudável e saborosa</p>
                    <button id="Alimentação"
                       class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded"
                        onclick="verClientes('carregarEstrutura','Alimentação','green')">Ver Clientes</button>
                </div>
                <div
                    class="text-center bg-red-100 rounded-lg p-6 shadow-md transition-transform transform hover:scale-105">
                    <div class="mb-4">
                        <i class="fas fa-heartbeat text-4xl text-red-600"></i> <!-- Ícone de Saúde -->
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Saúde</h3>
                    <p class="mt-2 mb-6 text-gray-600">Serviços e produtos de saúde</p>
                    <button id="Saúde"
                    class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded"                        onclick="verClientes('carregarEstrutura','Saúde','red')">Ver Clientes</button>
                </div>
                <div
                    class="text-center bg-yellow-100 rounded-lg p-6 shadow-md transition-transform transform hover:scale-105">
                    <div class="mb-4">
                        <i class="fas fa-shopping-cart text-4xl text-yellow-600"></i> <!-- Ícone de Varejo -->
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Varejo</h3>
                    <p class="mt-2 mb-6 text-gray-600">Compras e serviços variados</p>
                    <button id="Varejo" class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 border-b-4 border-yellow-600 hover:border-yellow-600 rounded"
                        onclick="verClientes('carregarEstrutura','Varejo','yellow')">Ver Clientes</button>
                </div>
                <div
                    class="text-center bg-purple-100 rounded-lg p-6 shadow-md transition-transform transform hover:scale-105">
                    <div class="mb-4">
                        <i class="fas fa-graduation-cap text-4xl text-purple-600"></i> <!-- Ícone de Educação -->
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Educação</h3>
                    <p class="mt-2 mb-6 text-gray-600">Formação e aprendizado</p>
                    <button id="Educação" class="bg-purple-500 hover:bg-purple-400 text-white font-bold py-2 px-4 border-b-4 border-violet-700 hover:border-violet-500 rounded"
                        onclick="verClientes('carregarEstrutura','Educação','purple')">Ver Clientes</button>
                </div>
            </div>
        </div>
    </div>


    <div id="clientesList"></div>
<!-- Modal de Edição -->
<div id="editClientModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <form action="{{ route('dashboard.atualizarCliente') }}" method="POST">
        @csrf
        <div id="modalContent" class="bg-white rounded-lg shadow-lg p-6 transform scale-0 transition-transform duration-300 max-w-xl w-full">
            <!-- Conteúdo do Modal -->
            <h2 class="text-xl font-bold mb-4">Editar Cliente</h2>
            
            <input type="hidden" id="editClientId" name="id_cliente">

            <label for="editClientName" class="block">Nome:</label>
            <input type="text" id="editClientName" name="nome" class="border rounded p-2 mb-4 w-full">

            <label for="editClientEmail" class="block">Email:</label>
            <input type="email" id="editClientEmail" name="email" class="border rounded p-2 mb-4 w-full">

            <label for="editClientPhone" class="block">Telefone:</label>
            <input type="text" id="editClientPhone" name="telefone" class="border rounded p-2 mb-4 w-full">

            <label for="editClientCnpj" class="block">CNPJ:</label>
            <input type="text" id="editClientCnpj" name="cnpj" class="border rounded p-2 mb-4 w-full">

            <label for="editClientCategory" class="block">Categoria:</label>
            <input type="text" id="editClientCategory" name="categoria" class="border rounded p-2 mb-4 w-full">

            <label for="editClientAddress" class="block">Endereço:</label>
            <input type="text" id="editClientAddress" name="endereco" class="border rounded p-2 mb-4 w-full">

            <div class="flex justify-end">
                <button type="button" onclick="closeModal()" class="bg-gray-300 px-4 py-2 rounded mr-2">Cancelar</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Salvar</button>
            </div>
        </div>
    </form>
</div>



@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sucesso!',
        text: "{{ session('success') }}",
        confirmButtonText: 'OK'
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Erro!',
        text: "{{ session('error') }}",
        confirmButtonText: 'Tentar novamente'
    });
</script>
@endif



</x-app-layout>

<script>
    function verClientes(estrutura, categoria, cor) {
        // Chama a função que carrega os clientes
        modulo_bloco('','carregarEstrutura', categoria, cor);
    
        // Define um pequeno atraso para permitir que o HTML seja renderizado
        setTimeout(() => {
            // Deslocar para a div de clientes com uma rolagem suave
            const clientesList = document.getElementById('clientesList');
            const top = clientesList.getBoundingClientRect().top + window.scrollY; // Posição da div
    
            // Animação de rolagem suave
            window.scrollTo({
                top: top,
                behavior: 'smooth'
            });
        }, 170); // Atraso de 300 milissegundos (ajuste conforme necessário)
    }


    function openEditModal(id_cliente, nome, email, telefone, cnpj, categoria, endereco) {
    document.getElementById('editClientId').value = id_cliente;
    document.getElementById('editClientName').value = nome;
    document.getElementById('editClientEmail').value = email;
    document.getElementById('editClientPhone').value = telefone; // Novo campo
    document.getElementById('editClientCnpj').value = cnpj; // Novo campo
    document.getElementById('editClientCategory').value = categoria; // Novo campo
    document.getElementById('editClientAddress').value = endereco; // Novo campo

    const modal = document.getElementById('editClientModal');
    const modalContent = document.getElementById('modalContent');
    
    modal.classList.remove('hidden');
    setTimeout(() => {
        modalContent.classList.remove('scale-0');
        modalContent.classList.add('scale-100');
    }, 10); // Delay para permitir a remoção da classe 'scale-0'
}


function closeModal() {
    const modalContent = document.getElementById('modalContent');
    
    modalContent.classList.remove('scale-100');
    modalContent.classList.add('scale-0');

    setTimeout(() => {
        document.getElementById('editClientModal').classList.add('hidden');
    }, 300); // Tempo deve corresponder à duração da transição
}

// Adiciona evento de clique para fechar o modal apenas se clicar fora do conteúdo
document.getElementById('editClientModal').addEventListener('click', function(event) {
    const modalContent = document.getElementById('modalContent');
    // Verifica se o clique foi fora do conteúdo do modal
    if (!modalContent.contains(event.target)) {
        closeModal();
    }
});





    </script>
    


