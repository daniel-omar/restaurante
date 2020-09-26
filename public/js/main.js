var color
var href
$(document).ready(function() {
  var theme = $("#theme")
  color = localStorage.getItem("color")
  if (color != null && color != "undefined") {
    console.log(color);
    theme.attr("href", color)
  } else {
    theme.attr("href", "css/green.css")
  }

  if (window.location.href.indexOf('index') > -1) {
    //Slider
    $('.bxslider').bxSlider({
      auto: true,
      autoControls: true,
      stopAutoOnClick: true,
      pager: true,
      mode: 'fade',
      captions: true,
      responsive: true,
      adaptiveHeight: true
    });
  }

  if (window.location.href.indexOf('index') > -1) {
    //posts
    var posts = [{
        titulo: 'Prueba 1',
        fecha: 'Publicado el dia: ' + moment().date() + ' de ' + moment().format("MMMM") + ' del ' + moment().format("YYYY"),
        content: '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi metus metus'
      },
      {
        titulo: 'Prueba 2',
        fecha: 'Publicado el dia: ' + moment().format("MMMM Do YYYY"),
        content: '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi metus metus'
      },
      {
        titulo: 'Prueba 3',
        fecha: 'Publicado el dia: ' + moment().format("MMMM Do YYYY"),
        content: '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi metus metus'
      },
      {
        titulo: 'Prueba 4',
        fecha: 'Publicado el dia: ' + moment().format("MMMM Do YYYY"),
        content: '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi metus metus'
      },
      {
        titulo: 'Prueba 5',
        fecha: 'Publicado el dia: ' + moment().format("MMMM Do YYYY"),
        content: '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi metus metus'
      }
    ]

    console.log(posts);

    var pub = $("#posts")
    posts.forEach((item, i) => {
      var post = `
    <article class="post">
      <h3>${item.titulo}</h3>
      <span class="date">${item.fecha}</span>
      <p>
        ${item.content}
      </p>
      <a href="#" class="button">Leer mas</a>
    </article>
    `
      pub.append(post)
    })

  }


  //Selector de tema

  $("#to-green").click(function() {
    theme.attr("href", "css/green.css")
    href = "css/green.css"
    localStorage.setItem("color", href)
  })
  $("#to-red").click(function() {
    theme.attr("href", "css/red.css")
    href = "css/red.css"
    localStorage.setItem("color", href)
  })
  $("#to-blue").click(function() {
    theme.attr("href", "css/blue.css")
    href = "css/blue.css"
    localStorage.setItem("color", href)
  })


  //SCroll up
  $(".up").click(function(e) {
    e.preventDefult()
    $("html, body").animate({
      scrollTop: 0
    }, 500)

  })

  //Loogin falso
  var formulario = $("#formulario")

  formulario.submit(function(e) {
    e.preventDefault()
    var nombre = $("#txtNombre").val()
    var email = $("#txtEmail").val()

    var usuario = {
      nombre: nombre,
      email: email
    }
    localStorage.setItem("usuario", JSON.stringify(usuario))
    location.reload()
  })

  var usuario = localStorage.getItem("usuario")

  if (usuario != null) {
    usuario = JSON.parse(usuario);
    var about_parrado = $("#about p")
    about_parrado.html("Bienvenido:" + usuario.nombre + " " + usuario.email)
    about_parrado.append("<a href='#' id='logout'>Cerrar sesión</a>")
    $("#login").hide()

    $("#logout").click(function() {
      localStorage.clear()
      location.reload()
    })
  }


  if (window.location.href.indexOf('about') > -1) {
    //Slider
    $('#acordeon').accordion()
  }

  if (window.location.href.indexOf('reloj') > -1) {
    //Slider
    var intervalo = () => {
      var hora = setInterval(function() {
        var reloj = moment().format("hh:mm:ss")
        $("#reloj").html(reloj)
      }, 1000)
    }
    intervalo()
  }

  //Validacion
  if (window.location.href.indexOf('contacto') > -1) {
    //Slider
    $.validate({
      lang: 'es',
      errorMessagePosition:'top',
      scrollToTopOnError:true
    });
  }
})
