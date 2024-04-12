<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Permit Application</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jspdf@2.5/dist/jspdf.es.min.js"></script>
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
            #permit-form,
            #reset-btn,
            #download-pdf-btn {
                display: none;
            }}
    </style>
</head>

<body>
    <div class="container p-4" style="height: 1200px;" >
        <div class="logo-wrapper">
            <img src="../landingpage/your_logo.png" alt="Your Logo">
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
            <img src="../landingpage/philippines_logo.png" alt="Philippines Logo" >
        </div>
        <hr>
        <div class="content">
            <br>
            <br>
            <br>
            <br>
            <h2 class="theme-color">BUSINESS PERMIT APPLICATION</h2>
            <form id="permit-form">
                <!-- Form fields -->
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
                    <input type="date" class="form-control" id="startDate" required>
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
                    <p class="theme-color">[Municipal Officer's Signature]</p>
                    <p class="theme-color">[Municipal Officer's Name]</p>
                    <p class="theme-color">[Municipal Officer's Position]</p>
                </center>
            </div>
        </div> 
    </div>
    <center>
        <button id="reset-btn" class="btn btn-theme" onclick="resetForm()">Reset Form</button>
        <button id="download-pdf-btn" class="btn btn-theme" onclick="printPDF()">Download PDF</button>
    </center>

    <script>
        function resetForm() {
            document.getElementById("permit-form").reset();
            document.getElementById("permit-output").style.display = "none";
            document.getElementById("permit-form").style.display = "block";
        }
        document.getElementById("permit-form").addEventListener("submit", function(event) {
            event.preventDefault();
            const businessName = document.getElementById("businessName").value;
            const businessType = document.getElementById("businessType").value;
            const ownerName = document.getElementById("ownerName").value;
            const startDate = document.getElementById("startDate").value;
            const endDate = document.getElementById("endDate").value;
            const endDateObj = new Date(endDate);

            // Format the date in a human-readable format
            const formattedEndDate = `${endDateObj.toLocaleDateString('en-US', { weekday: 'long' })}, ${endDateObj.toLocaleDateString('en-US', { month: 'long' })} ${endDateObj.getDate()}, ${endDateObj.getFullYear()}`;

            const permitOutput = document.getElementById("permit-output");
            permitOutput.innerHTML = `
                <br>
                <br>
                <br>
                <p class="theme-color">This is to certify that <span class="font-weight-bold">${ownerName}</span>, owner of <span class="font-weight-bold">${businessName}</span>, has applied for a Business Permit for the operation of a <span class="font-weight-bold">${businessType}</span> business.</p>
                <p class="theme-color">This Business Permit is valid from <span class="font-weight-bold">${startDate}</span> to <span class="font-weight-bold">${formattedEndDate}</span>.</p>
                <br>
                <br>
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
