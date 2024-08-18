<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Indigency Certificate</title>
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="1708167598_download-removebg-preview copy 2.png" type="image/x-icon">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/main.js"> </script>
    <!-- Styles -->
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
        .header {
            text-align: center;
            margin-bottom: 40px;
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
        .footer {
            margin-top: 40px;
            text-align: center;
            color: #666;
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
            height: auto;
        }
        hr {
            margin-top: 40px;
            border-color: #4CAF50;
        }
        @media print {
            #indigency-form,
            #reset-btn,
            #download-pdf-btn {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Container -->
    <div class="container p-4">
        <!-- Logo wrapper -->
        <div class="logo-wrapper">
            <!-- Municipality logos -->
            <img src="../landingpage/1708167598_download-removebg-preview.png" alt="Santa Maria Logo">
            <div>
                <center>
                    <h3 class="theme-color">Republic of the Philippines</h3>
                </center>
                <center>
                    <p class="theme-color">Province of Pangasinan</p>
                </center>
                <center>
                    <p class="theme-color">Municipality of Santa Maria</p>
                </center>
            </div>
            <img src="../landingpage/Bagong_Pilipinas_logo.png" alt="Philippines Logo">
        </div>
        <hr>
        <!-- Content section -->
        <div class="content" style="height: 800px;">
            <!-- Indigency Certificate header -->
<center>            <h2 class="theme-color">INDIGENCY CERTIFICATE</h2>
</center>            <form id="indigency-form">  



        
                <!-- Form fields -->
                <div class="form-group">
                    <label for="applicantName" class="theme-color">Applicant's Name:</label>
                    <input type="text" class="form-control" id="applicantName" required>
                </div>
                <div class="form-group">
                    <label for="address" class="theme-color">Barangay:</label>
                    <input type="text" class="form-control" id="address" required >
                </div>
                <div class="form-group">
                    <label for="purpose" class="theme-color">Purpose:</label>
                    <textarea class="form-control" id="purpose" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="issueDate" class="theme-color">Date Issued:</label>
                    <input type="text" class="form-control" id="issueDate" required>
                </div>
                <div class="form-group">
                    <label for="expiryDate" class="theme-color">Expiry Date:</label>
                    <input type="date" class="form-control" id="expiryDate" required>
                </div>
             
                <button type="submit" class="btn btn-theme">Generate Indigency Certificate</button>
 
      
            </form>
            <!-- Indigency Certificate output -->
            <div id="indigency-certificate-output" class="formal-font" style="display: none;">
                <!-- Certificate content dynamically generated here -->
            </div>
            <br>
            <br>
            <br>
            <div class="signature">
                <hr>
                <center>
                <p class="theme-color">Barangay Official's Signature</p>
                <p class="theme-color">Jerico Garia</p>
                <p class="theme-color">Barangay Captain</p>
                </center>
            </div>
        </div>
    </div>
<script>  function populateForm(data) {
        document.getElementById("applicantName").value = data.applicantName;
        document.getElementById("address").value = data.address;
        document.getElementById("purpose").value = data.purpose;
        document.getElementById("issueDate").value = data.issueDate;
        document.getElementById("expiryDate").value = data.expiryDate; // Populate expiry date
        // Populate other form fields here
    }

    // Function to handle form submission
    document.getElementById("indigency-form").addEventListener("submit", function(event) {
        event.preventDefault();
        // Your form submission logic here
    });

    // AJAX request to fetch data from server
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'getdataindi.php?trackingCode=<?php echo $_GET["trackingCode"]; ?>&email=<?php echo $_GET["email"]; ?>', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            populateForm(data);
        }
    };
    xhr.send();</script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to reset the form
        function resetForm() {
            document.getElementById("indigency-form").reset();
            document.getElementById("indigency-certificate-output").style.display = "none";
            document.getElementById("indigency-form").style.display = "block";
        }

        // Function to generate the certificate and handle form submission
        document.getElementById("indigency-form").addEventListener("submit", function(event) {
            event.preventDefault();

            // Get values from form fields
            const applicantName = document.getElementById("applicantName").value;
            const address = document.getElementById("address").value;
            const issueDate = document.getElementById("issueDate").value;
            const expiryDate = document.getElementById("expiryDate").value;
            const purpose = document.getElementById("purpose").value;
            const issueDateObj = new Date(issueDate);
            const expiryDateObj = new Date(expiryDate);

            // Format the dates
            const formattedIssueDate = issueDateObj.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
            const formattedExpiryDate = expiryDateObj.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });

            // Generate the indigency certificate content
       // Generate the indigency certificate content
       const indigencyCertificateContent = `
    <div>
    <br>
<p class="theme-color"><b>To Whom It May Concern:</b></p>
<br>
<p class="theme-color">This is to certify that <strong>${applicantName}</strong>, of legal age, residing at <strong>${address}</strong>, is known to the undersigned to belong to an indigent family.</p>
<br>
<p class="theme-color">This certification is being issued upon the request of <strong>${applicantName}</strong> in connection with <strong>${purpose}</strong>.</p>
<p class="theme-color">This certificate is valid from <strong>${formattedIssueDate}</strong> until <strong>${formattedExpiryDate}</strong>.</p>
<p class="theme-color">Please be informed that this Indigency Certificate is intended solely for the stated purpose and may not be used for any other purpose without proper authorization.</p>
<p class="theme-color">Any misuse or misrepresentation of the information contained in this certificate may result in legal consequences.</p>
<br>
<p class="theme-color">Issued by: <strong>${applicantName}</strong></p>
<p class="theme-color">Issued Date: <strong>${formattedIssueDate}</strong></p>
<br>
<br>

    </div>
`;


            // Display the indigency certificate content
            const indigencyCertificateOutput = document.getElementById("indigency-certificate-output");
            indigencyCertificateOutput.innerHTML = indigencyCertificateContent;
            indigencyCertificateOutput.style.display = "block";

            // Hide the form
            document.getElementById("indigency-form").style.display = "none";
        });

        // Function to print the PDF
        function printPDF() {
            // Show the printable content
            document.getElementById("indigency-certificate-output").style.display = "block";

            // Print the page
            window.print();

            // Hide the printable content again
            document.getElementById("indigency-certificate-output").style.display = "none";
        }

        // Event listeners for reset button and download PDF button
        document.getElementById("reset-btn").addEventListener("click", resetForm);
        document.getElementById("download-pdf-btn").addEventListener("click", printPDF);
    });
</script>



    <center>
        <div style="margin-bottom: 50px;">
            <!-- Reset Form and Download PDF buttons -->
            <button id="reset-btn" class="btn btn-theme" onclick="resetForm()">Reset Form</button>
            <button id="download-pdf-btn" class="btn btn-theme" onclick="printPDF()">Download PDF</button>
        </div>
    </center>
</body>
</html>
