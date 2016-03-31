App.config(function($routeProvider, $locationProvider) {

  $routeProvider
  .when('/main', {
    templateUrl: 'js/main/partials/main.html',
    controller: 'MainController'
  })
  .otherwise('/');

});
