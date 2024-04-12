<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" href="../landingpage/1708167598_download-removebg-preview.png">

<!-- jQuery -->
<script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/main.js"></script>
    <!-- Preloading CSS and JavaScript files -->
    <link rel="preload" as="style" href="https://bis.lgustamaria-pangasinan.com/build/assets/app-041e359a.css" />
    <link rel="modulepreload" href="https://bis.lgustamaria-pangasinan.com/build/assets/app-39dcccdc.js" />
    <link rel="stylesheet" href="https://bis.lgustamaria-pangasinan.com/build/assets/app-041e359a.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<style>
body{
    margin-bottom: 50px !important;
}
</style>
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