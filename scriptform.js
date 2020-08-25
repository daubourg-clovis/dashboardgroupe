// messages d'erreurs
// alert("alert");
// document.addEventListener("DOMContentLoaded", function() {
//     var elements = document.getElementsByTagName("INPUT");
//     for (var i = 0; i < elements.length; i++) {
//         elements[i].oninvalid = function(e) {
//             e.target.setCustomValidity("");
//             if (!e.target.validity.valid) {
//                 e.target.setCustomValidity("This field cannot be left blank");
//             }
//         };
//         elements[i].oninput = function(e) {
//             e.target.setCustomValidity("");
//         };
//     }
// })



document.addEventListener("DOMContentLoaded", function() {
    var values  = document.getElementById("exampleInput2");
   
        values.oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Please enter a name");
            }
        };
        values.oninput = function(e) {
            e.target.setCustomValidity("");
        };
    
});


document.addEventListener("DOMContentLoaded", function() {
    var values  = document.getElementById("exampleInput3");
   
        values.oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Please enter a seller");
            }
        };
        values.oninput = function(e) {
            e.target.setCustomValidity("");
        };
    
});
 // seller
 const selectseller = document.getElementById("selectseller");

 var change = function(){
 
     var values  = document.getElementById("exampleInput3");
    
     if(selectseller.value==""){
         values.required= true;
     }
     else{
         values.required=false;
     }
 }
 change();
 selectseller.addEventListener("change", change );
 



document.addEventListener("DOMContentLoaded", function() {
    var values  = document.getElementById("exampleInput4");
   
        values.oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Please enter a reference");
            }
        };
        values.oninput = function(e) {
            e.target.setCustomValidity("");
        };
    
});
 //category
const selectcategory = document.getElementById("selectcategory");

 var change = function(){

     var values  = document.getElementById("exampleInput5");
    
     if(selectcategory.value==""){
        values.required= true;
    }
     else{
        values.required=false;
    }
}
change();
selectcategory.addEventListener("change", change );







document.addEventListener("DOMContentLoaded", function()

{
   
   
        values.oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("This field cannot be left blank");
            }
        };
        values.oninput = function(e) {
            e.target.setCustomValidity("");
        };
    
});


document.addEventListener("DOMContentLoaded", function() {
    var values  = document.getElementById("exampleInput6");
   
        values.oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Please enter a purchase date");
            }
        };
        values.oninput = function(e) {
            e.target.setCustomValidity("");
        };
    
});


document.addEventListener("DOMContentLoaded", function() {
    var values  = document.getElementById("exampleInput7");
   
        values.oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Please enter a warranty date");
            }
        };
        values.oninput = function(e) {
            e.target.setCustomValidity("");
        };
    
});




document.addEventListener("DOMContentLoaded", function() {
    var values  = document.getElementById("exampleInput8");
   
        values.oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Please enter a price");
            }
        };
        values.oninput = function(e) {
            e.target.setCustomValidity("");
        };
    
});











