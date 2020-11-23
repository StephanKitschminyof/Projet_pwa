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
        var regex = '\\b';
        var special = ["+","*","/","$","^","?"];
        for(var i in val){
         
            if((special.indexOf(val[i]) > -1)){
                regex += "\\";
                
            }
            regex += val[i];
            
            
        }
        regex += '.*';
        $('.ac-menu').show();
        $('.ac-menu').find("h2").each(function(){
            var elt = $(this);
            var res = elt.text().match(new RegExp(regex,'i'));
            
            if (!res){
                elt.parent().hide();
            }else{

            }
        });
    });

    //listener sur les bloc pour faire afficher la liste au clic
    $(".ac-menu").click(function(){
        var valeur = $(this).attr('id');

        $(".ac-menu").find(".liste").each(function(){
            if($(this).attr('id')==valeur){
                $(this).find("p").each(function(){
                    //console.log(val);
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
            
        });
    });

})(jQuery);

function updated(element){
    var idx=element.selectedIndex;
    val=element.options[idx].value;
    $(".ac-menu").find("p").each(function(){
        $(this).attr("class","cacher");
        $(".cacher").hide();
    });

};
        
    
