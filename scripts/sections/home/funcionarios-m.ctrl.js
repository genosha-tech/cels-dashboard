  var funcionarioGeneroEdadChart = c3.generate({
    size: {
       height: 400,
    },
    bindto: '#func-edad-chart',
    data: {
        columns: [],
        type : 'pie',
    },
    color: {
        pattern: ['#F59817', '#00A7E4', '#02DCB8', '#ffbb78', '#2ca02c', '#98df8a', '#d62728', '#ff9896', '#9467bd', '#c5b0d5', '#8c564b', '#c49c94', '#e377c2', '#f7b6d2', '#7f7f7f', '#c7c7c7', '#bcbd22', '#dbdb8d', '#17becf', '#9edae5']
    }

});


'use strict';
angular
    .module('app.core')
    .controller('FuncionariosMController', function($http, $rootScope, $scope, medService) {
      console.log('FuncionariosMController');
      
       medService.subscribe($scope);

       $scope.onActiveInstitucion = function(i,m){
            $scope.activeInstitucion = m;
             $scope.loadChart(medService.funcionarios);
          };
          $scope.onActiveGenero = function(i,m){
             $scope.activeGenero = m;
             $scope.loadChart(medService.funcionarios);
          };
          $scope.onActiveYear = function(i,m){
              $scope.activeYear = m;
             $scope.loadChart(medService.funcionarios);
          };
          $scope.onActiveProvincia = function(i,m){
             $scope.activeProvincia = m;
             $scope.loadChart(medService.funcionarios);
          };
          $scope.currentH = [];


          var headers = {
              edad: 'Edad',
              victimas: 'Victimas',
              porcentaje : 'Porcentaje'
              
          };

          $scope.exportCSV = function(){
            var itemsFormatted = [];

              // format the data
              $scope.csvData.forEach((item) => {
                  itemsFormatted.push(item);
              });

              var fileTitle = 'CELS-funcionaries-muertes-por-edad-y-genero'; // or 'my-unique-title'

              exportCSVFile(headers, itemsFormatted, fileTitle); // call the exportCSVFile() function


          };
          $scope.loadChart = function(h){

            var filteredVictimas = $scope.currentH = h.filter(function(v){
               if (!v.hecho) return false;
               var filtered = true; 

               if ($scope.activeProvincia) {
                 filtered = filtered && v.hecho.metadata.provincia[0].label == $scope.activeProvincia.key;
               }

               if ($scope.activeYear) {
                 filtered = filtered && v.hecho.metadata.ano == $scope.activeYear.key;
               }

               if ($scope.activeGenero) {
                 var genFilter = false;
                 
                 genFilter = $scope.activeGenero.key === v.metadata.genero[0].label;

                 filtered = filtered && genFilter 
               }

               if ($scope.activeInstitucion) {
                 filtered = filtered && v.hecho.metadata.institucion[0].label == $scope.activeInstitucion.key;
               }


               return filtered;
             });
           

           $scope.currentH = filteredVictimas.filter(function(v){
                       return v.metadata.estado_del_funcionario[0].label == "Muerto" &&
                        parseInt(v.metadata.edad[0].value) > 0;
                     });


             medService.muertes_genero =  d3.nest()
                      .key(function(d) { return d.metadata.genero[0].label; })
                      .entries($scope.currentH);

                   //edad
             medService.muertes_genero.map(function(vg){
                     vg.victimas_edad =  
                       d3.nest()
                        .key(function(d) { return parseInt(d.metadata.edad[0].value); })
                        .entries(vg.values);
                      vg.victimas_edad.sort(function(a,b){ return parseInt(a.key) - parseInt(b.key)});
                   });

              
          //Armado de grafico por año,
           var data = [];
           var victimasFiltered = medService.muertes_genero;
           
           var ageMax = d3.max($scope.currentH, function(f) {
                      return parseInt(f.metadata.edad[0].value);
                  });
           var ageMin = d3.min($scope.currentH, function(f) {
                      return parseInt(f.metadata.edad[0].value);
                  });
              

           var groups = [];
           groups.push({ from:17, to: 30,label:'17 a 30', count:0})
           groups.push({ from:31, to: 41,label:'31 a 41', count:0})
           groups.push({ from:42, to: 54,label:'42 a 54', count:0})
           groups.push({ from:55, to: 99,label:'55 y más', count:0})
           
           
           var total = $scope.currentH.length;
           $scope.currentH.map(function(z){
              var e = z.metadata.edad[0].value;
              for (var i = 0; i < groups.length; i++) {
                if (e >= groups[i].from &&  e <=groups[i].to){
                  groups[i].count++;
                  break;
                }
              }
           });
           $scope.csvData = [];
           var percentage = 0;
           for (var i = 0; i < groups.length; i++) {
             groups[i].percentage = groups[i].count * 100 /total;
             percentage += groups[i].percentage;
             data.push([groups[i].label,groups[i].count]);
             $scope.csvData.push({
               edad:groups[i].label,
               victimas:groups[i].count,
               porcentaje: groups[i].percentage,
             });
           }
           console.log(total,groups);

           $scope.no_results = $scope.currentH.length == 0 ? 0 : percentage;
           




            funcionarioGeneroEdadChart.load({
                    columns: data
                });


            
           
                      };
          $scope.onServiceReady = function(){
           
           $scope.$apply(function(){

           $scope.loadChart(medService.funcionarios);
            
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
