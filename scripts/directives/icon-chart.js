'use strict';

angular.module('app.core')
.directive('iconChart', function() {
    var iconUrl = '/assets/icons/person.svg';
    return {
        restrict: 'E',
        replace: true,
        scope: {
          icono: '=icono',
          items: '=items',
          orientacion: '=orientacion',
          base: '=base',
          opciones: '=opciones'
        },
        controller: function($scope, $http) {

            $scope.tagID = 'icons-container-'+Date.now();

            $scope.items = ($scope.items)?parseInt($scope.items):10;

            $scope.qty = d3.range(0,parseInt($scope.base.cantidad));
            $scope.range10 = d3.range(0,$scope.items);

            var cols = Math.floor(parseInt($scope.base.cantidad)/$scope.items);
            var resto = parseInt($scope.base.cantidad)%$scope.items;
            var idAcum = 0;
            $scope.cols = $scope.range10.map(function(i){
              var items = [];
              if(i<cols){
                items = d3.range(idAcum,idAcum+$scope.items);
                idAcum+=10;
              }
              if(i==cols){
                items = d3.range(idAcum,idAcum+resto);
              }
              return {items:items};
            });
            d3.xml(iconUrl, function(error, xml) {
              var iconLoaded = document.importNode(xml.documentElement, true);
              $('#'+$scope.tagID+' .icon-chart-svg-container-icon').html(iconLoaded.cloneNode(true));
              addOpciones();
            });
            

            function addOpciones(){

              $('#'+$scope.tagID+' .icons-chart-base')
                .css('color',$scope.base.color)
                .css('border-color',$scope.base.color);

              $('#'+$scope.tagID+' .icons-chart-option').each(function(e){
                var color = $(this).data('color');
                $(this).css('color',color);
                $(this).find('.icon-chart-svg-container-icon .st0').css('fill',color);
              });
              // Define the div for the tooltip
              var div = d3.select("body").append("div")  
                  .attr("class", "tooltip")        
                  .style("opacity", 0);
              $('#'+$scope.tagID+' .icon-chart-svg-container-icon .st0').css('fill',$scope.base.color);
              var pointer=0;
              angular.forEach($scope.opciones,function(e){
                angular.forEach(d3.range(pointer,pointer+e.cantidad),function(){
                  d3.select('#'+$scope.tagID+' #icon-chart-svg-'+pointer+' svg g').style('fill',e.color)
                  .on("mouseover", function(d) {    
                    div.transition()    
                        .duration(200)    
                        .style("opacity", 1);    
                    div  .html("<p>" + e.titulo + "</p>" +"<p>" + e.cantidad + "</p>")  
                        .style("left", (d3.event.pageX) + "px")    
                        .style("top", (d3.event.pageY - 28) + "px");  
                    })    
                  pointer++;
                });
              });
            }


        },
        templateUrl: 'scripts/views/directives/iconChart.html'
    };

});
