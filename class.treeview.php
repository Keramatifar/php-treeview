<?php
    
Class Treeview
{
     public $queryArray;
     public $treeResult;
     public $prefix;
     
     public function __construct($host, $userName, $password, $dbName, $tableName, $idField, $titleField, $parentIdField,$prefix)
    {
        $this->prefix = $prefix;
        mysql_connect($host,$userName, $password) or die('Not Connect' . mysql_error());
        mysql_select_db($dbName)  or die('Not db' . mysql_error());
        
        $result = mysql_query('Select * From ' . $tableName )  or die('Not query' . mysql_error());
        while ($row = mysql_fetch_array($result,  MYSQL_ASSOC))
        {
          //
          // Wrap the row array in a parent array, using the id as they key
          // Load the row values into the new parent array
          //
          $this->queryArray[$row['id']] = array(
            'id' => $row[$idField], 
            'title' => $row[$titleField], 
            'parent_id' => $row[$parentIdField]
          );
        }
    }

// ----------------------------------------------------------------

//
// Create a method to generate a nested view of an array (looping through each array item)
//
    public function generate_tree_list($array, $parent = 0)
    {

      //
      // Reset the flag each time the function is called
      //
      $has_children = false;

      //
      // Loop through each item of the list array
      //
      foreach($array as $key => $value)
      {
        //
        // For the first run, get the first item with a parent_id of 0 (= root category)
        // (or whatever id is passed to the function)
        //
        // For every subsequent run, look for items with a parent_id matching the current item's key (id)
        // (eg. get all items with a parent_id of 2)
        //
        // This will return false (stop) when it find no more matching items/children
        //
        // If this array item's parent_id value is the same as that passed to the function
        // eg. [parent_id] => 0   == $parent = 0 (true)
        // eg. [parent_id] => 20  == $parent = 0 (false)
        //
        if ($value['parent_id'] == $parent) 
        {                   

          //
          // Only print the wrapper ('<ul>') if this is the first child (otherwise just print the item)      
          // Will be false each time the function is called again
          //
          if ($has_children === false)
          {
            //
            // Switch the flag, start the list wrapper, increase the level count
            //
            $has_children = true;  

          
            $this->treeResult .= " <ul class='parent insRootClose'>"  ;
          
          } 


             {$this->treeResult .= '<li><ins   onclick="expandNode(this.id);"' . "id='$this->prefix" . $value['id'] . "'" . '>&nbsp;</ins>' . $value['title'];}
       
               
     
          $this->generate_tree_list($array, $key); 

          //
          // Close the item
          //
          $this->treeResult .= '</li>';


        }

      }

      //
      // If we opened the wrapper above, close it.
      //
      if ($has_children === true) $this->treeResult .= '</ul>';


    }
    
    public function __destruct()
    {
        
    }

}
?>