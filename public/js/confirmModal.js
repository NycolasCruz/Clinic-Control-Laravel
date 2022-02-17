const btnDelete = document.querySelector('#delete-btn')
let redirect = false

let confirmModal = () => {
    if(redirect == true) {
        return
    }
    swal({
        text:       'Deseja Remover Este Cadastro Permanentemente?',
        icon:       'warning',
        buttons:    ['Não', true],
        dangerMode: true,
        })
    .then((willDelete) => {
        if(willDelete) {
            redirect = true
            btnDelete.click()
        }
    })
    return false
}
