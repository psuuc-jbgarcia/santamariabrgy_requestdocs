<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Residency Certificate</title>
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="1708167598_download-removebg-preview copy 2.png" type="image/x-icon">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- jspdf library -->
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
            #residency-form,
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
        <div class="content" style="height: 1100px;">
            <br>
            <br>
            <br>
            <br>

<center>            <h2 class="theme-color">RESIDENCY CERTIFICATE</h2>
</center>            <!-- Residency Certificate header -->
<?php 
require '../connection.php';
$tracking_code=$_GET['trackingCode'];
$email=$_GET['email'];

$stmt="select * from residency where tracking_code=?";
$result=$conn->prepare($stmt);
$result->bind_param('s',$tracking_code);
$result->execute();
$result=$result->get_result();

if($result->num_rows>0){
    $data=$result->fetch_assoc();

    $stmtBRGY="select * from users where email=?";
    $resultBRGY=$conn->prepare($stmtBRGY);
    $resultBRGY->bind_param('s',$email);
    $resultBRGY->execute();
    $resultBRGY=$resultBRGY->get_result();
    if($resultBRGY->num_rows>0){
        $brgy=$resultBRGY->fetch_assoc();
   
    ?>

            <form id="residency-form">

    <div class="form-group">
        <label for="applicantName" class="theme-color">Applicant's Name:</label>
        <input type="text" class="form-control" id="applicantName" required value="<?php echo $data['full_name'] ?>">
    </div>
    <div class="form-group">
       
       
        <label for="barangayName" class="theme-color">Barangay Name:</label>
        <input type="text" class="form-control" id="barangayName" required value="<?php echo $brgy['barangay'] ?>">
    </div>
  
    <div class="form-group">
                    <label for="purpose" class="theme-color">Purpose:</label>
                    <input type="text" class="form-control" id="purpose" required value="<?php echo $data['purpose'] ?>">
                </div>
    <div class="form-group">
        <label for="issueDate" class="theme-color">Date Issued:</label>
        <input type="datetime-local" class="form-control" id="issueDate" required value="<?php echo $data['date_requested'] ?>">
    </div>
    <div class="form-group">
    <?php
       $issueDate = $data['date_requested']; // Assuming the issued date is stored in 'date_requested' column
       $expiryDate = date('Y-m-d', strtotime('+6 months', strtotime($issueDate)));
            ?>
        <label for="expiryDate" class="theme-color">Expiry Date:</label>
        <input type="date" class="form-control" id="expiryDate" required  value="<?php echo $expiryDate  ?>">
    </div>
    <button type="submit" class="btn btn-theme">Generate Residency Certificate</button>
</form>
<?php
} }
?>
            <!-- Residency Certificate output -->
            <div id="residency-certificate-output" class="formal-font" style="display: none;">
                <!-- Certificate content dynamically generated here -->
            </div>
            <br>
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

    <!-- JavaScript section -->
    <script>
            function resetForm() {
            document.getElementById("residency-form").reset();
            document.getElementById("residency-certificate-output").style.display = "none";
            document.getElementById("residency-form").style.display = "block";
        }

    document.getElementById("residency-form").addEventListener("submit", function(event) {
        event.preventDefault();

        // Get values from form fields
        const applicantName = document.getElementById("applicantName").value;
        const barangayName = document.getElementById("barangayName").value;
        const issueDate = document.getElementById("issueDate").value;
        const purpose = document.getElementById("purpose").value;

        const expiryDate = document.getElementById("expiryDate").value;
        const issueDateObj = new Date(issueDate);
        const expiryDateObj = new Date(expiryDate);

        // Format the dates
        const formattedIssueDate = issueDateObj.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
        const formattedExpiryDate = expiryDateObj.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });

        // Generate the residency certificate content
        const residencyCertificateContent = `
    <!-- Certificate content -->
    <div>
    <br>
<br>
<p class="theme-color">This is to certify that <span class="font-weight-bold">${applicantName}</span>, a resident of Barangay <span class="font-weight-bold">${barangayName}</span>, has been issued a Residency Certificate.</p>
<br>
<p class="theme-color">This certificate is being issued to confirm that the individual has been residing in the aforementioned Barangay and has met all residency requirements.</p>
<br>
<p class="theme-color">This Residency Certificate is valid from <span class="font-weight-bold">${formattedIssueDate}</span> to <span class="font-weight-bold">${formattedExpiryDate}</span>.</p>
<br>
<p class="theme-color">The purpose of issuing this Residency Certificate is to certify the residency status of <span class="font-weight-bold">${applicantName}</span> for the purpose of <span class="font-weight-bold">${purpose}</span>.</p>
<br>
<p class="theme-color">Please be informed that this Residency Certificate is intended solely for the stated purpose and may not be used for any other purpose without proper authorization.</p>
<p class="theme-color">Any misuse or misrepresentation of the information contained in this certificate may result in legal consequences.</p>
<br>
<br>
<p class="theme-color">Issued by: <span class="font-weight-bold">${applicantName}</span></p>
<p class="theme-color">Issued Date: <span class="font-weight-bold">${formattedIssueDate}</span></p>
<br>
<br>

    </div>
`;


        // Display the residency certificate content
        const residencyCertificateOutput = document.getElementById("residency-certificate-output");
        residencyCertificateOutput.innerHTML = residencyCertificateContent;
        residencyCertificateOutput.style.display = "block";

        // Hide the form
        document.getElementById("residency-form").style.display = "none";
  

     
    });

    function printPDF() {
            // Show the printable content
            document.getElementById("residency-certificate-output").style.display = "block";

            // Print the page
            window.print();

            // Hide the printable content again
            document.getElementById("residency-certificate-output").style.display = "none";
        }
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
