completeTrip = function(trip_id){
    console.log('test');
	$.ajax({
		type: 'post',
		url: $("#route-update-trip-status").text(),
		data: {
			"trip_id": trip_id,
			"status": "completed",
		},
		headers: {
			'X-CSRF-TOKEN': $('#_token').html()
		},
		success: function(response) {
			$(".trip-status-" + trip_id).text("completed");
			$("#customSwitch" + trip_id).attr("disabled", "disabled");
		},
		error: function(e) {
			console.log(e);
		}
	});
};

calculateDistance = function(that) {
    $(".location-select-class").not(that).find("option[value="+ $(that).val() + "]").attr('disabled', true);
    var locationFrom = $("#select_from_location_id").val();
    var locationTo = $("#select_to_location_id").val();
    if (locationFrom && locationTo) {
        $.ajax({
            type: 'post',
            url: $("#route-distance-calculation").text(),
            data: {
                    "from_location_id": locationFrom,
                    "to_location_id": locationTo
                },
            headers: {
                'X-CSRF-TOKEN': $('#_token').html()
            },
            success: function(response) {
                $("#distanceBtwnLocation").val(response.distance)
            },
            error: function(e) {
                console.log(e);
            }

        });
    }
    
}