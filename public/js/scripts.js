const btninseror = document.getElementById("btninserir");
const exibiranexo = document.getElementById("exibiranexo");
const nomeanexo = document.getElementById("nomeanexo");
const anexo = document.getElementById("anexo");

btninseror.addEventListener("click", function(e){
    
    let nome = nomeanexo.value;
    let link = anexo.value;
    exibiranexo.innerHTML = "<a href=" + link + " target='_blank'>" + nome + "</a>";
    
});