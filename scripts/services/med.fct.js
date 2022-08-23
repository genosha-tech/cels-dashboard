'use strict';

angular.module('app.services').factory('medService', function gameService(LoaderService, $http) {
  var medData = {
    items: [],
    subscribers:[],
  };
  var hoursARGMT_3= 3*60*60*1000;
  medData.subscribe = function(r){
  	medData.subscribers.push(r);
  };

  medData.ready = function(){
  	for (var i = 0; i < medData.subscribers.length; i++) {
  		medData.subscribers[i].onServiceReady();
  	}
  };

  medData.rows = [];
  medData.start = function(){
    
    LoaderService.subscribe(medData);
    LoaderService.doWork();

  };

  medData.onDataReady = function(md){
           for (var attrname in md) 
             { 
               medData[attrname] = md[attrname]; 
             }
           medData.ready();
  }
  

  return medData;
});
