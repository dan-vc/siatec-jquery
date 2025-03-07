const projectRootUrl = 'clientes/';

$(document).ready(function () {

    console.log('Jquery installed');

    let editar = false;

    $('#resultado-cliente').hide();

    obtenerClientes();

    $('#search-cliente').keyup(e => {

        if ($('#search-cliente').val() === '') {

            $('#resultado-cliente').hide();

        } else {

            let search = $('#search-cliente').val();

            $.ajax({
                url: projectRootUrl + 'buscar-cliente.php',
                type: 'POST',
                data: { search },
                success: function (response) {
                    //    console.log(response);

                    let clientes = JSON.parse(response);
                    console.log(clientes);

                    let plantilla = '';

                    if (clientes.length === 0) {
                        plantilla = 'No hay resultados';
                    } else {
                        clientes.forEach(cliente => {
                            plantilla += `<li>
                        ${cliente.nombre}
                    </li>`
                        })
                    };

                    $('#resultado-container').html(plantilla);
                    $('#resultado-cliente').show();
                }
            });
        }
    })

    $('#clientes-form').submit(e => {
        e.preventDefault();

        if ($('#nombre').val() === '' || $('#direccion').val() === '' || $('#email').val() === '' || $('#telefono').val() === '') {
            alert('Los campos no pueden estar vacios')
        } else {
            const postData = {
                nombre: $('#nombre').val(),
                direccion: $('#direccion').val(),
                email: $('#email').val(),
                telefono: $('#telefono').val(),
                clienteId: $('#clienteId').val()
            };

            console.log(postData)

            let url = editar === false ? 'agregar-cliente.php' : 'editar-cliente.php'

            $.post(projectRootUrl + url, postData, function (response) {

                obtenerClientes();

                $('#clientes-form').trigger('reset');
            });
        }


    })

    $(document).on('click', '.eliminarclientes', function () {

        if (confirm('Esta seguro de querer eliminar?')) {

            let elemento = $(this)[0].parentElement.parentElement;

            let id = $(elemento).attr('clienteId');

            $.post(projectRootUrl + 'eliminar-cliente.php', { id }, function (response) {
                obtenerClientes();
            });
        }
    });

    $(document).on('click', '.editarclientes', function () {

        console.log('editando');

        let elemento = $(this)[0].parentElement.parentElement;

        let id = $(elemento).attr('clienteId');

        $.post(projectRootUrl + 'encontrar-cliente.php', { id }, function (response) {

            const cliente = JSON.parse(response);

            $('#nombre').val(cliente.nombre);
            $('#direccion').val(cliente.direccion);
            $('#email').val(cliente.correo_electronico);
            $('#telefono').val(cliente.telefono);
            $('#clienteId').val(cliente.id);

            editar = true;
            obtenerClientes();
        });
    });

    function obtenerClientes() {

        $.ajax({

            url: projectRootUrl + 'listar-cliente.php',
            type: 'GET',
            success: function (response) {
                let clientes = JSON.parse(response);
                let plantilla = '';
                clientes.forEach(cliente => {
                    plantilla += `
                 <tr clienteId="${cliente.id}">
                     <td>${cliente.id}</td>
                     <td><a href="#" class="editarclientes">${cliente.nombre}</td>
                     <td>${cliente.direccion}</td> 
                     <td>${cliente.correo_electronico}</td> 
                     <td>${cliente.telefono}</td> 
                     <td><button class="eliminarclientes btn btn-danger">Eliminar</button></td>                    
                 </tr>`
                });

                $('#clientes').html(plantilla);

            }
        })
    }

})