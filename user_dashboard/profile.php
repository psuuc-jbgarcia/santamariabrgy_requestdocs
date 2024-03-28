<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Form</title>

    <!-- Preloading CSS and JavaScript files -->
    <link rel="preload" as="style" href="https://bis.lgustamaria-pangasinan.com/build/assets/app-041e359a.css" />
    <link rel="modulepreload" href="https://bis.lgustamaria-pangasinan.com/build/assets/app-39dcccdc.js" />
    <link rel="stylesheet" href="https://bis.lgustamaria-pangasinan.com/build/assets/app-041e359a.css" />
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/main.js"></script>
</head>

<body id="data">




    <script>
        $(function() {
        
            loadata();

            function loadata() {
                $('#data').load('profileload.php');
            }

            function Update() {
                formData['firstname'] = $('#firstname').val();
                formData['middlename'] = $('#middlename').val();
                formData['lastname'] = $('#lastname').val();
                formData['alias'] = $('#alias').val();
                formData['place_of_birth'] = $('#place_of_birth').val();
                formData['birthdate'] = $('#birthdate').val();
                formData['sex'] = $('#sex').val();
                formData['religion'] = $('#religion').val();
                formData['citizenship'] = $('#citizenship').val();
                formData['civil_status'] = $('#civil_status').val();
                formData['occupation'] = $('#occupation').val();
                formData['registered_voter'] = $('#registered_voter').val();
                formData['contact_number'] = $('#contact_number').val();
                formData['barangay'] = $('#barangay').val();
                formData['purok'] = $('#purok').val();
                formData['house'] = $('#house').val();
            }
        });
    </script>

</body>

</html>