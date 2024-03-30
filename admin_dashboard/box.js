$(document).ready(function() {
    // Fetch user count
    $.get('fetchdata.php', function(data) {
        $('#userCount').text(data.users || 0);
        $('#brgyClearanceCount').text(data.clearance || 0);
        $('#businessPermitCount').text(data.permit || 0);
        $('#indigencyCount').text(data.indigency || 0);
        $('#residencyCount').text(data.residency || 0);
    });

    // Fetch total revenue
    $.get('fetch_revenue.php', function(data) {
        var totalRevenue = 0;
        for (var month in data) {
            totalRevenue += parseFloat(data[month]);
        }
        $('#totalRevenue').text(totalRevenue || 0);
    });
});
