# Introdu-o_PHP


Ankit] => Array
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
