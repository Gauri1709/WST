function validateForm(){
    let name = document.forms["form"]["name"].value;
    let mis = document.forms["form"]["mis"].value;
    let email = document.forms["form"]["email"].value;
    if(name.length<2){
        alert("Name should be of length more than two");
        return false;
    }
    else if(mis.length < 2){
        alert("Invalid mis");
        return false;
    }
    else if(email.length<2){
        alert("invalid email");
        return false;
    }
    return true;
}