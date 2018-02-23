$('#start_date').datetimepicker({format: 'YYYY-MM-DD HH:mm:ss'});
$('#end_date').datetimepicker({format: 'YYYY-MM-DD HH:mm:ss'});
function showPreview(objFileInput) {
    if (objFileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
            $("#targetLayer").html('<img src="'+e.target.result+'" width="200px" height="200px" class="upload-preview" />');
            $("#targetLayer").css('opacity','0.7');
            $(".icon-choose-image").css('opacity','0.5');
        }
        fileReader.readAsDataURL(objFileInput.files[0]);
    }
}

