$(document).ready(function() {

   
    $('.registrarse').click(function(event) {

        event.preventDefault();
        link('/testreference1.1/home/cargarUniversidades', '.central2');
    });

     $('#img').click(function(event) {

        event.preventDefault();
        link('/testreference1.1/home/cargarSemestres', '.central2');
    });

    $('#perfil').click(function(event) {

        event.preventDefault();
        link('/testreference1.1/vistas/perfil.php', '.central2');
    });
     
     $('.btnLogin').click(function(event) {
         
        alert("Entro");
         
        var username = document.getElementById("usernameL").value;
        var contrasenia = document.getElementById("contraseniaL").value;
        
        if( username=="" || username==null || contrasenia=="" || contrasenia==null)
        {
          alert("Por favor ingrese datos validos!");
        }else{
        
           $.ajax({
                url: "/testreference1.1/home/login",
                type: "POST",
                 data:{
                        username: username,
                        contrasenia: contrasenia
                },
                success: function(data){
                    alert("Bien");
                    location.href =data;
                }
            });
           // location.reload(true); 
            //location.href = "/testreference1.1/";
        }     
    }); // cierro evento btnLogin


    $('#universidades').click(function(event) {

       event.preventDefault();

        $.ajax({
                url: "/testreference1.1/home/getUs",
                type: "POST",
                dataType: "html",
                success: function(data){
                   $('.central2').html(data);
                }
        });
    });

    $('#perfil').click(function(event) {
        // body...

        $.ajax({                
                
                url: "/testreference1.1/home/verPerfil",
                type: "POST",
                dataType: "JSON",
                success: function(data){

                    $('#nombreUsuario').text(data.name);
                    $('#apellidosUsuario').text(data.lastname);
                    $('#nombreUniversidad').text(data.nameU);
                    $('#nombrePrograma').text(data.nameP);
                }
            });

    });
     
});

var auxU = function (objeto){
  var uni = objeto;
     
        $.ajax({
                url: "/testreference1.1/home/getProgramas",
                type: "POST",
                dataType: "html",
                data: {
                        universidad: uni
                },
                success: function(data){
                   $('.central2').html(data);
                }
        });
};

var auxP = function (objeto){
  var prog = objeto;
        
        $.ajax({
                url: "/testreference1.1/home/getSemestres",
                type: "POST",
                dataType: "html",
                data: {
                        programa: prog
                },
                success: function(data){
                   $('.central2').html(data);
                }
        });
};

var auxS = function (objeto){
  var semes = objeto;
        
        $.ajax({
                url: "/testreference1.1/home/getEspacios",
                type: "POST",
                dataType: "html",
                data: {
                        semestre: semes
                },
                success: function(data){
                   $('.central2').html(data);
                }
        });
};

var auxA = function (objeto){
  var espacios = objeto;
        
        $.ajax({
                url: "/testreference1.1/home/getArchivos",
                type: "POST",
                dataType: "html",
                data: {
                        espacios: espacios
                },
                success: function(data){
                   $('.central2').html(data);
                }
        });
};

var auxI = function (objeto){
  var archivo = objeto;

        link('/testreference1.1/vistas/Imagenes.php', '.central2');
        $.ajax({
                url: "/testreference1.1/home/getImagen",
                type: "POST",
                dataType: "JSON",
                data: {
                        archivo: archivo
                },
                success: function(data){
                   alert(data.ruta);
                    $("#imgd").attr("src",data.ruta);
                }
        });
};
var auxUC = function (objeto){
  
  var uni = objeto;
        
        $.ajax({                
                
                url: "/testreference1.1/home/cargarProgramas",
                type: "POST",
                data: {
                        universidad: uni
                },

                success: function(data){

                    $("#cmbPrograma").empty();
                    $("#cmbPrograma").append(data);
                }
            });
};

var auxSC = function (objeto){
  
  var semestre = objeto;
        
        $.ajax({                
                
                url: "/testreference1.1/home/cargarEspacios",
                type: "POST",
                data: {
                        semestre: semestre
                },
                success: function(data){

                    $("#cmbEspacioA").empty();
                    $("#cmbEspacioA").append(data);
                }
            });
};

var auxPC = function (objeto){
  
  var espacio = objeto;
        
        $.ajax({                
                
                url: "/testreference1.1/home/cargarProfesores",
                type: "POST",
                data: {
                        espacio: espacio
                },
                success: function(data){

                    $("#cmbProfesor").empty();
                    $("#cmbProfesor").append(data);
                }
            });
};

function loginU(username,contrasenia){

        if( username=="" || username==null || contrasenia=="" || contrasenia==null)
        {
          alert("Ingrese datos Validos");
        }else{

      $.ajax({
            url: "/testreference1.1/home/login",
            type: "POST",
            data: {
                    username: username,
                    pass: contrasenia
            },
            dataType: "JSON",
            success: function(respuesta){
                alert(respuesta);
                document.reload();
            }
        }); 
    }   

}

function link(url, update) {

    $.ajax({
        url: url,

        type: 'POST',
        dataType: 'html',
        success: function(respuesta)
        {
            
                $(update).html(respuesta);
                document.reload();
        }
    });

}