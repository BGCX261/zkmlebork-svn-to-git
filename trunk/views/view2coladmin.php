<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="pl" />   
        <link rel="stylesheet" type="text/css" href="../css/main.css" />
        <link rel="stylesheet" type="text/css" href="../css/adminpage.css" />
        <!--[if IE]>
            <link rel="stylesheet" type="text/css" href="css/mainIE.css" />
            <link rel="stylesheet" type="text/css" href="css/styleIE.css" />
        <![endif] -->
        <script language="JavaScript" type="text/javascript" src="../js/admin.js">
        </script>
       
    </head>
    <body>
        <div id="header">
            <?php $sys->LoadHtml('HEADER'); ?>
        </div>
        <div id="main">
            <div id="left">
                <?php $sys->LoadHtml('LEFT'); ?>
            </div>
            <div id="center">
            	<div id="cnt_top"></div>
				<div id="cnt_main">	
                	<?php $sys->LoadHtml('CENTER'); ?>
				</div>
				<div id="cnt_bottom"></div>
            </div>
        </div>
        <div id="footer">
            <?php $sys->LoadHtml('FOOTER'); ?>
        </div>
    </body>
</html>
