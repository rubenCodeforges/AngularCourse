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

### 6. Authentication
The authentication is a part of many applications , in this chapter we will learn the basics of that process.
We will send login and password to our api and in case of success we will store some data in cookies in order to stay loged in , for that we will use `$cookies`

> #### Home work:
> - Create a login form , `email` , `password` and send data to api on success store user data
> - create a user status bar when logged in , display data  and make a logout button , on click call api if success destroy data

### 7.Dashboard or secured Area ???

In a modern application you will have a dashboard area where you can admin several things such as a Post creation , delete and update.
This behavior we will also implement in this chapter.
First we will create secure routes which requires the user to be authenticated , otherwise the router will send the user to a login form.
If authentication is successful the user is send to a dashboard , where he will see the index of all his posts in a table.
for each post in table we will have a `edit` and `delete` button.
and on top of the table a `create new` button

This are 3 different actions and 2 different pages ( for delete we dont need a page )
We will create 2 routes for both `new` and `delete`

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
