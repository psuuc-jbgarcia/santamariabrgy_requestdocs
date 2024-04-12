$(document).ready(function() {
    // Track button click event
    $("#track-btn").click(function() {
        
        // Get the selected document type
        var documentType = $("#document-type-select").val();

        // Get the tracking ID input value
        var trackingId = $("#tracking-id-input").val().trim();

        // Perform tracking based on the selected document type
        switch (documentType) {
            case "business":
                trackPermitDocument(trackingId);
                break;
            case "clearance":
                trackClearanceDocument(trackingId);
                break;
            case "indigency":
                trackIndigencyDocument(trackingId);
                break;
            case "residency":
                trackResidencyDocument(trackingId);
                break;
            default:
                alert("Invalid document type selected.");
        }
    });

    function trackPermitDocument(trackingId) {
$.get("./user_dashboard/track_business_document.php?tid="+trackingId,function(data,status){
    $("#tracking-info").html(data);

});
    }

function trackClearanceDocument(trackingId) {
    $.get("./user_dashboard/track_clearance_document.php?tid="+trackingId ,function(data,status) {

            $("#tracking-info").html(data);
       
    });
        
}

    function trackIndigencyDocument(trackingId) {
      

$.get("./user_dashboard/track_indigency_document.php?tid="+trackingId,function(data,status){
    $("#tracking-info").html(data);

});
   }

    function trackResidencyDocument(trackingId) {
    
        $.get("./user_dashboard/track_residency_document.php?tid="+trackingId,function(data,status){
            $("#tracking-info").html(data);
        
        });
    }
});
