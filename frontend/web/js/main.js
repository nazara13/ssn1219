/*$(function(){
	alert('sasasaasas');
});*/

$(function(){
	$('#modalButton').click(function(){
		$('#modal').modal('show')
		.find('#modalContent')
		.load($(this).attr('value'));
	});
});

$(function () {
	$('.update-modal-click').click(function(){
		$('#update-modal').modal('show')
		.find('#updateModalContent')
		.load($(this).attr('value'));
	});
});

$("#activity-create-link").click(function(e) {
    $.get(
        "create",
        function (data)
        {
            $("#activity-modal").find(".modal-body").html(data);
            $(".modal-body").html(data);
            $(".modal-title").html("createModal");
            $("#activity-modal").modal("show");
        }
    );
});
$(".activity-view-link").click(function(e) {
    var fID = $(this).closest("tr").data("key");
    $.get(
        "view",
        {
            id: fID
        },
        function (data)
        {
            $("#activity-modal").find(".modal-body").html(data);
            $(".modal-body").html(data);
            $(".modal-title").html("viewModal");
            $("#activity-modal").modal("show");
        }
    );
});
$(".activity-update-link").click(function(e) {
    var nks = $(this).closest("tr").data("key");
    $.get(
        "update",
        {
            id: nks
        },
        function (data)
        {
            $("#activity-modal").find(".modal-body").html(data);
            $(".modal-body").html(data);
            $(".modal-title").html("updateModal");
            $("#activity-modal").modal("show");
        }
    );
});