/**
 * [getElement description]
 * @param  {[type]} selector [description]
 * @return {[type]}          [description]
 * var el = new getElement('#a');
	el.color('blue').fontSize('29px').background('red').width('100px').height('30px');
 */
function getElement(selector){
	this.obj = document.querySelectorAll(selector);
	this.length = document.querySelectorAll(selector).length
}
getElement.prototype.color = function(color) {
	 if(typeof color !== 'string') return;
		for(var i=0;i<this.length;i++){
			 this.obj[i].style.color = color;
		}
     return this;
}
getElement.prototype.background = function(color){
	if(typeof color !== 'string') return;
		for(var i=0;i<this.length;i++){
			 this.obj[i].style.backgroundColor = color;
		}
     return this;
}
getElement.prototype.fontSize = function(size){
	if(typeof size !== 'string') return;
		for(var i=0;i<this.length;i++){
			 this.obj[i].style.fontSize = size;
		}
     return this;
}
getElement.prototype.width = function(width){
	if(typeof width !== 'string') return;
		for(var i=0;i<this.length;i++){
			 this.obj[i].style.width = width;
		}
     return this;
}
getElement.prototype.height = function(height){
	if(typeof height !== 'string') return;
		for(var i=0;i<this.length;i++){
			 this.obj[i].style.height = height;
		}
     return this;
}
