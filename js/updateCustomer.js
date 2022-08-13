'use strict'

const date = document.getElementById("date");
const fname = document.querySelector("#fname");
const lname = document.querySelector("#lname");
const phone = document.querySelector("#phone");
const vehicle = document.querySelector("#vehicle");
const price = document.querySelector("#price");
const trade = document.querySelector("#trade");
const notes = document.querySelector("#notes");
const submit = document.querySelector("#form-button");
function displayNone() {
    pageMessage.style.display = "none";
}
var pageMessage = document.querySelector('#pageMessage');
if(pageMessage.style.diplay === "block"){
    setTimeout(displayNone,5000);
}else{
  pageMessage.style.display = "none";  
}



var errorState = document.getElementsByClassName("errorState");
var count = document.getElementsByClassName('noError');

//Custom page related functions
function isError(value){
    if(value.classList[1] === undefined){
        value.classList.add("error");
    }else if(value.classList[1] === "noError"){
        value.classList.replace("noError","error");
    }
}

function isNotError(value){
    if(value.classList[1] === "error"){
        value.classList.replace("error","noError");
    }
    else if(value.classList[1] === undefined){
        value.classList.add("noError");
    }
}

//Client side validation functions
    date.addEventListener('keyup',function(event){
        let dateValue = date.value;
        let regex = /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;
        //Checks that the date input is not empty, greater than 10 chars and is in the proper format
        if(dateValue === "" || dateValue === null){
            errorState[0].innerText = "Date field is Required!";
            isError(errorState[0]);
        }else if(regex.test(dateValue) === false){
            errorState[0].innerText ="Date field must only include [0-9 /]  ex. DD/MM/YYYY";
            isError(errorState[0]);
        }else{
            errorState[0].innerText = "Date field looks good!";
            isNotError(errorState[0]);
        }
    });


    fname.addEventListener('keyup',function(event){
        let fnameValue = fname.value;
        let regex = /^[a-zA-Z]{1,25}$/;
        if(fnameValue === "" || fnameValue === null){
            errorState[1].innerText = "First Name field is Required!";
            isError(errorState[1]);
        }else if(regex.test(fnameValue) === false){
            errorState[1].innerText = "First Name must only include [a-z A-Z]!";
            isError(errorState[1]);
        }else{
            errorState[1].innerText = "First Name field looks good!";
            isNotError(errorState[1]);
        }
    });
    
    lname.addEventListener('keyup',function(event){
        let lnameValue = lname.value;
        let regex = /^[a-zA-Z]{1,25}$/;
        if(lnameValue === "" || lnameValue === null){
            errorState[2].innerText = "Last Name field is Required!";
            isError(errorState[2]);
        }else if(regex.test(lnameValue) === false){
            errorState[2].innerText = "Last Name must only include [a-z A-Z]!";
            isError(errorState[2]);
        }else{
            errorState[2].innerText = "Last Name field looks good!";
            isNotError(errorState[2]);
        }
    });
     
    phone.addEventListener('keyup',function(event){
        let phoneValue = phone.value;
        let regex = /^[0-9\(\)\-]{13}$/;
        if(phoneValue === "" || phoneValue === null){
            errorState[3].innerText = "Phone field is Required!";
            isError(errorState[3]);
        }else if(regex.test(phoneValue) === false){
            errorState[3].innerText = "Phone field must only include [0-9 ( ) -]!";
            isError(errorState[3]);
        }else{
            errorState[3].innerText = "Phone field looks good!";
            isNotError(errorState[3]);
        }  
    });
    
    vehicle.addEventListener('keyup',function(event){
        let vehicleValue = vehicle.value;
        let regex = /^[a-zA-Z0-9\s]{1,25}$/;
        if(vehicleValue === "" || vehicleValue === null){
            errorState[4].innerText = "Vehicle field is Required!";
            isError(errorState[4]);
        }else if(regex.test(vehicleValue) === false){
            errorState[4].innerText = "Vehicle field must only include [a-z A-Z 0-9 spaces]!";
            isError(errorState[4]);
        }else{
            errorState[4].innerText = "Vehicle field looks good!";
            isNotError(errorState[4]);
        }
    });
    
    price.addEventListener('keyup',function(event){
        let priceValue = price.value;
        let regex = /^\$[0-9]{1,6}\.[0-9]{2}$/;
        if(priceValue === "" || priceValue === null){
            errorState[5].innerText = "Price field is Required!";
            isError(errorState[5]);
        }else if(regex.test(priceValue) === false){
            errorState[5].innerText = "Price field format must only include [0-9 $ .]!";
            isError(errorState[5]);
        }else{
            errorState[5].innerText = "Price field looks good!";
            isNotError(errorState[5]);
        }
    });
    
    trade.addEventListener('keyup',function(event){
        let tradeValue = trade.value;
        let regex = /^[a-zA-Z0-9\s]{1,25}$/;
        if(tradeValue === "" || tradeValue === null){
            errorState[6].innerText = "Trade field is Required!";
            isError(errorState[6]);
        }else if(regex.test(tradeValue) === false){
            errorState[6].innerText = "Trade field must only include [a-z A-Z 0-9 spaces]!";
            isError(errorState[6]);
        }else{
            errorState[6].innerText = "Trade field looks good!";
            isNotError(errorState[6]);
        }
    });
    
    notes.addEventListener('keyup',function(event){
        let notesValue = notes.value;
        let regex = /^[a-zA-Z0-9\s\$\.\,]{1,250}$/;
        if(notesValue === "" || notesValue === null){
            errorState[7].innerText = "Notes field is Required!";
            isError(errorState[7]);
        }else if(regex.test(notesValue) === false){
            errorState[7].innerText = "Notes field must only include [a-z A-Z 0-9 $ , . spaces]!";
            isError(errorState[7]);
        }else{
            errorState[7].innerText = "Notes field looks good!";
            isNotError(errorState[7]);
        }
    });


submit.addEventListener('click', function(event){
    pageMessage.style.display = "block";
});



