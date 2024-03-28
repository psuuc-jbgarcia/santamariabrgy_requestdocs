$(function(){
    loadthebusiness();
    loadtheclearance();
    loadtheindigency();
    loadtheresidency();
    loadusers();
    loadthesuggestion();
    function loadthesuggestion(){
                $("#suggestions-tab").load('fetch_suggestion.php');
                }
  function loadusers(){
                $("#user-management-tab").load('fetch_users.php');
                }
function loadtheclearance(){
$("#brgy-clearance-tab").load('fetch_clearancerequest.php');
}
function loadthebusiness(){
    $("#business-permit-tab").load('fetch_businessrequest.php');
    }
    function loadtheindigency(){
        $("#indigency-tab").load('fetch_indigencyrequest.php');
        }
        function loadtheresidency(){
            $("#residency-cert-tab").load('fetch_residencyrequest.php');
            }
            function loadthesuggestion(){
                        $("#suggestions-tab").load('fetch_suggestion.php');
                        }
           
            
});



