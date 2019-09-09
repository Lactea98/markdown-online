<?php
    /*
        [*] Made by universe 
        
        [*] This script will save your markdown document.
        [*] Saved file path is "./savefile/{current time}.md".
        
        [*] Git Link: https://github.com/Lactea98/markdown-online
    
    */
    if(isset($_POST['content'])){
        // Save path is "./savefile/"
        $savePath = "./savefile/";
        
        try{
            // $_POST['content'] is your markdown document contents.
            $content = $_POST['content'];
            
            // File name is current time.
            $filename = date("Y-m-d H:i",time());
            $file = fopen($savePath.$filename.".md", "w");
            
            fwrite($file, $content);
            fclose($file);
            
            // Ok, successful.
            header($_SERVER['SERVER_PROTOCOL']." 200 OK");
        }
        // Cannot save file, error...
        catch (Exception $e){
            header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        }
    }
    else{
        // Do not direct request this file.
        header($_SERVER['SERVER_PROTOCOL']." 403 Forbidden");
    }
?>