mostraDados(); //Atualiza a pagina quando chamada

// -------------- CREATE do Crud --------------
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

    const url = 'http://localhost:9090/crud/cadastro.php'; //Url que será usada no fetch

    //usando fetch API do javaScript para enviar as informações para o banco de dados
    fetch(url,{
        method: 'POST', //pode ser GET, PUT ou DELETE
        body:form //Dados que serão enviados definidos acima
    }).then(response =>{ //then É uma promisse, vamos passar o "response"
        response.json().then(result =>{ //outra promisse com o "result". json porque é o formato da resposta que tá no arquivo cadastro.php
            Swal.fire(result.success);
            //limpa os campos
            document.getElementById('name').value = "";
            document.getElementById('cpf').value = "";
            document.getElementById('endereco').value = "";
            document.getElementById('telefone').value = "";
            document.getElementById('email').value = "";
        })
    }).catch(err => console.log(err))     
    
}

// -------------- READ do Crud --------------

function mostraDados() {

    const url = 'http://localhost:9090/crud/read.php';

    fetch(url, {
        method: "GET"
    }).then(response => response.text())
    .then(response => results.innerHTML = response)
    .catch(err => console.log(err));
}

// -------------- Update do Crud --------------
function getId(id) {
    const form = new FormData();

form.append('id', id);
const url = 'http://localhost:9090/crud/get_id.php';

fetch(url, {
    method: 'POST',
    body: form
}).then(response => {
    response.json().then(data => {
        // console.log(data);
        window.localStorage.setItem('user',JSON.stringify(data));
        window.location.href="update.html";
    })
})
}

//armazena os dados do usuário em cache
userData();
function userData(){
    const data = JSON.parse(localStorage.getItem('user'));
    const user = data[0];
    
    document.getElementById('id').value = user.id;
    document.getElementById('name-1').value = user.name;
    document.getElementById('cpf-1').value = user.cpf;
    document.getElementById('endereco-1').value = user.endereco;
    document.getElementById('telefone-1').value = user.telefone;
    document.getElementById('email-1').value = user.email;
}

function updateUser() {
    const id = document.getElementById('id').value;
    const name = document.getElementById('name-1').value;
    const cpf = document.getElementById('cpf-1').value;
    const endereco = document.getElementById('endereco-1').value;
    const telefone = document.getElementById('telefone-1').value;
    const email = document.getElementById('email-1').value;

    const form = new FormData();

    form.append('id', id);
    form.append('name', name);
    form.append('cpf', cpf);
    form.append('endereco', endereco);
    form.append('telefone', telefone);
    form.append('email', email);

    const url = 'http://localhost:9090/crud/update.php';

    fetch(url, {
        method: 'POST',
        body: form
    }).then(response => {
        response.json().then(data => {
            // console.log(data.message);
            Swal.fire(data.message).then(isConfirmed => {
                if(isConfirmed){
                    window.location.href="index.html";
                    window.localStorage.removeItem('user');
                }
            })
        })
    })
}

// -------------- Delete do Crud --------------
function remove(id) {
    const form = new FormData();
    form.append('id', id);

    const url = 'http://localhost:9090/crud/remove.php';

    Swal.fire({
        title: 'Você tem certeza?',
        text: "Essa ação será irreversível!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, delete it!',
        CancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
            fetch(url, {
                method: 'POST',
                body: form
            }).then(response => {
                response.json().then(data => {
                    Swal.fire(data.message);
                    mostraDados();
                })//.setTimeout(() => {
                //     window.location.reload()
                //   }, 1000);
            }).catch(err => console.log(err))
        }
    })    
}
