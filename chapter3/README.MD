###AngularJs Course chapter 3

#### Modules
Please pull or download the example files  from [here](app/)
Take a look at the table , we will use same functionality as in the last homework but this time we will use controller.
We want to add an additional functionality , we need to delete an entry whenever we click on the proper button.
Also we want a toaster to appear when we add new entry and a warning toaster when we delete old ones.

Now a toaster is not a build in module , we have to install it .
So lets head to [AngularJs-Toaster](https://github.com/jirikavi/AngularJS-Toaster) this is a library writen by jirikavi for angular.

Now as we already know we can install any dependencies with bower

```bash
bower install --save angularjs-toaster
```

And we need to include the proper file in our index file.

Lets what the docs of the libs are telling us ?

- Add toaster container directive:

```html
<toaster-container></toaster-container>
```

lets do it and it somewhere where we want the toaster to pop, ill do it somewhere outside .container
Now lets try to call the toaster , add a ng-click for our button and put in this

```javascript
toaster.pop('success', "title", "text")
```

You should get a error in the console .

This is because angular is not aware of that module it is loaded as script but angular has no idea about it.
To have it work we need to start to put our logic in to controllers.
This is simply done , create a js file inside app folder and call it app.js. dont forgot to add this file inside index.html after all other imports.

Now add this code :
```javascript
var App = angular.module('myApp',[])
```

Here we are creating a object App using angular module method.
That means that we are creating our own module(app) now the first part of the parameter in module is the string representing the name of the module and the second part is where all dependencies or in other words modules will be injected.

And this is the part where the toaster modules should be injected.
Lets see the doc of the toaster: `angular.module('myApp', ['toaster', 'ngAnimate'])`
You see we have 'toaster' and 'ngAnimate' injected as array elements.
Now where does the ngAnimate come from ?

Thats easy , it is a dependencie ( bower ) for the toaster and when we installed it via bower it automaticaly has installed the ngAnimate.
Lets create our first controller! create a folder `js/main/controllers`  and inside it create the MainController.js dont forget to include it inside index.html
And here is what you can paste inside :

```javascript
App.controller('MainController',function($scope, toaster) {
  $scope.pop = function(){
      toaster.pop('success', "title", "text");
  };
});
```
Remember we have created the App object earlier ? That will be our pointer to our module 'myApp' so we can call other methods , one of that methods is .controller where you handle the string"Name" of the controller and a function which will contain the content of the controller.

Sound complicated but lets just see what we have:
So we called App.controller , we are telling our module `App` with name 'myApp' to create a controller , with the name `MainController` and a function now you see $scope and toaster as parameters of that function , this the place where we inject different things.

#### $scope and modules
Now thing of the `$scope` as a window to our view .  We will go back a bit later to that.
You see we have injected `$scope` and toaster and now we can work with the toaster but first we need to change `index.html`
Remember earlier we used ng-app ? now we need to provide it with the name of our module `ng-app='myApp'` and of course we need to point out which container ( dom element ) will be controller by our controller . Lets use body for that
```html
<body ng-controller='MainController'>
```

Now we can talk about the `$scope` , remember i told you that this is the window to our controller ?
That means that the controller can see everything what inside the `$scope` and our view ( in our case its the container where we called ng-controller) will also see everything whats inside the `$scope`.
So if we do following inside `MainController`:
```js
App.controller('MainController',function($scope, toaster) {
	$scope.message = "Hello Wolrd";
});
```
We can output it inside `<body>`
```html
<body ng-controller='MainController'>
	<h3> {{ message }} </h3>
</body>
```
This will out put the string you ve assigned inside a js file.
Lets go back to the example with the toaster and create the example provided by toaster demo
```js
App.controller('MainController',function($scope, toaster) {
  $scope.pop = function(){
      toaster.pop('success', "title", "text");
  };
});
```
Just few words about `$scope.pop = function(){}` this is similar to `var pop = function(){}`
with the difference that `$scope` is visible inside html view , so we can access the method `$scope.pop` from html. Lets do it and pop on click.
```html
    <button type="button" class="btn btn-default" ng-click='pop()'>Push data</button>
```
Try it out and you should see a text message poping up , you might want to add the styles of the toaster module
```html
<link href="https://cdnjs.cloudflare.com/ajax/libs/angularjs-toaster/1.1.0/toaster.min.css" rel="stylesheet" />
```
Should be pretty neat huh ?

Lets summarize :
A module is sort of a small app that can be injected or dependent in other apps.
A module can be specified for a dom element.
$scope is sort of a bridge or window between controller and the view.
A controller can be specified for a dom element.
You can inject different services and objects in to controller.
