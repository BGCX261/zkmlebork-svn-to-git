<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="pl" />
        <title>
            <?php echo $sys->getMeta('title');?>
        </title>
        <meta name="author" content="Jakub Fokczy�ski" />
        <meta name="keywords" content="<?php echo $sys->getMeta('key');?>" />
        <meta name="description" content="<?php echo $sys->getMeta('desc');?>" />
        <meta name="robots" content="index,follow" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <link rel="stylesheet" type="text/css" href="css/userpage.css" />
        <!--[if IE]>
            <link rel="stylesheet" type="text/css" href="css/mainIE.css" />
            <link rel="stylesheet" type="text/css" href="css/styleIE.css" />
        <![endif] -->
        <script language="JavaScript" type="text/javascript" src="js/main.js">
        	
        
        </script>
        <script type="text/javascript" src="js/prototype.js">
        </script>
        <script type="text/javascript" src="js/scriptaculous.js?load=effects">
        </script>
        <script type="text/javascript" src="js/lightbox.js">
        </script>
        <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
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
