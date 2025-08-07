<head>
    <title>
        Contact Information
    </title>
</head>
<CENTER><h1 <h1 style=" background-color: blanchedalmond; padding: 50px;">CONTACT INFORMATION</h1></CENTER>
<style>
 body{background-image:url("naruto-and-hinata-cwos9t4ubb01ae6s.jpg");
    background-repeat:no-repeat;
    background-attachment: fixed;
    background-size:100%100%;
    background-position:center;}
    .tot {
        border: 2px solid black;
        border-radius: 10px;
        box-shadow: 0px 0px 5px 10px rgb(143, 142, 142);
        margin-top: 70px;
        margin-bottom: 7px;
        display:flex;
        /* flex-direction: column; */
        justify-content:space-around; 
        /* align-items: center;  */
        width: 600px;
        height: 300px;
    }
    .number{
        border-radius: 10px;
        height: 25px;
    }
    .number:focus{
    border-radius: 10px;
    height: 25px;
    box-shadow: 0px 0px 5px 4px rgb(4, 245, 8);
}
    .email{
        border-radius: 10px;
        height: 25px;
    }
    .email:focus{
        border-radius: 10px;
    height: 25px;
    box-shadow: 0px 0px 5px 4px rgb(4, 245, 8);
    }
    .pincode{
        border-radius: 10px;
        height: 25px;
    }
    .pincode:focus{
        border-radius: 10px;
    height: 25px;
    box-shadow: 0px 0px 5px 4px rgb(4, 245, 8);
    }
    .address{
        border-radius: 10px;
        height: 25px;
    }
    .address:focus{
        border-radius: 10px;
    height: 25px;
    box-shadow: 0px 0px 5px 4px rgb(4, 245, 8);
    }
    form {
        margin-top: 5%;
    }
    .error {
    color: red;
    font-size: 12px;
    width:100px;
    height:20px;
    
}
</style>
<body>
    <center>
    <form action="contact.php" method="POST" id="form">
    <?php 
        // Error display section - keep this at the top of your form
        if (isset($_SESSION['error'])) {
            echo '<div style="color: red; background: #ffeeee; padding: 10px; margin-bottom: 20px; border-radius: 5px;">'
                .$_SESSION['error'].
                '</div>';
            unset($_SESSION['error']); // Clear the error after displaying
        }
        ?>
        <div class="tot">
            <table>
                <tr>
                    <td>
                       <label> <p style="color:black; font-size: 20px;"><B class="mobi">Mobile-no</B><sup style="color:red;">*</sup><b style="font-size:20px">:</b></p>
                    </td>
                    <td>
                        <input class="number" type="number" name="mobileno" id="mobileno" placeholder="Enter your Mobile-No"  >
                        <div class="error" id="mobilenoError"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                       <label> <p style="color:black; font-size: 20px;"> <B class="mail">E-mail</B><sup style="color:red;">*</sup><b style="font-size:20px">:</b></p></label>
                    </td>
                    <td>
                        <input class="email" type="email" name="email" id="email" placeholder="Enter your E-mail address" >
                        <div class="error" id="emailError"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button href="fam.php" style="background-color:burlywood;color:rgb(10, 0, 0);border-radius: 10px ;height: 25px;" type="Login" name="submit">Submit</button>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>
                        <label><p style="color:black;font-size: 20px;"><B class="pin">Pincode:</B><sup style="color:red;">*</sup><b style="font-size:20px">:</b></p></label>
                    </td>
                    <td>
                        <input class="pincode" type="number" id="pincode" name="pincode" placeholder="Enter the pincode" >
                        <div class="error" id="pincodeError"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><p style="color:black;font-size: 20px;"><B class="add">Address</B><sup style="color:red;">*</sup><b style="font-size:20px">:</b></p></label>
                    </td>
                    <td>
                        <input class="address" type="text" id="address" name="address" placeholder="Enter the address" >
                        <div class="error" id="addressError"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                    <button onclick="window.location.href='Registation_form.php'" 
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
        const mobileError = document.getElementById('mobilenoError');
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('emailError');
        const pincodeInput = document.getElementById('pincode');
        const pincodeError = document.getElementById('pincodeError');
        const addressInput = document.getElementById('address');
        const addressError = document.getElementById('addressError');
    
        form.addEventListener('submit', (e) => {
            if(!validateInputs()) {
                e.preventDefault();
            }
        });
    
        function validateInputs() {
            const mobilenoVal = mobileInput.value.trim();
            const emailVal = emailInput.value.trim();
            const pincodeVal = pincodeInput.value.trim();
            const addressVal = addressInput.value.trim();
            let isValid = true;
            if(mobilenoVal === ''){
                setError(mobileInput, mobileError, '*Mobile number is required');
                isValid = false;
            }
            else if(!validateMobile(mobilenoVal)){
                setError(mobileInput, mobileError, '*Mobile number must be 10 digits and should be a indian number');
                isValid = false;
            }
            else {
                setSuccess(mobileInput, mobileError);
            }
            if(emailVal === ''){
                setError(emailInput, emailError, '*Email is required');
                isValid = false;
            }
            else if(!validateEmail(emailVal)){
                setError(emailInput, emailError, '*Email should be in format like letter followed by number and @, and must end with .com');
                isValid = false;
            }
            else {
                setSuccess(emailInput, emailError);
            }
            if(pincodeVal === ''){
                setError(pincodeInput, pincodeError, '*Pincode is required');
                isValid = false;
            }
            else if(!validatePincode(pincodeVal)){
                setError(pincodeInput, pincodeError, '*Pincode number must be 6 digits and should be a indian pincode');
                isValid = false;
            }
            else {
                setSuccess(pincodeInput, pincodeError);
            }
            if(addressVal === ''){
                setError(addressInput, addressError, '*Address is required');
                isValid = false;
            }
            else if(!validateAddress(addressVal)){
                setError(addressInput, addressError, '*Address must be 50 character Length');
                isValid = false;
            }
            else {
                setSuccess(addressInput, addressError);
            }
    
            return isValid;
        }
    
        function setError(input, errorElement, message) {
            errorElement.innerText = message;
            input.style.borderColor = 'red';
        }
    
        function setSuccess(input, errorElement) {
            errorElement.innerText = '';
            input.style.borderColor = 'green';
        }
    
        function validateMobile(mobilenoVal) {
            const pattern = /^[6-9]\d{9}$/;
            return pattern.test(mobilenoVal);
        }
        function validatePincode(pincodeVal) {
            const pattern = /^[6]\d{5}$/; 
            return pattern.test(pincodeVal);
        }
        function validateEmail(emailVal) {
    const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.com$/; 
    return pattern.test(emailVal);
}
        function validateAddress(addressVal) {
            const pattern = /^.{1,50}$/;
            return pattern.test(addressVal);
        }
    </script>
</body>