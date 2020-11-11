
(function($){

    //tout les classements sont cachés
    $(".liste").find("div").each(function(){
        $(this).toggleClass("afficher cacher");
        $(".afficher").show();
        $(".cacher").hide();
    });

    //listener sur les bloc pour faire afficher la liste au clic
    $(".ac-menu").click(function(){
        var valeur = $(this).attr('id');

        $(".ac-menu").find(".liste").each(function(){//recup de tous les a de la page
            if($(this).attr('id')==valeur){
                $(this).find("div").each(function(){
                        $(this).toggleClass("afficher cacher");
                        $(".afficher").show(700);
                        $(".cacher").hide();
                });
            }
            
        });
        
    });

})(jQuery);

        
    
