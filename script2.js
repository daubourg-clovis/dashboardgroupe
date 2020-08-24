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

const modal = document.getElementById('modal');

const confirmation = document.getElementById('confirmation');
 confirmation.addEventListener("click", function() {
     modal.classList.add("hidden");
 });

   const nodelete = document.getElementById("nodelete");
 nodelete.addEventListener("click", function(){
   modal.classList.add("hidden");

    
});


const dlts = document.getElementsByClassName("dlt");
console.log(dlts)
for(let dlt of dlts) { console.log(dlt)
 dlt.addEventListener("click", function(){
  
   modal.classList.remove("hidden");

})};

