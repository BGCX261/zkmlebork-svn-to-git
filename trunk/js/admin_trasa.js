/**
 * @author FOKA
 */

Trasa.prototype.trasaTab; 


function Trasa() {
	this.trasaTab = new Array();
}

/**
 * Metoda dodaje godzine do tablicy odjazdow
 * @param {Object} hour
 */
Trasa.prototype.addTrasa = function(trasa) {
	this.trasaTab.push(trasa);
}

/**
 * Metoda wstawiaj�ca trase
 */
Trasa.prototype.putTrasa = function(idx){
	this.trasaTab.splice(idx,0,'');
	this.refresh();
}

/**
 * Metoda usuwaj�ca godzine
 */
Trasa.prototype.delTrasa = function(idx){
	this.trasaTab.splice(idx-1,1);
	this.refresh();
}

/**
 * Metoda zwraca html z inputami do formularza
 */
Trasa.prototype.getForm = function() {
	var html = '';
	
	html +=	'<div class="pl_ms"><a href="" onclick="trasaObj.putTrasa(0);return false;" > dodaj </a>'  +  //to jest linijka dodajaca trase
			'</div>';  //tutaj  do usuwania
			
	for (var i=0; i < this.trasaTab.length; i++ ) {
		html += (i+1) + '. <input type="text" name="trasa[]" value="'+this.trasaTab[i]+'"  size="30" />'+  //to jest pole z trasa
			'<div class="pl_ms"><a href="" onclick="trasaObj.putTrasa('+(i+1)+');return false;" > dodaj </a>'  +  //to jest linijka dodajaca trase
			'<a href="" onclick="trasaObj.delTrasa('+(i+1)+');return false;" > usuń </a></div>';  //tutaj  do usuwania
	}	
	return html;
}

/**
 * Metoda odswierza liste p�l po 
 * operacji usu� lub dodaj
 */
Trasa.prototype.refresh = function() {
	document.getElementById('trasaList').innerHTML = this.getForm();
}
