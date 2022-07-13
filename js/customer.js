"use strict";

function toggleAdvanced(){
    var searchbarAdvanced = document.getElementById("searchbar-advanced");
    
    if(searchbarAdvanced.style.display == ""){
        searchbarAdvanced.style.display = "grid";
    }else if(searchbarAdvanced.style.display == "none"){
        searchbarAdvanced.style.display = "grid";
    }
    else{
        searchbarAdvanced.style.display = "none";
    }
}

document.getElementById("advanced-button").addEventListener('click', toggleAdvanced);