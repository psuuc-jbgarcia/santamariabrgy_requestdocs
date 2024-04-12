<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Indigency Certificate</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            <h2 class="theme-color">INDIGENCY CERTIFICATE</h2>
            <!-- Indigency Certificate form -->
            <form id="indigency-form">
                <!-- Form fields -->
                <div class="form-group">
                    <label for="applicantName" class="theme-color">Applicant's Name:</label>
                    <input type="text" class="form-control" id="applicantName" required>
                </div>
                <div class="form-group">
                    <label for="address" class="theme-color">Address:</label>
                    <input type="text" class="form-control" id="address" required>
                </div>
                <div class="form-group">
                    <label for="purpose" class="theme-color">Purpose:</label>
                    <textarea class="form-control" id="purpose" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="issueDate" class="theme-color">Date Issued:</label>
                    <input type="date" class="form-control" id="issueDate" required>
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
                    <p class="theme-color">[Barangay Official's Signature]</p>
                    <p class="theme-color">[Barangay Official's Name]</p>
                    <p class="theme-color">[Barangay Position]</p>
                </center>
            </div>
        </div>
    </div>

    <!-- JavaScript section -->
    <script>
        function resetForm() {
            document.getElementById("indigency-form").reset();
            document.getElementById("indigency-certificate-output").style.display = "none";
            document.getElementById("indigency-form").style.display = "block";
        }

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
            const indigencyCertificateContent = `
                <br>
                <p class="theme-color">To Whom It May Concern:</p>
                <br>
                <p class="theme-color">This is to certify that ${applicantName}, of legal age, residing at ${address}, is known to the undersigned to belong to an indigent family.</p>
                <br>
                <p class="theme-color">This certification is being issued upon the request of ${applicantName} in connection with ${purpose}. This certificate is valid from ${formattedIssueDate} until ${formattedExpiryDate}.</p>
                <br>
                <p class="theme-color">Issued this ${formattedIssueDate}, at Barangay Hall, [Barangay Name], [Municipality], [Province].</p>
                <br>
            `;

            // Display the indigency certificate content
            const indigencyCertificateOutput = document.getElementById("indigency-certificate-output");
            indigencyCertificateOutput.innerHTML = indigencyCertificateContent;
            indigencyCertificateOutput.style.display = "block";

            // Hide the form
            document.getElementById("indigency-form").style.display = "none";
        });

        function printPDF() {
            // Show the printable content
            document.getElementById("indigency-certificate-output").style.display = "block";

            // Print the page
            window.print();

            // Hide the printable content again
            document.getElementById("indigency-certificate-output").style.display = "none";
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
