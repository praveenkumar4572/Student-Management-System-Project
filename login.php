<!DOCTYPE html>
<html>
<head>
    <title>Login page</title>
    
    <style>
    form{
        display:flex;
        flex-direction:column;
        margin-bottom:15px;
    }
     .a{
    color:white;
    background-color:;
    margin: 20px;
    margin-left: 160px;
    margin-right: 100px;
    padding: 40px;
    align-items: center;
}

.one{
    border-style: solid;
    border-color: aliceblue;
    align-items: center;
    border-radius: 20px;
    margin: 50px;
    width:500px;
    height:350px;
    padding-top:5%;
    padding-bottom: 5px;
    box-shadow: 0px 0px 5px 10px  rgb(109, 98, 98);
}
.two{
    align:center;
}
div{
    align-items: center;
    margin-bottom: 30px;
}
.but{
    height: 50px;
    width: 100px;
    font-size: 25px;
    border-radius: 15px;
    cursor: pointer;
    transition: all .8s;
}
.but:focus{
    height: 50px;
    width: 100px;
    font-size: 25px;
    border-radius: 15px;
    box-shadow: 0px 0px 5px 4px rgb(73, 156, 244);
}
.reg{
    position: relative;
    margin-left:10px;
    font-size: 20px;
    color: antiquewhite;
    text-decoration: none;
}
.re{
    position: relative;
    left: 100px;
    font-size: 20px;
    color: antiquewhite;
    text-decoration: none;
}
.in1{
    
    margin-bottom:10px;
    position: relative;
    left: 10px;
    height: 25px;
    border-radius: 15px;
}
.in1:hover{
    position: relative;
    left: 10px;
    height: 25px;
    border-radius: 15px;
    box-shadow: 0px 0px 5px 4px rgb(4, 245, 8);
}
.in2{

    position: relative;
    left: 25px;
    height: 25px;
    border-radius: 15px;
    margin-bottom:10px;
}
.in2:hover{
    position: relative;
    left: 25px;
    height: 25px;
    border-radius: 30px;
    box-shadow: 0px 0px 5px 4px rgb(4, 245, 8);
}
body{
    background-image: url("3155555.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size:100% 100%;
  background-position:center;
  
}
.b{
    color: aliceblue;
}
b.b{
    color: aliceblue;
}
.but:hover{
    transform: scale(1.2,1.2);
    
    background-color: navajowhite;
}
.reg:hover{
    color: rgb(226, 211, 43);
    transition: ease-in .8s;
}
.re:hover{
    color: rgb(226, 211, 43);
    transition: ease-in .8s;
}
.b::after{
    content: '*';
    color: red;
}
.error{
  
    color:red;
    font-size: 14px;
    display:flex;
    width:300px;
    height:30px;
    flex-wrap:wrap;
    margin-top: 5px; 
}
.success{
    color:green;
    font-size: 14px;
    display:flex;
    width:300px;
    height:30px;
    flex-wrap:wrap;
    margin-top: 5px;
}
   </style>
</head>
<body>
    <center>
        <h1 class="a">STUDENT INFORMATION SYSTEM 🧑‍🎓</h1>
        <form class="one" action="login_check.php" method="POST" id="form" name="form">
            <table>
                <tr>
                    <td>
                        <div class="input-group">
                            <label for="username"><b class="b" style="font-size: 30px;">Username</b><b style="font-size: 30px;color: aliceblue;">:</b><input id="username" class="in1" name="username" type="text" placeholder="Enter your user name"></label>
                            <div class="error" id="username-error"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group">
                            <label><b class="b" style="font-size: 30px;">Password</b><b style="font-size: 30px;color: aliceblue;">:</b><input id="password" class="in2" name="password" type="password" placeholder="Enter your Password"></label>
                            <div class="error" id="password-error"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div align="center">
                            <button class="but" align="center" type="submit"  name="login">Login</button>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </center>
    <script>
        const form = document.getElementById('form');
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');
        const usernameError = document.getElementById('username-error');
        const passwordError = document.getElementById('password-error');

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            if(validateInputs()){
                form.submit();
            }
        });
5
        function validateInputs() {
            const usernameVal = usernameInput.value.trim();
            const passwordVal = passwordInput.value.trim();
            let isValid = true;
            if (usernameVal === '') {
                setError(usernameInput, usernameError, '*Username is required');
                alert('*username is required');
                isValid = false;
            } else if (!validateUsername(usernameVal)) {
                setError(usernameInput, usernameError, '*Username must be exactly 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number');
                isValid = false;
            } else {
                setSuccess(usernameInput, usernameError);
            }

            // Validate password
            if (passwordVal === '') {
                setError(passwordInput, passwordError, '*Password is required');
                alert('*Password is required');
                isValid = false;
            } else if (!validatePassword(passwordVal)) {
                setError(passwordInput, passwordError, '*Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character');
                isValid = false;
            } else {
                setSuccess(passwordInput, passwordError);
            }

            return isValid;
        }

        function setError(input, errorElement, message) {
            errorElement.innerText = message;
        }

        function setSuccess(input, errorElement,) {
            errorElement.innerText = '';        
        }

        function validateUsername(username) {
            const pattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8}$/; 
            return pattern.test(username);
        }
        function validatePassword(password) {
            const pattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*]).{8}$/; 
            return pattern.test(password);
        }
    </script>
</body>
</html>
