/*
    Essa é uma função em JavaScript que utiliza a biblioteca SweetAlert2 e a biblioteca Axios para excluir um turma de um sistema web. 
    A função recebe dois parâmetros: id e nome, que correspondem ao ID e nome do turma que será excluído.
    Quando a função é chamada, ela exibe uma mensagem de confirmação usando o método fire(), que apresenta um diálogo personalizado. 
    Se a turma confirmar a exclusão, a função faz uma requisição HTTP DELETE usando a biblioteca Axios para excluir o pessoa do sistema. 
    Se a exclusão for bem-sucedida, a página é recarregada usando o método location.reload().
    Caso ocorra algum erro durante a exclusão, uma mensagem de erro é exibida.
*/

function deleteTurmas(id, descricao) {
    Swal.fire({
        title: 'Tem certeza?',
        text: `Você está prestes a excluir a turma ${descricao}.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/turmas/${id}`)
                .then(() => {
                    Swal.fire(
                        'Excluído!',
                        'A turma foi excluído com sucesso.',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                })
                .catch(() => {
                    Swal.fire(
                        'Erro!',
                        'Não foi possível excluir a turma.',
                        'error'
                    );
                });
        }
    });
}

// function orderBy (order) {

// }
