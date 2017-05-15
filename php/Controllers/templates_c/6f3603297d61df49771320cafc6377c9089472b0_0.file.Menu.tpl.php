<?php
/* Smarty version 3.1.30, created on 2017-05-10 15:16:10
  from "/home/u462001126/public_html/Omega/php/Views/Menu.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59132eba98b497_15475944',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f3603297d61df49771320cafc6377c9089472b0' => 
    array (
      0 => '/home/u462001126/public_html/Omega/php/Views/Menu.tpl',
      1 => 1494429369,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59132eba98b497_15475944 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!--
<pre>
    <?php echo var_dump($_smarty_tpl->tpl_vars['menuWithChildren']->value);?>

</pre>
-->

<!--Navbar 2-->
<nav class="navbar navbar-default element">
    <div class="container-fluid">

        <!-- Display Header Name -->
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#dropdown-content" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand" href="Index.php"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="dropdown-content" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuNoChildren']->value, 'menuItem');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['menuItem']->value) {
?>

                <li><a href="Index.php?module=article&id=<?php echo $_smarty_tpl->tpl_vars['menuItem']->value['page_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['menuItem']->value['name'];?>
</a></li>

                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuWithChildren']->value, 'dropdown');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dropdown']->value) {
?>

                <li class="dropdown">

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dropdown']->value, 'menu');
$_smarty_tpl->tpl_vars['menu']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->index++;
$_smarty_tpl->tpl_vars['menu']->first = !$_smarty_tpl->tpl_vars['menu']->index;
$__foreach_menu_2_saved = $_smarty_tpl->tpl_vars['menu'];
?> <?php if ($_smarty_tpl->tpl_vars['menu']->first) {?>
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>

                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">

                        <?php } else { ?>
                        <li><a href="Index.php?module=article&id=<?php echo $_smarty_tpl->tpl_vars['menu']->value['page_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
</a></li>
                        <?php }?> <?php
$_smarty_tpl->tpl_vars['menu'] = $__foreach_menu_2_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


                    </ul>
                </li>

                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


            </ul>


            <?php if ($_smarty_tpl->tpl_vars['connected']->value) {?>
            <!--Admin-->
            <ul class="admin-only nav navbar-nav navbar-right">
                <li>
                    <a href="" class="btn-main" data-toggle="modal" data-target="#menu-main">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
            <!--Fin Admin-->
            <?php }?>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- / Navbar 2 -->
<?php }
}
