<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Information</title>
    <style>
        form {
            margin-top: 5%;
        }
        .totaldiv {
            display: flex;
            border-style: solid;
            border-radius: 10px;
            width: 700px;
            padding: 50PX;
            height: 200px;
            column-gap: 50px;
            row-gap: 100px;
            justify-content: space-around;
            padding: 100px;
            position: relative;
            margin-left: 300px;
        }
        .inner1 {
            display: grid;
            width: 400px;
            column-gap: 50px;
            row-gap: 30px;
        }
        .inner2 {
            display: grid;
            width: 400px;
            column-gap: 50px;
            row-gap: 30px;
        }
        .submit:hover {
            transform: scale(1.2,1.2);
            transition: all .8s;
            background-color: navajowhite;
        }
        .back:hover {
            transition: all .8s;
            color: rgb(11, 11, 11);
        }
        .error {
            color: red;
            font-size: 10px;
            height: 10px;
            margin-top: -30px;
        }
        .download-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        .download-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <center>
        <h1 style="background-color: blanchedalmond; padding: 50px;">STUDENT ACADEMIC INFO</h1>
    </center>
    
    <form action="acedamicphp.php" method="POST" id="form">
        <div class="totaldiv">
            <div class="inner1">
                <div>
                    <b style="font-size: 20px;" class="stu">Student Register Number</b>
                    <sup style="color:red;">*</sup>
                    <b style="font-size:20px">:</b>
                </div>
                <input style="border-radius: 10px;height: 25px;" 
                       type="number" 
                       name="studentregno" 
                       id="regno" 
                       placeholder="Enter your Register No" 
                       required>
                <div class="error" id="regnoError"></div>
                
                <div>
                    <b style="font-size: 20px;" class="roll">Roll No</b>
                    <sup style="color:red;">*</sup>
                    <b style="font-size:20px">:</b>
                </div>
                <input name="rollno" 
                       style="border-radius: 10px;height: 25px;appearance: none;" 
                       type="text" 
                       minlength="6" 
                       pattern="[1-9][1-9][a-zA-Z][a-zA-z][0-9][0-9]" 
                       title="Enter Rollno in valid form" 
                       placeholder="Enter your Roll No" 
                       required>
                
                <button name="submit" 
                        class="submit" 
                        style="background-color:burlywood;color:rgb(10, 0, 0);
                               border-radius: 10px ;height: 25px;width: 80PX;">
                    SUBMIT
                </button>
            </div>
            
            <div class="inner2">
                <div>
                    <b style="font-size: 20px;" class="year">Year of Studying</b>
                    <sup style="color:red;">*</sup>
                    <b style="font-size:20px">:</b>
                </div>
                <select name="year" style="border-radius: 10px;height: 25px;" required>
                    <option value="">--select--</option>
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                </select>
                
                <div>
                    <b style="font-size: 20px;" class="clg">College Name</b>
                    <sup style="color:red;">*</sup>
                    <b style="font-size:20px">:</b>
                </div>
                <select name="clgname" required style="border-radius: 10px;height: 25px;">
                    <option value="">--select--</option>
                    <option value="Government College of Engineering, Thanjavur">
                        Government College of Engineering, Thanjavur
                    </option>
                </select>
                
                <button onclick="window.location.href='fam.php'" 
                        style="font-size: 20px; text-decoration: none; cursor: pointer;
                               background-color:burlywood;color:rgb(10, 0, 0);
                               border-radius: 10px ;height: 25px;width:70px">
                    Back
                </button>
            </div>
        </div>
    </form>


    <script>
        const form = document.getElementById('form');
        const regnoInput = document.getElementById('regno');
        const regnoError = document.getElementById('regnoError');
        
        form.addEventListener('submit', (e) => {
            if(!validateInputs()) {
                e.preventDefault();
            }
        });
        
        function validateInputs() {
            const regnoVal = regnoInput.value.trim();
            let isValid = true;
            
            if(regnoVal === ''){
                setError(regnoInput, regnoError, '*Register number is required');
                isValid = false;
            }
            else if(!validateRegister(regnoVal)){
                setError(regnoInput, regnoError, '*Register number must be 12 digits');
                isValid = false;
            }
            else {
                setSuccess(regnoInput, regnoError);
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
        
        function validateRegister(regnoVal) {
            const pattern = /^\d{12}$/;
            return pattern.test(regnoVal);
        }
    </script>
</body>
</html>