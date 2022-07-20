'use strict'

const date = document.getElementById("date");
const fname = document.querySelector("#fname");
const lname = document.querySelector("#lname");
const phone = document.querySelector("#phone");
const vehicle = document.querySelector("#vehicle");
const price = document.querySelector("#price");
const trade = document.querySelector("#trade");
const notes = document.querySelector("#notes");
const errorElement = document.querySelector("#errorElement");
const form = document.querySelector("#form-addcustomer");
const addcustomer = document.querySelector("#form-addcustomer");

var errorState = document.querySelectorAll('.errorState');
var addcustomerSection = addcustomer.querySelector("section");
addcustomerSection.style.gridTemplateColumns = "100px 400px 100px";

var messages = [];
    
    date.addEventListener('keyup',function(event){
        let dateValue = date.value;
        let regex = /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;
        //Checks that the date input is not empty, greater than 10 chars and is in the proper format
        if(dateValue === "" || dateValue === null){
            errorState[0].innerText = "Date field is Required!";
        }else if(regex.test(dateValue) === false){
            errorState[0].innerText ="Date field must only include [0-9 /]  ex. DD/MM/YYYY";
        }else{
            errorState[0].innerText = "Date field looks good!";
        }
    });
    
    fname.addEventListener('keyup',function(event){
        let fnameValue = fname.value;
        let regex = /^[a-zA-Z]{1,25}$/;
        if(fnameValue === "" || fnameValue === null){
            errorState[1].innerText = "First Name field is Required!";
        }else if(regex.test(fnameValue) === false){
            errorState[1].innerText = "First Name must only include [a-z A-Z]!";
        }else{
            errorState[1].innerText = "First Name field looks good!";
        }
    });
    
    lname.addEventListener('keyup',function(event){
        let lnameValue = lname.value;
        let regex = /^[a-zA-Z]{1,25}$/;
        if(lnameValue === "" || lnameValue === null){
            errorState[2].innerText = "Last Name field is Required!";
        }else if(regex.test(lnameValue) === false){
            errorState[2].innerText = "Last Name must only include [a-z A-Z]!";
        }else{
            errorState[2].innerText = "Last Name field looks good!";
        }
    });
     
    phone.addEventListener('keyup',function(event){
        let phoneValue = phone.value;
        let regex = /^[0-9\(\)\-]{13}$/;
        if(phoneValue === "" || phoneValue === null){
            errorState[3].innerText = "Phone field is Required!";
        }else if(regex.test(phoneValue) === false){
            errorState[3].innerText = "Phone field must only include [0-9 ( ) -]!";
        }else{
            errorState[3].innerText = "Phone field looks good!";
        }
    });
    
    vehicle.addEventListener('keyup',function(event){
        let vehicleValue = vehicle.value;
        let regex = /^[a-zA-Z0-9\s]{1,25}$/;
        if(vehicleValue === "" || vehicleValue === null){
            errorState[4].innerText = "Vehicle field is Required!";
        }else if(regex.test(vehicleValue) === false){
            errorState[4].innerText = "Vehicle field must only include [a-z A-Z 0-9 spaces]!";
        }else{
            errorState[4].innerText = "Vehicle field looks good!";
        }
    });
    
    price.addEventListener('keyup',function(event){
        let priceValue = price.value;
        let regex = /^\$[0-9]{1,6}\.[0-9]{2}$/;
        if(priceValue === "" || priceValue === null){
            errorState[5].innerText = "Price field is Required!";
        }else if(regex.test(priceValue) === false){
            errorState[5].innerText = "Price field format must only include [0-9 $ .]!";
        }else{
            errorState[5].innerText = "Price field looks good!";
        }
    });
    
    trade.addEventListener('keyup',function(event){
        let tradeValue = trade.value;
        let regex = /^[a-zA-Z0-9\s]{1,25}$/;
        if(tradeValue === "" || tradeValue === null){
            errorState[6].innerText = "Trade field is Required!";
        }else if(regex.test(tradeValue) === false){
            errorState[6].innerText = "Trade field must only include [a-z A-Z 0-9 spaces]!";
        }else{
            errorState[6].innerText = "Trade field looks good!";
        }
    });
    
    notes.addEventListener('keyup',function(event){
        let notesValue = notes.value;
        let regex = /^[a-zA-Z0-9\s\$\.\,]{1,250}$/;
        if(notesValue === "" || notesValue === null){
            errorState[7].innerText = "Notes field is Required!";
        }else if(regex.test(notesValue) === false){
            errorState[7].innerText = "Notes field must only include [a-z A-Z 0-9 $ , . spaces]!";
        }else{
            errorState[7].innerText = "Notes field looks good!";
        }
    });

form.addEventListener('submit', function(event){
    if(messages.length > 0){
        event.preventDefault();
        errorElement.innerText = messages.join('\n');
    }
});



