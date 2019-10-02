$(document).ready(function(){
  let obj = {};
  $(".btn-delete").click(function() {
    let id = $(this).attr("data");
    obj = {
      accion: "deleteCanon",
      canon: id
    };
    swal({
      title: "¿Estás seguro?",
      text: "El cañón será eliminado",
      icon: "warning",
      buttons: true,
      dangerMode: true
    }).then(willDelete => {
      if (willDelete) {
        $.post(
          "/modulos/canones/consultas.php",
          obj,
          function(respuesta) {
            if (respuesta.status == 1) {
              swal("Éxito", "El cañón fue eliminado correctamente", "success").then(() => {
                cancelAlert();
                location.reload();
                //console.log("Holisss");
              });
            } else {
              errorAlert();
            }
          },
          "JSON"
        );
      }
    });
  });
});