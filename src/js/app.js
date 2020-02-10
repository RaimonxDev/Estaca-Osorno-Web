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
      
    // Funcion lazy para las imagenes y animacion para los posts 
    let images = [...document.querySelectorAll('.lazy')];
    let articles = [...document.querySelectorAll('.article-load')]
  
    const interactSettings = {  
      rootMargin: '0px 0px 200px 0px', 
      threshold: 0
    }
    
    function onIntersection(entries) {
      entries.forEach(entry => {
 
        if(entry.target.tagName === 'IMG') {

          if(entry.isIntersecting) {
            observer.unobserve(entry.target);
            entry.target.src = entry.target.dataset.src;
            entry.target.onload = () => entry.target.classList.add('animated','img-loaded');
          }
        }

        if (entry.target.tagName === 'ARTICLE') {
          if (entry.isIntersecting){
                observer.unobserve(entry.target)
                entry.target.classList.add('animated','article-loaded')
          }
        }

      });
    }
    
    let observer = new IntersectionObserver(onIntersection, interactSettings);
    
    images.forEach(image => observer.observe(image));
    articles.forEach(article => observer.observe(article));

    
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
        let time = obtenerFechaRestante(fechaEvento),
        class_color = 'text-warning',
        class_numero = 'contador-numero',
        class_texto = 'h5';  
        
        el.innerHTML = 
        
        `
        <h1 class="h4 pb-1">¿Cuánto Falta?</h1>
        <div class="container row flex-md-row justify-content-center 
        align-items-center contador">
          
          <div class="col-6 col-md-3">
            <p class="number ${class_color} ${class_numero}">${time.remainDays}</p>
            <p class="text-primary ${class_texto}">Dias</p>
          </div> 
          
          <div class="col-6 col-md-3">
            <p class="number ${class_color} ${class_numero}">${time.remainHours}</p>
            <p class="text-primary ${class_texto} ">Horas</p>
          </div>
          
          <div class="col-6 col-md-3 pt-3 pt-md-0">
            <p class="number ${class_color} ${class_numero}">${time.remainMinutes}</p>
            <p class="text-primary ${class_texto}">Minutos</p>
          </div>
          
          <div class="col-6 col-md-3 pt-3 pt-md-0">
            <p class="number ${class_color} ${class_numero}">${time.remainSeconds}</p>
            <p class="text-primary ${class_texto}">Segundos</p>
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

  if(TITULO_SOLICITUDES){
    TITULO_SOLICITUDES.classList.add('alert')
    TITULO_SOLICITUDES.classList.add('alert-info', 'h3')
  }

  let iconUser = `<svg class="bi bi-person-fill order--1" width="1.6em" height="1em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M5 16s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H5zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
    </svg>`;
  let iconDoc = `<svg class="bi bi-document-text order-1" width="1.6em" height="1em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M6 3h8a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2zm0 1a1 1 0 00-1 1v10a1 1 0 001 1h8a1 1 0 001-1V5a1 1 0 00-1-1H6z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M6.5 14a.5.5 0 01.5-.5h3a.5.5 0 010 1H7a.5.5 0 01-.5-.5zm0-2a.5.5 0 01.5-.5h6a.5.5 0 010 1H7a.5.5 0 01-.5-.5zm0-2a.5.5 0 01.5-.5h6a.5.5 0 010 1H7a.5.5 0 01-.5-.5zm0-2a.5.5 0 01.5-.5h6a.5.5 0 010 1H7a.5.5 0 01-.5-.5zm0-2a.5.5 0 01.5-.5h6a.5.5 0 010 1H7a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
    </svg>`


  //  agregar img a widget

  const imagenes= document.querySelectorAll('.title-widgets ul li');
  let arrayImagenes = Array.from(imagenes);
  arrayImagenes.forEach(imagen => {

    if(imagen.className === 'recentcomments'){
      imagen.classList.add('d-flex', 'align-items-center', 'flex-wrap')
      imagen.innerHTML += iconDoc;
      imagen.innerHTML += iconUser;
    }
  });

   
}) //content-loaded
  })();  
    