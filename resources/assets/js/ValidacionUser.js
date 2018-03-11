function gestionarErrores(input, errores) {
    let errors = false;
    input = $(input);
    if (typeof errores !== typeof undefined) {
        input.removeClass("is-invalid");
        input.addClass("is-invalid");
        input.nextAll(".valid-feedback").remove();
        for (let error of errores) {
            input.after(`<div class="invalid-feedback"><strong> ${error} </strong></div>`);
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

function validateTarget(target) {
    let formData = new FormData();
    let input = (event.target);

    formData.append(input.id, input.value);
    axios.post('/register/validar',
        formData
    ).then(function (response) {
        switch (input.id) {
            case "tipo":
                gestionarErrores(target, response.data.tipo);
                break;
            case "username":
                gestionarErrores(target, response.data.username);
                break;
            case "name":
                gestionarErrores(target, response.data.name);
                break;
            case "apellido":
                gestionarErrores(target, response.data.apellido);
                break;
            case "email":
                gestionarErrores(target, response.data.email);
                break;
            case "password":
                gestionarErrores(target, response.data.password);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

$(function () {
    $("#tipo, #username, #name, #apellido, #email ,#password ").on('change', function (e) {
        validateTarget(e.target)
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
                if (gestionarErrores("#tipo", response.data.tipo)) {
                    submit = false;
                }

                if (gestionarErrores("#username", response.data.username)) {
                    submit = false;
                }

                if (gestionarErrores("#name", response.data.name)) {
                    submit = false;
                }

                if (gestionarErrores("#apellido", response.data.apellido)) {
                    submit = false;
                }

                if (gestionarErrores("#email", response.data.email)) {
                    submit = false;
                }

                if (gestionarErrores("#password", response.data.password)) {
                    submit = false;
                }

                if (submit === true){
                    $("#userform").submit();
                }
            });
    });
});