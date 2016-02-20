## AngularJs Course chapter 1
![](https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Npm-logo.svg/320px-Npm-logo.svg.png)

Npm is a package manager , like composer ( php ) or bundler ( ruby ).

We will use it to install all required libs.
As npm is a Node Package Manager we need to install nodeJs.

The process is very simple go to [nodejs website](https://nodejs.org/en/) and download the `4.*` version
The next steps depend on your OS but its both for unix and windows systems very easy.
Here is a doc for installation using [package manager](https://nodejs.org/en/download/package-manager)

After you completed the installation you should have npm and nodejs installed.
Check if you have successfully installed it by going to `terminal` or `cmd` (windows)
and run
```
node -v
```
```
npm -v

```
Btw on some unix `node -v` may not work , try instead `nodejs -v`
From now we are able to use npm.

### Sample project using Bower

Lets create a sample app and install [bower](http://bower.io/) using npm.
Go to `terminal/cmd` and type `npm install bower -g` now the flag `-g` is optional here its stands for global.

Btw we could actually install angularJs using npm using this command `npm install angular`
But i prefer to work with bower when managing library and frameworks.

Now lets create a folder somewhere on you drive , call it `app` and cd into it.
Lets assume this will be our root folder now run this command
`bower install angular`
( You could get and error that says that git is not installed , if its the case install it for windows user read this [guide](http://blog.countableset.ch/2012/06/07/adding-git-to-windows-7-path/)  )

After installation is complete check out you folder you should have a folder called `bower_components/angular`
Congratulation you have successfully installed angular using `bower`.
While it might be faster just to download the angular `min.js` but it is true just because we have spend time on setup.

### Dependencies management
In fact bower is cool because it can manage all you required libs.
Lets open go to `bower_components/angular/` and open `bower.json`

The content should look like that
```json
{
  "name": "angular",
  "version": "1.5.0",
  "license": "MIT",
  "main": "./angular.js",
  "ignore": [],
  "dependencies": {
  }
}
```
Take a look at the
```json
 "dependencies": {
  }
```

Now thats a cool feature we can use !
Lets create our own bower.json file , `cd` to the app root
and create and empty bower.json file open it and add this content:
```json
{
  "name": "myApp",
  "version": "0.0.1",
  "dependencies": {
    "angular":"1.4.*"
  },
  "devDependencies": {}
}
```
This pretty self explanatory , so `name and version` are our apps name and version.
Now in the `dependencies` we are  adding `angular` and the version 1.4
Lets delete the folder `bower_components` and the run

```
bower install
```
This will look in to our bower.json and read all the `dependencies` we have required and install them.
What does this mean ?
Well assume we need bootstrap for our project , we can require it in dependencies.
just run the command:
```
bower install bootstrap --save
```
Note here the `--save` flag , this will write in to bower.json in `dependencies:` a line with bootstrap.
Just open the file and see it by yourself you should see a new line like `    "bootstrap": "^3.3.6"`
It was fast , but not only the speed matters , but also the weight of the project , we dont need now to include libs in the repo of our project.
you can init a new git repo and gitingore `bower_components` because you dont need them in you git repo , the all will be installed using `bower install`
One last thing to mention , open `bower_components` and you will see `jQuery`.
But we didnt required it , but bootstrap needs it and it has in its bower.json `jQuery` as a dependency
Thats why you dont need to bother about all the libs a module might need and concentrate on development.
