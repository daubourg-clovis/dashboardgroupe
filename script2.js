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

 

 const confirmation = document.getElementById('confirmation');
  confirmation.addEventListener("click", function() {
      modal.classList.add("hidden");
  });

  function nodelete(idproduit){
    const modal = document.getElementById('modal'+idproduit);
        modal.classList.add("hidden");
     
         
      
    }
  


 const dlts = document.getElementsByClassName("dlt");
 console.log(dlts)
 for(let dlt of dlts) { console.log(dlt)
  
 dlt.addEventListener("click", function(e){
  let id = this.getAttribute("data-id");
  console.log(id);
  const modal = document.getElementById('modal'+id);
   modal.classList.remove("hidden");
  
})}

