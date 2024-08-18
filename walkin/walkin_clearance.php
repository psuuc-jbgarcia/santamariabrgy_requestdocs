<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Clearance</title>
    <link rel="shortcut icon" href="../landingpage/1708167598_download-removebg-preview.png" type="image/x-icon">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif; /* Change font-family to Times New Roman */
            background-color: #f0f0f0;
            /* Light gray background */
        }
        

        /* Define a class for applying the formal font to specific elements */
        .formal-font {
            font-family: 'Times New Roman', Times, serif; /* Change font-family to Times New Roman */
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Drop shadow */
            background-color: #fff;
            /* White background */
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo {
            width: 100px;
            /* Adjust as needed */
            height: auto;
            /* Maintain aspect ratio */
            margin-bottom: 20px;
        }

        .content {
            margin-top: 20px;
            color: #000;
            /* Black text color */
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            color: #666;
            /* Dark gray text color */
        }

        .signature hr {
            width: 50%;
            margin: 20px auto;
            border: none;
            /* Remove default hr border */
            border-top: 1px solid #666;
            /* Dark gray border */
        }

        .theme-color {
            color: #000;
            /* Black text color */
        }

        .btn-theme {
            background-color: #4CAF50;
            /* Green theme color for button */
            border: none;
            color: #fff;
            /* White text color */
        }

        .btn-theme:hover {
            background-color: #45a049;
            /* Darker shade of green on hover */
        }

        .logo-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo-wrapper img {
            width: 100px; /* Adjust the width as needed */
            height: auto;
        }

        
        hr {
            margin-top: 40px;
            border-color: #4CAF50; /* Green border color */
        }
        @media print {
            /* Hide the form when printing */
            #clearance-form,
            #reset-btn,
            #download-pdf-btn {
                display: none;
            }}
    </style>
</head>

<body>
    <div class="container p-4" style="height: 1200px;" >
        <div class="logo-wrapper">
            <img src="../landingpage/1708167598_download-removebg-preview.png" alt="Santa Maria Logo">
            <div>
                <center>
                    <h3 class="theme-color">Republic of the Philippines</h3>
                </center>
<center>                <p class="theme-color">Province of Pangasinan</p>
</center>                <center><p class="theme-color">Municipality of Santa Maria</p></center>
            </div>
            <img src="../landingpage/Bagong_Pilipinas_logo.png" alt="Philippines Logo" >
        </div>
        <hr>
        <div class="content">
            <br>
            <br>
            <br>
            <br>
<center>            <h2 class="theme-color">BARANGAY CLEARANCE</h2>
</center> <?php 
 require '../connection.php';
 $id=$_GET['id'];
 $sql = "SELECT CONCAT(firstName, ' ', middleName, ' ', lastName) AS full_name, purpose, brgy,submissionDate FROM walkinrequests WHERE id = '$id'";
 $result = $conn->query($sql);
 while($data=$result->fetch_assoc()){
    ?>
 
            <form id="clearance-form">
                <!-- Form fields -->
                <div class="form-group">
                    <label for="applicantName" class="theme-color">Applicant's Name:</label>
                    <input type="text" class="form-control" id="applicantName" required value="<?php echo $data['full_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="purpose" class="theme-color">Purpose of Clearance:</label>
                    <input type="text" class="form-control" id="purpose" required value="<?php echo $data['purpose'] ?>">
                </div>
             
                <div class="form-group">
                    <label for="barangayName" class="theme-color">Barangay Name:</label>
                    <input type="text" class="form-control" id="barangayName" required value="<?php echo $data['brgy'] ?>">
                </div>
                <div class="form-group">
                    <label for="issueDate" class="theme-color">Issue Date:</label>
                    <input type="datetime-local" class="form-control" id="issueDate" value="<?php echo $data['submissionDate'] ?>"  required readonly>
                </div>
                <?php 
                    $issueDate = strtotime($data['submissionDate']);
                    $expiryDate = date('Y-m-d', strtotime('+6 months', $issueDate));
            
                    // Add expiry date to the row data
                ?>
                <div class="form-group">
                    <label for="expiryDate" class="theme-color">Expiry Date:</label>
                    <input type="date" class="form-control" id="expiryDate" required value="<?php echo  $expiryDate; ?>" readonly>

                </div>
              
                <button type="submit" class="btn btn-theme">Generate Clearance</button>
            </form>
            <?php
 }
 ?>
            <div id="clearance-output" class="formal-font" style="display: none;">
    </div>
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
    </div>
    <center>
        <div style="margin-bottom: 50px;">
        <button id="reset-btn" class="btn btn-theme" onclick="resetForm()">Reset Form</button>
        <button id="download-pdf-btn" class="btn btn-theme" onclick="printPDF()">Download PDF</button>
        </div>

    </center>
<script>
 


</script>

    <script>
         function resetForm() {
            document.getElementById("clearance-form").reset();
            document.getElementById("clearance-output").style.display = "none";
            document.getElementById("clearance-form").style.display = "block";
        }
        document.getElementById("clearance-form").addEventListener("submit", function(event) {
            event.preventDefault();
            const applicantName = document.getElementById("applicantName").value;
            const purpose = document.getElementById("purpose").value;
            const barangayName = document.getElementById("barangayName").value;
            const issueDate = document.getElementById("issueDate").value;
            const expiryDate = document.getElementById("expiryDate").value;
            const expiryDateObj = new Date(expiryDate);
            const issued = new Date(issueDate);

            // Format the date in a human-readable format
            const formattedIssueDate = `${issued.toLocaleDateString('en-US', { weekday: 'long' })}, ${issued.toLocaleDateString('en-US', { month: 'long' })} ${issued.getDate()}, ${issued.getFullYear()}`;

            const formattedExpiryDate = `${expiryDateObj.toLocaleDateString('en-US', { weekday: 'long' })}, ${expiryDateObj.toLocaleDateString('en-US', { month: 'long' })} ${expiryDateObj.getDate()}, ${expiryDateObj.getFullYear()}`;
            const clearanceOutput = document.getElementById("clearance-output");
            clearanceOutput.innerHTML = `
    <div>
    <br>
<br>
<br>
<p class="theme-color">This is to certify that <span class="font-weight-bold">${applicantName}</span>, of legal age, Filipino citizen, and a resident of Barangay <span class="font-weight-bold">${barangayName}</span>, has personally appeared before the undersigned and has applied for a Barangay Clearance for the purpose of <span class="font-weight-bold">${purpose}</span>.</p>
<p class="theme-color">This Barangay Clearance is issued to attest that the said individual is of good moral character, has no pending liabilities or obligations with the barangay, and has no derogatory records within the jurisdiction of Barangay <span class="font-weight-bold">${barangayName}</span>.</p>
<p class="theme-color">The purpose of this Barangay Clearance is to ${purpose}.</p>
<p class="theme-color">This clearance, issued on <span class="font-weight-bold">${formattedIssueDate}</span>, is valid until <span class="font-weight-bold">${formattedExpiryDate}</span>.</p>
<p class="theme-color">Please be advised that this Barangay Clearance is intended for the specified purpose only and may not be used for any other purpose without proper authorization.</p>
<p class="theme-color">The Barangay reserves the right to revoke or cancel this clearance in case of any misrepresentation or misuse of information.</p>
<br>
<p class="theme-color">Issued by: <span class="font-weight-bold">${applicantName}</span></p>
<p class="theme-color">Issued Date: <span class="font-weight-bold">${formattedIssueDate}</span></p>
<br>
    </div>
`;
            clearanceOutput.style.display = "block";
            document.getElementById("clearance-form").style.display = "none";
            
        });
        function printPDF() {
            // Show the printable content
            document.getElementById("clearance-output").style.display = "block";

            // Print the page
            window.print();

            // Hide the printable content again
            document.getElementById("clearance-output").style.display = "none";
        }
    </script>
 
</body>

</html>

