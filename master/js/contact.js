'use strict';
function contactValidation (){
    let email=document.getElementById("txtEmail").value;
    let name=document.getElementById("txtUserName").value;
    let phone=document.getElementById("txtPhone").value;
	let contactBoxes = document.getElementsByClassName("checkboxInput");
    let textArea = document.getElementById('mess');
    let contactMethod = document.querySelectorAll('.radioInput');

    let errMsg = {
        ulEmail: [],
        ulName: [],
        ulPhone: [],
        ulDay: [],
        ulTxtArea: [],
        ulContactMethod: []
    }
    let resultEmail = validateEmail(email);
    let resultName = validateName(name);
    let resultPhone = validatePhoneNumber(phone);
    let resultDay = validateContactDay(contactBoxes);
    let resultTxtArea = validateTextarea(textArea);
    let resultContactMethod = validateContactMethod(contactMethod);

    if (resultEmail.length > 0) {
        errMsg.ulEmail.push(resultEmail[0]);
    }

    if (resultName.length > 0) {
        errMsg.ulName.push(resultName[0]);
    }

    if (resultPhone.length > 0) {
        errMsg.ulPhone.push(resultPhone[0]);
    }

    if (resultDay.length > 0) {
        errMsg.ulDay.push(resultDay[0]);
    }

    if (resultTxtArea.length > 0) {
        errMsg.ulTxtArea.push(resultTxtArea[0]);
    }

    if (resultContactMethod.length > 0) {
        errMsg.ulContactMethod.push(resultContactMethod[0]);
    }

    displayValidation(errMsg);

    if (checkAllValidation(errMsg)) {
        return true;
    }
    return false;
    
}



const textarea = document.getElementById('mess');
const remainingCharsText = document.getElementById('my-textarea-remaining-char');
const Max_Chars = 500;
const Min_Chars = 50;

textarea.addEventListener('input',() => {
    const remaining500 = Max_Chars - textarea.value.length;
    const remaining50 = Min_Chars - textarea.value.length;
    let x = textarea.value.length;
    if (x < 50) {
        remainingCharsText.textContent = `You have ${50 - x} characters are needed.`; 
    }
    else if (50 < x && x < 500) {
        remainingCharsText.textContent = `You have ${500 - x} characters left.`; 
    }
    else if (x > 500) {
        remainingCharsText.textContent = `You have to delete ${x - 500} characters.`; 
    }
});



