$(document).ready(function () {
    $('#submit').click(function () {
        $(".container222").css("display", "flex");
    });
});
$(document).ready(function () {
    $('#submitlogout').click(function () {
        $('#logoutModal').hide(); 
        $(".container222").css("display", "flex");
    });
});
$(document).ready(function () {
    $('.btn-danger').click(function () {
        $(".container222").css("display", "flex");
    });
});
$(document).ready(function() {
    $("#field").keyup(function() {
        $("#field").val(this.value.match(/[0-9]*/));
    });
    $("#field2").keyup(function() {
        $("#field2").val(this.value.match(/[0-9]*/));
    });
  });
