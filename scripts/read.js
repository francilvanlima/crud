// -------------- READ do Crud --------------

mostraDados();

function mostraDados() {

    const url = 'http://localhost:8080/crud/read.php';

    fetch(url, {
        method: "GET"
    }).then(response => response.text())
    .then(response => results.innerHTML = response)
    .catch(err => console.log(err));
}