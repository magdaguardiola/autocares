//magdalena rios

//función reloj , nos crea la fecha y la hora en la pagina
function reloj() {
  var reloj = document.getElementById('reloj');
  var fecha = document.getElementById('fecha');

  fecha.innerHTML = moment().format('D / MMMM / YYYY');
  reloj.innerHTML = moment().format('h:mm:ss'); 
  setTimeout('reloj()',1000);
}
reloj();


