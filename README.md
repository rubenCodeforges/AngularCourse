![enter image description here](https://angularjs.org/img/AngularJS-large.png)
# Angular for Beginners
This course will be focused on developers with basic knowledge of javascript .
Also in order to view documentaion for each chapter, just go to the corresponding folder.

We will cover the following topics :

### Introduction
I dont want to spent to much time telling why Angular .
Its simple ,  currently the market has a demand on Angular devs and we want to earn money.
What im going to tell you is that at the end of this course we will build a Blog application that will have following features:

- Dashboard Authentication
- Posts CRUD ( with corresponding pages )
- Posts Index and Show page ( Frontpages )

### [1. Basic Setup for Angular](chapter1/README.MD)
In this chapter you will learn about `npm` and `bower`.
This tools are required for fast installation of Angular and other modules you may need in development.
We also will install `nodeJs` as it is required in order to work with `npm`

### [2. First steps , "Hello World" , Basic DataBinding](chapter2/README.MD)
In this chapter we will create a simple "Hello World" app.
In this app you will learn about basic data binding.
Small introduction to `directives` we will use the `ng-repeat` and `ng-click` directives

> ####Home work:
>  - Create basic project
>  - Setup a form with following field ( name , age , gender ) and a button
>  - On button click get data from the form and push it to a array
>  - Create a container with class `.peoples`  in that container iterate through the `peoples` data array
>  and output in a unordered list the data in the following format:
>   ```<li> Name: ***** , Age: ******, Gender: ***** </li>```

### [3. Modules , Basic Controllers , Basic $scope](chapter3/README.MD)
In this chapter you will learn the modular concept and the MVW concept of Angular.
We will create a controller for the main view and use `$scope`  to bind data to the view and controller.

> #### Home work:
> - Take the example template from part3 and add the same functionality as in previous homework ( part2 ) but this time move the whole logic in to a controller.
> - Add a toaster module and use it to notify the user if he add successfuly data to the table.
> - Make a validation for all fields ( just required or not empty ) in case the form was not valid make a error toaster.
> - Create a delete method that will delete a entry on click, use the button from the template i gave `.glyphicon-remove`
> - You should have a main app.js file for just the init and injection and a separate controller file.
>
> This homework i would like to see in a git repo , but you can send zips , but i like git. dont send fiddls

### [4. $http, short introduction in to promise](chapter4/)
The most important part for a SPA is communication with the server and in this chapter we will learn how to use the core `$http` service.
We will get real data from a server and use it to output it on our view.

> #### Home work:
> Use template provided in the [chapter4](chapter4/)
> - Modify  previous home work:
> - On first load get data from server using this route `http://angular.codeforges.com` and populate the `users` data array
> - On form submit , send data to the server , using this route `http://angular.codeforges.com`
> - on success populate the `users` data array with the newly created person
> You can read the following documentation [angular $http](https://docs.angularjs.org/api/ng/service/$http)

### [5. Routing &  Resource Factory](chapter5-6/)
In this chapter we will learn about routing and how a basic SPA structure should look like.
How to bind a controller and a view to a specific route.
Understanding what Show, Index , Edit pages are.

Here we will talk about resource factory , which is the best way for mapping and controlling data.
We will build our resource model and bind it to a corresponding api endpoint

> #### Home work:
> - Create a Post ( Index , Show ) page routes with the corresponding controller and view
> - Create a resource Post with the endpoint provided
> - Using the Post resource update the Post Index and Show page , Create a call to the API with the Post resource and populate each page with corresponding data.

### [6. Authentication | Basic Auth](chapter6/)
The authentication is a part of many applications , in this chapter we will learn the basics of that process.
We will send login and password to our api and in case of success we will store some data in Service in order to stay loged in

> #### Home work:
> Some explanation: Due to the fact that the outofthebox wp-rest-api lacks on some login ednpoints , we will have to do a call to list users find the required get its id and make a request to retrive that user. So here is the homework:
> - We will have 2 pages , home with route `/` this will be the default one, then login with route `/login`
> - You need to store a current user context , the best way for that is to use a service. While we didnt covered them i give you an example:

```javaScript
app.factory( 'AuthService', function() {
  var currentUser;

  return {
    login: function() { ... },
    logout: function() { ... },
    isLoggedIn: function() { ... },
    currentUser: function() { return currentUser; }
    ...
  };
});
```
> - So whenever we try to enter the home page `/` we have to check if the user is logged in if not redirect to login `/login`
> - On login page create a login form , `login`(on endpoint its name) , `password`.
> - While entering the login page , we also can fetch all users ( this is required to find the id of our user that will be logged in ) so the endpoint for getting users list is `/wp/v2/users`  and full url would be `angular.codeforges.com/api/wp-json/wp/v2/users`
> - On loginForm submit , first you need to find the id of the users , use the array of users you retrived earlier and find the required user by email and get the id.
> - Next you have to recive this user using this endpoint `/wp/v2/users/<id>`
> - On success , store the userData in the service you created earlier. And redirect on home page
> - On home page create a user status bar when logged in , display data  and make a logout button , the logout should destroy the user in service and you should be redirected from home to login

> !!! The Best solution will be used as boilerplate for futher chapters.!!!


### 7.Dashboard or secured Area ???

In a modern application you will have a dashboard area where you can admin several things such as a Post creation , delete and update.
This behavior we will also implement in this chapter.
First we will create secure routes which requires the user to be authenticated , otherwise the router will send the user to a login form.
If authentication is successful the user is send to a dashboard.
You can use for authentication a [example](https://github.com/migalenkom/angular_app/tree/master/Hometask%235) made by one member from our course 
For the dashboard we will use a bootstrap [template] (http://blackrockdigital.github.io/startbootstrap-sb-admin/index.html)
You dont need to have all the peaces , in fact we need just one side menu item ( Pages ) with following sub items New Page , Page list.
So the menu structure: 

```
Pages-
  New post
  All posts
```
For post listing you can use bootstrap tables.
For new post following fields are required:
```
Title( api key : title )
Content( api key : content)
post status ( dropdown , api key: status , should be default to 'publish')
```
For more description of api fields refer to the [api doc](http://v2.wp-api.org/reference/posts/)
please read through the doc to find the required endpoints.
We need to create a post , to update(edit) a post and fetch a post list.

The post edit form is same as form for create but is field with data on load, the data is fetched from api.
In order to enter a post edit screen we need to have a button on post listing for each post.

##### !Security!
Please take in to account that for create , update you need to check for credentials ( Basic Auth ).
Also while you using a example for the authentication , you should extend it a bit and check if the user is authorized to enter a dashboar page ( is loged in )

>#### Home work
> - Update app , add a dashboard view
> - add a security check for is the user authenticated or not if he hits on a secure route
> - add a post listing ( index ) on the dashboard page
> - add handlers for `create`, `edit` and `delete` buttons ( use ui route )

### 8. Post Create and Edit
The title of the chapter i pretty obvious .
So mostly at the time the create and edit pages ( views ) are almost the same .
That why we will use same html for both pages.
the create Page is simple a form witch on submit will send data to api , here but we will implement a simple validation for :
 > `Title` - cant be blank and cant be longer then 150 chars
 > `Description` not longer then 1000

 For edit page we will first fetch data for the corresponding post and update with that data the form , then on form submit we will send the new data. validation same here.

> #### Home work
> - Update App , add Create and Edit Pages the forms should have validation on fields on sbumit send data to api

### 9. Cleaning up the application
This chapter is a conclusion of our little course , based on you work we will discuss some best practices in terms of structure and
I will introduce some useful tools , like yeoman and will give a interesting home work.

> #### Home work
> - hidden

### 10. Directives
I know it should be at top , but from my experience i see that directives are hard to understand for most developers that why it comes as a last chapter.
So far we have a fully functional application , now we will polish it with directive abstracting , decoupling and making the app modular.
This chapter will take double the time as previous chapters so be prepared :)
> #### Home work:
>  - Polish up the app with directives using the recommendation and information i gave

### Conclusion
From that point you will be able to work with angular and build you own apps.
I will tell a bit about `coffee script` and template engines like `jade` give some additional documentation to read. And perhaps start to work on advanced course.
