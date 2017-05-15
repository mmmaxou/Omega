<?php
/* Smarty version 3.1.30, created on 2017-05-11 11:34:28
  from "/home/u462001126/public_html/Omega/php/Views/Head.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59144c447de210_79107208',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19f9d2b83d38c7032e9df8b8a8b0313e2bb3718f' => 
    array (
      0 => '/home/u462001126/public_html/Omega/php/Views/Head.tpl',
      1 => 1494502462,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59144c447de210_79107208 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <?php if ($_smarty_tpl->tpl_vars['description']->value) {?>
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
">
    <?php } else { ?>
    <meta name="description" content="Omega template web site">
    <?php }?>
    
    <?php if ($_smarty_tpl->tpl_vars['keywords']->value) {?>
    <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
">
    <?php } else { ?>
    <meta name="keywords" content="Omega template web site">
    <?php }?>
    
    <meta name="author" content="mmmaxou alexandre">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
bootstrap/css/bootstrap.css">

    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,700" rel="stylesheet">

    <!-- List of CSS Link-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
lib/toastr/build/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
css/component.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
css/layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
css/page.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
css/theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
css/utils.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
css/value.css">
</head>
<?php }
}
