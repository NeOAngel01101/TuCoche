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
    axios.post('/coches/validar',
        formData
    ).then(function (response) {
        switch (input.id) {
            case "nombre":
                gestionarErrores(target, response.data.nombre);
                break;
            case "marca":
                gestionarErrores(target, response.data.marca);
                break;
            case "year":
                gestionarErrores(target, response.data.year);
                break;
            case "repostaje":
                gestionarErrores(target, response.data.repostaje);
                break;
            case "kilometros":
                gestionarErrores(target, response.data.kilometros);
                break;
            case "cv":
                gestionarErrores(target, response.data.cv);
                break;
            case "localidad":
                gestionarErrores(target, response.data.localidad);
                break;
            case "cambio":
                gestionarErrores(target, response.data.cambio);
                break;
            case "descripcion":
                gestionarErrores(target, response.data.descripcion);
                break;
            case "precio":
                gestionarErrores(target, response.data.precio);
                break;
            case "imagen1":
                gestionarErrores(target, response.data.imagen1);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

$(function () {
    $("#nombre, #marca, #year, #repostaje, #kilometros, #cv, #localidad, #cambio, #descripcion, #precio , #imagen1").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#crearCoche").click(function (e) {
        e.preventDefault();
        let submit = true;
        let formData = new FormData;
        formData.append('nombre', $("#nombre").val());
        formData.append('marca', $("#marca").val());
        formData.append('year', $("#year").val());
        formData.append('repostaje', $("#repostaje").val());
        formData.append('kilometros', $("#kilometros").val());
        formData.append('cv', $("#cv").val());
        formData.append('localidad', $("#localidad").val());
        formData.append('cambio', $("#cambio").val());
        formData.append('descripcion', $("#descripcion").val());
        formData.append('precio', $("#precio").val());
        formData.append('imagen1', $("#imagen1").val());

        axios.post('/coches/validar', formData)
            .then(function (response) {
                if (gestionarErrores("#nombre", response.data.nombre)) {
                    submit = false;
                }

                if (gestionarErrores("#marca", response.data.marca)) {
                    submit = false;
                }

                if (gestionarErrores("#year", response.data.year)) {
                    submit = false;
                }

                if (gestionarErrores("#repostaje", response.data.repostaje)) {
                    submit = false;
                }

                if (gestionarErrores("#kilometros", response.data.kilometros)) {
                    submit = false;
                }

                if (gestionarErrores("#cv", response.data.cv)) {
                    submit = false;
                }

                if (gestionarErrores("#localidad", response.data.localidad)) {
                    submit = false;
                }

                if (gestionarErrores("#cambio", response.data.cambio)) {
                    submit = false;
                }

                if (gestionarErrores("#descripcion", response.data.descripcion)) {
                    submit = false;
                }

                if (gestionarErrores("#precio", response.data.precio)) {
                    submit = false;
                }

                if (gestionarErrores("#imagen1", response.data.imagen1)) {
                    submit = false;
                }

                if (submit === true){
                    $("#cocheForm").submit();
                }
            });
    });
});