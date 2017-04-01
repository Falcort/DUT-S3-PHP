<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$bdd = new bdd ($MYSQL_host, $MYSQL_dbname, $MYSQL_user, $MYSQL_password);

if(isset($_POST['ordre']) && isset($_POST['description']) && isset($_POST['titre']) && isset($_POST['id']))
{
    $ordre = $_POST['ordre'];
    $description = $_POST['description'];
    $titre = $_POST['titre'];
    $id = $_POST['id'];

    if($_REQUEST['btn_submit']=="modifier")
    {
        $bdd->modifier($id, $ordre, $titre, $description);
    }
    else if($_REQUEST['btn_submit']=="supprimer")
    {
        $bdd->supprimer($id);
    }
}
else if($_REQUEST['btn_submit']=="ajouter")
{
    $max = 20;
    $character_list = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $i = 0;
    $name = "";
    while ($i < $max)
    {
        $name .= $character_list{mt_rand(0, (strlen($character_list) - 1))};
        $i++;
    }

    	$filename = $_FILES["file"]["name"];
    	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
    	$file_ext = substr($filename, strripos($filename, '.')); // get file name
    	$filesize = $_FILES["file"]["size"];
    	$allowed_file_types = array('.png','.jpg','.gif','.jpeg');

    	if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000))
    	{
    		// Rename file
    		$newfilename = $name . $file_ext;
    		if (file_exists("images/" . $newfilename))
    		{
    			// file already exists error
    			echo "You have already uploaded this file.";
    		}
    		else
    		{
    			move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $newfilename);
    			echo "File uploaded successfully.";
    		}
    	}
    	elseif (empty($file_basename))
    	{
    		// file selection error
    		echo "Please select a file to upload.";
    	}
    	elseif ($filesize > 200000)
    	{
    		// file size error
    		echo "The file you are trying to upload is too large.";
    	}
    	else
    	{
    		// file type error
    		echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
    		unlink($_FILES["file"]["tmp_name"]);
    	}

    $bdd->ajouter($newfilename);
}
else
{
    echo "Erreur";
}
header('Location: ?page=modifier');
