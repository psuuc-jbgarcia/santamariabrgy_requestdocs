<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Permit Application</title>
    <link rel="shortcut icon" href="1708167598_download-removebg-preview copy 2.png" type="image/x-icon">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f0f0f0;
        }
        
        .formal-font {
            font-family: 'Times New Roman', Times, serif;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .logo {
            width: 100px;
            height: auto;
            margin-bottom: 20px;
        }

        .content {
            margin-top: 20px;
            color: #000;
        }

        .signature hr {
            width: 50%;
            margin: 20px auto;
            border: none;
            border-top: 1px solid #666;
        }

        .theme-color {
            color: #000;
        }

        .btn-theme {
            background-color: #4CAF50;
            border: none;
            color: #fff;
        }

        .btn-theme:hover {
            background-color: #45a049;
        }

        .logo-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo-wrapper img {
            width: 100px;
        }

        hr {
            margin-top: 40px;
            border-color: #4CAF50;
        }

        @media print {
            #permit-form,
            #reset-btn,
            #download-pdf-btn {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container p-4" style="height: 1200px;">
        <div class="logo-wrapper">
            <img src="../landingpage/1708167598_download-removebg-preview.png" alt="Your Logo">
            <div>
                <center>
                    <h3 class="theme-color">Republic of the Philippines</h3>
                </center>
                <center>
                    <p class="theme-color">Province of Your Province</p>
                </center>
                <center>
                    <p class="theme-color">Municipality of Your Municipality</p>
                </center>
            </div>
            <img src="../landingpage/Bagong_Pilipinas_logo.png" alt="Philippines Logo">
        </div>
        <hr>
        <div class="content">
            <br>
            <br>
            <br>
            <br>
<center>            <h2 class="theme-color">BUSINESS PERMIT APPLICATION</h2>
</center>            <form id="permit-form">
                <div class="form-group">
                    <label for="businessName" class="theme-color">Business Name:</label>
                    <input type="text" class="form-control" id="businessName" required>
                </div>
                <div class="form-group">
                    <label for="businessType" class="theme-color">Type of Business:</label>
                    <input type="text" class="form-control" id="businessType" required>
                </div>
                <div class="form-group">
                    <label for="ownerName" class="theme-color">Owner's Name:</label>
                    <input type="text" class="form-control" id="ownerName" required>
                </div>
                <div class="form-group">
                    <label for="startDate" class="theme-color">Start Date:</label>
                    <input type="text" class="form-control" id="startDate" required>
                </div>
                <div class="form-group">
                    <label for="endDate" class="theme-color">End Date:</label>
                    <input type="date" class="form-control" id="endDate" required>
                </div>
                <button type="submit" class="btn btn-theme">Generate Permit</button>
            </form>
            <div id="permit-output" class="formal-font" style="display: none;">
            </div>
            <div class="signature">
                <hr>
                <center>
                    <p class="theme-color">Municipal Officer's Signature</p>
                    <p class="theme-color">HON. JULIUS C. RAMOS</p>
                    <p class="theme-color">Municipal Mayor</p>
                </center>
            </div>
        </div>
    </div>
    <center>
        <div style="margin-bottom: 50px;">
            <button id="reset-btn" class="btn btn-theme" onclick="resetForm()">Reset Form</button>
            <button id="download-pdf-btn" class="btn btn-theme" onclick="printPDF()">Download PDF</button>
        </div>
    </center>
    <script>
        // Function to populate form fields with data
        function populateForm(data) {
            document.getElementById("businessName").value = data.businessName;
            document.getElementById("businessType").value = data.businessType;
            document.getElementById("ownerName").value = data.ownerName;
            document.getElementById("startDate").value = data.startDate;
            document.getElementById("endDate").value = formatDate(data.expiryDate); // Populate expiry date field
        }
        function formatDate(dateString) {
    var dateObj = new Date(dateString);
    var year = dateObj.getFullYear();
    var month = ('0' + (dateObj.getMonth() + 1)).slice(-2);
    var day = ('0' + dateObj.getDate()).slice(-2);
    return year + '-' + month + '-' + day;
}
        // AJAX request to fetch data from server
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'getbusiness.php?trackingCode=<?php echo $_GET["trackingCode"]; ?>&email=<?php echo $_GET["email"]; ?>', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                populateForm(data);
            }
        };
        xhr.send();

        function resetForm() {
            document.getElementById("permit-form").reset();
            document.getElementById("permit-output").style.display = "none";
            document.getElementById("permit-form").style.display = "block";
        }

        document.getElementById("permit-form").addEventListener("submit", function (event) {
            event.preventDefault();
            const businessName = document.getElementById("businessName").value;
            const businessType = document.getElementById("businessType").value;
            const ownerName = document.getElementById("ownerName").value;
            const startDate = document.getElementById("startDate").value;
            const endDate = document.getElementById("endDate").value;
            const expiryDateObj = new Date(endDate);
            const issued = new Date(startDate);

            const formattedIssueDate = `${issued.toLocaleDateString('en-US', { weekday: 'long' })}, ${issued.toLocaleDateString('en-US', { month: 'long' })} ${issued.getDate()}, ${issued.getFullYear()}`;

const formattedExpiryDate = `${expiryDateObj.toLocaleDateString('en-US', { weekday: 'long' })}, ${expiryDateObj.toLocaleDateString('en-US', { month: 'long' })} ${expiryDateObj.getDate()}, ${expiryDateObj.getFullYear()}`;
            const permitOutput = document.getElementById("permit-output");
            permitOutput.innerHTML = `
            <br>
<br>
<br>
<p class="theme-color">I hereby certify that <span class="font-weight-bold">${ownerName}</span>, owner of <span class="font-weight-bold">${businessName}</span>, has applied for a Business Permit for the operation of a <span class="font-weight-bold">${businessType}</span> business.</p>
<p class="theme-color">This Business Permit is granted in accordance with the regulations set forth by the municipality.</p>
<p class="theme-color">The issuance of this permit signifies compliance with all relevant laws and ordinances governing business operations.</p>
<p class="theme-color">This Business Permit is valid from <span class="font-weight-bold">${formattedIssueDate}</span> to <span class="font-weight-bold">${formattedExpiryDate}</span>.</p>
<p class="theme-color">Please note that failure to comply with the terms and conditions of this permit may result in its revocation or other legal actions.</p>
<p class="theme-color">For any inquiries or concerns regarding this permit, please contact the municipality office during business hours.</p>
<p class="theme-color">Additionally, it is the responsibility of the permit holder to prominently display this permit at the business premises at all times.</p>
<p class="theme-color">The municipality reserves the right to conduct inspections or audits to ensure continued compliance with permit conditions.</p>
<br>
<p class="theme-color">Issued by: <span class="font-weight-bold">${ownerName}</span></p>
<p class="theme-color">Date Issued: <span class="font-weight-bold">${formattedIssueDate}</span></p>
<br>

`;

            permitOutput.style.display = "block";
            document.getElementById("permit-form").style.display = "none";
        });

        function printPDF() {
            // Show the printable content
            document.getElementById("permit-output").style.display = "block";

            // Print the page
            window.print();

            // Hide the printable content again
            document.getElementById("permit-output").style.display = "none";
        }
    </script>

</body>

</html>
