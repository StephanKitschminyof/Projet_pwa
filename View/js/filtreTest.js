(function($){

    $('#rechercher.recherche').keyup(function(event){
        var val = $(this).val();
        var regex = '\\b';
        var special = ["+","*","/","$","^","?"];
        for(var i in val){
         
            if((special.indexOf(val[i]) > -1)){
                regex += "\\";
                
            }
            regex += val[i];
            
            
        }
        regex += '.*';
        console.log(regex);
        $('.li').show();
        $('.li').find("a").each(function(){//recup de tous les a de la page
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

})(jQuery);