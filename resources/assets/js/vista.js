function modificarPerfil(e){
    e.preventDefault();

    let enlace = $(e.target);
    let valor = enlace.text();

    $(e.target).addClass("active");
    axios.get('/profile/modificarPerfil?vista='+valor)
        .then(function(response){
            $("#cambio").html(response.data);
        }).catch(function (error) {
        console.log(error);
    });
}



function asociarVistasAsincrono(){
    $("#botonmodificar").on("click",modificarPerfil);

}

$(function(){
    asociarVistasAsincrono();
});

