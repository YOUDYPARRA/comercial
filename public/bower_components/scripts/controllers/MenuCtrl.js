function MenuFnCtrl($timeout,self,MenuSrc){
	var self = this;
	self.eliminar=function (i){
		menuSrc.delete({id:i.id},function(data){
                    window.location = '/recursos';
		});
	}
	self.guardar=function (){
		//console.log("GUARDAR EL ARCHIVO:" +self.recurso.recurso+" observacion "+self.recurso.observacion);
		menuSrc.save($scope.menu,function(data){
		   window.location = '/recursos';
		});
	}
	self.consultar=function (){
		menuSrc.get({id:$scope.menu.id},function(data){
			self.recurso=data.objeto;
		});
                
	}
	self.actualizar=function (){
		menuSrc.update($scope.menu,function(data){
			window.location = '/recursos';
		});
	}
	
}