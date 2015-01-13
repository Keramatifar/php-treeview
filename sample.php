<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Keramatifar Treeview Right-To-Left Sample</title>
<link rel="stylesheet" type="text/css" href="ltr.css">
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="funcs.js"></script>
</head>
<body>
 
 <?php
 
 //include the treeview class
 include 'class.treeview.php';
//create an instant of Treeview Class
 $treeSample = new Treeview('localhost','username','password','database','table', 'primaryKeyField', 'titleField', 'parent_idField', 'perfixForJqueryIDs');
 //Calling the method to generate tree view and set the queryArray public member for Input Parameter
 $treeSample->generate_tree_list($treeSample->queryArray);
 //echo the public member of object names treeResult (Contain the treeview html and jquery codes)
 echo $treeSample->treeResult;

?>
 
 

</body>
</html>