$(function () {
    $(document).ready(function () {
        $('#submit').click(function (e) {
            e.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var formData = new FormData(document.getElementById("contactForm"));
            $.ajax({
                url: "http://localhost:8000/dashboard/leads",
                type: "POST",
                data:formData,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $(".container222").css("display", "flex");
                },
                success: function () {
                    $(".container222").css("display", "none");
                    alert('Contato efetuado, aguarde o retorno.Obrigado!');
                    window.location.replace('http://localhost:8000');
                },
                error: function () {
                    $(".container222").css("display", "none");
                    alert('Por favor, verifique as informações fornecidades e tente novamente!');
                }
            });
        });
    });
});
