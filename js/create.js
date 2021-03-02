// Script Create OS
// Add New Leyer
const errorNeed = document.querySelector('.error-need')
let showCount = document.querySelector('.show-count-element > span')

function addItemNeed() {
    const productsNeed = document.getElementById("products-need")
    
    var countItems = productsNeed.childElementCount+1

    if (countItems < 6) {
        var node = document.createElement("div")

        node.classList.add('product-item')
        node.classList.add(`item-${countItems}`)
        node.innerHTML = 
        ` 
        <input type="text" name="nome_produto" placeholder="Nome do Produto">
        <input type="number" name="qnt_produto" placeholder="Quantidade">
        <input type="text" name="valor_produto" placeholder="Valor Unitario">
        <button type="button" title="Deletar Camada" class='btn-remove' onclick="removeItemNeed('.item-${countItems}')">
            <i class="fas fa-trash"></i>
        </button>        
        `
        productsNeed.appendChild(node);
        errorNeed.innerHTML = ''
        showCount.innerHTML = countItems

    } else {
        errorNeed.innerHTML = 'Só é permitido adicionar 15 produtos!'
        showCount.style.color = 'red'
    }
}

function removeItemNeed(item) {
    var elementRemove = document.querySelector(item)
    elementRemove.outerHTML = ''
    errorNeed.innerHTML = 'Uma camada foi removida! '
    console.log(showCount)
}


// Submit Area
const onCreate = document.querySelector('.on-create')
var formCreate = document.getElementById('form-create')


var nomeCliente = formCreate.nome_cliente
var apelidoCliente = formCreate.apelido 
var cpfCliente = formCreate.cpf
var emailCliente = formCreate.email
var telefoneCliente = formCreate.telefone
var facebookCliente = formCreate.facebook

var enderecoCliente = formCreate.endereco 
var cidadeCliente = formCreate.cidade
var estadoCliente = formCreate.estado
var detalhesCliente = formCreate.detalhes_cliente
var equipamentoCliente = formCreate.equipamento
var nomeAtendente = formCreate.nome_atendente
var inicioServico = formCreate.inicio_servico

var nomeTecnico = formCreate.nome_tecnico
var horasTrabalho = formCreate.horas_trabalho
var finalServico = formCreate.final_servico
var descricaoTecnico = formCreate.descricao_tecnico
var valorServico = formCreate.valor_servico
var statusServico = formCreate.status_servico


function valueTotal() {
    let valueInsert = document.getElementById('total-insert')
    valueInsert.innerHTML = valorServico.value
}


onCreate.addEventListener('click', event => {
    event.preventDefault()

    let statusValidation = false

    function addError(element) {
        element.classList.add('on-error')
        statusValidation = true
    }


    if (nomeCliente.value === '') {
        addError(nomeCliente)
    }

    if (cpfCliente.value === '') {
        addError(cpfCliente)
    }

    if (telefoneCliente.value === '') {
        addError(telefoneCliente)
    }

    if (enderecoCliente.value === '') {
        addError(enderecoCliente)
    }

    if (cidadeCliente.value === '') {
        addError(cidadeCliente)
    }

    if (estadoCliente.value === '0') {
        addError(estadoCliente)
    }

    if (detalhesCliente.value === '') {
        addError(detalhesCliente)
    }

    if (equipamentoCliente.value === '') {
        addError(equipamentoCliente)
    }

    if (nomeAtendente.value === '') {
        addError(nomeAtendente)
    }

    if (inicioServico.value === '') {
        addError(inicioServico)
    }

    if (statusServico.value === '0') {
        addError(statusServico)
    }

    if (statusServico.value === 'Finalizado') {

        if (nomeTecnico.value === '') {
            addError(nomeTecnico)
        }

        if (horasTrabalho.value === '') {
            addError(horasTrabalho)
        }

        if (descricaoTecnico.value === '') {
            addError(descricaoTecnico)
        }

        if (finalServico.value === '') {
            addError(finalServico)
        }
        
        if (valorServico.value === '') {
            addError(valorServico)
        }

    }

    
    // If the statusValidation is not true, then we start ajax
    if (!statusValidation) {
        let xhr = new XMLHttpRequest()

        var dataCreate = {
            nome_cliente: nomeCliente.value,
            apelido: apelidoCliente.value,
            cpf: cpfCliente.value,
            email: emailCliente.value,
            telefone: telefoneCliente.value,
            facebook: facebookCliente.value,
            endereco: enderecoCliente.value,
            cidade: cidadeCliente.value,
            estado: estadoCliente.value,
            detalhes_cliente: detalhesCliente.value,
            equipamento: equipamentoCliente.value,
            nome_atendente: nomeAtendente.value,
            inicio: inicioServico.value,
            nome_tecnico: nomeTecnico.value,
            horas: horasTrabalho.value,
            final: finalServico.value,
            descricao_tecnico: descricaoTecnico.value,
            valor_total: valorServico.value,
            status: statusServico.value
        }
        
        var str_json = "json_string=" + (JSON.stringify(dataCreate))

        xhr.open('POST', 'http://localhost/OS/painel/process/create.php')
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xhr.send(str_json)

        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var data = xhr.responseText

                console.log(data)

                if (data === 'error') {
                    console.log('error')
                }
            }
        }

    }

    // function dateFormat(date) {
    //     return date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear()
    // }

    // console.log(dateFormat(formCreate.inicio_servico.value))

    

})

