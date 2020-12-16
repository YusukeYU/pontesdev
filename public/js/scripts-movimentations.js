$(function () {
    $(document).ready(function () {
        $('#submit-button').click(function (e) {
            e.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var formData = new FormData(document.getElementById("data"));
            $.ajax({
                url: "http://localhost:8000/api/admin/movimentations-add",
                type: "POST",
                data:formData,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("#loading-image").show();
                },
                success: function () {
                    window.location.replace('http://localhost:8000/admin/movimentation');
                },
                error: function () {
                    $("#loading-image").hide();
                    alert('Houve um erro ao salvar, por favor verifique as informações fornecidades e tente novamente!');
                    formData = "";     
                }
            });
        });
    });
});
