$(document).ready(function() {
    $("#field").keyup(function() {
        $("#field").val(this.value.match(/[0-9]*/));
    });
    $("#field2").keyup(function() {
        $("#field2").val(this.value.match(/[0-9]*/));
    });
  });

$(function () {
    $(document).ready(function () {
        $('#submit-button-save').click(function (e) {
            e.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var formData = new FormData(document.getElementById("data"));
            $.ajax({
                url: "http://localhost:8000/api/admin/clients/add",
                type: "POST",
                data:formData,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("#loading-image").show();
                },
                success: function () {
                    window.location.replace('http://localhost:8000/admin/clients');
                },
                error: function () {
                    alert('Houve um erro ao salvar seu cliente, por favor verifique as informações fornecidades e tente novamente!');
                    formData = "";
                    $("#loading-image").hide();
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
                url: "http://localhost:8000/api/admin/clients/edit",
                type: "POST",
                data:formData,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("#loading-image").show();
                },
                success: function () {
                    window.location.replace('http://localhost:8000/admin/clients');
                },
                error: function () {
                    alert('Houve um erro ao salvar seu cliente, por favor verifique as informações fornecidades e tente novamente!');
                    formData = "";
                    $("#loading-image").hide();
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
        $('#submit-button-search-cpf').click(function (e) {
            e.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var formData = new FormData(document.getElementById("data2"));
            var value = document.getElementById("field2").value;
            $.ajax({
                url: "http://localhost:8000/api/admin/clients/search-cpf",
                type: "POST",
                data:formData,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("#loading-image").show();
                },
                success: function () {
                    window.location.replace('http://localhost:8000/admin/tasks-add-cpf-'+value);
                },
                error: function () {
                    alert('Houve um erro ao pesquisar seu cliente, por favor verifique as informações fornecidades e tente novamente!');
                    formData = "";
                    $("#loading-image").hide();
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
        $('#submit-button-search-name').click(function (e) {
            e.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var formData = new FormData(document.getElementById("data"));
            var value = document.getElementById("name").value;
            $.ajax({
                url: "http://localhost:8000/api/admin/clients/search-name",
                type: "POST",
                data:formData,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("#loading-image").show();
                },
                success: function () {
                    window.location.replace('http://localhost:8000/admin/clients-list-name-'+value);
                },
                error: function () {
                    alert('Cliente não encontrado, por favor verifique as informações fornecidades e tente novamente!');
                    formData = "";
                    $("#loading-image").hide();
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
        $('#submit-button-initial-search').click(function (e) {
            e.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var value = document.getElementById("data-name").value;
            var formData = new FormData(document.getElementById("my-form"));
            $.ajax({
                url: "http://localhost:8000/api/admin/clients/search-name",
                type: "POST",
                data:formData,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("#loading-image").show();
                },
                success: function () {
                    window.location.replace('http://localhost:8000/admin/clients-list-initial-'+value);
                },
                error: function () {
                    alert('Cliente não encontrado, por favor verifique as informações fornecidades e tente novamente!');
                    formData = "";
                    $("#loading-image").hide();
                }
            });
        });
    });
});