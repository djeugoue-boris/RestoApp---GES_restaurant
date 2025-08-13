
/*

Bibliothèque de fonctions Javascript : Package.js
Version : 1.0.0
By : TEJIOGNI Marc (693 90 91 21 - mtejiogni@yahoo.fr)

*/


//Fonction qui teste si un param existe ou pas
function isEmpty(param) {
	if((!param) || (param == "") || (param == '') || (param == 0)) {
		return true;
	}
	else {
		return false;
	}
}


//Fonction qui permet de savoir si un parametre est un nombre ou pas
function isNombre(param) {
	var regex = new RegExp(/^[0-9]+(\.[0-9]+)?$/);
	
	return regex.test(param);
}


//Fonction qui permet de savoir si un parametre est un nombre entier ou pas
function isInt(param) {
	var regex= new RegExp(/^[0-9]+$/);
	
	return regex.test(param);
}


//Fonction qui permet de savoir si un parametre est un nombre réel ou pas
function isFloat(param) {
	var regex = new RegExp(/^[0-9]+(\.[0-9]+|\.)$/);
	var b= true;

	if(isInt(param)) {
		b= true;
	}
	else if(regex.test(param)) {
		b= true;
	}
	else {
		b= false;
	}
	
	return b;
}


//Fonction qui permet de savoir si un parametre est un numero de telephone (camerounais) ou pas
function isPhoneCamer(param) {
	var regex = new RegExp(/^6(5|7|9)[0-9]{7}$/);
	
	return regex.test(param);
}


//Fonction qui permet de savoir si un parametre est une adresse mail ou pas
function isEmail(param) {
	var regex= new RegExp(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/);
	
	return regex.test(param);
}


//Fonction qui permet de savoir si un parametre est un mot de passe valide ou pas
/*
Un mot de passe valide aura
- de 8 à 15 caractères
- au moins une lettre minuscule
- au moins une lettre majuscule
- au moins un chiffre
- au moins un de ces caractères spéciaux: $ @ % * + - _ !
- aucun autre caractère possible: pas de & ni de { par exemple
 */
function isPassword(param) {
	//var regex= new RegExp(/^[a-zA-Z0-9._-]+$/);
	var regex= new RegExp(/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/);
	
	return regex.test(param);
}


//Fonction qui retourne la longueur d'un paramétre
function longueur(param) {
	return param.length();
}


//Fonction qui permet de savoir si un parametre est une date ou pas
//Attention cette fonction utilise le format jj-mm-aaaa ou jj/mm/aaaa
function isDate(param, minAnnee= 1900, maxAnnee= 2099) {
	var regex= new RegExp(/^[0-3]?[0-9](-|\/|\.)[0-1]?[0-9](-|\/|\.)[0-2][0-9]{3}$/);
	var tab= param.split(/-|\/|\./);
	var b= true;
	
	if(regex.test(param)) { 
		$jour= parseInt(tab[0]);
		$mois= parseInt(tab[1]);
		$annee= parseInt(tab[2]);

		if(($jour >= 1) && ($jour <= 31)) {
			if(($mois >= 1) && ($mois <= 12)) {
				if(($annee >= minAnnee) && ($annee <= maxAnnee)) {
					b= true;
				}
				else {
					b= false;
				}
			}
			else {
				b= false;
			}
		}
		else {
			b= false;
		}
	}
	else {
		b= false;
	}
		
	return b;
}


//Fonction qui permet de convertir une chaine en entier
function stringToInt(param) {
	return parseInt(param);
}


//Fonction qui permet de convertir une chaine en float
function stringToFloat(param) {
	return parseFloat(param);
}


/*
Fonction qui permet de verifier les dimensions d'une image
depuis un input file lors du upload
Exemple : 
var inputfile= document.querySelector('input[type="file"]');
checkImage(file, 20, 20);
*/
function checkImage(inputfile, max_width, max_height) {
	var reader= new FileReader();
	reader.readAsDataURL(inputfile.files[0]);

	reader.onload= function (e) {
        var image= new Image();
        image.src= e.target.result;

        image.onload = function () {
        	var error= 'La hauteur et la largeur ne doivent pas dépasser ';
        	error= error + max_width + ' x ' + max_height + '.';

            if (this.width > max_width || 
            	this.height > max_height) {
                //alert(error);
                return false;
            }
            return true;
        };
    }
}







