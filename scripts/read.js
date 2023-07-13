// -------------- READ do Crud --------------
const dados = {
    aluno: 'Francilvan',
    idade: '28',
    sexo: 'Masculino',
};
console.log(dados);

mostraDados();

function mostraDados() {

    const url = 'http://localhost:9090/crudTeste/read.php';

    fetch(url, {
        method: "GET"
    }).then(response => response.text())
    .then(response => results.innerHTML = response)
    .catch(err => console.log(err));
}