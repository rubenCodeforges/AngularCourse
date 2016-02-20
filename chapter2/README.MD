###AngularJs Course chapter 2

In this chapter we will use the app from chapter 1.
Lets build a simple `hello world` app , we need to create this html structure in our `<body>` , or just use the files ive prepared on github

```html
  <h3>Say Hello:</h3>
  <input type="text" name="name" value="">
  <p>Hi, </p>
```

Now lets create some angular stuff, lets add this to our input :
```html
  <input type="text" ng-model="message" name="name" value="">
```
`ng-model` this is a so called "directive" it does some stuff and we want get much in to details.
Thing of its action like it is creating or instantiating a object called `message`
And we can use that object and write in it data as well as read out , this is concept of data binding.
Lets extend our code:
```html
<h3>Say Hello:</h3>
<input type="text" ng-model="message" name="name" value="">
<p>Hi, {{message}}</p>
```
And nothing happens, this because angular doesn't know that we have initialized a angular app.
Lets go all the way up and add this
```html
<html ng-app>
```
The `ng-app` is telling angular that in this container ( in our case in `<html>` ) we have a angular app runnin, now refresh and see what happens and try to write something in to the input.

Now that is cool , forget about the jquery style dont even try to think in angular like that.
`$('#message').text($('#input').text())`
Now `{{ }} ` this braces tell angular that there is a expression and angular will try to evaluate it , very simple.

#### Iterating and manipulating ( ng-repeat , ng-click )
Lets do it harder , lets create a button and store messages in an array when clicking on that button.
Here is the code
```html
  <ul ng-init='messages=[]'>
    <li ng-repeat='text in messages'>{{text}}</li>
  </ul>
  <input type="text" name="name" ng-model='textMessage' value="">
  <button ng-click="messages.push(textMessage)">Increment</button>
```
Now lets go through each new stuff line by line.

`ng-init` very simple , we initialize a new variable, please note that `ng-init` uses only for init inside a template and actually is a bad manner of initing. i use it here just for the sake of this tutorial.
Dont use it in the future!

`ng-repeat` This is a super cool directive , you will use very very very often and basically what it does is iterating through a array and writes the element in the temp variable .
More detailed : `text in messages` means that for each iteration in messages take the element and write it in the `text` variable.

Now a confusing part fro some devs is the understanding what exactly will be looped and printed.
This also simple , the node or dome element or container ( what ever you like to call it ) where the directive was applied will be created for each iteration.
So in our case `<li>` will be created for each element in the `messages` array.

Now we already know `ng-model` to understand the difference between `ng-init` lets just say so ng-model is not only initing the variable but also binds it to the view , in our case ng-model creates 'textMessage' and bind it to input so whenever we type something in input this value will be stored in the model ('textMessage').

And the interactive part is our button.
Here you see we are calling `ng-click` which self explanatory according to the [docs](https://docs.angularjs.org/api/ng/directive/ngClick)
You see it accepts a [expression](https://docs.angularjs.org/guide/expression) and that can be even a `javascript` function.
Lets gather all together , we have init a `array`  `messages` the we have bind value from input to a model(object) and whenever we click on the button we will push this value to the array.
We also have a loop , which loops through the messages array.

Time to test.

Now you see how the data in the loop is update whenever you add new messages ?
This is data binding and some behind the scene magic in action, pretty cool huh ?
Now we need to brake it , push same messages and see what you will have in you console .
This error has even a link lets see what [there](https://docs.angularjs.org/error/ngRepeat/dupes?p0=text%20in%20messages&p1=undefined:undefined&p2=undefined)
In simple words , we have duplicates in our array and the angular magic requires to avoid them.
We can simple tell our loop to track the collection for that we will use the `track by` option.
Change the loop like that:
```html
<li ng-repeat='text in messages track by $index'>{{text}}</li>
```
Here you see that we told the loop to track by $index this index we always have in a loop and it is exactly what it is the current index in the loop.
So what happens now , the loop is not more concerned about the values but rather tracks the elements by the index.

Check it out , try to push duplicates.

Very cool huh ?
That is all for this part and here are your homework's:

> ####Home work:
>  - Setup a form with following field ( name , age , gender ) and a button
>  - On button click get data from the form and push it to a array
>  - Create a container with class `.peoples`  in that container iterate through the `peoples` data array
>  and output in a unordered list the data in the following format:
>   ```<li> Name: ***** , Age: ******, Gender: ***** </li>```
