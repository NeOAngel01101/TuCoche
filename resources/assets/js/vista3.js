function modificarPassword(e){
    e.preventDefault();

    let enlace = $(e.target);
    let valor = enlace.text();

    $(e.target).addClass("active");
    axios.get('/profile/modificarpassword?vista='+valor)
        .then(function(response){
            $("#cambio").html(response.data);
        }).catch(function (error) {
        console.log(error);
    });
}



function asociarVistasAsincrono(){
    $("#botonmodificarpassword").on("click",modificarPassword);
}

$(function(){
    asociarVistasAsincrono();
});