function modificarEmail(e){
    e.preventDefault();

    let enlace = $(e.target);
    let valor = enlace.text();

    $(e.target).addClass("active");
    axios.get('/profile/modificarEmail?vista='+valor)
        .then(function(response){
            $("#cambio").html(response.data);
        }).catch(function (error) {
        console.log(error);
    });
}



function asociarVistasAsincrono(){
    $("#botonmodificaremail").on("click",modificarEmail);
}

$(function(){
    asociarVistasAsincrono();
});