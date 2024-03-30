$(function(){
    // Define functions to load different sections
    function loadBusinessPermit() {
        $("#business-permit-tab").load('fetch_businessrequest.php');
    }
    
    function loadClearance() {
        $("#brgy-clearance-tab").load('fetch_clearancerequest.php');
    }
    
    function loadIndigency() {
        $("#indigency-tab").load('fetch_indigencyrequest.php');
    }
    
    function loadResidency() {
        $("#residency-cert-tab").load('fetch_residencyrequest.php');
    }
    
    function loadUsers() {
        $("#user-management-tab").load('fetch_users.php');
    }
    
    function loadSuggestions() {
        $("#suggestions-tab").load('fetch_suggestion.php');
    }
    
    // Call the functions initially to load the content
    loadBusinessPermit();
    loadClearance();
    loadIndigency();
    loadResidency();
    loadUsers();
    loadSuggestions();
    
    // // Set up intervals to reload the content every 5 seconds
    // setInterval(loadBusinessPermit, 3000);
    // setInterval(loadClearance, 3000);
    // setInterval(loadIndigency, 3000);
    // setInterval(loadResidency, 3000);
    // setInterval(loadUsers, 3000);
    // setInterval(loadSuggestions, 3000);
});