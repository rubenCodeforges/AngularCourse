###AngularJs Course chapter 5 & 6

Hello and welcome back to our angularJs Course.
In this paired chapter we will learn the angular resource and routing.

For routing we will need the  [ng-route module](https://docs.angularjs.org/api/ngRoute)
it is already in bower.json inside chapter 5-6 [folder](/chapter5-6)

####Routing
So lets start from routing, take the template from [here](/chapter5-6) and run `bower install`

You should have all dependencies installed and ready to go.
Now lets setup the router , first we need to add `'ngRoute'` to our modules.

Open app.js and add:

```javaScript
var App = angular.module('myApp',['ngRoute']);

```

Now we can use the router , we should create a separate file where we will have our routing.
In the folder where we have `app.js` lets create `app.routing.js`

```
NOTE:

The 'dot' between app and routing is just a naming convention , its NOT! a special file extension.
```

Now inside the routing we can add our code and while we are holding our application object inside
`var App = angular.module('myApp',['ngRoute']);` we can simply use the `App` object :

```javaScript
App.config(function($routeProvider, $locationProvider) {

});
```

Here we are calling the `.config()` method of our app , it is very useful not only for routing
but also for configurations and its cool to have a separate config file like `app.config.js` <- EXAMPLE !!!
Now you see we have `$stateProvider` and `$urlRouterProvider` this are the the providers that will help us to rout our app

The `$urlRouterProvider`can be used for any unmatched routes and will redirect the user to a defined `default` route.

Now the `$stateProvider` is exactly the guy who will look for route matches and will bind the proper template and controller!

Lets create the ROUTING!

```javaScript
App.config(function($routeProvider, $locationProvider) {

  $routeProvider
  .when('/main', {
    templateUrl: 'js/main/partials/main.html',
    controller: 'MainController'
  })
  .otherwise('/');

});
```

Looks nice and simple !
So lets do some explanations, first we are calling a method `.when()` for `$routeProvider` this method accpets 2 params:

 `when(path, route);`

For description of those 2 params see the [doc](https://docs.angularjs.org/api/ngRoute/provider/$routeProvider)

From now one , we dont need to inject controllers in DOM with `ng-controller` and remember the rule: ` 1 Route - 1 Controller` dont break it , dont make nested controllers , dont inject controllers in DOM!!!
Otherwise youll face a lot of problems and complications as soon as you project will grow and someone else will contribute.

We are almost there to test all this out , lets just add our newly created files (js) to index.html and create the `partials` folder with `main.html`

```html
<!-- index.html somewhere at the bottom -->

<!-- Bower components -->
<script src="bower_components/angular/angular.js" charset="utf-8"></script>
<script src="bower_components/angular-route/angular-route.min.js" charset="utf-8"></script>
<!-- END Bower components -->

<!-- App scripts -->
<script src="js/app.js" charset="utf-8"></script>
<script src="js/app.routing.js" charset="utf-8"></script>
<script src="js/main/controllers/MainController.js" charset="utf-8"></script>
<!-- END App scripts -->
```

and the `main/partials/main.html`
```html
<div class="container">
  <h3>Main page, we will have some data here</h3>
</div>
```

We are now ready to test things out , lets fire app our app.
#####NOTE!
You may need to run the app on a webserver , because the templates are fetched with ajax, you browser may deny a CORS request. Because you will be working not on a http domain base.
An example of the error you might see:
```
Cross origin requests are only supported for protocol schemes: http, data, chrome, chrome-extension, https, chrome-extension-resource.
```
Open the index.html in a browser and got to the `/main` route , you shouldnt see any errors in the console but you want see the template as well !
This is because we need to tell angular where those template will be "injected", lets got back to index.html and insert before the scripts this:

```html
<div ng-view></div>
<a href='main'>go to main</a>
```

Now we are telling angular that inside this container all our routing/template-loading will be.
Now save and reload the page and se how the template is loaded.
Looks cool , but what about the hashtag `#` ? It would be much more cooler if its gone !
For that we need to write just 1 line of code.
Go back tou app.routing.js and add this :
```js
App.config(function($routeProvider, $locationProvider) {

  $locationProvider.html5Mode(true);
  $routeProvider
  .when('/main', {
    templateUrl: 'js/main/partials/main.html',
    controller: 'MainController'
  })
  .otherwise('/');

});
```
Note the $locationProvider , this is what makes the magic.
Now before you can test out , one thing to mention , there are 2 cases which you should know.

1. When your app has a base url like `some.domain.com/notapp/notapp/hereistheindex/index.html` so your base would be `/notapp/notapp/hereistheindex/`.
then you need to add a base tag in you index.html header
2. Your app is actually starting from roo folder (base) `my.domain.com/index.html`.
Then you dont need the base tag , but change the $locationProvider a bit:

```js
$locationProvider.html5Mode({
  enabled: true,
  requireBase : false
});
```

Read more about (base)[https://docs.angularjs.org/error/$location/nobase]

Thats all now go and try out !
