var funcionariosInChart = c3.generate({
    size: {
        height: 500,
    },
    padding: {
        left:isMobile.any ? 100 : 175,
    },
    bindto: '#funcionarios-in-chart',
    data: {
        columns: [
        ],
        type: 'bar',
        labels: true
    },
    color: {
        pattern: ['#F59817', '#00A7E4', '#02DCB8', '#ffbb78', '#2ca02c', '#98df8a', '#d62728', '#ff9896', '#9467bd', '#c5b0d5', '#8c564b', '#c49c94', '#e377c2', '#f7b6d2', '#7f7f7f', '#c7c7c7', '#bcbd22', '#dbdb8d', '#17becf', '#9edae5']
    },
    bar: {
       space: 0.20,
       width: {
            ratio: 0.80
        }
    },
      axis: {
        rotated: isMobile,
        y:{
          tick:{
            format: d3.format(".0f"),
            count: isMobile.any ? 3 : undefined,
          }
        },
        x: {
            type: 'category',
            tick: {
              rotate: -90,
              multiline: true,
              multilineMax: 2,
            },
         padding: {  // use these 3 lines
            bottom: 80,
         },
       },
       categories: [],
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
    .controller('FuncionariosIController', function($http, $rootScope, $scope, medService) {
    	console.log('FuncionariosIController');
	    
       medService.subscribe($scope);
       $scope.loading = true;
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
              institucion: "Institucion",
              total: "Total"
          };


          $scope.exportCSV = function(){
            var itemsFormatted = [];

              // format the data
              $scope.csvData.forEach((item) => {
                  itemsFormatted.push(item);
              });

              var fileTitle = 'CELS-funcionaries-muertes-por-institucion'; // or 'my-unique-title'

              exportCSVFile(headers, itemsFormatted, fileTitle); // call the exportCSVFile() function


          };
          $scope.loadChart = function(h){

            var h = $scope.currentH = h.filter(function(v){
               var filtered = v.metadata.funcionarios_fatales > 0; 
               
               if ($scope.activeProvincia) {
                 filtered = filtered && v.metadata.provincia[0].label == $scope.activeProvincia.key;
               }

               if ($scope.activeYear) {
                 filtered = filtered && v.metadata.ano == $scope.activeYear.key;
               }

               if ($scope.activeGenero) {
                 var genFilter = true;
                 
                 if ($scope.activeGenero.key == "Mujer"){  genFilter = v.metadata.funcionarios_fatales_M > 0; }
                 else if ($scope.activeGenero.key == "Varón"){  genFilter = v.metadata.funcionarios_fatales_H > 0; }
                 else {  genFilter = v.metadata.victimas_fatales_X > 0; }

                 filtered = filtered && genFilter 
               }

               if ($scope.activeInstitucion) {
                 filtered = filtered && v.metadata.institucion[0].label == $scope.activeInstitucion.key;
               }


               return filtered;
             });
            //Agrupamiento de hechos x Año
           medService.hechosInstitucion = d3.nest()
              .key(function(d) { 
                return d.metadata.institucion[0].label; 
              })
              .entries(h);
           
              
          //Armado de grafico por año,
           var x = ['x'];
           var t = ['Total'];


           
            
           medService.hechosInstitucion.map(function(z){
             var total = d3.sum(z.values,function(v){
               if($scope.activeGenero){
                 if ($scope.activeGenero.key == "Mujer"){ return v.metadata.funcionarios_fatales_M; }
                 else if ($scope.activeGenero.key == "Varón"){ return v.metadata.funcionarios_fatales_H; }
               } else return v.metadata.funcionarios_fatales
               
             });
             z.total = total;
                       
           });
            var columnsInst = [];
            columnsInst.push('Personas');
           var categories = [];
           
           medService.hechosInstitucion.sort(function(a,b){ return parseInt(b.total) - parseInt(a.total)});
           

           $scope.csvData = [];
           medService.hechosInstitucion.map(function(z){

             columnsInst.push(z.total);
             categories.push(z.key);
             
             $scope.csvData.push({
               institucion: z.key,
               total: z.total
             });    
           });

           

             funcionariosInChart.load({
                    columns: [columnsInst],
                    categories:categories,
              });
             $scope.loading = false;
           
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
