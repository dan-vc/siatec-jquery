const projectRootUrl = 'categorias/';

$(document).ready(function() {

    console.log('Jquery installed');

    let editar = false;

    $('#resultado-nomcategoria').hide();

    obtenerCategoria();

    $('#search').keyup(function(e){

        if($('#search').val()){

            let search = $('#search').val();

            $.ajax({

                url: projectRootUrl + 'buscar-categoria.php',
                type: 'POST',       
                data: {search},
                success: function(response){
                //    console.log(response);

                    let categoria = JSON.parse(response);
                    console.log(categoria);

                    let plantilla='';
                    categoria.forEach(nomcategoria => {
                        plantilla += `<li>
                            ${nomcategoria.nomcategoria}
                        </li>`
                    });

                    $('#container').html(plantilla);
                    $('#resultado-nomcategoria').show();

                }   
            });
        }

    });

    $('#categoria-form').submit(function(e){

        const postData = {
            nomcategoria: $('#nomcategoria').val(),
            descategoria: $('#descategoria').val(),
            idcategoria: $('#idcategoria').val()
        };

        let url = editar === false ? 'agregar-categoria.php' : 'editar-categoria.php'

        $.post(projectRootUrl + ''+url ,postData,function (response) {

            obtenerCategoria();

            $('#categoria-form').trigger('reset');

        });
        e.preventDefault();
    });


    function obtenerCategoria(){

       $.ajax({

            url: projectRootUrl + 'listar-categoria.php',
            type: 'GET',
            success: function(response){
                let categoria = JSON.parse(response);

                let plantilla='';
                categoria.forEach(nomcategoria => {
                    plantilla += `
                    <tr idcategoria="${nomcategoria.idcategoria}">
                        <td>${nomcategoria.idcategoria}</td>
                        <td><a href="#" class="editarNomcategoria">${nomcategoria.nomcategoria}</td>
                        <td>${nomcategoria.descategoria}</td> 
                        <td><button class="eliminarNomcategoria btn btn-danger">Eliminar</button></td>                    
                    </tr>`
                });

                $('#categoria').html(plantilla);
                
            }
        }) 
    }

    $(document).on('click','.eliminarNomcategoria',function() {

        if(confirm('Esta seguro de querer eliminar?')){

            let elemento = $(this)[0].parentElement.parentElement;

            let id = $(elemento).attr('idcategoria');

            $.post(projectRootUrl + 'eliminar-categoria.php', {id},function (response) {
                obtenerCategoria();
        }); 
        }       
    });

    $(document).on('click','.editarNomcategoria',function() {

        console.log('editando');

        let elemento = $(this)[0].parentElement.parentElement;

        let id = $(elemento).attr('idcategoria');

        $.post(projectRootUrl + 'encontrar-categoria.php', {id},function (response) {

            const categoria = JSON.parse(response);

            $('#nomcategoria').val(categoria.nomcategoria);
            $('#descategoria').val(categoria.descategoria);
            $('#idcategoria').val(categoria.idcategoria);
            
            editar = true;
            obtenerCategoria();
        });
    });
    
});
