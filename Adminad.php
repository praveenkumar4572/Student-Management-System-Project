<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Add Faculty</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .admin {
            color: #333;
            margin-top: 20px;
        }
        .totaldiv {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
        }
        .form-row {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
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
        #facimg {
            display: none;
        }
        .form-buttons {
            display: flex;
            gap: 10px;
        }
        .back-btn {
            background-color: #f44336;
        }
        .back-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
   <center><h1 class="admin">Admin Page</h1></center>
    <form action="adminadd.php" id="form" name="submit" method="POST" enctype="multipart/form-data">
    <div class="totaldiv">
        
        <div class="image-upload">
            <img id="imagePreview" class="image-preview">
            <label for="facimg">Choose Faculty Image</label>
            <input type="file" id="facimg" name="facimg" accept="image/*">
            <div class="error" id="imageError"></div>
        </div>
        
     
        <div class="form-row">
            <label for="user">Username</label>
            <input type="text" id="user" name="user" placeholder="Enter Username" maxlength="8">
            <div class="error" id="userError"></div>
        </div>
        
        <div class="form-row">
            <label for="pass">Password</label>
            <input type="password" id="pass" name="pass" placeholder="Enter Password" maxlength="8">
            <div class="error" id="passwordError"></div>
        </div>
        
        <div class="form-row">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter Name" maxlength="30">
            <div class="error" id="nameError"></div>
        </div>
        
        <div class="form-row">
            <label for="salutation">Salutation</label>
            <select id="salutation" name="salutation" required>
            <option value="">--select--</option>
                <option value="Mr">Mr</option>
                <option value="Mrs">Mrs</option>
                <option value="Ms">Ms</option>
                <option value="Dr">Dr</option>
            </select>
            <div class="error" id="salutationError"></div>
        </div>
        <div class="form-row">
            <label for="Dept">Department</label>
            <select id="Dept" name="Dept" required>
            <option value="">--select--</option>
                <option value="CSE">CSE</option>
                <option value="EEE">EEE</option>
                <option value="ECE">ECE</option>
                <option value="MECH">MECH</option>
                <option value="CIVIL">CIVIL</option>
            </select>
            <div class="error" id="deptError"></div>
        </div>
        <div class="form-row">
            <label for="profession">Profession</label>
            <select name="profession" id="profession" required>
                <option value="">--select--</option>
                <option value="Assistant Professor">Assistant Professor</option>
                <option value="Associate professor">Associate professor</option>
            </select>
            <div class="error" id="professionError"></div>
        </div>
        
        <div class="form-row">
            <label for="mobile">Mobile Number</label>
            <input type="number" id="mobile" name="mobile" placeholder="Enter Mobile Number">
            <div class="error" id="mobileError"></div>
        </div>
        
        <div class="form-row form-buttons">
            <button type="submit" name="submit">Submit</button>
            <button type="button" class="back-btn" onclick="window.history.back()">Back</button>
        </div>
    </div>
</form>

<script>
    
    const imageInput = document.getElementById('facimg');
    const imagePreview = document.getElementById('imagePreview');
    const imageError = document.getElementById('imageError');
    
    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
            validateImage(file);
        }
    });
    
 
    document.getElementById('form').addEventListener('submit', function(e) {
        if (!validateInputs()) {
            e.preventDefault();
        }
        
    });
    
    function validateName(nameVal) {
        const pattern = /^[A-Z][a-zA-Z '-]{1,29}$/;
        return pattern.test(nameVal);
    }
    
    function validateMobile(mobilenoVal) {
        const pattern = /^[6-9]\d{9}$/; 
        return pattern.test(mobilenoVal);
    }
    
    function validateInputs() {
        let isValid = true;
        
       
        const user = document.getElementById('user');
        const userError = document.getElementById('userError');
        if (user.value.trim() === '') {
            setError(user, userError, 'Username is required');
            isValid = false;
        } else if (user.value.length > 8) {
            setError(user, userError, 'Username must be 8 characters');
            isValid = false;
        } else {
            setSuccess(user, userError);
        }
        
       
        const password = document.getElementById('pass');
        const passwordError = document.getElementById('passwordError');
        if (password.value.trim() === '') {
            setError(password, passwordError, 'Password is required');
            isValid = false;
        } else if (password.value.length > 8) {
            setError(password, passwordError, 'Password must be 8 characters');
            isValid = false;
        } else {
            setSuccess(password, passwordError);
        }
        
       
        const name = document.getElementById('name');
        const nameError = document.getElementById('nameError');
        if (name.value.trim() === '') {
            setError(name, nameError, 'Name is required');
            isValid = false;
        } else if (name.value.length > 30) {
            setError(name, nameError, 'Name must be 30 characters or less');
            isValid = false;
        } else if (!validateName(name.value)) {
            setError(name, nameError, 'Name must start with uppercase and contain only letters');
            isValid = false;
        } else {
            setSuccess(name, nameError);
        }
        
       
        const profession = document.getElementById('profession');
        const professionError = document.getElementById('professionError');
        if (profession.value.trim() === '') {
            setError(profession, professionError, 'Profession is required');
            isValid = false;
        } else {
            setSuccess(profession, professionError);
        }
        
     
        const mobile = document.getElementById('mobile');
        const mobileError = document.getElementById('mobileError');
        if (mobile.value.trim() === '') {
            setError(mobile, mobileError, 'Mobile number is required');
            isValid = false;
        } else if (!validateMobile(mobile.value)) {
            setError(mobile, mobileError, 'Please enter a valid 10-digit mobile number starting with 6-9');
            isValid = false;
        } else {
            setSuccess(mobile, mobileError);
        }
        
       
        if(imageInput.files.length === 0) {
            setError(imageInput, imageError, 'Please select a faculty image');
            isValid = false;
        } else {
            const file = imageInput.files[0];
            if (!validateImage(file)) {
                isValid = false;
            }
        }
        
        return isValid;
    }
    
    function validateImage(file) {
        if (!file.type.match('image.*')) {
            setError(imageInput, imageError, 'Please select a valid image file');
            return false;
        } else if (file.size > 800 * 1024) { 
            setError(imageInput, imageError, 'Image size should be less than 800KB');
            return false;
        } else {
            setSuccess(imageInput, imageError);
            return true;
        }
    }
    
    function setError(input, errorElement, message) {
        errorElement.innerText = message;
        input.style.borderColor = 'red';
    }
    
    function setSuccess(input, errorElement) {
        errorElement.innerText = '';
        input.style.borderColor = '#ddd';
    }
</script>
</body>
</html>