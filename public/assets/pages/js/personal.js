'use strict';
window.addEventListener('load', function() {
  //obtner el formulario por su clase
  var forms = document.getElementsByClassName('needs-validation');
  // crear una funcion con callback que devuelve a clase was-validated si el input esta en falso

  var validation = Array.prototype.filter.call(forms, function(form) {
    form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });

}, false);

var btnEliminar = document.getElementsByClassName("btnEliminar");

for (var i = 0; i < btnEliminar.length; i++) {
  //Añades un evento a cada elemento
  btnEliminar[i].addEventListener("click", function(e) {
    let id_cliente = e.target.getAttribute('data-id');


    Swal.fire({
      title: '¿Estás seguro de qué deseas eliminar este cliente?',
      showCancelButton: true,
      confirmButtonText: 'Eliminar',
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        fetch('./cliente/eliminarCliente/'+id_cliente, {
            method: 'GET'
          }).then(data => data.json())
          .then(data => {
            if(data.value){
              Swal.fire(data.mensaje,"Actualización Exitosa!", 'success')
              setTimeout(function () { window.location.href = './cliente' }, 3000);
            }
          })
          .catch(err => {
            Swal.fire(err, '', 'info')
          })
      }
    })

  });
}
