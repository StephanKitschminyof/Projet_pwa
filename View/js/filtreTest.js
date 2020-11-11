(function($){

    $('#rechercher').keyup(function(event){
        var val = $(this).val();
        var regex = '\\b';
        for(var i in val){
            regex += val[i];
        }
        regex += '.*\\b';
        //console.log(regex);
        $('#trier li').show();
        $('#trier').find("a").each(function(){//recup de tous les a de la page
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