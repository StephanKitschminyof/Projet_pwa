/**
 * Permet de changer la couleur des éléments de la page profil
 * 
 * @param {color} color 
 *      Couleur d'un format pour css
 */
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

/**
 * Permet de changer la couleur des éléments de la page selectTitle
 * @param {color} color 
 *      Couleur d'un format pour css
 */
function setColorSelectTitle(color)
{
    //Changer couleur des paragraphes 
    var Para = document.getElementsByTagName("p");
    for (var i= 0; i < Para.length; i++)
    {
     Para[i].style.color = color;
    }
}

/**
 * Permet de changer la couleur des éléments  de la page selectColor
 * @param {color} color 
 *      Couleur d'un format pour css
 */
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