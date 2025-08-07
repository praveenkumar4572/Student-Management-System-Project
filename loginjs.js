/*const form=document.querySelector('#form');
const form=document.querySelector('#username');
const form=document.querySelector('#password');
form.addEventListener('submit',(e)=>{
    e.preventDefault();
    validateInputs();
})
function validateInputs(){
    const usernameval=username.value.trim();
    const passwordval=password.value.trim();
    if(usernameval===''){
        setError(username,'username is required')
    }
    else if(!validateUsername(usernameval)){
        setError(username,'Please enter a valid username')
    }
    else if (!validateUsername(usernameVal)) {
        setError(username, 'Username must be 3-8 characters long and contain only letters and numbers');
    else if (usernameval.length<8) {
        setError(username, 'username must be atleast 8 character');
    else{
        setSuccess(username)
    }
    if(passwordval===''){
        setError(password,'password is required')
    }
    else if(!validatepassword(passwordval)){
        setError(username,'Please enter a valid password')
    else if (!validatepassword(passwordVal)) {
        setError(username, 'Password must be 3-8 characters long and contain only letters and numbers');
    else if (passwordval.length<8) {
        setError(password, 'Password must be atleast 8 character');
    else{
        setSuccess(password)
    }
}
function setError(element,message){
    const inputGroup=element.parentElement;
    const errorElement=inputGroup.querySelector('.error')
    errorElement.innerText=message;
    inputGroup.classList.add('error')
    inputGroup.classList.remove('success')
}
function setSuccess(element,message){
    const inputGroup=element.parentElement;
    const errorElement=inputGroup.querySelector('.error')
    errorElement.innerText=message;
    inputGroup.classList.add('success')
    inputGroup.classList.remove('error')
}
function validateUsername(username) {
    const pattern = /^[a-zA-Z][a-zA-Z0-9]{2,7}$/;
    return pattern.test(username);
}
function validateusernameval(usernameval) {
    if (username.length < 3) {
        return "Username is too short.";
    }
    if (username.length > 8) {
        return "Username is too long.";
    }
    if (username.length === 8) {
        return "Username is correct length.";
    }
    const pattern = /^[a-zA-Z0-9]+$/;
    if (!pattern.test(username)) {
        return "Username contains invalid characters. Only letters and numbers are allowed.";
    }
    if (username.endsWith('.') || username.endsWith('_')) {
        return "Username cannot end with a dot or underscore.";
    }

    return "Valid username.";
}


function validatepassword(passwordval) {
    if (username.length < 3) {
        return "Username is too short.";
    }
    if (username.length > 8) {
        return "Username is too long.";
    }
    if (username.length === 8) {
        return "Username is correct length.";
    }
    const pattern = /^[a-zA-Z0-9]+$/;
    if (!pattern.test(username)) {
        return "Username contains invalid characters. Only letters and numbers are allowed.";
    }  
    if (username.endsWith('.') || username.endsWith('_')) {
        return "Username cannot end with a dot or underscore.";
    }

    return "Valid username.";
}*/
const form = document.querySelector('#form');
const usernameInput = document.querySelector('#username');
const passwordInput = document.querySelector('#password');

form.addEventListener('submit', (e) => {
    e.preventDefault(); // Prevent form submission
    validateInputs(); // Validate inputs
});

function validateInputs() {
    const usernameVal = usernameInput.value.trim();
    const passwordVal = passwordInput.value.trim();
    let isValid = true;

    // Validate username
    if (usernameVal === '') {
        setError(usernameInput, 'Username is required');
        isValid = false;
    } else if (!validateUsername(usernameVal)) {
        setError(usernameInput, 'Username must be 3-8 characters long and contain only letters and numbers');
        isValid = false;
    } else {
        setSuccess(usernameInput, 'Username is valid');
    }

    // Validate password
    if (passwordVal === '') {
        setError(passwordInput, 'Password is required');
        isValid = false;
    } else if (!validatePassword(passwordVal)) {
        setError(passwordInput, 'Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character');
        isValid = false;
    } else {
        setSuccess(passwordInput, 'Password is valid');
    }

    return isValid;
}

function setError(element, message) {
    const inputGroup = element.parentElement;
    const errorElement = inputGroup.querySelector('.error');
    errorElement.innerText = message;
    inputGroup.classList.add('error');
    inputGroup.classList.remove('success');
}

function setSuccess(element, message) {
    const inputGroup = element.parentElement;
    const errorElement = inputGroup.querySelector('.error');
    errorElement.innerText = message;
    inputGroup.classList.add('success');
    inputGroup.classList.remove('error');
}

function validateUsername(username) {
    const pattern = /^[a-zA-Z][a-zA-Z0-9]{2,7}$/; // Username must be 3-8 characters long
    return pattern.test(username);
}

function validatePassword(password) {
    const pattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;
    return pattern.test(password);
}