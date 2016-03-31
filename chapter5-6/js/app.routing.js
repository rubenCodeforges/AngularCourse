App.config(function($routeProvider, $locationProvider) {
  $locationProvider.html5Mode(true);

  $routeProvider
  .when('/main', {
    templateUrl: 'js/main/partials/main.html',
    controller: 'MainController'
  })
  .otherwise('/');

});
