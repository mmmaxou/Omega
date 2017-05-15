<?php
/* Smarty version 3.1.30, created on 2017-05-11 13:38:11
  from "/home/u462001126/public_html/Omega/php/Views/Scripts.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59146943336ae6_19898207',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a24b4e097ce290ce9655f7a130aa3c5fa77055ec' => 
    array (
      0 => '/home/u462001126/public_html/Omega/php/Views/Scripts.tpl',
      1 => 1494509889,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59146943336ae6_19898207 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- JavaScript link -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
js/jquery-2.2.4.min.js" type="application/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
bootstrap/js/bootstrap.min.js" type="application/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
lib/toastr/build/toastr.min.js" type="application/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
js/main.js" type="application/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
lib/tinymce.min.js" type="application/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
js/article.js" type="application/javascript"><?php echo '</script'; ?>
>

<!--Display messages to the user-->
<?php if ($_smarty_tpl->tpl_vars['toastr']->value) {
echo '<script'; ?>
>
    toastr["<?php echo $_smarty_tpl->tpl_vars['toastr_type']->value;?>
"]("<?php echo $_smarty_tpl->tpl_vars['toastr_message']->value;?>
");
    
    var url = window.location.href;
    if (url.search(/Index/)) {
        history.replaceState("","","Index.php");
    }   
    if (url.search(/Article/)) {
        history.replaceState("","","Article.php");
    }   
    if (url.search(/Research/)) {
        history.replaceState("","","Research.php");
    }    
    
<?php echo '</script'; ?>
>
<?php }
}
}
