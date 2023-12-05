# Introdu-o_PHP

When we use include, code that is not in functions runs in the file called by include
Include gets all functions for the file it calls

Require vs include
 
Require gives error and stops -> Fatal error
Include only gives a warning and continues -> Warning
MVC
Model has the data
View shows the data, that is, it has functions prepared to show the data
Controller combines the two, that is, puts the data and displays the data

DATA BASE

1st Connect apache and mysql - xaamp
2nd Create the database in mysql
3rd Create the tables (A_I is for auto increment)
4th Make insertion through phpmyadmin

5th Click on user accounts (click on the box and it will appear)
6th Add user account
7th Enter the username (choose: ex: leonil), hostname (localhost), password (choose)
8th Click on check all to do everything (privileges) with DB and then GO
9th IN VSCode, communicate with BD
//Connect to database
$conn = mysqli_connect(host -> 'localhost', username->'leonil, password->'123', database->'school');


//Check connection, if there is an error
if(!$conn){
echo 'Connection error'. mysqli_connect_error();
}

---
GET RESULTS
//Write query for all pizzas
$sql = 'SELECT * FROM pizzas(table)'
$sql = 'SELECT title, ingredients, id FROM pizzas';

//Make query & get result
$result = mysqli_query($conn, $sql);

// Close the resulting rows as an array (Associative)
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Free from memory (GOOD PRACTICE, NOT MANDATORY)
1mysqli_free_result($result);

//Close connection
2mysqli_close($conn);
#1 and 2 probably not mandatory
print_r($pizzas);


----------
Enable autoloading using composer

Solution to not have too many requires
composer init and press enter
In composer.json
  to add
  "autoload": {

  }


STAYS LIKE THIS

{
     "name": "LuizMorais/mvc",
     "authors": [
         {
             "name": "LuizMorais",
             "email": "LuizMorais@gmail.com"
         }
     ],
     "autoload": {
         "psr-4": {
             "app\\": "./"
         }
     },
     "require": {}
}

AND START USING NAMESPACE

In the terminal, write composer update to update

In index, require autoload, adding this line like this
     <?php

require_once __DIR__.'/vendor/autoload.php';

....

---
Next, we will always put the namespace in our files and we will always use the class through its namespace
   like this
   $app = new \app\core\Application();

   or

   use \app\core\Application;
   $app = new Application();

NB: If you have it in the same namespace, you don't need to put it, for example: Application with the Router

--
In Router, create a function that handles routes, using an associative array for get or post

Resolve function -> Determine current path (url) and current function
---
Create Request class to handle the request

in getPath -> $path = $_SERVER['REQUEST_URI'] ?? '/'; We are saying that if it does not have a URI it must be '/'


-
Normally Router, Database, Request are always in the application to be used anywhere

In the App, we pass the request object to the Router class via constructor



----

NEW AND LESS PHP MVC

Form to get data on the same page

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
   Name: <input type="text" name="fname">
   <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // collect value of input field
   $name = $_POST['fname'];
   if (empty($name)) {
     echo "Name is empty";
   } else {
     echo $name;
   }
}
?>


---
Put foreign key in phpmyadmin
   Structure, relation view

  Put cascade in on delete, on update.
   uc_curso_id_curso_foreign_key
   currenttable_tableForForeignKey_,
   Column choose the foreign key, database (gsm), table (table with foreign key), column (foreign key)

------
ARRAYS
<?php

// PHP program to create
// multidimensional array

// Creating multidimensional
//array
$myarray = array(

// Default key for each will
// start from 0
array("Ankit", "Ram", "Shyam"),
array("Unnao", "Trichy", "Kanpur")
);

// Display the array information
print_r($myarray);
?>

--
Array
(
     [0] => Array
         (
             [0] => Ankit
             [1] => RAM
             [2] => Shyam
         )

     [1] => Array
         (
             [0] => Unnao
             [1] => Trichy
             [2] => Kanpur
         )

)



--------------------------------

<?php

// PHP program to create two
// dimensional associative array
$marks = array(

// Ankit will act as key
"Ankit" => array(

// Subject and marks are
// the key value pair
"C" => 95,
"DCO" => 85,
"FOL" => 74,
),

// Ram will act as key
"Ram" => array(

// Subject and marks are
// the key value pair
"C" => 78,
"DCO" => 98,
"FOL" => 46,
),

// Anoop will act as key
"Anoop" => array(

// Subject and marks are
// the key value pair
"C" => 88,
"DCO" => 46,
"FOL" => 99,
),
);

echo "Display Marks: \n";

print_r($marks);
?>
--
Display Marks:
Array
(
     [Ankit] => Array
         (
             [C] => 95
             [DCO] => 85
             [FOL] => 74
         )

     [Ram] => Array
         (
             [C] => 78
             [DCO] => 98
             [FOL] => 46
         )

     [Anoop] => Array
         (
             [C] => 88
             [DCO] => 46
             [FOL] => 99
         )

)

--------------
Normal array, data[0] - $data = [$title, $comment];
Associative Array - $data = ["Title" => $title, "Comment" => $comment];


----------------
OBJECT ARRAY
public $articles = [];

This is how you push an element to the array

         $this->articles[] = (object)[
             "id" => $c+1,
             "title" => $request->input('title'),
             "text" => $request->input('text'),
             "picture" => $request->input('picture')
         ];
