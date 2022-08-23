'use strict';
angular
    .module('app.core')
    .controller('FuncionariosMapController', function($http, $rootScope, $scope, medService) {
          $scope.currentH =[];
          $scope.currentVictims = 0 ;
          $scope.loading = true;
          $scope.mapContainer = '#funcionarios-map-graph';
          medService.subscribe($scope);
        
          $scope.onActiveInstitucion = function(i,m){
            $scope.activeInstitucion = m;
             $scope.loadChart(medService.hechos);
          };
          $scope.onActiveGenero = function(i,m){
             $scope.activeGenero = m;
             $scope.loadChart(medService.hechos);
          };
          $scope.onActiveYear = function(i,m){
              $scope.activeYear = m;
             $scope.loadChart(medService.hechos);
          };
          $scope.onActiveLugar = function(i,m){
             $scope.activeProvincia = m;
             $scope.loadChart(medService.hechos);
          };
          $scope.currentH = [];


          var headers = {
              lugar:'Lugar',
              victimas: "Personas",
              porcentaje:'Porcentaje',
          };

          $scope.exportCSV = function(){
            var itemsFormatted = [];

              // format the data
              if ($scope.csvData.length > 1){
                $scope.csvData = $scope.csvData.filter(function(f) { 
                  return  f.lugar != "Ciudad de Buenos Aires"; 
                });
              }
              
              $scope.csvData.forEach((item) => {
                  itemsFormatted.push(item);
              });

              var fileTitle = 'CELS-victimas-funcionarios-por-lugar'; // or 'my-unique-title'

              exportCSVFile(headers, itemsFormatted, fileTitle); // call the exportCSVFile() function


          };
          $scope.loadChart = function(h){

            var h = $scope.currentH = h.filter(function(v){
               var filtered = v.metadata.funcionarios_fatales > 0; 
               
               if ($scope.activeProvincia) {
                 filtered = filtered && v.metadata.lugar_del_hecho[0].label == $scope.activeProvincia.key;
               }

               if ($scope.activeYear) {
                 filtered = filtered && v.metadata.ano == $scope.activeYear.key;
               }

               if ($scope.activeGenero) {
                 var genFilter = true;
                 
                 if ($scope.activeGenero.key == "Mujer"){  genFilter = v.metadata.victimas_fatales_M > 0; }
                 else if ($scope.activeGenero.key == "Varón"){  genFilter = v.metadata.victimas_fatales_H > 0; }
                 else {  genFilter = v.metadata.victimas_fatales_X > 0; }

                 filtered = filtered && genFilter 
               }

               if ($scope.activeInstitucion) {
                 filtered = filtered && v.metadata.institucion[0].label == $scope.activeInstitucion.key;
               }


               return filtered;
             });
            //Agrupamiento de hechos x Año
           medService.hechosLugar = d3.nest()
              .key(function(d) { 
                return d.metadata.lugar_del_hecho[0].label; 
              })
              .entries(h);
           //Agrupamiento de hechos x Año
           medService.hechosCABA = d3.nest()
              .key(function(d) { 
                return d.metadata.provincia[0].label; 
              })
              .entries(h);
           
        
            
           medService.hechosLugar.map(function(z){
             var total = d3.sum(z.values,function(v){
               return v.metadata.funcionarios_fatales
             });
             z.total = total;       
           });


           
           d3.selectAll($scope.mapContainer + ' path')
                 .on('click',null)
                .transition().duration(500)
                .style('fill', function(d, i) {
                    return "white";
                })
                


            var myColor = d3.scaleLinear().domain([0,100])
              .range(["#DDF9F4", "#00b195"])
            $scope.currentCity = "-";
           $scope.currentPercentage = "-";
           $scope.currentVictims = 0;

           d3.selectAll($scope.mapContainer + ' path.place').classed("selected", false).on('click',null) ;
           

           $scope.csvData = [];

           medService.hechosLugar.map(function(z){
                var k = z.key.toLowerCase().split(' ').join('_');
                z.percentage = (z.values.length * 100 / h.length);
                $scope.csvData.push({
                  lugar: z.key,
                  victimas: z.values.length,
                  porcentaje: z.percentage,
                  
                });
                try{
                  d3.selectAll($scope.mapContainer + ' path[data-place="' + k + '"]')
                        .on('click',function(){ 
                          d3.selectAll($scope.mapContainer + ' path.place').classed("selected", false);
                          d3.select(this).classed("selected", true);
                           $scope.$apply(function(){
                            $scope.currentCity= z.key;
                            $scope.currentVictims = z.values.length;
                            $scope.currentPercentage = z.percentage;
                          })
                        })
                        .transition()
                        .duration(500)
                        .style('fill',myColor(z.percentage))

                }
                catch(e){
                  console.log('no esta', k);
                }
        
           });

             medService.hechosCABA.map(function(f){
             if (f.key == "Ciudad de Buenos Aires"){
                 
                  f.percentage = (f.values.length * 100 / h.length);
                   $scope.csvData.push({
                    lugar: f.key,
                    victimas: f.values.length,
                    porcentaje: f.percentage
                  });
                  var k = 'caba'
                  try{

                    d3.selectAll($scope.mapContainer + ' path[data-place="' + k + '"]')
                          .transition().duration(500).style('fill',myColor(f.percentage));
                       d3.selectAll($scope.mapContainer + ' path[data-place="' + k + '"]')
                        .on('click',function(){ 
                          d3.selectAll($scope.mapContainer + ' path.place').classed("selected", false);
                          d3.select(this).classed("selected", true);
                           $scope.$apply(function(){
                              if ($scope.activeProvincia && $scope.activeProvincia.key == f.values[0].metadata.lugar_del_hecho[0].label){
                                $scope.currentCity= f.values[0].metadata.lugar_del_hecho[0].label
                              }
                              else {
                                $scope.currentCity= f.key;  
                              }
                              $scope.currentVictims = f.values.length;
                              $scope.currentPercentage = f.percentage;
                          })
                        })
                        .transition()
                        .duration(500)
                        .style('fill',myColor(f.percentage))
                      
                  }
                  catch(e){
                    console.log('no esta', k);
                  }
             }
           });             

           $scope.loading = false;

          };
         
          $scope.currentMap;
          d3.xml("assets/svg/mapa.svg",function(data) {                
                  $scope.currentMap = d3.select($scope.mapContainer)
                    .node()
                    .append(data.documentElement);
                     if (isMobile.any){
                     var w = $(window).width();
                     var h = 60;
                     if (w < 321){
                       h =75;
                     }
                   var svg = d3.select($scope.mapContainer + ' svg')
                    .attr("width", "100vw")
                    .attr("height", h + "vh");
                  }
                  else {
                   var svg = d3.select($scope.mapContainer + ' svg')
                    .attr("width", "100vw")
                    .attr("height", "80vh");
                    d3.select($scope.mapContainer + ' svg g.mapa') 
                       .attr("transform", "translate(-130,-10) scale(1,1)")
                  }
      
                  
                });
          $scope.onServiceReady = function(){
          


          $scope.$apply(function(){           
              //Agrupamiento de hechos x Año
           medService.hechosLugar = d3.nest()
              .key(function(d) { 
                return d.metadata.lugar_del_hecho[0].label; 
              })
              .entries(medService.hechos);
           $scope.lugares = medService.hechosLugar.sort(function(a,b){return a.key.localeCompare(b.key)});
           $scope.loadChart(medService.hechos);
            
               $scope.disabled = undefined;

              $scope.enable = function() {
                $scope.disabled = false;
              };

              $scope.disable = function() {
                $scope.disabled = true;
              };

              $scope.clear = function() {
                $scope.person.selected = undefined;
                $scope.address.selected = undefined;
                $scope.country.selected = undefined;
              };

              $scope.person = {};
              
              $scope.provincias = medService.provincias;
              $scope.genero = medService.genero;
              $scope.institucion = medService.institucion;
              $scope.years = medService.years;

              $scope.address = {};
            });
          };
           
          
  
});


