<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Information</title>
    <!-- Add jsPDF library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    <style>
        form {
        margin-top: 5%;
    }
        .totaldiv{
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
            margin-left:300px;
           
        }
        .inner1{
            display: grid;
    width: 400px;
    column-gap: 50px;
    row-gap: 30px;
        }
        .inner2{
            display: grid;
    width: 400px;
    column-gap: 50px;
    row-gap: 30px;
        }
        .submit:hover{
            transform: scale(1.2,1.2);
        transition: all .8s;
        background-color: navajowhite;
        }
        .back:hover{
            
        transition: all .8s;
        color: rgb(11, 11, 11);
        }
        .error{
            color: red;
            font-size: 10px;
            
            height: 10px;
            margin-top: -30px;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 20px;
        }
        .download-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 10px;
            height: 25px;
            width: 120px;
            cursor: pointer;
        }
        .download-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <center>
        <h1 style=" background-color: blanchedalmond; padding: 50px;">STUDENT ACADEMIC INFO</h1>
    </center>
    <form action="acedamicphp.php" method="POST" id="form">
    <div class="totaldiv">
        <div class="inner1" >
            <div><b style="font-size: 20px;" class="stu">Student Register Number</b><sup style="color:red;">*</sup><b style="font-size:20px">:</b></div>
            <input style="border-radius: 10px;height: 25px;" type="number" name="studentregno" id="regno" placeholder="Enter your Register No" required>
            <div class="error" id="regnoError"></div>
            <div><b style="font-size: 20px;" class="roll">Roll No</b><sup style="color:red;">*</sup><b style="font-size:20px">:</b></div>
            <input name="rollno" style="border-radius: 10px;height: 25px;appearance: none;" type="text" id="rollno" minlength="6" pattern="[1-9][1-9][a-zA-Z][a-zA-z][0-9][0-9]" title="Enter Rollno in valid form" placeholder="Enter your Roll No" required>
            <div class="button-container">
                <button name="submit" class="submit" style="background-color:burlywood;color:rgb(10, 0, 0);border-radius: 10px ;height: 25px;width: 80PX;">SUBMIT</button>
                <button type="button" class="download-btn" onclick="generatePDF()">Download as PDF</button>
            </div>
        </div>
        <div class="inner2">
            <div><b style="font-size: 20px;" class="year">Year of Studying</b><sup style="color:red;">*</sup><b style="font-size:20px">:</b></div>
            <select name="year" id="year" style="border-radius: 10px;height: 25px;" required>
                <option value="">--select--</option>
                <option value="I" >I</option>
                <option value="II" >II</option>
                <option value="III" >III</option>
                <option value="IV" >IV</option>
            </select>
            <div><b style="font-size: 20px;" class="clg">College Name</b><sup style="color:red;">*</sup><b style="font-size:20px">:</b></div>
            <select name="clgname" id="clgname" required style="border-radius: 10px;height: 25px;">
                <option value="">--select--</option>
                <option value="Government College of Engineering, Thanjavur">Government College of Engineering, Thanjavur</option>
            </select>
            <button onclick="window.location.href='fam.php'" 
                    style="font-size: 20px; text-decoration: none; cursor: pointer;background-color:burlywood;color:rgb(10, 0, 0);border-radius: 10px ;height: 25px;width:70px">
                Back
            </button>
        </div>
    </div>
    </form>

<script>
    // Initialize jsPDF
    const { jsPDF } = window.jspdf;
    
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
    
    function generatePDF() {
        // Get data from all forms (stored in session/localStorage)
        const registrationData = JSON.parse(sessionStorage.getItem('registrationData')) || {};
        const contactData = JSON.parse(sessionStorage.getItem('contactData')) || {};
        const familyData = JSON.parse(sessionStorage.getItem('familyData')) || {};
        const academicData = {
            regno: document.getElementById('regno').value,
            rollno: document.getElementById('rollno').value,
            year: document.getElementById('year').value,
            clgname: document.getElementById('clgname').value
        };
        
        // Create new PDF document
        const doc = new jsPDF();
        
        // Add title
        doc.setFontSize(20);
        doc.setTextColor(0, 0, 255);
        doc.text('STUDENT REGISTRATION SUMMARY', 105, 20, { align: 'center' });
        
        // Add current date
        const today = new Date();
        const date = today.toLocaleDateString();
        doc.setFontSize(10);
        doc.setTextColor(100);
        doc.text('Generated on: ' + date, 160, 30);
        
        // Add image if available
        if (registrationData.imagePreview) {
            try {
                doc.addImage(registrationData.imagePreview, 'JPEG', 15, 40, 30, 30);
            } catch(e) {
                console.log("Error adding image:", e);
            }
        }
        
        // Set font for content
        doc.setFontSize(12);
        doc.setTextColor(0);
        
        // Personal Information Section
        doc.setFont(undefined, 'bold');
        doc.text('PERSONAL INFORMATION', 14, 50);
        doc.setFont(undefined, 'normal');
        
        let yPos = 60;
        doc.text(`Name: ${registrationData.salutation || ''} ${registrationData.name || ''}`, 14, yPos);
        yPos += 10;
        doc.text(`Gender: ${registrationData.gender || ''}`, 14, yPos);
        yPos += 10;
        doc.text(`Date of Birth: ${registrationData.dob || ''}`, 14, yPos);
        yPos += 10;
        doc.text(`Community: ${registrationData.community || ''}`, 14, yPos);
        yPos += 10;
        doc.text(`Religion: ${registrationData.religion || ''}`, 14, yPos);
        yPos += 10;
        doc.text(`Caste: ${registrationData.caste || ''}`, 14, yPos);
        yPos += 10;
        doc.text(`Blood Group: ${registrationData.bgg || ''}`, 14, yPos);
        yPos += 15;
        
        // Contact Information Section
        doc.setFont(undefined, 'bold');
        doc.text('CONTACT INFORMATION', 14, yPos);
        doc.setFont(undefined, 'normal');
        yPos += 10;
        doc.text(`Mobile: ${contactData.mobileno || ''}`, 14, yPos);
        yPos += 10;
        doc.text(`Parent Mobile: ${familyData.parentno || ''}`, 14, yPos);
        yPos += 10;
        doc.text(`Email: ${contactData.email || ''}`, 14, yPos);
        yPos += 10;
        doc.text(`Address: ${contactData.address || ''}`, 14, yPos);
        yPos += 10;
        doc.text(`Pincode: ${contactData.pincode || ''}`, 14, yPos);
        yPos += 15;
        
        // Family Information Section
        doc.setFont(undefined, 'bold');
        doc.text('FAMILY INFORMATION', 14, yPos);
        doc.setFont(undefined, 'normal');
        yPos += 10;
        doc.text(`Father Name: ${familyData.fathername || ''}`, 14, yPos);
        yPos += 10;
        doc.text(`Father Occupation: ${familyData.fatheroccupation || ''}`, 14, yPos);
        yPos += 10;
        doc.text(`Mother Name: ${familyData.mothername || ''}`, 14, yPos);
        yPos += 10;
        doc.text(`Mother Occupation: ${familyData.motheroccupation || ''}`, 14, yPos);
        yPos += 10;
        doc.text(`Family Income: ${familyData.familyincome || ''}`, 14, yPos);
        yPos += 15;
        
        // Academic Information Section
        doc.setFont(undefined, 'bold');
        doc.text('ACADEMIC INFORMATION', 14, yPos);
        doc.setFont(undefined, 'normal');
        yPos += 10;
        doc.text(`Register Number: ${academicData.regno || ''}`, 14, yPos);
        yPos += 10;
        doc.text(`Roll Number: ${academicData.rollno || ''}`, 14, yPos);
        yPos += 10;
        doc.text(`Year of Study: ${academicData.year || ''}`, 14, yPos);
        yPos += 10;
        doc.text(`College: ${academicData.clgname || ''}`, 14, yPos);
        
        // Save the PDF
        const filename = `Student_Registration_${academicData.regno || 'summary'}.pdf`;
        doc.save(filename);
    }
    
    // Load data from sessionStorage when page loads
    document.addEventListener('DOMContentLoaded', function() {
        // You might want to populate fields if data exists
        const academicData = JSON.parse(sessionStorage.getItem('academicData')) || {};
        if (academicData.regno) document.getElementById('regno').value = academicData.regno;
        if (academicData.rollno) document.getElementById('rollno').value = academicData.rollno;
        if (academicData.year) document.getElementById('year').value = academicData.year;
        if (academicData.clgname) document.getElementById('clgname').value = academicData.clgname;
    });
</script>
</body>
</html>