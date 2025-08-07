<!DOCTYPE html>
<html>
<head>
    <title>Family Information</title>
    <style>
        .tot {
            border: 2px solid black;
            border-radius: 10px;
            box-shadow: 0px 0px 5px 10px rgb(143, 142, 142);
            display: flex;
            justify-content: space-around; 
            width: 700px;
            height: 300px;
            margin: 0 auto;
        }
        form {
            margin-top: 5%;
        }
        .fathername, .mothername, .familyinc, .parentnumber {
            border-radius: 10px;
            height: 25px;
        }
        .fathername:focus, .mothername:focus, .familyinc:focus, .parentnumber:focus,
        #fatherocc:focus, #motherocc:focus {
            border-radius: 10px;
            box-shadow: 0px 0px 5px 4px rgb(4, 245, 8);
        }
        #fatherocc, #motherocc {
            border-radius: 10px;
            width: 150px;
            height: 30px;
        }
        .error {
            color: red;
            font-size: 12px;
            width: 100px;
            height: 20px;
        }
        
    </style>
</head>
<body>
    <center>
        <h1 style="background-color: blanchedalmond; padding: 50px;">FAMILY INFORMATION</h1>
    </center>
    
    <form action="family.php" method="POST" id="form">
        <center>
            <div class="tot">
                <table>
                    <tr>
                        <td>
                            <p style="color:black;font-size: 20px;"><b class="fat">Father Name</b><sup style="color:red;">*</sup><b style="font-size:20px">:</b></p>
                        </td>
                        <td>
                            <input name="fathername" class="fathername" type="text" 
                                   placeholder="Enter Father Name" 
                                   
                                   minlength="3" maxlength="30">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="color:black;font-size: 20px;"><b class="mom">Mother Name</b><sup style="color:red;">*</sup><b style="font-size:20px">:</b></p>
                        </td>
                        <td>
                            <input name="mothername" class="mothername" type="text" 
                                   placeholder="Enter Mother Name" 
                                    minlength="3" maxlength="30">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="color:black;font-size: 20px;"><b class="fam">Family Income</b><sup style="color:red;">*</sup><b style="font-size:20px">:</b></p>
                        </td>
                        <td>
                            <input name="familyincome" type="text" class="familyinc" 
                                   placeholder="Enter Family Income" 
                                   pattern="[1-9][0-9]{3,7}"
                                   title="Please enter valid income (4-8 digits, no leading zeros)" 
                                   required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="submit" 
                                    style="background-color:burlywood;color:rgb(10, 0, 0);
                                           border-radius: 10px;height: 25px;">
                                Submit
                            </button>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <p style="color:black;font-size: 20px;"><b class="faocc">Father Occupation</b><sup style="color:red;">*</sup><b style="font-size:20px">:</b></p>
                        </td>
                        <td>
                            <select name="fatheroccupation" id="fatherocc" required>
                                <option value="">--select--</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Engineer">Engineer</option>
                                <option value="Private">Private</option>
                                <option value="Business">Business</option>
                                <option value="Government">Government</option>
                                <option value="Farmer">Farmer</option>
                                <option value="Unemployment">Unemployment</option>
                                
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="color:black;font-size: 20px;"><b class="maocc">Mother Occupation</b><sup style="color:red;">*</sup><b style="font-size:20px">:</b></p>
                        </td>
                        <td>
                            <select name="motheroccupation" id="motherocc" required>
                                <option value="">--select--</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Engineer">Engineer</option>
                                <option value="Private">Private</option>
                                <option value="Business">Business</option>
                                <option value="Government">Government</option>
                                <option value="House wife">House wife</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="color:black;font-size: 20px;"><b class="par">Parent No</b><sup style="color:red;">*</sup><b style="font-size:20px">:</b></p>
                        </td>
                        <td>
                            <input name="parentno" id="mobileno" type="text" 
                                   class="parentnumber" 
                                   placeholder="Enter your Parent Number"
                                   pattern="[6-9][0-9]{9}"
                                   title="Please enter a valid 10-digit Indian mobile number"
                                   required>
                            <div class="error" id="mobileError"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <button onclick="window.location.href='cont.php'" 
                                        style="font-size: 20px; text-decoration: none; cursor: pointer;background-color:burlywood;color:rgb(10, 0, 0);border-radius: 10px ;height: 25px;">
                            Back
                        </button>
                        </td>
                    </tr>
                </table>
            </div>
        </center>
    </form>

    <script>
    const form = document.getElementById('form');
    const mobileInput = document.getElementById('mobileno');
    const mobileError = document.getElementById('mobileError');
    const fatherNameInput = document.querySelector('input[name="fathername"]');
    const motherNameInput = document.querySelector('input[name="mothername"]');
    const fatherNameError = document.createElement('div');
    const motherNameError = document.createElement('div');
    
    // Add error elements after the name inputs
    fatherNameInput.insertAdjacentElement('afterend', fatherNameError);
    motherNameInput.insertAdjacentElement('afterend', motherNameError);
    fatherNameError.className = 'error';
    motherNameError.className = 'error';

    form.addEventListener('submit', (e) => {
        if(!validateInputs()) {
            e.preventDefault();
        }
    });

    function validateInputs() {
        let isValid = true;
        const mobilenoVal = mobileInput.value.trim();
        const fatherNameVal = fatherNameInput.value.trim();
        const motherNameVal = motherNameInput.value.trim();
        
        // Mobile number validation
        if(mobilenoVal === ''){
            setError(mobileInput, mobileError, '*Mobile number is required');
            isValid = false;
        }
        else if(!validateMobile(mobilenoVal)){
            setError(mobileInput, mobileError, '*Mobile number must be 10 digits starting with 6-9');
            isValid = false;
        }
        else {
            setSuccess(mobileInput, mobileError);
        }
        
        // Father name validation
        if(fatherNameVal === ''){
            setError(fatherNameInput, fatherNameError, '*Father name is required');
            isValid = false;
        }
        else if(!validateName(fatherNameVal)){
            setError(fatherNameInput, fatherNameError, '*Name must start with uppercase and be 3-30 letters');
            isValid = false;
        }
        else {
            setSuccess(fatherNameInput, fatherNameError);
        }
        
        // Mother name validation
        if(motherNameVal === ''){
            setError(motherNameInput, motherNameError, '*Mother name is required');
            isValid = false;
        }
        else if(!validateName(motherNameVal)){
            setError(motherNameInput, motherNameError, '*Name must start with uppercase and be 3-30 letters');
            isValid = false;
        }
        else {
            setSuccess(motherNameInput, motherNameError);
        }
        
        return isValid;
    }

    function setError(input, errorElement, message) {
        errorElement.innerText = message;
        input.style.borderColor = 'red';
    }

    function setSuccess(input, errorElement) {
        errorElement.innerText = '';
        input.style.borderColor = '';
    }

    function validateMobile(mobilenoVal) {
        const pattern = /^[6-9]\d{9}$/; 
        return pattern.test(mobilenoVal);
    }
    
    function validateName(nameVal) {
        const pattern = /^[A-Z][a-zA-Z '-]{1,29}$/;
        return pattern.test(nameVal);
    }
</script>
</body>
</html>