<?php
    /*
        [*] Modified by universe 
        
        [*] This script is changed for save your markdown document.
        [*] Modified line is 
                - 1 ~ 113   (Read markdown document.)
                - 223       (Output contents.)
                - 293 ~ 294 (Save button and load javascript.)
        [*] Git Link: https://github.com/Lactea98/markdown-online
    
    */
    
    // Saved markdown document.
    $dir = "./savefile/";
    
    // Get latest file 
    $latestFile = scandir($dir, SCANDIR_SORT_DESCENDING)[0];
    
    if($latestFile != ""){
        $readfile = fopen($dir.$latestFile, "r");
        $data = fread($readfile, filesize($dir.$latestFile));
        fclose($readfile);        
    }
    
    // No latest file
    else{
        $data = <<<EOD
        [TOC]

### Themes

#### Setting

configs:

```javascript
{
    // Editor.md theme, default or dark, change at v1.5.0
    // You can also custom css class .editormd-theme-xxxx
    theme : "default | dark",

    // Preview container theme, added v1.5.0
    // You can also custom css class .editormd-preview-theme-xxxx
    previewTheme : "default | dark",

    // Added @v1.5.0 & after version this is CodeMirror (editor area) theme
    editorTheme : editormd.editorThemes['theme-name']
}
```

functions:

```javascript
editor.setTheme('theme-name');
editor.setEditorTheme('theme-name');
editor.setPreviewTheme('theme-name');
```

#### Default theme

- Editor.md theme : `default`
- Preview area theme : `default`
- Editor area theme : `default`

> Recommend `dark` theme.

#### Recommend editor area themes

- ambiance
- eclipse
- mdn-like
- mbo
- monokai
- neat
- pastel-on-dark

#### Editor area themes

- default
- 3024-day
- 3024-night
- ambiance
- ambiance-mobile
- base16-dark
- base16-light
- blackboard
- cobalt
- eclipse
- elegant
- erlang-dark
- lesser-dark
- mbo
- mdn-like
- midnight
- monokai
- neat
- neo
- night
- paraiso-dark
- paraiso-light
- pastel-on-dark
- rubyblue
- solarized
- the-matrix
- tomorrow-night-eighties
- twilight
- vibrant-ink
- xq-dark
- xq-light
EOD;
    }
?>

<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="utf-8" />
        <title>Themes - Editor.md examples</title>
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="../css/editormd.css" />
        <link rel="shortcut icon" href="https://pandao.github.io/editor.md/favicon.ico" type="image/x-icon" />
        <style>
            /* Custom Editor.md theme css example */
            /*
            .editormd-theme-dark {
                border-color: #1a1a17;
                
            }
            
            .editormd-theme-dark .editormd-toolbar {
                background: #1A1A17;
                border-color: #1a1a17;
            }
            
            .editormd-theme-dark .editormd-menu > li > a {
                color: #777;
                border-color: #1a1a17;
            }
            
            .editormd-theme-dark .editormd-menu > li.divider {
                border-right: 1px solid #111;
            }
            
            .editormd-theme-dark .editormd-menu > li > a:hover, .editormd-menu > li > a.active {
                border-color: #333;
                background: #333;
            }*/
                @import url(https://fonts.googleapis.com/css?family=BenchNine:700);
.snip1535 {
  background-color: #c47135;
  border: none;
  color: #ffffff;
  cursor: pointer;
  display: inline-block;
  font-family: 'BenchNine', Arial, sans-serif;
  font-size: 1em;
  font-size: 22px;
  line-height: 1em;
  margin: 15px 40px;
  outline: none;
  padding: 5px 10px 5px;
  position: relative;
  text-transform: uppercase;
  font-weight: 700;
}
.snip1535:before,
.snip1535:after {
  border-color: transparent;
  -webkit-transition: all 0.25s;
  transition: all 0.25s;
  border-style: solid;
  border-width: 0;
  content: "";
  height: 24px;
  position: absolute;
  width: 24px;
}
.snip1535:before {
  border-color: #c47135;
  border-right-width: 2px;
  border-top-width: 2px;
  right: -5px;
  top: -5px;
}
.snip1535:after {
  border-bottom-width: 2px;
  border-color: #c47135;
  border-left-width: 2px;
  bottom: -5px;
  left: -5px;
}
.snip1535:hover,
.snip1535.hover {
  background-color: #c47135;
}
.snip1535:hover:before,
.snip1535.hover:before,
.snip1535:hover:after,
.snip1535.hover:after {
  height: 100%;
  width: 100%;
}
        </style>
    </head>
    <body>
        <div id="layout">
            <header>
                <h1>Themes</h1>
                <p>
                    <select id="editormd-theme-select">
                        <option selected="selected" value="">select Editor.md themes</option>
                    </select>
                    <select id="editor-area-theme-select">
                        <option selected="selected" value="">select editor area themes</option>
                    </select>
                    <select id="preview-area-theme-select">
                        <option selected="selected" value="">select preview area themes</option>
                    </select>
                </p>
            </header>
            <div id="test-editormd">
                <textarea style="display:none;"><?php echo $data; ?></textarea>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="../editormd.js"></script>
        <script type="text/javascript">
			var testEditor;
            
            function themeSelect(id, themes, lsKey, callback)
            {
                var select = $("#" + id);
                
                for (var i = 0, len = themes.length; i < len; i ++)
                {                    
                    var theme    = themes[i];
                    var selected = (localStorage[lsKey] == theme) ? " selected=\"selected\"" : "";
                    
                    select.append("<option value=\"" + theme + "\"" + selected + ">" + theme + "</option>");
                }
                
                select.bind("change", function(){
                    var theme = $(this).val();
                    
                    if (theme === "")
                    {
                        alert("theme == \"\"");
                        return false;
                    }
                    
                    console.log("lsKey =>", lsKey, theme);
                    
                    localStorage[lsKey] = theme;
                    callback(select, theme);
                }); 
                
                return select;
            }

            $(function() {                
                testEditor = editormd("test-editormd", {
                    width        : "90%",
                    height       : 720,
                    
                    // Editor.md theme, default or dark, change at v1.5.0
                    // You can also custom css class .editormd-preview-theme-xxxx
                    theme        : (localStorage.theme) ? localStorage.theme : "dark",
                    
                    // Preview container theme, added v1.5.0
                    // You can also custom css class .editormd-preview-theme-xxxx
                    previewTheme : (localStorage.previewTheme) ? localStorage.previewTheme : "dark", 
                    
                    // Added @v1.5.0 & after version is CodeMirror (editor area) theme
                    editorTheme  : (localStorage.editorTheme) ? localStorage.editorTheme : "pastel-on-dark", 
                    path         : '../lib/'
                });
                
                themeSelect("editormd-theme-select", editormd.themes, "theme", function($this, theme) {
                    testEditor.setTheme(theme);
                });
                
                themeSelect("editor-area-theme-select", editormd.editorThemes, "editorTheme", function($this, theme) {
                    testEditor.setCodeMirrorTheme(theme); 
                    // or testEditor.setEditorTheme(theme);
                });
                
                themeSelect("preview-area-theme-select", editormd.previewThemes, "previewTheme", function($this, theme) {
                    testEditor.setPreviewTheme(theme);
                });          
            });
        </script>
        <button class="snip1535" onclick="saveFile(document.querySelector('#test-editormd > textarea').innerText)">Submit</button>
        <script src='js/saveThisFile.js'></script>
    </body>
</html>