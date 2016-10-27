   moment.locale('pt-BR');
  var app = angular.module('codeschunks',['ui.calendar','angularMoment','ngRoute','ngMask']);

  app.config(function($routeProvider) {

      $routeProvider.
        when('/', {
          templateUrl: 'views/template.phtml',
           controller: 'homeController'
      }).
        when('/agendar', {
          templateUrl: 'views/agenda/novo.phtml',
          controller: 'agendaController'
        }).
        when('/imprimir', {
           templateUrl: 'views/agenda/imprimir.phtml',
          controller: 'imprimirController'
        }).
         when('/calendario', {
          templateUrl: 'views/agenda/calendario.phtml',
          controller: 'calendarioController',
        
        }).
         
         when('/admin', {
          templateUrl: 'views/admin/calendario.phtml',
          controller: 'adminController',
        
        }).
        when('/login', {
          templateUrl: 'views/admin/login/login.phtml',
          controller: 'loginontroller'
        }).
        otherwise({
          redirectTo: '/'
        });
  });

   app.controller('agendaController', function($scope, $http,$location,$routeParams,$rootScope) {

       
    $scope.data=null;

    $scope.salvar=function(v){
       
    $rootScope.nascimento=$scope.data.nascimento;
    $rootScope.nome=$scope.data.nome;
    
     var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            }
     var params = $.param({
                data: $rootScope.data,
                nome: $scope.data.nome,
                nascimento: $scope.data.nascimento
            });
  
     $http.post('../index.php/agendarPost', params, config)
            .success(function (data, status, headers, config) {
                 $location.path('imprimir');
            })
            .error(function (error, status, header, config) {
                $scope.ResponseDetails = "Data: " + error +
                    "<hr />status: " + status +
                    "<hr />headers: " + header +
                    "<hr />config: " + config;
            });
       
    }



  });


  app.controller('homeController', function($scope, $http,$location) {
       
       $scope.verificar = function(data){
          
          console.log(data.provincia);
         
         
          $http.get('../index.php/reagendar', data).success(function(data){
               if(data=="ok"){
              console.log('done');
              $location.path('/calendario');
              }else{
                $scope.error="Serviço não disponível para agendamento nesse município";
                 console.log('error');
              $location.path('/');
              }
          });
       };


  });

  app.controller('calendarioController', function($scope,$filter, moment, uiCalendarConfig,$http,$location,$rootScope) {
       

           $scope.SelectedEvent = null;
    var isFirstTime = true;
       $scope.events=[];
         $scope.calendarDate = [ 
    {
      events: $scope.events
     }
    ];
     
   var tempVar = "";

    $scope.setCalDate = function(date, jsEvent, view) {
            
        

            var selectedDate = moment(date).format('YYYY-MM-DD');           // set dateFrom based on user click on calendar
            //$scope.calendarDate[0].events[0].start = selectedDate;            // update Calendar event dateFrom
            $scope.selectedDate = $filter('date')(selectedDate, 'yyyy-MM-dd');   // update $scope.dateFrom
              
                if (tempVar == "")
        {
            $(this).css('background-color', '#f01faa');
            tempVar = this;
        }
        else
        {
            $(this).css('background-color', '#f01faa');
            $(tempVar).css('background-color', 'white');
            tempVar = this;
        }

        console.log(selectedDate);
  };



        
  $scope.uiConfig = {
    calendar : {
      height: 450,
       lang: 'pt',
        displayEventTime: false,
       buttonText: {
    today:    'hoje',
    month:    'mes',
    week:     'semana',
    day:      'dia'
},
      editable : false,
        aspectRatio: 2,
      header : {
        left : 'title',
        center : '',
        right : 'today next'
      },
      dayClick : $scope.setCalDate,
      background: '#f26522',
    },
                eventAfterAllRender: function () {
                if ($scope.events.length > 0 && isFirstTime) {
                    //Focus first event
                    uiCalendarConfig.calendars.myCalendar.fullCalendar('gotoDate', $scope.events[0].start);
                    isFirstTime = false;
                }
            },
  };

  


  $http.get('../index.php/listaAgenda',{cache: false}).then(function(data) {
      
     $scope.events.slice(0, $scope.events.length);
      angular.forEach(data.data,function(value){

        if(value.disponivel>=value.ofertada){
       $scope.events.push(
        
         {
          title: "reservado",
          start:  moment(value.data).format('YYYY-MM-DD'),
          allDay: true,
         
           eventColor: '#378006',
          rendering: 'background',
          stick: true
          
        }
        );
       }

      });

   
  });


    $scope.avancar=function(){
    
      var data=$scope.selectedDate;
       var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            }
     var params = $.param({ data: data});
        $rootScope.data=data;
  
     $http.post('../index.php/verVaga', params, config)
            .success(function (data, status, headers, config) {
              console.log(data.ofertada);
              console.log(data.disponivel);
                    if(data.ofertada>data.disponivel){
                      console.log(data.ofertada);

                       $location.path('agendar');
                    }
                  
                 else {
                   $rootScope.error="NÃO EXISTEM VAGAS DISPONIVEIS PARA ESSE DIA. ESCOLHA OUTRA DATA PORFAVOR."
               

                  console.log("erro"); 

                   }  
            })
            .error(function (error, status, header, config) {
                $scope.ResponseDetails = "Data: " + error +
                    "<hr />status: " + status +
                    "<hr />headers: " + header +
                    "<hr />config: " + config;
            });
       
      
    }



  });




app.controller('imprimirController', function($scope, $http,$rootScope) {
 
          var nome=$rootScope.nome;
          var nascimento=$rootScope.nascimento;
          var data=$rootScope.data;
           data = new Date(data);
data=data.toLocaleFormat('%d-%b-%Y');
          
          var docDefinition = {
     content: [
      { 
      text: 'Comprovante de agendamento', 
      style: 'header' 
    },
       { 
      text: 'Nome: ' +nome,
      style: 'subheader' 
    },
    { 
      text: 'Data de nascimento: ' +nascimento,
      style: 'subheader' 
    },
    { 
      text: 'Comparessa no dia: ' +data+ " para emissão do seu bilhete",
      style: 'subheader' 
    },
   
  ],
   styles: {
    header: {
      fontSize: 18,
      bold: true,
      alignment: 'center',
      margin: [0,20,0,10]
    },
    subheader: {
      fontSize: 12,
      bold: true
    },
    quote: {
      italics: true
    },
    small: {
      fontSize: 8
    }
  }
  };

       

  $scope.openPdf = function() {
    pdfMake.createPdf(docDefinition).open();
  };

  $scope.downloadPdf = function() {
    pdfMake.createPdf(docDefinition).download();
  };


  });


   
   
  app.controller('loginController', function($scope, $http) {
   
    
  });



  app.controller('adminController', function($scope,$filter, moment, uiCalendarConfig,$http,$location,$rootScope) {
   
     
           $scope.SelectedEvent = null;
    var isFirstTime = true;
       $scope.events=[];
         $scope.calendarDate = [ 
    {
      events: $scope.events
     }
    ];
     
   var tempVar = "";

    $scope.setCalDate = function(date, jsEvent, view) {
            
        

            var selectedDate = moment(date).format('YYYY-MM-DD');          
             $scope.selectedDate = $filter('date')(selectedDate, 'yyyy-MM-dd');   
              
                if (tempVar == "")
        {
            $(this).css('background-color', '#f01faa');
            tempVar = this;
        }
        else
        {
            $(this).css('background-color', '#f01faa');
            $(tempVar).css('background-color', 'white');
            tempVar = this;
        }

       
  };



        
  $scope.uiConfig = {
    calendar : {
      height: 450,
       lang: 'pt',
        displayEventTime: false,
       buttonText: {
    today:    'hoje',
    month:    'mes',
    week:     'semana',
    day:      'dia'
},
      editable : false,
        aspectRatio: 2,
      header : {
        left : 'title',
        center : '',
        right : 'today next'
      },
      dayClick : $scope.setCalDate,
      background: '#f26522',
    },
                eventAfterAllRender: function () {
                if ($scope.events.length > 0 && isFirstTime) {
                    //Focus first event
                    uiCalendarConfig.calendars.myCalendar.fullCalendar('gotoDate', $scope.events[0].start);
                    isFirstTime = false;
                }
            },
  };

  

    $scope.avancar=function(){
    
      var data=$scope.selectedDate;
      

 var valor = prompt("digite o numero de vagas disponiveis ");
         if (valor != null) {
      valor = parseInt(valor)
       salvar(valor);
    }else{
      alert("digite um numero");
      return false;
    }
  
  function salvar(valor){

     var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            }
     var params = $.param({ data: data,oferta:valor});
      
     $http.post('../index.php/addVaga', params, config)
            .success(function (data, status, headers, config) {

           $rootScope.message="Dados guardados com sucesso"
                
                
            })
            .error(function (error, status, header, config) {
                $scope.ResponseDetails = "Data: " + error +
                    "<hr />status: " + status +
                    "<hr />headers: " + header +
                    "<hr />config: " + config;
            });
       
      
    }

}

  $http.get('../index.php/listaAgenda',{cache: false}).then(function(data) {
      
     $scope.events.slice(0, $scope.events.length);
      angular.forEach(data.data,function(value){

        $scope.events.push({
          title: "reservado",
          start:  moment(value.data).format('YYYY-MM-DD'),
          allDay: true,
         
           eventColor: '#378006',
          rendering: 'background',
          stick: true
          
        }); });


      $scope.imprimir=function(){
     
        var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                } }
        var params = $.param({ data: $scope.selectedDate});

              $http.post('../index.php/listaImprimir', params, config)
            .success(function (value, status, headers, config) {
           
                 if(value){
                 
                    
                  impressao(value);  
                  }
                
            })
            .error(function (error, status, header, config) {
                $scope.ResponseDetails = "Data: " + error +
                    "<hr />status: " + status +
                    "<hr />headers: " + header +
                    "<hr />config: " + config;
            });


  
      
      }

      
   
  });


 function impressao(value){
 
  var nomes = [];
            angular.forEach(value, function(value, key) {
               console.log(value);
                this.push({ text: value.nome, "bold": true });
                 //   var dt= { text: "d", "bold": true };

                },nomes);
 
  if(value){
  var docDefinition = {
  content: [
      { 
      text: 'Lista de pessoas a serem atendidas', 
      style: 'header' 
    },
    {
       ul: [
       
        nomes,
      ]
    }
  ],
    styles: {
    header: {
      fontSize: 18,
      bold: true,
      alignment: 'center',
      margin: [0,20,0,10]
    },
    subheader: {
      fontSize: 15,
      bold: true
    },
    quote: {
      italics: true
    },
    small: {
      fontSize: 8
    }
  }
};

pdfMake.createPdf(docDefinition).open();

   }
}



  });