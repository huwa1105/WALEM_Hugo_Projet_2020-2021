$(document).ready(function () {

    $('span[id]').click(function(){

        var valeur1 = $.trim($(this).text());
        var ident = $(this).attr("id"); //valeur de l'id
        var name = $(this).attr("name"); //champ à modifier
        $(this).blur(function(){
            var valeur2 = $.trim($(this).text());
            if(valeur1 != valeur2){
                var parametre = 'champ='+name+'&id='+ident+'&nouveau='+valeur2;
                $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: 'text',
                    url: './lib/php/ajax/ajaxUpdateAdmin.php',
                    success: function(data){
                        console.log(data);
                    }
                });
            }
        });

    });

    //$('.edit').remove(); //Cacher la colonne edit dans la liste utilisateur

});