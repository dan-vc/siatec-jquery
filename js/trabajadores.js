const projectRootUrl = 'trabajadores/';

$(document).ready(function () {

    console.log('Jquery installed');

    let editar = false;

    $('#resultado-trabajador').hide();

    obtenerTrabajadores();

    $('#search-trabajador').keyup(e => {

        if ($('#search-trabajador').val() === '') {

            $('#resultado-trabajador').hide();

        } else {

            let search = $('#search-trabajador').val();

            $.ajax({
                url: projectRootUrl + 'buscar-trabajador.php',
                type: 'POST',
                data: { search },
                success: function (response) {
                    //    console.log(response);

                    let trabajadores = JSON.parse(response);
                    console.log(trabajadores);

                    let plantilla = '';

                    if (trabajadores.length === 0) {
                        plantilla = 'No hay resultados';
                    } else {
                        trabajadores.forEach(trabajador => {
                            plantilla += `<li>
                        ${trabajador.nombre}
                    </li>`
                        })
                    };

                    $('#resultado-container').html(plantilla);
                    $('#resultado-trabajador').show();
                }
            });
        }
    })

    $('#trabajadores-form').submit(e => {
        e.preventDefault();

        if ($('#nombre').val() === '' || $('#direccion').val() === '' || $('#email').val() === '' || $('#telefono').val() === '') {
            alert('Los campos no pueden estar vacios')
        } else {
            const postData = {
                nombre: $('#nombre').val(),
                direccion: $('#direccion').val(),
                email: $('#email').val(),
                telefono: $('#telefono').val(),
                trabajadorId: $('#trabajadorId').val()
            };

            console.log(postData)

            let url = editar === false ? 'agregar-trabajador.php' : 'editar-trabajador.php'

            $.post(projectRootUrl + url, postData, function (response) {

                obtenerTrabajadores();

                $('#trabajadores-form').trigger('reset');
            });
        }


    })

    $(document).on('click', '.eliminartrabajadores', function () {

        if (confirm('Esta seguro de querer eliminar?')) {

            let elemento = $(this)[0].parentElement.parentElement;

            let id = $(elemento).attr('trabajadorId');

            $.post(projectRootUrl + 'eliminar-trabajador.php', { id }, function (response) {
                obtenerTrabajadores();
            });
        }
    });

    $(document).on('click', '.editartrabajadores', function () {

        console.log('editando');

        let elemento = $(this)[0].parentElement.parentElement;

        let id = $(elemento).attr('trabajadorId');

        $.post(projectRootUrl + 'encontrar-trabajador.php', { id }, function (response) {

            const trabajador = JSON.parse(response);

            $('#nombre').val(trabajador.nombre);
            $('#direccion').val(trabajador.direccion);
            $('#email').val(trabajador.correo_electronico);
            $('#telefono').val(trabajador.telefono);
            $('#trabajadorId').val(trabajador.id);

            editar = true;
            obtenerTrabajadores();
        });
    });

    function obtenerTrabajadores() {

        $.ajax({

            url: projectRootUrl + 'listar-trabajador.php',
            type: 'GET',
            success: function (response) {
                let trabajadores = JSON.parse(response);
                let plantilla = '';
                trabajadores.forEach(trabajador => {
                    plantilla += `
                 <tr trabajadorId="${trabajador.id}">
                     <td>${trabajador.id}</td>
                     <td><a href="#" class="editartrabajadores">${trabajador.nombre}</td>
                     <td>${trabajador.direccion}</td> 
                     <td>${trabajador.correo_electronico}</td> 
                     <td>${trabajador.telefono}</td> 
                     <td><button class="eliminartrabajadores btn btn-danger">Eliminar</button></td>                    
                 </tr>`
                });

                $('#trabajadores').html(plantilla);

            }
        })
    }

})