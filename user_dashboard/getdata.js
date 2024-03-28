$(function(){
    $('#serviceModal').on('shown.bs.modal', function (e) {
        // Call the function to load data into the modal
        showDataInModalforClearance();
    });

    $('#permitModal').on('shown.bs.modal', function (e) {
        // Call the function to load data into the permit modal
        showDataInPermitModal();
    });
    $('#indigencyModal').on('shown.bs.modal', function (e) {
        // Call the function to load data into the permit modal
        showDataInIndigencyModal();
    });
    $('#residencyModal').on('shown.bs.modal', function (e) {
            showDataInResidencyModal() 
 });
 
function  showDataInModalforClearance()
{
    $("#brgyclearancebody").load("showDataForClearance.php");
}
function showDataInPermitModal() {
    $("#brgypermitbody").load("showDataForPermit.php");
}
function showDataInIndigencyModal() {
    $("#forindigency").load("showDataForIndigency.php");
}


});

     
 function showDataInResidencyModal() {
    $("#forResidencys").load("showDataForResidency.php");
}
   