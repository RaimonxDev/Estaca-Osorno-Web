"use strict";

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }

jQuery(document).ready(function ($) {
  //slider
  $('.slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    adaptiveHeight: true,
    arrows: true // autoplay: true,

  });
  var now = moment().format('MMMM'),
      mes_actual = "#mes_".concat(now),
      mes_actual_menu = "#".concat(now.charAt(0).toUpperCase() + now.slice(1)); //Calendario
  //oculta todos las acitividades de los meses. exepto el mes actual

  $('#calendario__mes > div').not(mes_actual).hide(); //añadir active al mes actual en el menu

  $(mes_actual_menu).addClass('active');
  $('.menu__calendario a').on('click', function () {
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
  $();
}); //ready

(function () {
  document.addEventListener('DOMContentLoaded', function () {
    // Funcion lazy para las imagenes y animacion para los posts 
    var images = _toConsumableArray(document.querySelectorAll('.lazy'));

    var articles = _toConsumableArray(document.querySelectorAll('.article-load'));

    var interactSettings = {
      rootMargin: '0px 0px 200px 0px',
      threshold: 0
    };

    function onIntersection(entries) {
      entries.forEach(function (entry) {
        if (entry.target.tagName === 'IMG') {
          if (entry.isIntersecting) {
            observer.unobserve(entry.target);
            entry.target.src = entry.target.dataset.src;

            entry.target.onload = function () {
              return entry.target.classList.add('animated', 'img-loaded');
            };
          }
        }

        if (entry.target.tagName === 'ARTICLE') {
          if (entry.isIntersecting) {
            observer.unobserve(entry.target);
            entry.target.classList.add('animated', 'article-loaded');
          }
        }
      });
    }

    var observer = new IntersectionObserver(onIntersection, interactSettings);
    images.forEach(function (image) {
      return observer.observe(image);
    });
    articles.forEach(function (article) {
      return observer.observe(article);
    }); // Navbar 

    var navbar = document.getElementById("wrapper-navbar"); // Get the offset position of the navbar

    var sticky = navbar.offsetTop; // añade position fixed

    window.onscroll = function () {
      return ADD_FIXED();
    };

    var ADD_FIXED = function ADD_FIXED() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky");
      } else {
        navbar.classList.remove("sticky");
      }
    }; // Headroom 


    var header = new Headroom(document.querySelector("#wrapper-navbar"), {
      tolerance: 2,
      offset: 300,
      "classes": {
        "initial": "animated",
        "pinned": "slideDown",
        "unpinned": "slideUp"
      }
    });
    header.init(); // </> Headroom
    //añadir clases a CMB2 en pagina entrevistas 

    var nombreMiembro = document.getElementById('nombre_del_miembro');

    if (nombreMiembro) {
      var unidadMiembro = document.getElementById('unidad_miembro'),
          telefonoMiembro = document.getElementById('telefono_miembro'),
          motivoEntrevista = document.getElementById('motivo_para_entrevista'),
          informacionExtra = document.getElementById('informacion_extra'),
          btnSolicitarEntrevista = document.querySelector('.button-primary');
      nombreMiembro.classList.add('form-control');
      unidadMiembro.classList.add('form-control');
      telefonoMiembro.classList.add('form-control');
      motivoEntrevista.classList.add('form-control');
      informacionExtra.classList.add('form-control');
      btnSolicitarEntrevista.classList.add('btn');
      btnSolicitarEntrevista.classList.add('btn-success');
    } // CONTADOR


    var obtenerFechaRestante = function obtenerFechaRestante(fechaEvento) {
      var now = moment(),
          remainTime = (moment(fechaEvento, "DD-MM-YYYY HH-mm") - now + 1000) / 1000,
          remainSeconds = ('0' + Math.floor(remainTime % 60)).slice(-2),
          remainMinutes = ('0' + Math.floor(remainTime / 60 % 60)).slice(-2),
          remainHours = ('0' + Math.floor(remainTime / 3600 % 24)).slice(-2),
          remainDays = Math.floor(remainTime / (3600 * 24));
      return {
        remainSeconds: remainSeconds,
        remainMinutes: remainMinutes,
        remainHours: remainHours,
        remainDays: remainDays,
        remainTime: remainTime
      };
    };

    var countdown = function countdown(fechaEvento, elem, finalMessage) {
      var el = document.getElementById(elem);
      var timerUpdate = setInterval(function () {
        // llamada a funcion getRemai
        var time = obtenerFechaRestante(fechaEvento),
            class_color = 'text-warning',
            class_numero = 'contador-numero',
            class_texto = 'h5';
        el.innerHTML = "\n        <h1 class=\"h4 pb-1\">\xBFCu\xE1nto Falta?</h1>\n        <div class=\"container row flex-md-row justify-content-center \n        align-items-center contador\">\n          \n          <div class=\"col-6 col-md-3\">\n            <p class=\"number ".concat(class_color, " ").concat(class_numero, "\">").concat(time.remainDays, "</p>\n            <p class=\"text-primary ").concat(class_texto, "\">Dias</p>\n          </div> \n          \n          <div class=\"col-6 col-md-3\">\n            <p class=\"number ").concat(class_color, " ").concat(class_numero, "\">").concat(time.remainHours, "</p>\n            <p class=\"text-primary ").concat(class_texto, " \">Horas</p>\n          </div>\n          \n          <div class=\"col-6 col-md-3 pt-3 pt-md-0\">\n            <p class=\"number ").concat(class_color, " ").concat(class_numero, "\">").concat(time.remainMinutes, "</p>\n            <p class=\"text-primary ").concat(class_texto, "\">Minutos</p>\n          </div>\n          \n          <div class=\"col-6 col-md-3 pt-3 pt-md-0\">\n            <p class=\"number ").concat(class_color, " ").concat(class_numero, "\">").concat(time.remainSeconds, "</p>\n            <p class=\"text-primary ").concat(class_texto, "\">Segundos</p>\n          </div>\n        \n        </div>");

        if (time.remainTime <= 1) {
          clearInterval(timerUpdate);
          el.innerHTML = finalMessage;
        }
      }, 1000);
    }; // seleccionamos todos los elementos con la clase fecha-eventos-js


    var eventDate = document.querySelectorAll('.fecha-eventos-js'); //  trasnformamos el NodeList a un array

    var allDate = Array.from(eventDate); //  recorremos el array para obtener el data-id que tiene el id unico de los posts

    allDate.forEach(function (date) {
      var eventId = date.dataset.dateId,
          eventText = "event-".concat(eventId),
          fechaProximoEvento = document.getElementById(eventText).textContent,
          horaProximoEvento = document.getElementById("event-hours-".concat(eventId)).textContent.slice(0, 5),
          showCountdown = "cuentaRegresiva-".concat(eventId); //contador 

      countdown("".concat(fechaProximoEvento, " ").concat(horaProximoEvento), showCountdown, '¡Ya empezó!');
    });
    var TITULO_SOLICITUDES = document.getElementById('titulo-formulario');
    TITULO_SOLICITUDES.classList.add('alert');
    TITULO_SOLICITUDES.classList.add('alert-info', 'h3');
  }); //content-loaded
})();