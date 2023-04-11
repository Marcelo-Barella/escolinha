function deleteUser(id, name) {
    Swal.fire({
        title: 'Tem certeza?',
        text: `Você está prestes a excluir o usuário ${name}.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, excluir',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/colaboradores/${id}`)
                .then(() => {
                    Swal.fire(
                        'Excluído!',
                        'O usuário foi excluído com sucesso.',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                })
                .catch(() => {
                    Swal.fire(
                        'Erro!',
                        'Não foi possível excluir o usuário.',
                        'error'
                    );
                });
        }
    });
}


// $(document).ready(function() {
//     $('#updateUserModal').on('shown', function() {
//         console.log('Modal foi exibido!');
//         $(this).find('[autofocus]').first().focus();
//     });
// });
