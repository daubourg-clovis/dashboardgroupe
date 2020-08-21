// Pour le message de confirmation de déconnexion login


const logout=document.getElementsByClassName("logout")[0];
const cacher=document.getElementById("cacher");

logout.addEventListener("click",function(){
    const deco = document.getElementById("deco");

    deco.classList.remove("hidden");


});
cacher.addEventListener("click", function(){
    const deco = document.getElementById("deco");

    deco.classList.add("hidden");
})


// Pour le message de confirmation de suppression

const deleteLinks = document.getElementsByClassName('delet');

const btnYes = document.getElementById('validation');
