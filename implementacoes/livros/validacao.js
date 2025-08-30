function validar() {
    var titulo = document.querySelector("#titulo").value;
    var genero = document.getElementById("genero").value;

    var divErro = document.querySelector("#divErro");

    //console.log(titulo + " - " + genero);
    if(titulo.trim() == '') {
        divErro.innerHTML = "Informe o título!";
        return false;
    
    } else if(genero.trim() == '') {
        divErro.innerHTML = "Informe o gênero!";
        return false;
    }

    //Caso passou as validações, retorna true
    return true;
}