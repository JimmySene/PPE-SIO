$(document).ready(function(){

    // Supprime un élément du panier
    $('.supprimer').click(function(){
        var indice_produit = $(this).parent().parent().data("id");
        $(this).parent().parent().hide();
        $.post("sup_panier.php", { id: indice_produit } , function(data){
            $('.modal').show();
            $('#total span').html(data);
        });
    });

    // Ajoute un élément dans le panier
    $('.submit').click(function(){

        var id = $(this).parent().find('.f_id').val();
        var nom = $(this).parent().find('.f_nom').val();
        var prix = $(this).parent().find('.f_prix').val();
        var quantite = $(this).parent().find('.f_quantite').val();

        /*console.log(id);
        console.log(nom);
        console.log(prix);
        console.log(quantite);*/

        $.post("ajout_panier.php", { id: id, nom: nom, prix: prix, quantite: quantite}, function(data){
            $('.modal').show();
        });
    });

    $('.ok').click(function(){
        $('.modal').hide();
    });
    
    

});