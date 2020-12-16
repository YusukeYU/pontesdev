$(function () {
    $(document).ready(function () {
        $('#submit-button').click(function (e) {
            e.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var formData = new FormData(document.getElementById("data"));
            $.ajax({
                url: "http://localhost:8000/api/admin/portfolio-add",
                type: "POST",
                data:formData,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("#loading-image").show();
                },
                success: function () {
                    window.location.replace('http://localhost:8000/admin/portfolio');
                },
                error: function (data) {
                    $("#loading-image").hide();
                    console.log(data);
                    alert('Houve um erro ao cadastrar o projeto, por favor verifique as informações fornecidades e tente novamente!');
                    formData = "";
                }
            });
        });
    });
});

/*
**************************************************************************************************
**************************************************************************************************
*/
$(function () {
    $(document).ready(function () {
        $('#btn-alter-photo').click(function (e) {
            e.preventDefault(); 
            var formData = new FormData(document.getElementById("data"));
            $.ajax({
                url: "http://localhost:8000/api/admin/photo",
                type: "POST",
                data:formData,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("#loading-image").show();
                },
                success: function () {
                    window.location.replace('http://localhost:8000/admin/index');
                },
                error: function () {
                    $("#loading-image").hide();
                    alert('Houve um erro ao alterar sua foto, por favor verifique o arquivo fornecido e tente novamente!');
                    formData = "";
                }
            });
        });
    });
});
/*
**************************************************************************************************
**************************************************************************************************
*/
$(function () {
    $('#btn-alter-password').click(function (e) {
           e.preventDefault();
           var formData = new FormData(document.getElementById("data"));
           $.ajax({
               url: "http://localhost:8000/api/admin/password",
               type: "POST",
               data: formData,
               cache: false,
               processData: false,
               contentType: false,
               beforeSend: function() {
                $("#loading-image").show();
            },
               success: function () {
                   window.location.replace('http://localhost:8000/admin');
               },
               error: function () {
                $("#loading-image").hide();
                   alert('Houve um erro ao alterar sua senha, por favor verifique as informações digitadas e tente novamente!');
                   formData = "";
               }
           });
       });
   
   });
   /*
**************************************************************************************************
**************************************************************************************************
*/
   
   $(function () {
    $('#submit-button2').click(function (e) {
           e.preventDefault();
           var formData = new FormData(document.getElementById("data"));
           $.ajax({
               url: "http://localhost:8000/api/admin/portfolio/edit",
               type: "POST",
               data: formData,
               cache: false,
               processData: false,
               contentType: false,
               beforeSend: function() {
                $("#loading-image").show();
            },
               success: function () {
                   window.location.replace('http://localhost:8000/admin/portfolio');
               },
               error: function () {
                $("#loading-image").hide();
                   alert('Houve um erro ao alterar seu projeto por favor verifique as informações fornecidas e tente novamente!');
                   formData = "";
               }
           });
       });
   
   });
   
   


