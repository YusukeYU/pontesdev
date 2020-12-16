$(function () {
    $(document).ready(function () {
        $('#sendMessageButton').click(function (e) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var nome = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var telefone = document.getElementById("telefone").value;
            var msg = document.getElementById("msg").value;
            // Check for white space in name for Success/Fail message
            /*
            if (firstName.indexOf(" ") >= 0) {
                firstName = name.split(" ").slice(0, -1).join(" ");
            }
            */
            $.ajax({
                url: "http://127.0.0.1:8000/api/lead",
                type: "POST",
                data: {
                    'name': nome,
                    'email': email,
                    'phone': telefone,
                    'msg': msg
                },
                cache: false,
                beforeSend: function() {
                    $("#loading-image").show();
                },
                success: function () {
                    $("#loading-image").hide();
                    // Success message
                    $("#success").html("<div class='alert alert-success'>");
                    $("#success > .alert-success")
                        .html(
                            "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
                        )
                        .append("</button>");
                    $("#success > .alert-success").append(
                        "<strong>Sua mensagem foi enviada com sucesso, aguarde o contato. </strong>"
                    );
                    $("#success > .alert-success").append("</div>");
                    //clear all fields
                    $("#contactForm").trigger("reset");
                },
                error: function (data) {
                    $("#loading-image").hide();
                    // Fail message
                    $("#success").html("<div class='alert alert-danger'>");
                    $("#success > .alert-danger")
                        .html(
                            "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
                        )
                        .append("</button>");
                    $("#success > .alert-danger").append(
                        $("<strong>").text(
                            "Senhor " +
                            nome +
                            ", por favor verifique as informações digitadas e tente novamente!"
                        )
                    );
                    $("#success > .alert-danger").append("</div>");
                }
            });
        });
    });
});

