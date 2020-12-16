$(document).ready(function() {
    $('#entrar').click(function(e) {
        e.preventDefault();
        var email = document.getElementById("exampleInputEmail").value;
        var senha = document.getElementById("exampleInputPassword").value;
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/api/admin',
            data: {
                'email': email,
                'password': senha
            },
            cache: false,
            beforeSend: function() {
                $("#loading-image").show();
            },
            success: function() {
                window.location.replace('http://localhost:8000/admin/index');
            },
            error: function(data) {
                console.log(data);
                $("#loading-image").hide();
                alert("Verifique os dados digitados e tente novamente!");
            }
        });
    });
});

$(document).keypress(function(e) {
    if (e.which == 13) {
        e.preventDefault();
        var email = document.getElementById("exampleInputEmail").value;
        var senha = document.getElementById("exampleInputPassword").value;
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/api/admin',
            data: {
                'email': email,
                'password': senha
            },
            cache: false,
            beforeSend: function() {
                $("#loading-image").show();
            },
            success: function() {
                  window.location.replace('http://localhost:8000/admin/index');
            },
            error: function() {
                $("#loading-image").hide();
                alert("Verifique os dados digitados e tente novamente!");
            }
        });
    }
});