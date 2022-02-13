function teste(){
    swal({
        text: 'Deseja Remover Este Cadastro Permanentemente?',
        icon: 'warning',
        buttons: ['Não', true],
        dangerMode: true,
      })
      .then((willDelete) => {
            if (willDelete){
                console.log('Tudo certo!')
            }
      })
      return false
}
