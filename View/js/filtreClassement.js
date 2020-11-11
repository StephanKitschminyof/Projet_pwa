var val = "all";

(function($){

    //tout les classements sont cachés
   $(".ac-menu").find("p").each(function(){
        $(this).toggleClass("afficher cacher");
        $(".afficher").show();
        $(".cacher").hide();
    });
    $('#rechercher').keyup(function(event){
        var val = $(this).val();
        var regex = '\\b';
        for(var i in val){
            regex += val[i];
        }
        regex += '.*\\b';
        //console.log(regex);
        $('div').show();
        $('div').find("h2").each(function(){//recup de tous les a de la page
            var elt = $(this);
            //console.log(elt.text());//affichage de la valeur du champ a
            var res = elt.text().match(new RegExp(regex,'i'));
            //console.log(res);
            
            if (!res){
                elt.parent().hide();
            }else{

            }
        });
    });

    //listener sur les bloc pour faire afficher la liste au clic
    $(".ac-menu").click(function(){
        var valeur = $(this).attr('id');

        $(".ac-menu").find(".liste").each(function(){//recup de tous les a de la page
            if($(this).attr('id')==valeur){
                $(this).find("p").each(function(){
                    console.log(val);
                    if((val == "all")){
                        $(this).toggleClass("afficher cacher");
                        $(".afficher").show(700);
                        $(".cacher").hide();
                    }else if((val == $(this).attr('id'))){
                        $(this).toggleClass("afficher cacher");
                        $(".afficher").show(700);
                        $(".cacher").hide();
                    }else{
                        $(this).toggleClass("cacher");
                        $(".cacher").hide();
                    }
                });
            }
            
        });/*
        */
    });

})(jQuery);

function updated(element){
    var idx=element.selectedIndex;
    val=element.options[idx].value;
    /*$(".ac-menu").find(".liste").each(function(){//recup de tous les a de la page
            $(this).find("p").each(function(){
                    $(".afficher").hide();
                    $(".cacher").hide(); 
            });        
    });*/
};
        
    
