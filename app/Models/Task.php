<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
Extending Model allows the Task class to inherit various database-related 
functionalities and methods provided by Eloquent, 
such as querying the database, defining relationships, 
handling timestamps, and more.

ORM is a programming technique that maps
object-oriented programming concepts
to relational database concepts.

Eloquent is Laravel's ORM (Object-Relational Mapping) system.
ORM model = Eloquent model

In Eloquent(or In ORM), a 'model'(or OEM model/Eloquent model)
is a 'PHP class' that represents a specific table in the database.
*/
class Task extends Model
{
    use HasFactory;
    /*
    To enable 'mass assignment' capability
    Redefine the protected field caled 'fillable' 
         protected $fillable = ['all col name that should be mass filled']
    
     eg:
       protected $fillable = ['title','description','long_desctiption']

    we also have a 'guarded' property ,, The columns in that property 
    will always be protected from mass assignment and all the other prperties will be
    available for mass assignment. since it can be dangerous its not used.
     */
 protected $fillable = ['title','description','long_desctiption'];

 public function toggleFunction()
 {
    $this->completed = !$this->completed;
    $this->save();  
 }

}


/*

Laravel's Eloquent ORM provides a wide range of methods 
to interact with databases, perform queries, 
define relationships, and manipulate data. 


Retrieving Data:

all(): ==== Retrieve all records from a table.
find($id): ==== Find a record by its primary key.
findOrFail($id): ==== Find a record by its primary key or throw an exception if not found.
first(): ==== Retrieve the first record that matches the query.
where($column, $operator, $value): ==== Filter records based on a specific condition.
orderBy($column, $direction): ==== Order records by a specific column.
limit($value): ==== Limit the number of records returned.

Creating, Updating, Deleting:

create($attributes): ==== Create a new record with given attributes.
update($attributes): ==== Update existing records that match a given condition.
delete():  ==== Delete records that match a given condition.
delete($id):  ==== Delete a record by its primary key.
destroy($ids): ====  Delete records by their primary keys.

Relationships:

hasOne($related):  ==== Define a one-to-one relationship.
hasMany($related):  ==== Define a one-to-many relationship.
belongsTo($related):  ==== Define an inverse one-to-one or many-to-one relationship.
belongsToMany($related): ====  Define a many-to-many relationship.
has($relation, $operator = '>=', $count = 1): ====  Add relationship constraints to a query.

Aggregates and Counting:

count():  ==== Count the number of records in a result set.
max($column):  ==== Get the maximum value of a column.
min($column):  ==== Get the minimum value of a column.
sum($column): ====  Get the sum of a column's values.

Query Building:

select($columns):  ==== Specify columns to be retrieved.
distinct():  ==== Return only distinct (unique) values.
join($table, $first, $operator, $second):  ==== Perform SQL joins.
groupBy($columns):  ==== Group the results by specified columns.
having($column, $operator, $value):  ==== Add a "having" clause to the query.

Additional Helpers:

get():  ==== Execute the query and retrieve the results.
paginate($perPage):  ==== Paginate the results.
exists():  ==== Check if any records exist in the query result.
*/