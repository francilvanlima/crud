// -------------- CREATE do Crud; Ler o que tá no BD --------------

function createUser() {
    const name = document.getElementById('name').value
    const cpf = document.getElementById('cpf').value
    const endereco = document.getElementById('endereco').value
    const telefone = document.getElementById('telefone').value
    const email = document.getElementById('email').value

    const form = new FormData()

    form.append('name', name);
    form.append('cpf', cpf);
    form.append('endereco', endereco);
    form.append('telefone', telefone);
    form.append('email', email);

    const url = 'http://localhost:9090/crudTeste/cadastro.php'; //Url que será usada no fetch

    //usando fetch API do javaScript para enviar as informações para o banco de dados
    fetch(url,{
        method: 'POST', //pode ser GET, PUT ou DELETE
        body:form //Dados que serão enviados definidos acima
    }).then(response =>{ //then É uma promisse, vamos passar o "response"
        response.json().then(result =>{ //outra promisse com o "result". json porque é o formato da resposta que tá no arquivo cadastro.php
            // console.log(result)
            Swal.fire(result.success);
            // console.log(result);
        })
    }).catch(err => console.log(err))     
    
}