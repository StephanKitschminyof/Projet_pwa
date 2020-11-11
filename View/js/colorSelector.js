function setColorProfil(color)
{
    //Changement couleur pour les paragraphes
    var Para = document.getElementsByTagName("p");
    for (var i= 0; i < Para.length; i++)
    {
     Para[i].style.color = color;
    }


    //Couleur pour la bordure de l'image
    document.getElementById("imgProfil").style.borderColor = color;

    //Couleur pour le titre
    document.getElementById("titre-container").style.borderColor = color;

    //Couleur pour le bouton changement de couleur
    document.getElementById("Color").style.background = color;
}

function setColorSelectTitle(color)
{
    //Changer couleur des paragraphes 
    var Para = document.getElementsByTagName("p");
    for (var i= 0; i < Para.length; i++)
    {
     Para[i].style.color = color;
    }
}


function setColorSelectColor(color)
{
    //Changer couleur des paragraphes 
    var Para = document.getElementsByTagName("p");
    for (var i= 0; i < Para.length; i++)
    {
     Para[i].style.color = color;
    }

    document.getElementById("choix").style.color = color;
}