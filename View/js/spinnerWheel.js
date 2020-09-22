var circle = document.getElementById('box'),
//imgs = document.getElementsByTagName('img'),
imgs = document.getElementsByClassName('block'),
total = imgs.length,
coords = {},
diam, radius1, radius2, imgW;

// get circle diameter
// getBoundingClientRect outputs the actual px AFTER transform
//      using getComputedStyle does the job as we want
diam = parseInt( window.getComputedStyle(circle).getPropertyValue('width') ),
radius = diam/2,
imgW = imgs[0].getBoundingClientRect().width,
// get the dimensions of the inner circle we want the images to align to
radius2 = radius - imgW + 100 //GERER L ECARTEMENT

var i,
alpha = Math.PI / 2, //GERER LA ROTATION
len = imgs.length,
corner = 2 * Math.PI / total; //GERER DEMIE CERCLE peut être utile pour gérer pas tout autour

for ( i = 0 ; i < total; i++ ){

imgs[i].style.left = parseInt( ( radius - imgW / 2 ) + ( radius2 * Math.cos( alpha ) ) ) + 30 + 'px' //ICI j'atoute +20 pour centrer
imgs[i].style.top =  parseInt( ( radius - imgW / 2 ) - ( radius2 * Math.sin( alpha ) ) ) + 30 + 'px'

alpha = alpha - corner;
}


