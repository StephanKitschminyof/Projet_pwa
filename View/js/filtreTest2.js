(function($){

    $('#rechercher').keyup(function(event){
        var input = $(this);
        var val = input.val();
        var regex = '\\b';
        for(var i in val){
            regex += val[i];
        }
        regex += '.*\\b';
        //console.log(regex);
        $('.ac-menu').show();
        $('.ac-menu').find('h2').each(function(){//recup de tous les a de la page
            var elt = $(this);
            console.log(elt.text());//affichage de la valeur du champ a
            var res = elt.text().match(new RegExp(regex,'i'));
            //console.log(res);
            
            if (!res){
                elt.parent().hide();
            }else{

            }
        });
    });

})(jQuery);