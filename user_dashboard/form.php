<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personal Information</title>
  <!-- Bootstrap CSS -->
  <link rel="shortcut icon" href="../landingpage/1708167598_download-removebg-preview.png">
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
      background: linear-gradient(to top, rgba(0,0,0,4), rgba(0,0,0,0.5)), url('../user_registration/bg1.jpg');
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
    
    .error-message {
      color: red;
      font-size: 12px;
      margin-top: 5px;
    }
    
    /* Add red border for error */
    .error-border {
      border: 1px solid red !important;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="text-center mb-4">
      <img src="../landingpage/1708167598_download-removebg-preview.png" alt="Logo" width="100">
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
          <div class="error-message" id="alias-error"></div>
        </div>
        <div class="form-group col-md-4">
          <label for="placeOfBirth">Place of Birth</label>
          <input type="text" class="form-control" id="placeOfBirth" >
          <div class="error-message" id="placeOfBirth-error"></div>
        </div>
        <div class="form-group col-md-4">
    <label for="birthdate">Birthdate</label>
    <input type="date" class="form-control" id="birthdate" name="birthdate" >
    <div class="error-message" id="birthdate-error"></div>
</div>

      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="age">Age</label>
          <input type="text" class="form-control" id="age" >
          <div class="error-message" id="age-error"></div>
        </div>
        <div class="form-group col-md-4">
          <label for="religion">Religion</label>
          <input type="text" class="form-control" id="religion" >
          <div class="error-message" id="religion-error"></div>
        </div>
        <div class="form-group col-md-4">
          <label for="citizenship">Citizenship</label>
          <input type="text" class="form-control" id="citizenship">
          <div class="error-message" id="citizenship-error"></div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="civilStatus">Civil Status</label>
          <input type="text" class="form-control" id="civilStatus" >
          <div class="error-message" id="civilStatus-error"></div>
        </div>
        <div class="form-group col-md-4">
          <label for="occupation">Occupation</label>
          <input type="text" class="form-control" id="occupation" >
          <div class="error-message" id="occupation-error"></div>
        </div>
        <div class="form-group col-md-4">
    <label for="registeredVoter">Registered Voter?</label>
    <select class="form-control" id="registeredVoter" >
        <option value="YES" >Yes</option>
        <option value="NO">No</option>
    </select>
    <div class="error-message" id="registeredVoter-error"></div>
</div>

      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="contactNumber">Contact Number</label>
          <input type="text" class="form-control" id="contactNumber">
          <div class="error-message" id="contactNumber-error"></div>
        </div>
        <div class="form-group col-md-4">
          <label for="householdNumber">Household Number</label>
          <input type="text" class="form-control" id="householdNumber">
          <div class="error-message" id="householdNumber-error"></div>
        </div>
      </div>
      <div class="form-row">
  <div class="form-group col-md-12 text-center">
    <button type="button" class="btn btn-success" id="formBtn">Continue</button>
    <button type="button" class="btn btn-secondary" id="fillLaterBtn">Fill Up Later</button>
  </div>
</div>

    </form>
  </div>
  <script>
    $(function(){
$("#fillLaterBtn").click(function(){
window.location.href="profile.php";
});
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

        // Reset error messages and borders
        $('.error-message').text('');
        $('.form-control').removeClass('error-border');

        // Validation for alias
        var isValid = true; // Flag to track overall form validity
if (!alias) {
  $('#alias-error').text('Please enter your alias');
  $('#alias').addClass('error-border').focus(); // Add red border and focus on the alias field
  isValid = false;
}

// Validation for place of birth
if (!placeOfBirth) {
  $('#placeOfBirth-error').text('Please enter your place of birth');
  $('#placeOfBirth').addClass('error-border'); // Add red border
  if (isValid) {
    $('#placeOfBirth').focus(); // Focus on the place of birth field if it's the first error
    isValid = false;
  }
} else {
  $('#placeOfBirth').removeClass('error-border'); // Remove red border
}

// Validation for birthdate
if (!birthdate) {
  $('#birthdate-error').text('Please enter your birthdate');
  $('#birthdate').addClass('error-border'); // Add red border
  if (isValid) {
    $('#birthdate').focus(); // Focus on the birthdate field if it's the first error
    isValid = false;
  }
} else {
  $('#birthdate').removeClass('error-border'); // Remove red border
}

// Validation for age
if (!age) {
  $('#age-error').text('Please enter your age');
  $('#age').addClass('error-border'); // Add red border
  if (isValid) {
    $('#age').focus(); // Focus on the age field if it's the first error
    isValid = false;
  }
} else {
  $('#age').removeClass('error-border'); // Remove red border
}

// Validation for religion
if (!religion) {
  $('#religion-error').text('Please enter your religion');
  $('#religion').addClass('error-border'); // Add red border
  if (isValid) {
    $('#religion').focus(); // Focus on the religion field if it's the first error
    isValid = false;
  }
} else {
  $('#religion').removeClass('error-border'); // Remove red border
}

// Validation for citizenship
if (!citizenship) {
  $('#citizenship-error').text('Please enter your citizenship');
  $('#citizenship').addClass('error-border'); // Add red border
  if (isValid) {
    $('#citizenship').focus(); // Focus on the citizenship field if it's the first error
    isValid = false;
  }
} else {
  $('#citizenship').removeClass('error-border'); // Remove red border
}

// Validation for civil status
if (!civilStatus) {
  $('#civilStatus-error').text('Please enter your civil status');
  $('#civilStatus').addClass('error-border'); // Add red border
  if (isValid) {
    $('#civilStatus').focus(); // Focus on the civil status field if it's the first error
    isValid = false;
  }
} else {
  $('#civilStatus').removeClass('error-border'); // Remove red border
}

// Validation for occupation
if (!occupation) {
  $('#occupation-error').text('Please enter your occupation');
  $('#occupation').addClass('error-border'); // Add red border
  if (isValid) {
    $('#occupation').focus(); // Focus on the occupation field if it's the first error
    isValid = false;
  }
} else {
  $('#occupation').removeClass('error-border'); // Remove red border
}

// Validation for registered voter
if (!registeredVoter) {
  $('#registeredVoter-error').text('Please select whether you are a registered voter');
  $('#registeredVoter').addClass('error-border'); // Add red border
  if (isValid) {
    $('#registeredVoter').focus(); // Focus on the registered voter field if it's the first error
    isValid = false;
  }
} else {
  $('#registeredVoter').removeClass('error-border'); // Remove red border
}

// Validation for contact number
if (!contactNumber) {
  $('#contactNumber-error').text('Please enter your contact number');
  $('#contactNumber').addClass('error-border'); // Add red border
  if (isValid) {
    $('#contactNumber').focus(); // Focus on the contact number field if it's the first error
    isValid = false;
  }
} else {
  $('#contactNumber').removeClass('error-border'); // Remove red border
}

// Validation for household number
if (!householdNumber) {
  $('#householdNumber-error').text('Please enter your household number');
  $('#householdNumber').addClass('error-border'); // Add red border
  if (isValid) {
    $('#householdNumber').focus(); // Focus on the household number field if it's the first error
    isValid = false;
  }
} else {
  $('#householdNumber').removeClass('error-border'); // Remove red border
}

// Add validation for other fields similarly

// If all fields are valid, proceed
if (isValid) {
  $.ajax({
    url:"formadd.php",
    method:"post",
    data:data,
    success:function(result){

      if (result === "You have successfully filled up the form") {
        setInterval(function(){
          window.location.href="profile.php";

        },1000)
      }
    },
  });
}
}
});
  </script>
  <script src="forms.js"></script>
</body>

</html>
