<?php /* Smarty version 2.6.26, created on 2013-06-09 14:08:53
         compiled from index.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
            
        <!--<link rel="stylesheet" type="text/css" href="content/css/bootstrap.css">-->
        <link rel="stylesheet" type="text/css" href="content/css/bootmetro-icons.css">
        <link rel="stylesheet" type="text/css" href="content/css/bootmetro.css">
        <link rel="stylesheet" type="text/css" href="content/css/bootmetro-responsive.css">
        <link rel="stylesheet" type="text/css" href="content/css/bootmetro-ui-light.css">
        <link rel="stylesheet" type="text/css" href="content/css/datepicker.css">
        <!--[if IE 7]>
        <link rel="stylesheet" type="text/css" href="content/css/bootmetro-icons-ie7.css">
        <![endif]-->
            
        <!--  these two css are to use only for documentation -->
        <link rel="stylesheet" type="text/css" href="content/css/demo.css">
        <link rel="stylesheet" type="text/css" href="scripts/google-code-prettify/prettify.css" >
            
        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="content/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="content/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="content/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="content/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="content/ico/apple-touch-icon-57-precomposed.png">
            
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>window.jQuery || document.write("<script src='scripts/jquery-1.8.3.min.js'>\x3C/script>")</script>
            
        <script type="text/javascript" src="scripts/google-code-prettify/prettify.js"></script>
        <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
        <script type="text/javascript" src="scripts/bootmetro-panorama.js"></script>
        <script type="text/javascript" src="scripts/bootmetro-pivot.js"></script>
        <script type="text/javascript" src="scripts/bootmetro-charms.js"></script>
        <script type="text/javascript" src="scripts/bootstrap-datepicker.js"></script>
        <!--<script type="text/javascript" src="scripts/jquery.nicescroll.js"></script>-->
        <script type="text/javascript" src="scripts/jquery.touchSwipe.js"></script>
        <script type="text/javascript" src="scripts/demo.js"></script>
        <script type="text/javascript" src="scripts/holder.js"></script>
        
        <script type="text/javascript" src="scripts/document.js"></script>
            
            
    </head>
    <body>
        <h3>Meme Generator</h3>
            
        <?php if (count ( $this->_tpl_vars['errors'] )): ?>
        <ul>
            <?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
            <li><?php echo $this->_tpl_vars['error']; ?>
</li>
            <?php endforeach; endif; unset($_from); ?>
        </ul>
        <?php endif; ?>
        <div class="span5">
            <form action="">
                <input class="span9" type="text" name="image_search" value="" placeholder="Image Url"/>
                    
                    
                <input class="span9" type="text" name="meme_top" value="" placeholder="MEME TOP TEXT"/>
                    
                <input class="span9" type="text" name="meme_bottom" value="" placeholder="MEME BOTTOM TEXT"/>
                    
                <button type="submit">
                    <i class="icon-image"></i> Submit
                    </button>
                </p>
            </form>
        </div>
            
            
    </body>
</html>