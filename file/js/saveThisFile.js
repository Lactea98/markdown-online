/*
    [*] Made by universe 
    
    [*] Git Link: https://github.com/Lactea98/markdown-online
    
*/

function saveFile(text){
    $.ajax({
        url : "./saveFile.php",
        data : {'content' : text},
        type : "POST",
        dataType : "text",
        
        success: function(jqXHR) { // Success
            alert("Successfully save this content to file.");
        },
        error: function(jqXHR) { // Fail
            alert("Cannot save this content.");
        }
    })
}

