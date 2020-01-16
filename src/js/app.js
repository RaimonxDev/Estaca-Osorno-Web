jQuery(document).ready(function($){

  //slider

  $('.slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    adaptiveHeight: true,
    arrows : true
    // autoplay: true,
    
  });

  let now = moment().format('MMMM'),
      mes_actual = `#mes_${now}`,
      mes_actual_menu = `#${now.charAt(0).toUpperCase() + now.slice(1)}`;

  //Calendario
    //oculta todos las acitividades de los meses. exepto el mes actual
  $('#calendario__mes > div').not(mes_actual).hide();
    //añadir active al mes actual en el menu
  $(mes_actual_menu).addClass('active');

    
  $('.menu__calendario a').on('click', function() {
      jQuery('#main .menu__calendario li').removeClass('active');
      jQuery(this).parent().addClass('active');

      var enlace = $(this).attr('href');

      $('#calendario__mes > div').hide();
      $(enlace).fadeIn();
      return false;
  });
  
  $("#unidad_miembro").prepend('<option value="Elegir">Seleccionar</option>');
  $("#unidad_miembro option[value='']").remove();
  
  $("#motivo_para_entrevista").prepend('<option value="Elegir">Seleccionar</option>');
  $("#motivo_para_entrevista option[value='']").remove();

  
  
  
  $()
  });//ready

(function(){

    document.addEventListener('DOMContentLoaded', ()=>{
      
    // Funcion lazy para las imagenes   
    let images = [...document.querySelectorAll('.lazy')];
  
    const interactSettings = {
      root: document.querySelector('.center'),
      rootMargin: '0px 0px 200px 0px' };
    
    
    function onIntersection(imageEntites) {
      imageEntites.forEach(image => {
        if (image.isIntersecting) {
          observer.unobserve(image.target);
          image.target.src = image.target.dataset.src;
          image.target.onload = () => image.target.classList.add('loaded');
        }
      });
    }
    
    let observer = new IntersectionObserver(onIntersection, interactSettings);
    
    images.forEach(image => observer.observe(image));
  

    // Libreria ScrollOut 
    ScrollOut({
        once : true
    });
  
    
    
    // Navbar 
    
    
    let navbar = document.getElementById("wrapper-navbar");
    // Get the offset position of the navbar
    let sticky = navbar.offsetTop;
    
    // añade position fixed
  window.onscroll = ()=> ADD_FIXED();
  
  const ADD_FIXED = () => {
    if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  }
   else {
    navbar.classList.remove("sticky");
  }} 
    // Headroom 
    let header = new Headroom(document.querySelector("#wrapper-navbar"), {
        tolerance: 2,
        offset : 300,
        "classes": {
          "initial": "animated",
          "pinned": "slideDown",
          "unpinned": "slideUp"
        }
    });
    header.init();
   
    // </> Headroom

    
    //añadir clases a CMB2 en pagina entrevistas 

    let nombreMiembro = document.getElementById('nombre_del_miembro')

    if(nombreMiembro){

      let unidadMiembro = document.getElementById('unidad_miembro'),
      telefonoMiembro = document.getElementById('telefono_miembro'),
      motivoEntrevista = document.getElementById('motivo_para_entrevista'),
      informacionExtra = document.getElementById('informacion_extra'),
      btnSolicitarEntrevista = document.querySelector('.button-primary')
      
      nombreMiembro.classList.add('form-control');
      unidadMiembro.classList.add('form-control');
      telefonoMiembro.classList.add('form-control');
      motivoEntrevista.classList.add('form-control');
      informacionExtra.classList.add('form-control');
      btnSolicitarEntrevista.classList.add('btn');
      btnSolicitarEntrevista.classList.add('btn-success');
    }
      
    // CONTADOR
    const obtenerFechaRestante = fechaEvento => {
      let now = moment(),
          remainTime = (moment(fechaEvento , "DD-MM-YYYY HH-mm") - now + 1000) / 1000,
          remainSeconds = ('0' + Math.floor(remainTime % 60)).slice(-2),
          remainMinutes = ('0' + Math.floor(remainTime / 60 % 60)).slice(-2),
          remainHours = ('0' + Math.floor(remainTime / 3600 % 24)).slice(-2),
          remainDays = Math.floor(remainTime / (3600 * 24));
     
       return {
        remainSeconds,
        remainMinutes,
        remainHours,
        remainDays,
        remainTime
      }
    };
    
    const countdown = (fechaEvento,elem,finalMessage) => {
      const el = document.getElementById(elem);
    
      const timerUpdate = setInterval( () => {
          // llamada a funcion getRemai
        let time = obtenerFechaRestante(fechaEvento);
        el.innerHTML = 
        
        `
        <h1 class="h4 pb-1">¿Cuánto Falta?</h1>
        <div class="container row flex-column flex-md-row justify-content-center align-items-center">
          <div class="col-12 col-md-3">
            <p class="number text-warning">${time.remainDays}</p>
            <p class="text-primary">Dias</p>
          </div> 
          
          <div class="col-12 col-md-3">
            <p class="number text-warning">${time.remainHours}</p>
            <p class="text-primary">Horas</p>
          </div>
          
          <div class="col-12 col-md-3">
            <p class="number text-warning">${time.remainMinutes}</p>
            <p class="text-primary">Minutos</p>
          </div>
          
          <div class="col-12 col-md-3">
            <p class="number text-warning">${time.remainSeconds}</p>
            <p class="text-primary">Segundos</p>
          </div>
        
        </div>`;
    
        if(time.remainTime <= 1) {
          clearInterval(timerUpdate);
          el.innerHTML = finalMessage;
        }
    
      }, 1000)
    };
  
    // seleccionamos todos los elementos con la clase fecha-eventos-js
   let eventDate = document.querySelectorAll('.fecha-eventos-js')
  //  trasnformamos el NodeList a un array
   let allDate = Array.from(eventDate)
  //  recorremos el array para obtener el data-id que tiene el id unico de los posts
   allDate.forEach(date => {
  
     let eventId= (date.dataset.dateId),
        eventText = `event-${eventId}`,
        fechaProximoEvento = document.getElementById(eventText).textContent,
        horaProximoEvento = document.getElementById(`event-hours-${eventId}`).textContent.slice(0,5),
        showCountdown = `cuentaRegresiva-${eventId}`;
      
        //contador 
      countdown(`${fechaProximoEvento} ${horaProximoEvento}`, showCountdown, '¡Ya empezó!');
       

   });
   
  const TITULO_SOLICITUDES = document.getElementById('titulo-formulario');
   TITULO_SOLICITUDES.classList.add('alert')
   TITULO_SOLICITUDES.classList.add('alert-info', 'h3')


   
}) //content-loaded
  })();  
    