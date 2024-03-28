<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personal Information</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="../js/jquery-3.3.1.js"></script>
  <script src="../js/main.js"></script>
  <style>
    /* Custom styling */
    body {
      background: url('./bg1.jpg') no-repeat center center fixed;
      /* Background image with gradient overlay */
      background-size: cover; /* Cover the entire screen */
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0; /* Reset default margin */
      background: linear-gradient(to top, rgba(0,0,0,4), rgba(0,0,0,0.5)), url('./bg1.jpg');
      background-repeat: no-repeat;
      background-size: cover;
    }

    .container {
      background-color: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      margin-top: 50px;
    }

    .form-control[readonly] {
      background-color: #e9ece5;
    }

    .form-group label {
      color: black;
      font-weight: bold;
    }

    #registerBtn {
      background-color: green; /* Green button color */
      color: white;
      border: none;
    }

  
  </style>
</head>

<body>
  <div class="container">
    <div class="text-center mb-4">
      <img src="./1708167598_download-removebg-preview.png" alt="Logo" width="100">
    </div>
    <h2 class="mt-4 mb-4">Personal Information</h2>
    <div class="alert alert-success" role="alert">
      Welcome, <?php session_start(); $username=$_SESSION['user']; echo $username;  ?> Thank you for registering. Please fill up the following information:
    </div>
    <form>
      <!-- Form fields -->
      
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="alias">Alias</label>
          <input type="text" class="form-control" id="alias">
        </div>
        <div class="form-group col-md-4">
          <label for="placeOfBirth">Place of Birth</label>
          <input type="text" class="form-control" id="placeOfBirth" >
        </div>
        <div class="form-group col-md-4">
    <label for="birthdate">Birthdate</label>
    <input type="date" class="form-control" id="birthdate" name="birthdate" >
</div>

      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="age">Age</label>
          <input type="text" class="form-control" id="age" >
        </div>
        <div class="form-group col-md-4">
          <label for="religion">Religion</label>
          <input type="text" class="form-control" id="religion" >
        </div>
        <div class="form-group col-md-4">
          <label for="citizenship">Citizenship</label>
          <input type="text" class="form-control" id="citizenship">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="civilStatus">Civil Status</label>
          <input type="text" class="form-control" id="civilStatus" >
        </div>
        <div class="form-group col-md-4">
          <label for="occupation">Occupation</label>
          <input type="text" class="form-control" id="occupation" >
        </div>
        <div class="form-group col-md-4">
    <label for="registeredVoter">Registered Voter?</label>
    <select class="form-control" id="registeredVoter" >
        <option value="YES" >Yes</option>
        <option value="NO">No</option>
    </select>
</div>

      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="contactNumber">Contact Number</label>
          <input type="text" class="form-control" id="contactNumber">
        </div>
        <div class="form-group col-md-4">
          <label for="householdNumber">Household Number</label>
          <input type="text" class="form-control" id="householdNumber">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12 text-center">
          <button type="button" class="btn btn-success" id="formBtn">Continue</button>
        </div>
      </div>
    </form>
  </div>
  <script>
    $(function(){

$("#formBtn").click(function(){
addform();
});
function addform(){
  var alias = $('#alias').val();
        var placeOfBirth = $('#placeOfBirth').val();
        var birthdate = $('#birthdate').val();
        var age = $('#age').val();
        var religion = $('#religion').val();
        var citizenship = $('#citizenship').val();
        var civilStatus = $('#civilStatus').val();
        var occupation = $('#occupation').val();
        var registeredVoter = $('#registeredVoter').val();
        var contactNumber = $('#contactNumber').val();
        var householdNumber = $('#householdNumber').val();
        var data={
          alias:alias,
          placeOfBirth:placeOfBirth,
          birthdate:birthdate,
          age:age,
          religion:religion,
          civilStatus:civilStatus,
          citizenship:citizenship,
          occupation:occupation,
          registeredVoter:registeredVoter,
          contactNumber:contactNumber,
          householdNumber:householdNumber
        };
$.ajax({
  url:"formadd.php",
  method:"post",
  data:data,
  success:function(result){
    alert(result);

    if(result ==="You have successfully filled up the form"){
      window.location.href="../user_dashboard/userdashboard.php";

}


  },
});
}
});
  </script>
  <script src="forms.js"></script>
</body>

</html>
