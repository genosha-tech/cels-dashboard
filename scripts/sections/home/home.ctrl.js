var chart = c3.generate({
    size: {
       height: 400,
    },
    padding: {
        right: 20
    },
    data: {
        x: 'x',
        labels: isMobile.any ?false : true,
        columns: [
              ['x', 2009,2010,2011,2012,2013,2014,2015],

            ],
        names: {
            P: 'Particulares',
            F: 'Funcionaries',
        },
    },
    color: {
        pattern: ['#F59817', '#00A7E4', '#02DCB8', '#ffbb78', '#2ca02c', '#98df8a', '#d62728', '#ff9896', '#9467bd', '#c5b0d5', '#8c564b', '#c49c94', '#e377c2', '#f7b6d2', '#7f7f7f', '#c7c7c7', '#bcbd22', '#dbdb8d', '#17becf', '#9edae5']
    },
    point: {
      r: 3.5,
    },
    axis: {
        x: {
            tick: {
              count: isMobile.any? 3 : undefined,
            }
       },
       y:{
         min:0, 
         padding: {bottom:0}
       },
       grid: {
                    y: {
                        show: true,
                    }
                }
              }
});



'use strict';
angular
    .module('app.core')
    .controller('HomeController', function(LoaderService, $http, $rootScope, $scope, medService) {
    	    
          $rootScope.loading = $scope.loading = true;
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
          $scope.onActiveProvincia = function(i,m){
             $scope.activeProvincia = m;
             $scope.loadChart(medService.hechos);
          };
          $scope.currentH = [];


          var headers = {
               ano: 'Año',
               victimas_particulares : "Víctimas Particulares",
               victimas_funcionarios : "Víctimas Funcionarios"
          };

          $scope.exportCSV = function(){
            var itemsFormatted = [];

              // format the data
              $scope.csvData.forEach((item) => {
                  itemsFormatted.push(item);
              });

              var fileTitle = 'CELS-victimas-faltales'; // or 'my-unique-title'

              exportCSVFile(headers, itemsFormatted, fileTitle); // call the exportCSVFile() function


          };
          $scope.loadChart = function(h){

            var h = $scope.currentH = h.filter(function(v){
               var filtered = v.metadata.victimas_fatales > 0 || v.metadata.funcionarios_fatales > 0;

               if ($scope.activeProvincia) {
                 filtered = filtered && v.metadata.provincia[0].label == $scope.activeProvincia.key;
               }

               if ($scope.activeYear) {
                 filtered = filtered && v.metadata.ano == $scope.activeYear.key;
               }

               if ($scope.activeGenero) {
                 var genFilter = false;
                 
                 if ($scope.activeGenero.key == "Mujer"){  
                   genFilter = 
                     v.metadata.victimas_fatales_M > 0  ||
                     v.metadata.funcionarios_fatales_M > 0;

                 }
                 else if ($scope.activeGenero.key == "Varón"){  
                   genFilter =v.metadata.victimas_fatales_H > 0  ||
                     v.metadata.funcionarios_fatales_H > 0;
                 }

                 filtered = filtered && genFilter 
               }

               if ($scope.activeInstitucion) {
                 filtered = filtered && v.metadata.institucion[0].label == $scope.activeInstitucion.key;
               }


               return filtered;
             });
            //Agrupamiento de hechos x Año
           medService.hechosYear = d3.nest()
              .key(function(d) { return parseInt(d.metadata.ano); })
              .entries(h);
           
              
          //Armado de grafico por año,
           var x = ['x'];
           var t = ['Total'];
           var tM = ['Particulares'];
           var tH = ['Funcionaries'];


           medService.hechosYear.sort(function(a,b){ return parseInt(a.key) - parseInt(b.key)});

           
           $scope.csvData = []; 
           medService.hechosYear.map(function(z){
             var total = d3.sum(z.values,function(v){
               return v.metadata.victimas_fatales
             });
             var totalC = d3.sum(z.values,function(v){
               if($scope.activeGenero){
                 if ($scope.activeGenero.key == "Mujer"){ return v.metadata.victimas_fatales_M; }
                 else if ($scope.activeGenero.key == "Varón"){ return v.metadata.victimas_fatales_H; }
               } else return v.metadata.victimas_fatales
             });
             var totalF = d3.sum(z.values,function(v){
               if($scope.activeGenero){
                 if ($scope.activeGenero.key == "Mujer"){ return v.metadata.funcionarios_fatales_M; }
                 else if ($scope.activeGenero.key == "Varón"){ return v.metadata.funcionarios_fatales_H; }
               }
               else return v.metadata.funcionarios_fatales
               
             });
             $scope.csvData.push({
               ano:z.key,
               victimas_particulares:totalC,
               victimas_funcionarios:totalF,
             })
             x.push(z.key);
             tM.push(totalC);
             tH.push(totalF);     
           });
              chart.load({
                    columns: [
                        x,
                        tM,
                        tH,
                    ]
                });

              $rootScope.loading = $scope.loading = false;
          };
          $scope.onServiceReady = function(){
           
           $scope.$apply(function(){

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
              console.log(medService.institucion);
              $scope.years = medService.years;

              $scope.address = {};  
           })

           
          };
           
          
  
});


