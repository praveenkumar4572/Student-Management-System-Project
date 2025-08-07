<!DOCTYPE html>
<html>
<head>
    <title>Student Information System</title>
    
   <style>
.image-upload {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;
}
.image-preview {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #ccc;
    margin-bottom: 10px;
}
.image-upload label {
    cursor: pointer;
    background-color: #4CAF50;
    color: white;
    padding: 8px 15px;
    border-radius: 5px;
    margin-top: 10px;
}
.image-upload label:hover {
    background-color: #45a049;
}
#image {
    display: none;
}
    .totaldiv{
        display: flex;
        justify-content: space-around;
        display:flex;
        column-gap: 50px;
        row-gap: 80px;
        border-style:solid;
        border-radius: 10px;
        box-shadow: 0px 0px 5px 10px rgb(143, 142, 142);
        width: 1000px;
        padding: 50px;
        position: relative;
        margin-left:200px;
    }
    .innerdiv1{
        display: grid;
        width: 400px;
        column-gap: 50px;
        row-gap: 20px;
        
    } 
    .name{
        border-radius: 10px;
        height: 30px;
    }
    .name::after{
        content:'*';
        color:red;
        font-size:20px;
    }
    b.name{
        font-size: 30px;
    }
    .gender{
        border-radius: 10px;
        height: 30px;
        font-size: 30px;
    }
   
    .gender:focus{
        border-radius: 10px;
        height: 30px;
        font-size: 30px;
        box-shadow: 0px 0px 5px 4px rgb(4, 245, 32);
    }
    table.gende{
        font-size: 30px;
    }
    .salutation{
        font-size: 30px;
        border-radius: 10px;
        height: 30px;
    }
    .username{
        font-size: 30px;
        
    }
   
    .user{
        border-radius: 10px;
        height: 30px;
    }
    .user:focus{
        border-radius: 10px;
        height: 30px;
        box-shadow: 0px 0px 5px 4px rgb(4, 245, 8);
    }
    .password{
        font-size: 30px;
    }
   
    .pass{
        border-radius: 10px;
        height: 30px;
    }
    .pass:focus{
        border-radius: 10px;
        height: 30px;
        box-shadow: 0px 0px 5px 4px rgb(4, 245, 8);
    }
    .salutation:focus{
        
        border-radius: 10px;
        height: 30px;
        box-shadow: 0px 0px 5px 4px rgb(4, 245, 80);
    }
    
    select.salutation{
        font-size: 13px;
        border-radius: 10px;
        height: 30px;
        
    }
    .dob{
        border-radius: 10px;
        height: 30px;
        font-size: 20px;
    }
    
        
    
    .dob:focus{
        border-radius: 10px;
        height: 30px;
        font-size: 20px;
        box-shadow: 0px 0px 5px 4px rgb(4, 245, 104);
    }
    b.dob{
        font-size: 30px;
    }
    
    .name:focus{
        border-radius: 10px;
        border-width: 2px;
        border-color: blue;
        box-shadow: 0px 0px 5px 4px rgb(4, 245, 36);
        height: 30px;
    }
    .community{
        font-size: 30px;
        border-radius: 10px;
        height: 30px;
    }
    
    select.community{
        font-size: 13px;
        border-radius: 10px;
        height: 30px;
    }
    .community:focus{
        font-size: 13px;
        border-radius: 10px;
        height: 30px;
        box-shadow: 0px 0px 5px 4px rgb(4, 245, 52);
    }
    .subdiv{
        display: grid;
        width: 400px;
        column-gap: 50px;
        row-gap: 20px;
        
    }
    .nationality{
        font-size: 30px;
        border-radius: 10px;
        height: 30px;
    }
    
    select.nationality{
        font-size: 13px;
        border-radius: 10px;
        height: 30px;
    }

    .nationality:focus{
        font-size: 13px;
        border-radius: 10px;
        height: 30px;
        box-shadow: 0px 0px 5px 4px rgb(4, 245, 84);
    }
    .bloodgroup{
        font-size: 30px;
        border-radius: 10px;
        height: 30px;
    }
   
    select.bloodgroup{
        font-size: 13px;
        border-radius: 10px;
        height: 30px;
    }
    .bloodgroup:focus{
        font-size: 13px;
        border-radius: 10px;
        height: 30px;
        box-shadow: 0px 0px 5px 4px rgb(4, 245, 8);
    }
    .religion{
        font-size: 30px;
        border-radius: 10px;
        height: 30px;
    }
    
    select.religion{
        font-size: 13px;
        border-radius: 10px;
        height: 30px;
    }
    .religion:focus{
        font-size: 13px;
        border-radius: 10px;
        height: 30px;
        box-shadow: 0px 0px 5px 4px rgb(4, 245, 8);
    }
    .caste{
        border-radius: 10px;
        height: 30px;
    }
    b.caste{
        font-size: 30px;
    }
    .caste:focus{
        border-radius: 10px;
        height: 30px;
        box-shadow: 0px 0px 5px 4px rgb(4, 245, 8);
    }
    
    .img{
        border-radius: 10px;
        height: 30px;
    }
    
    b.img{
        font-size: 30px;
    }
    .imgg{
    font-style: italic;
    font-size: 15px;
    }
    .imgg:focus{
        border-radius: 10px;
        height: 30px;
        box-shadow: 0px 0px 5px 4px rgb(4, 245, 8);

    }

    .submit{
        border-radius: 10px;
        width: 100px;
        height: 30px;
    }
    .reset{
        border-radius: 10px;
        width: 100px;
        height: 30px;
    }
    .error {
        color: red;
        font-size: 12px;
        margin-top: -20px;
        height: 16px;
        
    }
    .dobError {
        color: red;
        font-size: 12px;
        margin-top: -20px;
        height: 16px;
        
    }

    .imageerror{
        color:red;
        font-size:12px;
        margin-top: -10px;
        
        height: 16px;
        
    }
    .imagesuccess{
        color:green;
        font-size:12px;
        margin-top: -40px;
        height: 16px;
        
    }
</style>
</head>

<body>
    <center>
        <h1 style=" background-color: blanchedalmond; padding: 50px;">STUDENT INFO</h1>
    </center>
    <form action="std_reg.php" method="POST" enctype="multipart/form-data" id="form">
    <div class="totaldiv">
        
        <div class="innerdiv1">
            <div><b class="username">Username<sup style="color:red;">*</sup></b><b style="font-size:30px">:</b></div>
            <input name="username" class="user" id="user" type="text" placeholder="Generate username">
            <div class="error" id="userError"></div>
            <div><b class="salutation">Salutation</b><sup style="color:red;">*</sup><b style="font-size:30px">:</b></div>
            <select class="salutation" name="salutation" required>
                <option value="">--Select--</option>
                <option value="Mr">Mr</option>
                <option value="Ms">Ms</option>
                <option value="Mrs">Mrs</option>
            </select>
            <div><b class="name">Name</b><b style="font-size:30px">:</b></div><input class="name" type="text" id="name" name="name" placeholder="Enter your Name" >
            <div class="error" id="nameError"></div>
            <div><b class="gender">Gender</b><sup style="color:red;">*</sup><b style="font-size:30px">:</b></div>
            <table class="gende" name="gender">
                <tr>
                    <td>
                        <input type="radio" name="gender" value="Male" required>Male
                        <input type="radio" name="gender" value="Female" required>Female
                        <input type="radio" name="gender" value="Others" required>Others
                    </td>
                </tr>
            </table>
            <div><b class="dob"  >DOB</b><sup style="color:red;">*</sup><b style="font-size:30px">:</b></div><input class="dob" name="dob" type="date" id="dob" required>
            <div class="dobError" id="dobError"></div>
            <div><b class="community">Community</b><sup style="color:red;">*</sup><b style="font-size:30px">:</b></div>
            <select class="community" name="community" required>
                <option value="">--Select--</option>
                <option value="SC" >SC</option>
                <option value="ST">ST</option>
                <option value="BC">BC</option>
                <option value="MBC">MBC</option>
                <option value="OC">OC</option>
                <option value="BCM">BCM</option>
            </select>
            <button type="submit" class="submit" id="submit" name="submit"  style="background-color:burlywood;color:rgb(10, 0, 0);border-radius: 10px ;height: 25px;">Submit</button>
        </div>
        <div class=" subdiv">
            <div><b class="password">Password</b><sup style="color:red;">*</sup><b style="font-size:30px">:</b></div>
            <input name="password" class="pass" id="pass" type="text"  placeholder="Generate Password">
            <div class="error" id="passwordError"></div>
                    <div><b class="nationality">Nationality</b><sup style="color:red;">*</sup><b style="font-size:30px">:</b></div>
                    <select class="nationality" name="nationality" required>
                        <option value="">--select--</option>
                        <option value="INDIAN">INDIAN</option>
                        <option value="NRI">NRI</option>
                        <option value="OTHERS">OTHERS</option>
                    </select>
                    <b class="bloodgroup">Blood Group <sup style="color:red;">*</sup>:</b>
                    <select class="bloodgroup" name="bgg" required>
                        <option value="">--Select--</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="A1+">A1+</option>
                        <option value="A1-">A1-</option>
                        <option value="A1B+">A1B+</option>
                        <option value="A1B-">A1B-</option>
                        <option value="A2+">A2+</option>
                        <option value="A2-">A2-</option>
                        <option value="A2B+">A2B+</option>
                        <option value="A2B-">A2B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="B1+">B1+</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                    <div><b class="religion">Religion</b><sup style="color:red;">*</sup><b style="font-size:30px">:</b></div>
                    <select class="religion" name="religion" required>
                        <option value="">--Select--</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Christian">Christian</option>
                        <option value="Muslim">Muslim</option>
                        <option value="Others">Others</option>
                    </select>
                    <div><b class="caste">Caste</b><sup style="color:red;">*</sup><b style="font-size:30px">:</b></div><input class="caste" id="caste" type="text" name="cast" placeholder="Enter your Caste">
                    <div class="error" id="casteError"></div>
                    <div><b class="img">Enter your img</b><sup style="color:red;">*</sup><b style="font-size:30px">:</b></div>
<div class="image-upload">
    <img id="imagePreview" class="image-preview" src="" >
    <label for="image">Choose Student Image</label>
    <input id="image" class="imgg" type="file" accept="image/*" name="img">
    <div class="imageerror" id="imageError"></div>
    <div class="imagesuccess" id="imagesuccess"></div>
</div>
                    <button type="reset" class="reset" style="background-color:burlywood;color:rgb(10, 0, 0);border-radius: 10px ;height: 25px;">Reset</button>
                    
                      </div>
                      
    </div>
</form><script>
const form = document.getElementById('form');
const nameInput = document.getElementById('name');
const nameError = document.getElementById('nameError');
const casteInput = document.getElementById('caste');
const casteError = document.getElementById('casteError');
const imageInput = document.getElementById('image');
const imageError = document.getElementById('imageError');
const imageSuccess = document.getElementById('imagesuccess');
const userInput = document.getElementById('user');
const userError = document.getElementById('userError');
const passwordInput = document.getElementById('pass');
const passwordError = document.getElementById('passwordError');
const imagePreview = document.getElementById('imagePreview');
const dobInput = document.getElementById('dob');
const dobError = document.getElementById('dobError');
imageInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            imagePreview.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});

form.addEventListener('submit', (e) => {
    if (!validateInputs()) {
        e.preventDefault(); 
    }
});
function validateInputs() {
    const nameVal = nameInput.value.trim();
    const casteVal = casteInput.value.trim();
    const userval = userInput.value.trim();
    const passval = passwordInput.value.trim();
    const dobVal = dobInput.value;
    let isValid = true;
    nameError.textContent = '';
    casteError.textContent = '';
    imageError.textContent = '';
    imageSuccess.textContent = '';
    userError.textContent = '';
    passwordError.textContent = '';
    dobError.textContent = '';
    if(userval === ''){
        setError(userInput, userError, '*username is required');
        isValid = false;
    }
    else if(!validateUser(userval)){
        setError(userInput, userError, '*Username format: First 3 letter of Name,start with upper,and atleast one lowercase, 1 special character,Last 4 numbers of Register');
        isValid = false;
    }
    else{
        setSuccess(userInput, userError);
    }
    if(passval === ''){
        setError(passwordInput, passwordError, '*Password is required');
        isValid = false;
    }
    else if(!validatePassword(passval)){
        setError(passwordInput, passwordError, '*Password length should be 8,first 3 letter is your name,one special character,last 4 is your birth year');
        isValid = false;
    }
    else{
        setSuccess(passwordInput, passwordError);
    }
    if (nameVal === '') {
        setError(nameInput, nameError, '*Name is required');
        isValid = false;
    } else if (!validateName(nameVal)) {
        setError(nameInput, nameError, '*Name must start with uppercase and be 3-30 letters');
        isValid = false;
    } else {
        setSuccess(nameInput, nameError);
    }
    if (casteVal === '') {
        setError(casteInput, casteError, '*Caste is required');
        isValid = false;
    } else if (!validateCaste(casteVal)) {
        setError(casteInput, casteError, '*Caste must be 3-30 letters');
        isValid = false;
    } else {
        setSuccess(casteInput, casteError);
    }
    if (dobVal === '') {
        setError(dobInput, dobError, '*Date of Birth is required');
        isValid = false;
    } else {
        const dob = new Date(dobVal);
        const today = new Date();
        let age = today.getFullYear() - dob.getFullYear();
        const monthDiff = today.getMonth() - dob.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }
        
        if (age < 17) {
            setError(dobInput, dobError, '*Student must be at least 17 years old');
            isValid = false;
        } else {
            dobError.textContent = '';
            dobInput.style.borderColor = '';
        }
    }
    if (imageInput.files.length === 0) {
        imageError.textContent = 'Please select an image';
        isValid = false;
    } else {
        const file = imageInput.files[0];
        if (!file.type.match('image.*')) {
            imageError.textContent = 'Please select a valid image file (JPEG, PNG, JPG)';
            isValid = false;
        } else {
            const minSize = 0 * 1024; 
            const maxSize = 800 * 1024; 
            const fileSize = file.size;
            
            if (fileSize < minSize) {
                imageError.textContent = '*Image is too small. Minimum size is 200KB.';
                isValid = false;
            } else if (fileSize > maxSize) {
                imageError.textContent = '*Image is too large. Maximum size is 800KB.';
                isValid = false;
            } else {
                imageSuccess.textContent = 'Image is valid';
            }
        }
    }
    
    return isValid;
}

function setError(input, errorElement, message) {
    if (errorElement) {
        errorElement.textContent = message;
        errorElement.style.color = 'red';
    }
    input.style.borderColor = 'red';
}

function setSuccess(input, errorElement) {
    if (errorElement) {
        errorElement.textContent = '';
    }
    input.style.borderColor = '';
}

function validatePassword(passval) {
    const pattern = /^[A-Z][a-zA-Z][a-zA-Z][!@#$%^&*(),.?":{}|<>][0-9][0-9][0-9][0-9]/;
    return pattern.test(passval);
}

function validateUser(userval) {
    const pattern = /^[A-Z][a-zA-Z]{2}[!@#$%^&*(),.?":{}|<>]\d{4}$/;
    return pattern.test(userval);
}

function validateName(nameVal) {
    const pattern = /^[A-Z][a-zA-Z '-]{1,29}$/;
    return pattern.test(nameVal);
}

function validateCaste(casteVal) {
    const pattern = /^[a-zA-Z][a-zA-Z -]{1,29}$/;
    return pattern.test(casteVal);
}
</script>
</body>

</html>