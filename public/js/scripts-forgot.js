$(document).ready(function () {
    $('#recuperar').click(function (e) {
        e.preventDefault();
        var email = document.getElementById("exampleInputEmail").value;
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/api/admin-forgot',
            data: {
                'email': email
            },
            cache: false,
            beforeSend: function () {
                $("#loading-image").show();
            },
            success: function () {
                alert("Foi enviado um email com a instruções verifique em sua caixa de entrada ou spam!");
                window.location.replace('http://localhost:8000/admin');
            },
            error: function () {
                $("#loading-image").hide();
                alert("Verifique os dados digitados e tente novamente!");
            }
        });
    });
});



$(document).ready(function () {
    $('#recuperar-sent').click(function (e) {
        e.preventDefault();
        var password = document.getElementById("exampleInputPassword").value;
        var id = document.getElementById("id").value;
        var recov = document.getElementById("recov").value;
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/api/admin-forgot-set',
            data: {
                'password': password,
                'id': id,
                'recov' :recov,
            },
            cache: false,
            beforeSend: function () {
                $("#loading-image").show();
            },
            success: function () {
                alert("Sua senha foi resetada com sucesso!");
                window.location.replace('http://localhost:8000/admin');
            },
            error: function (data) {
                console.log(data);
                $("#loading-image").hide();
                alert("Houve um erro ao salvar!");
            }
        });
    });
});