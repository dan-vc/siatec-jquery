const projectRootUrl = 'productos/';

//JS DE PRODUCTOS
$(document).ready(function() {

    console.log('Jquery installed');

    let editar = false;

    $('#resultado-productos').hide();

    obtenerProductos();

    $('#search').keyup(function(e){

        if($('#search').val()){

            let search = $('#search').val();

            $.ajax({

                url: projectRootUrl + 'buscar-productos.php',
                type: 'POST',
                data: {search},
                success: function(response){
                //    console.log(response);

                    let productos = JSON.parse(response);
                    console.log(productos);

                    let plantilla='';
                    productos.forEach(producto => {
                        plantilla += `<li>
                            ${producto.producto}
                        </li>`
                    });

                    $('#container').html(plantilla);
                    $('#resultado-productos').show();

                }
            });
        }

    });

    $('#productos-form').submit(function(e){

        const postData = {
            producto: $('#producto').val(),
            precio: $('#precio').val(),
            descripcion: $('#descripcion').val(),
            idproducto: $('#idproducto').val()
        };

        let url = editar === false ? 'agregar-productos.php' : 'editar-productos.php'

        $.post(projectRootUrl + ''+url ,postData,function (response) {

            obtenerProductos();

            $('#productos-form').trigger('reset');

        });
        e.preventDefault();
    });


    function obtenerProductos(){

       $.ajax({

            url: projectRootUrl + 'listar-productos.php',
            type: 'GET',
            success: function(response){
                let productos = JSON.parse(response);

                let plantilla='';
                productos.forEach(producto => {
                    plantilla += `
                    <tr userId="${producto.idproducto}">
                            <td>${producto.idproducto}</td>
                            <td><a href="#" class="editarProductos">${producto.producto}</a></td>
                            <td>${producto.descripcion}</td>
                            <td>${producto.precio}</td>
                            <td><button class="eliminarProducto btn btn-danger">Eliminar</button></td>
                        </tr>`
                });

                $('#productos-lista').html(plantilla);
                
            }
        }) 
    }

    $(document).on('click','.eliminarProducto',function() {

        if(confirm('Esta seguro de querer eliminar?')){

            let elemento = $(this)[0].parentElement.parentElement;

            let id = $(elemento).attr('userId');

            $.post(projectRootUrl + 'eliminar-productos.php', {id},function (response) {
                obtenerProductos();
        }); 
        }       
    });

    $(document).on('click','.editarProductos',function() {

        console.log('editando');

        let elemento = $(this)[0].parentElement.parentElement;

        let id = $(elemento).attr('userId');

        $.post(projectRootUrl + 'encontrar-productos.php', {id},function (response) {

            const producto = JSON.parse(response);

            $('#producto').val(producto.producto);
            $('#precio').val(producto.precio);
            $('#descripcion').val(producto.descripcion);
            $('#idproducto').val(producto.idproducto);
            
            editar = true;
            obtenerProductos();
        });
    });
    
});