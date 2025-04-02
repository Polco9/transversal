const usernameinput = document.getElementById("user");

usernameinput.addEventListener("click", function(){
    usernameinput.style.border = "3px solid green";
});

usernameinput.addEventListener("blur", function(){
    usernameinput.style.border = "";
});