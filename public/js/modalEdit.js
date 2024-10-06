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
