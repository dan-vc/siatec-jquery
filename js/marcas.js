const projectRootUrl = 'marcas/';

$(document).ready(function () {

    console.log('Jquery installed');

    let editar = false;

    $('#resultado-marca').hide();

    obtenerMarcas();

    $('#search-marca').keyup(e => {

        if ($('#search-marca').val() === '') {

            $('#resultado-marca').hide();

        } else {

            let search = $('#search-marca').val();

            $.ajax({
                url: projectRootUrl + 'buscar-marca.php',
                type: 'POST',
                data: { search },
                success: function (response) {
                    //    console.log(response);

                    let marcas = JSON.parse(response);
                    console.log(marcas);

                    let plantilla = '';

                    if (marcas.length === 0) {
                        plantilla = 'No hay resultados';
                    } else {
                        marcas.forEach(marca => {
                            plantilla += `<li>
                        ${marca.nombre}
                    </li>`
                        })
                    };

                    $('#resultado-container').html(plantilla);
                    $('#resultado-marca').show();
                }
            });
        }
    })

    $('#marcas-form').submit(e => {
        e.preventDefault();

        if ($('#nombre').val() === '' || $('#descripcion').val() === '') {
            alert('Los campos no pueden estar vacios')
        } else {
            const postData = {
                nombre: $('#nombre').val(),
                descripcion: $('#descripcion').val(),
                marcaId: $('#marcaId').val()
            };

            console.log(postData)

            let url = editar === false ? 'agregar-marca.php' : 'editar-marca.php'

            $.post(projectRootUrl + url, postData, function (response) {

                obtenerMarcas();

                $('#marcas-form').trigger('reset');
            });
        }


    })

    $(document).on('click', '.eliminarMarcas', function () {

        if (confirm('Esta seguro de querer eliminar?')) {

            let elemento = $(this)[0].parentElement.parentElement;

            let id = $(elemento).attr('marcaId');

            $.post(projectRootUrl + 'eliminar-marca.php', { id }, function (response) {
                obtenerMarcas();
            });
        }
    });

    $(document).on('click', '.editarMarcas', function () {

        console.log('editando');

        let elemento = $(this)[0].parentElement.parentElement;

        let id = $(elemento).attr('marcaId');

        $.post(projectRootUrl + 'encontrar-marca.php', { id }, function (response) {

            const marca = JSON.parse(response);

            $('#nombre').val(marca.nombre);
            $('#descripcion').val(marca.descripcion);
            $('#marcaId').val(marca.id)

            editar = true;
            obtenerMarcas();
        });
    });

    function obtenerMarcas() {

        $.ajax({

            url: projectRootUrl + 'listar-marca.php',
            type: 'GET',
            success: function (response) {
                let marcas = JSON.parse(response);
                let plantilla = '';
                marcas.forEach(marca => {
                    plantilla += `
                 <tr marcaId="${marca.id}">
                     <td>${marca.id}</td>
                     <td><a href="#" class="editarMarcas">${marca.nombre}</td>
                     <td>${marca.descripcion}</td> 
                     <td><button class="eliminarMarcas btn btn-danger">Eliminar</button></td>                    
                 </tr>`
                });

                $('#marcas').html(plantilla);

            }
        })
    }

})