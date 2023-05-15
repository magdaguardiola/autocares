(function($) {
  "use strict"; //uso estricto

  // cierra responsive menu cuando se hace clic en un enlace de activación de desplazamiento
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activa scrollspy para agregar la clase activa a los elementos de la barra de navegación en scroll
  $('body').scrollspy({
   target: '#mainNav',
    offset: 75
  });

  // Collapse Navbar añadimos una clase nueva que hace que cambie de color
  var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").removeClass("navbar-scrolled");
    } else {
      $("#mainNav").addClass("navbar-scrolled");
    }
  };

  // Collapse si la página no está en la parte superior
  navbarCollapse();
  // Collapse the navbar cuando se desplaza la página
  $(window).scroll(navbarCollapse);

  

})(jQuery); 

// cojer datos de identificación y guardarlos en localstorage y compararlos con una lista
 $(function(){

  $('#logear').on('click', '#entrar', function (e) {
        e.preventDefault();
        
      var persona={ nombre:document.getElementById("nombre").value,
                     contraseña:document.getElementById("pwd").value
                   }  

        localStorage.setItem('name',JSON.stringify(persona));
        console.log(localStorage.getItem('name'));

       $.ajax('registro.json', {
           dataType: 'json',
           contentType: 'application/json',
           cache: false
           })
          .done(function(response){
            console.log(response);
            var html;
            var usuario=JSON.parse(window.localStorage.getItem('name'));
            console.log(usuario);
            console.log(usuario.nombre);
            var boolean=false;
            
            $.each(response, function(index, element){
                if(element.nombre==usuario.nombre  && element.contraseña==usuario.contraseña){
                   boolean=true;
                  }
            });
            if(boolean==true) {
              html = '<br/><h5 class="text-info"> Esta registrado </h5>';
              $('#iden').append(html);
            }
            else{
               html = '<br/><h5 class="text-info"> No esta registrado </h5>';
               $('#iden').append(html);
            }
          });
   });
 }); 
