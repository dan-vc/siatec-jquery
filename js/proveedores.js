const projectRootUrl = 'proveedores/';

$(document).ready(function () {

    console.log('Jquery installed');

    let editar = false;

    $('#resultado-proveedor').hide();

    obtenerProveedores();

    $('#search-proveedor').keyup(e => {

        if ($('#search-proveedor').val() === '') {

            $('#resultado-proveedor').hide();

        } else {

            let search = $('#search-proveedor').val();

            $.ajax({
                url: projectRootUrl + 'buscar-proveedor.php',
                type: 'POST',
                data: { search },
                success: function (response) {
                    //    console.log(response);

                    let proveedores = JSON.parse(response);
                    console.log(proveedores);

                    let plantilla = '';

                    if (proveedores.length === 0) {
                        plantilla = 'No hay resultados';
                    } else {
                        proveedores.forEach(proveedor => {
                            plantilla += `<li>
                        ${proveedor.nombre}
                    </li>`
                        })
                    };

                    $('#resultado-container').html(plantilla);
                    $('#resultado-proveedor').show();
                }
            });
        }
    })

    $('#proveedores-form').submit(e => {
        e.preventDefault();

        if ($('#nombre').val() === '' || $('#direccion').val() === '' || $('#email').val() === '' || $('#telefono').val() === '') {
            alert('Los campos no pueden estar vacios')
        } else {
            const postData = {
                nombre: $('#nombre').val(),
                direccion: $('#direccion').val(),
                email: $('#email').val(),
                telefono: $('#telefono').val(),
                proveedorId: $('#proveedorId').val()
            };

            console.log(postData)

            let url = editar === false ? 'agregar-proveedor.php' : 'editar-proveedor.php'

            $.post(projectRootUrl + url, postData, function (response) {

                obtenerProveedores();

                $('#proveedores-form').trigger('reset');
            });
        }


    })

    $(document).on('click', '.eliminarProveedores', function () {

        if (confirm('Esta seguro de querer eliminar?')) {

            let elemento = $(this)[0].parentElement.parentElement;

            let id = $(elemento).attr('proveedorId');

            $.post(projectRootUrl + 'eliminar-proveedor.php', { id }, function (response) {
                obtenerProveedores();
            });
        }
    });

    $(document).on('click', '.editarProveedores', function () {

        console.log('editando');

        let elemento = $(this)[0].parentElement.parentElement;

        let id = $(elemento).attr('proveedorId');

        $.post(projectRootUrl + 'encontrar-proveedor.php', { id }, function (response) {

            const proveedor = JSON.parse(response);

            $('#nombre').val(proveedor.nombre);
            $('#direccion').val(proveedor.direccion);
            $('#email').val(proveedor.correo_electronico);
            $('#telefono').val(proveedor.telefono);
            $('#proveedorId').val(proveedor.id);

            editar = true;
            obtenerProveedores();
        });
    });

    function obtenerProveedores() {

        $.ajax({

            url: projectRootUrl + 'listar-proveedor.php',
            type: 'GET',
            success: function (response) {
                let proveedores = JSON.parse(response);
                let plantilla = '';
                proveedores.forEach(proveedor => {
                    plantilla += `
                 <tr proveedorId="${proveedor.id}">
                     <td>${proveedor.id}</td>
                     <td><a href="#" class="editarProveedores">${proveedor.nombre}</td>
                     <td>${proveedor.direccion}</td> 
                     <td>${proveedor.correo_electronico}</td> 
                     <td>${proveedor.telefono}</td> 
                     <td><button class="eliminarProveedores btn btn-danger">Eliminar</button></td>                    
                 </tr>`
                });

                $('#proveedores').html(plantilla);

            }
        })
    }

})