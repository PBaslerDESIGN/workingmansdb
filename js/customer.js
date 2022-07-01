"use strict";



function toggleAdvanced(){
    const searchbar = document.getElementById("searchbar-advanced");
    if(searchbar.style.display === "none"){
        console.log("hello world");
        searchbar.style.display = "block";
    }else{
        searchbar.style.display = "none";
    }
}