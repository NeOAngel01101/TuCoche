function gestionarErroresuser(input, errores) {
    let errors = false;
    input = $(input);
    if (typeof errores !== typeof undefined) {
        input.removeClass("is-invalid");
        input.addClass("is-invalid");
        input.nextAll(".valid-feedback").remove();
        for (let error of errores) {
            input.after(`<div class="invalid-feedback"><strong>${error}</strong></div>`);
        }
        errors = true;
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        input.nextAll(".invalid-feedback").remove();
    }
    console.log(errors);
    return errors;
}

function validateTargett(target) {
    let formData = new FormData();
    let input = (event.target);

    formData.append(input.id, input.value);
    $(target).parent().next(".spinner").addClass("loader");
    axios.post('/register/validar',
        formData
    ).then(function (response) {
        $(target).parent().next(".spinner").removeClass("loader");
        switch (input.id) {
            case "tipo":
                gestionarErroresuser(target, response.data.tipo);
                break;
            case "username":
                gestionarErroresuser(target, response.data.username);
                break;
            case "name":
                gestionarErroresuser(target, response.data.name);
                break;
            case "apellido":
                gestionarErroresuser(target, response.data.apellido);
                break;
            case "email":
                gestionarErroresuser(target, response.data.email);
                break;
            case "password":
                gestionarErroresuser(target, response.data.password);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}
function asociarValidacionUser() {
    $("#tipo, #username, #name, #apellido, #email ,#password ").on('change', function (e) {
        validateTargett(e.target)
    });

    $("#registrouser").click(function (e) {
        e.preventDefault();
        let submit = true;
        let formData = new FormData;
        formData.append('tipo', $("#tipo").val());
        formData.append('username', $("#username").val());
        formData.append('name', $("#name").val());
        formData.append('apellido', $("#apellido").val());
        formData.append('email', $("#email").val());
        formData.append('password', $("#password").val());


        axios.post('/register/validar', formData)
            .then(function (response) {
                if (gestionarErroresuser("#tipo", response.data.tipo)) {
                    submit = false;
                }

                if (gestionarErroresuser("#username", response.data.username)) {
                    submit = false;
                }

                if (gestionarErroresuser("#name", response.data.name)) {
                    submit = false;
                }

                if (gestionarErroresuser("#apellido", response.data.apellido)) {
                    submit = false;
                }

                if (gestionarErroresuser("#email", response.data.email)) {
                    submit = false;
                }

                if (gestionarErroresuser("#password", response.data.password)) {
                    submit = false;
                }

                if (submit === true){
                    $("#userform").submit();
                }
            });
    });
}
$(function () {
    asociarValidacionUser();
});
