<?php

//import statement
//can import laraval core classes, libraries,custom classes, Name spaces etc
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description, //nullable type or string
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {
    }
}


$tasks = [
    new Task(
        1,
        'Buy groceries',
        'Task 1 description',
        'Task 1 long description',
        false,
        '2023-03-01 12:00:00',
        '2023-03-01 12:00:00'
    ),
    new Task(
        2,
        'Sell old stuff',
        'Task 2 description',
        null,
        false,
        '2023-03-02 12:00:00',
        '2023-03-02 12:00:00'
    ),
    new Task(
        3,
        'Learn programming',
        'Task 3 description',
        'Task 3 long description',
        true,
        '2023-03-03 12:00:00',
        '2023-03-03 12:00:00'
    ),
    new Task(
        4,
        'Take dogs for a walk',
        'Task 4 description',
        null,
        false,
        '2023-03-04 12:00:00',
        '2023-03-04 12:00:00'
    ),
];






/*
In laraval we cant pass global variables directly as 
callback function parameter in Route::get(). not supported

we need use() method.
*/
$variable = "hello there";

Route::get('passVariables',function() use($variable){
    return "The variable value is ".$variable;
});


//passing array of object as parameter
//if directive
//for each directive
//for else directive
Route::get('taskAry',function() use($tasks){
return view('listOftasks',[
    'taskAry'=> \App\Models\Task::all() //all() method is 
                                        //provided by Eloquent to fetch all rows 
                                        //from tasks table
                                        //and return them as collection.
]);
});

/*
ORM is a programming technique that maps
object-oriented programming concepts
to relational database concepts.

Eloquent is Laravel's ORM (Object-Relational Mapping) system.
ORM model = Eloquent model 
Eloquent is the ORM (Object-Relational Mapping) included with Laravel, providing a 
simple ActiveRecord implementation for working with your database. Eloquent models in Laravel represent 
tables in your database.They allow you to query and manipulate data in those tables using
PHP syntax rather than writing raw SQL queries.
Each Eloquent model typically corresponds to a table in your database. 
For example, a User model might represent the users table.

In Eloquent(or In ORM), a 'model'(or OEM model/Eloquent model)
is a 'PHP class' that represents a specific table in the database.
*/







//laravel collection
/*
The laravel collect() method convert any array into a laravel collection
In Laravel, a Collection is an enhanced and powerful way to work with 
arrays of data. 
It's an instance of the Illuminate\Support\Collection class
use Illuminate\Support\Collection;
*/
// $taskobj = collect($tasks)->firstWhere('id', $id); //checks if the property 'id' of
//                                                    //of an item(object) inside an array


/*

Laravel's Illuminate\Support\Collection class provides a wide range of powerful methods
for working with collections efficiently. Here are some common methods 
available on a Collection object:

Creating and Modifying Collections:

collect($array): ----- Create a collection instance from an array.
map($callback):  ----- Modify each item in the collection using a callback.
filter($callback):  ----- Filter the collection using a callback function.
pluck('key'):  ----- Extract a list of values from a given key in the collection.
flatten(): -----  Flatten a multi-dimensional collection into a single level.
merge($arrayOrCollection):  ----- Merge the collection with another array or collection.
reverse(): -----  Reverse the items in the collection.

Retrieving Items:

get($key): -----  Get an item from the collection by key.
first():  ----- Get the first item from the collection.
last():  ----- Get the last item from the collection.
nth($step):  ----- Get every Nth item from the collection.
keys(): ----- Get all the keys from the collection.

Aggregating Data:

count():  ----- Count the number of items in the collection.
sum('key'):  ----- Calculate the sum of values for a given key in the collection.
avg('key'):  ----- Calculate the average of values for a given key in the collection.
max('key'), min('key'):  ----- Get the maximum/minimum value for a given key.

Iterating and Manipulating:

each($callback):  ----- Iterate over the collection and apply a callback function.
slice($start, $length):  ----- Extract a slice of items from the collection.
sort($callback):  ----- Sort the collection using a callback function.
shuffle():  ----- Shuffle the items in the collection.

Checking and Filtering:

contains($value):  ----- Check if the collection contains a specific value.
isEmpty(), isNotEmpty():  ----- Check if the collection is empty or not.
where('key', $value):  ----- Filter items in the collection by key-value pairs.eg: where('age', '>', 30);
whereIn('key', $values):  ----- Filter items where the key exists in an array of values.
*/ 





Route::get('/callById/{id}',function($id) {  //use($tasks){
    // $taskobj = collect($tasks)->firstWhere('id', $id); //checks if the property 'id' of
    //                                                    //of an item(object) inside an array
    // if(!$taskobj){
    //     abort(response::HTTP_NOT_FOUND); //use Illuminate\Http\Response
    // }

    return view('show',['taskobj'=>\App\Models\Task::find($id)]); //parameter has to be the primary key
    //find() return an associative array
    //When dealing with composite or combined primary keys (a primary key that consists of multiple columns), 
    //you can retrieve a record using 
    //eloquent's find() method, by passing an array of values that correspond to the composite primary key columns.
    //$modelInstance = MyModel::find([$a,$b]);
})->name('tasks.title');









//Route key word is used for redirecting
/*
Route in Laravel isn't a class itself but a facade that provides a static-like interface 
to interact with the underlying Router class. The Route::get() method is a static method
provided by the Route facade, used to register GET routes in the application.

In Laravel, a facade is a design pattern used to provide a simple and static-like interface 
to the more complex underlying components of the framework. Facades offer a convenient way to
access Laravel's services, classes, or components without requiring direct instantiation 
or binding to the underlying implementation.
when facad calls a method, the underling class is automaticaly instantiated


Dependency injection.

Dependency Injection (DI) is a software design pattern used to achieve Inversion of Control (IoC)
by passing dependencies (services or objects that a class needs to perform its function)
as arguments to a class instead of the class creating or managing those dependencies internally.
*/
// routing is the process of redirecting the request from user
// usualy a url, to some specific action that can return a response
// In this case the action is a function that returns a response using laravel helper function view()
//Route::get() is a method used to define a route in Laravel. 
//In this case, it's defining a route for HTTP GET requests.
//Route is trriggered when user access the specifiedd url
//Routes provide a way to map URLs to application logic, 
//allowing you to define what happens when a user accesses a particular URL endpoint.


//syntax
//Route::verb(function(){}) -> A "verb" refers to an HTTP method or action that defines 
//how the server should process incoming requests. 
//These verbs correspond to various HTTP methods used in web development to perform different actions on resources

//we have 
//GET
//POST
//PUT
//DELETE

//we mostly use GET with the get()
//get() in the context of Laravel's routing system is used to define a route that responds to HTTP GET requests.
//(pic-1111)

//view('welcome') is a helper function in Laravel that loads a view named welcome. 
//It instructs Laravel to render a specific view file and return its content as an HTTP response.
Route::get('/', function () {
    return view('welcome'); // welcome.php is a page in the directory
});

//The return statement in the callback function is used to  
//return an HTTP response to the client (typically a web browser or an API consumer).

/*
blade
Blade is the templating engine used in Laravel, 
and a Blade template refers to a view file that utilizes Blade syntax to create dynamic 
and reusable layouts or components within a Laravel application.
Blade esacapes any html or script put into variables passed in view()
*/

//Dynamic values
/*
{name} and {age} are placeholders or route parameters that capture dynamic values from the URL.
if the page is expecting the valus then it should be given .
*/
Route::get('/newurl/{name}/{age}', function ($name,$age) {
    return "hello to new page ".$name.$age;
});

/*
In Laravel's routing system, the ->name('repage') method chain allows you to assign a unique
name or alias to a route. This name can be used to refer to that specific 
route elsewhere in your application,
*/

Route::get('/redirectpage',function(){
    return 'successfully arraived at redirected page';
})->name('repage');


/*
In Laravel, redirect() is a global helper function that returns an instance of 
the Illuminate\Routing\Redirector class, allowing you to perform redirects in your application. 
The route() method, used in conjunction with redirect(), is a method of the Redirector class.
*/
Route::get('/startRedirect',function(){
    // return redirect('/redirectpage');
    //or
    return redirect()->route('repage'); //trigger the route of 'repage' // This route() is not the global helper function 
                                        // but the functioni of the redirector class
//redirect() returns a redirect object of class redirector with a function route() 
});

//named routs
//open termiinal 
//type php artison route list (lists the routes)

//fall back route

Route::fallback(function(){ //The fallback() method in Laravel belongs to the Illuminate\Routing\Router class. 
return " No such Routs";
});

//viewing blade template index.blade.php
Route::get('bladePage',function(){
    return view('index');
});

// passing and accessing values in blade template

Route::get('bladePageWithVariable',function(){
return view('indexVariable',[
    'name' => 'Tanjiro', //automaticaly stops crosss site scripting
    'age' => 7878  
]);
});

// calling blade directive page
Route::get('gotoDirectives',function(){
    return view('directives',[
        'name'=>'hari'
    ]);
});

// Displaying forms

Route::view('/tasks/create','create')->name('tasks.create');

Route::post('/tasks',function(request $request){
// dd($request->all());
$data = $request->validate([
    'title'=>'required|max:255',
    'description'=>'required',
    'long_description'=>'required'
    // 'long_description' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
    // 'email' => 'required|email|unique:users,email_address'
]);
 //create a task model
 $task = new \App\Models\Task;
 $task->title = $data['title'];
 $task->description = $data['description'];
 $task->long_description = $data['long_description'];

 $task->save(); //insert into db
/*
The save() method triggers an SQL INSERT query, inserting a new record
with the specified attributes into the associated database table (tasks in this case).
*/
//  dd($task->id);
 return view('show',['taskobj'=>\App\Models\Task::find($task->id)])->with('success','Insertion success full');
})->name('task.store');



//middlewere
/*
middleware is a mechanism that allows you to filter HTTP requests entering your application. 
It sits between the incoming requests and your application's 
core business logic, enabling you to perform actions or checks on the requests and responses.
*/


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//Edit form

Route::get('/tasks/{id}/edit',function($id){
    return view('edit',[
        'taskobj'=>\App\Models\Task::findOrFail($id)
    ]);
});


Route::put('/tasks/{id}',function($id,request $request){

$data = $request->validate([
    'title'=>'required|max:255',
    'description'=>'required',
    'long_description'=>'required'

]);

 $task = \App\Models\Task::findOrfail($id);
 $task->title = $data['title'];
 $task->description = $data['description'];
 $task->long_description = $data['long_description'];

 $task->save(); //this time this save will run an update quary..Laravel is smart
/*
The save() method triggers an SQL INSERT query, inserting a new record
with the specified attributes into the associated database table (tasks in this case).
*/
//  dd($task->id);
 return view('show',['taskobj'=>\App\Models\Task::find($task->id)])->with('success','Insertion success full');
})->name('task.update');


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// making the creat and edit codes small

//Route model binding

/*
Route model binding in Laravel is a feature that allows you to automatically 
inject model instances into route callbacks or controller actions based on 
route parameters. It simplifies fetching model instances by automatically resolving the model
instance using the route parameter, which typically corresponds to the model's primary key.
*/

/*
//consider this code

Route::get('/tasks/{id}/edit',function($id){
    return view('edit',[
        'taskobj'=>\App\Models\Task::findOrFail($id)
    ]);
});

//This can be written as


                    //by default laraval assume the 'task' is the primary key 'id' of the table associated with Task, even though the we gave 'task'.
                    //This is because it laraval is configured to keep 'id' as the name of primary key in every model. 
                    //We can change it too, iby adding a function in the Task.php model 
Route::get('/tasks/{task}/edit',function(Task $task){
    return view('edit',[                 // This type hinting is mandatory
        'taskobj'=> $task  //so no need to use findOrfail() since by here laraval automaticaly fetch the record from the database
    ]);
});

//both codes will have the same exact result
//If the particular model is not found laraval shows the 404 exception (page not found)
*/


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// Deleting from database
//First method: We use the delete http verb


//We are trying to fetch a record from db with specific id 'task'.. if its not available it will throw  a 404 error
Route::delete('/tasks/{task}',function(\App\Models\Task $task){
$task->delete(); //simple- thats all needed to delete from db
return redirect()->route('tasks.create')->with('success'.'Task deleted successfully');
//this redirect to the create page. usually go to home page
})->name('tasks.destroy');



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Paginatioin


Route::get('paginate',function() use($tasks){
return view('paginate',[
    'taskAry'=> \App\Models\Task::paginate()//all() method is 
                                        //provided by Eloquent to fetch all rows 
                                        //from tasks table
                                        //and return them as collection.
]);
});

/*

In Laravel's Eloquent ORM, Task::get() and Task::all() both retrieve 
all the rows from the tasks table, but they have a subtle difference in
 their usage and behavior:

Task::get():
The get() method is used to retrieve multiple records from the database based 
on certain conditions.
It allows you to add additional query constraints using methods like where(), 
orderBy(), limit(), etc., before calling get().
It returns a collection of records that match the specified conditions.

The all() method retrieves all records from the table without applying 
any additional conditions or constraints.
*/ 



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Toggle 'mark as read'
Route::put('tasks/toggle/{task}',function(\App\Models\Task $task){
// $task->completed = ! $task->completed;
// $task-> save();
$task->toggleFunction(); // this changes the value of completed property

                   //The back function is the important here.. it reloads the same page with the changes
                   // when the page reloads the new value of tthe completed property is applied to the page
return redirect()->back()->with('success','Task updated successfuly');
})->name('task.toggle');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
