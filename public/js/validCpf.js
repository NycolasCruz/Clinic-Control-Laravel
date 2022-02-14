function validCpf(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '')
    if (cpf == '')
        return false
    if (cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999")
        return false
    add = 0
    for (i = 0; i < 9; i++)
        add += parseInt(cpf.charAt(i)) * (10 - i)
    rev = 11 - (add % 11)
    if (rev == 10 || rev == 11)
        rev = 0
    if (rev != parseInt(cpf.charAt(9)))
        return false
    add = 0
    for (i = 0; i < 10; i++)
        add += parseInt(cpf.charAt(i)) * (11 - i)
    rev = 11 - (add % 11)
    if (rev == 10 || rev == 11)
        rev = 0
    if (rev != parseInt(cpf.charAt(10)))
        return false
    return true
}

function emptyInput(data){
    if(data.length == 0) {
        return true
    }
}

const form = document.forms['form']
const feedback = document.querySelector('#feedback')
const borderCpf = document.querySelector('#cpf')
const borderClass = borderCpf.classList

function validationFeedback(){
    let cpf = form.cpf.value
    if(!validCpf(cpf)){
        if(cpf.length == 14){
            feedback.style.display = 'block'
            feedback.innerHTML = ('<i class="fas fa-triangle-exclamation"></i> CPF Inválido')
            feedback.setAttribute('class', 'invalid-feedback')
            borderClass.remove('border-cpf')
        }else{
            feedback.innerHTML = ''
            feedback.classList.remove('invalid-feedback')
            borderClass.remove('border-cpf')
        }
        return false
    }else{
        feedback.innerHTML = ''
        borderClass.add('border-cpf')
    }
}
