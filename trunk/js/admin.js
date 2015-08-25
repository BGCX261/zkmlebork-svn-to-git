/**
 * @author FOKA
 */

Hours.prototype.hoursTab; 
Hours.prototype.legendTab;
Hours.prototype.id;

function Hours(id) {
	this.hoursTab = new Array();
	this.legendTab = new Array();
	this.hoursLegend = new Array();
	this.id = id;
}

/**
 * Metoda dodaje godzine do tablicy odjazdow
 * @param {Object} hour
 */
Hours.prototype.addHour = function(hour, legend) {
	this.hoursTab.push(hour);
	this.hoursLegend.push(legend);
}

Hours.prototype.addLegend = function(legend) {
	this.legendTab.push(legend);
}

/**
 * Metoda wstawiaj�ca godzine
 */
Hours.prototype.putHour = function(idx){
	this.hoursTab.splice(idx+1,0,'');
	this.hoursLegend.splice(idx+1,0,'');
	this.refresh();
}

/**
 * Metoda usuwaj�ca godzine
 */
Hours.prototype.delHour = function(idx){
	this.hoursTab.splice(idx,1);
	this.hoursLegend.splice(idx,1);
	this.refresh();
}

Hours.prototype.save = function(idx, obj){
	this.hoursTab[idx] = obj.value;
	
}

Hours.prototype.saveL = function(idx, obj){
	this.hoursLegend[idx] = obj.value;
	
}

/**
 * Metoda zwraca html z inputami do formularza
 */
Hours.prototype.getForm = function() {
	var html = '';
	
	for (var i=0; i < this.hoursTab.length; i++ ) {
		html += '<input onchange="hoursObj'+this.id+'.save('+i+',this);" type="text" name="hours'+this.id+'[]" value="'+this.hoursTab[i]+'" MAXLENGTH="5" size="5" />'+  //to jest pole z godzina		

			'<select onchange="hoursObj'+this.id+'.saveL('+i+',this);" name="legend'+this.id+'[]">'; 
			html += '<option></option>';
			for (var j=0; j < this.legendTab.length; j++ ) {
				var sel = '';
				if (this.legendTab[j] == this.hoursLegend[i]) 
					sel = 'selected';
				html += '<option '+sel+'>'+this.legendTab[j]+'</option>';
			}
			html +='</select>' +
			'<a href="" onclick="hoursObj'+this.id+'.putHour('+i+');return false;" > dodaj </a>'  +  //to jest linijka dodajaca godzine
			'<a href="" onclick="hoursObj'+this.id+'.delHour('+i+');return false;" > usuń </a>';  //tutaj  do usuwania
	}	
	return html;
}

/**
 * Metoda odswierza liste p�l po 
 * operacji usu� lub dodaj
 */
Hours.prototype.refresh = function() {
	document.getElementById('hoursList'+this.id).innerHTML = this.getForm();
}
