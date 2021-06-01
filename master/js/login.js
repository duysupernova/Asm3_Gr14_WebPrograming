'use strict';

// function
function loginValidation() {
    var userID = document.querySelector("#uId").value;
    localStorage.userCurrentId = userID;
    return true;
}
