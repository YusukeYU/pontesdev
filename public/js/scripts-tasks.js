$(function () {
    $(document).ready(function () {
        $('#find-button').click(function (e) {
            e.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var date = document.getElementById("date-data").value;
            $.ajax({
                url: "http://localhost:8000/admin/tasks-"+date,
                type: "GET",
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("#loading-image").show();
                },
                success: function () {
                    window.location.replace("http://localhost:8000/admin/tasks-"+date);
                },
                error: function () {
                    $("#loading-image").hide();
                    date = "";
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
        $('#submit-button-save').click(function (e) {
            e.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var formData = new FormData(document.getElementById("data"));
            $.ajax({
                url: "http://localhost:8000/api/admin/tasks/add",
                type: "POST",
                data:formData,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("#loading-image").show();
                },
                success: function () {
                    window.location.replace('http://localhost:8000/admin/tasks');
                },
                error: function () {
                    $("#loading-image").hide();
                    alert('Houve um erro ao salvar sua tarefa, por favor verifique as informações fornecidades e tente novamente!');
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
        $('#submit-button-edit').click(function (e) {
            e.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var formData = new FormData(document.getElementById("data"));
            $.ajax({
                url: "http://localhost:8000/api/admin/tasks/edit/",
                type: "POST",
                data:formData,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("#loading-image").show();
                },
                success: function () {
                    window.location.replace('http://localhost:8000/admin/tasks');
                },
                error: function () {
                    $("#loading-image").hide();
                    alert('Houve um erro ao salvar sua tarefa, por favor verifique as informações fornecidades e tente novamente!');
                    formData = "";
                }
            });
        });
    });
});

