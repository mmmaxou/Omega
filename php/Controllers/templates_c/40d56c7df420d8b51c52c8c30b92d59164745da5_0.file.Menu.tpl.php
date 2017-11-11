<?php
/* Smarty version 3.1.30, created on 2017-11-11 18:57:24
  from "D:\Max\Softwares\wamp\www\Omega\php\Views\Menu.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a073a04aa1ee4_31764548',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40d56c7df420d8b51c52c8c30b92d59164745da5' => 
    array (
      0 => 'D:\\Max\\Softwares\\wamp\\www\\Omega\\php\\Views\\Menu.tpl',
      1 => 1497433674,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a073a04aa1ee4_31764548 (Smarty_Internal_Template $_smarty_tpl) {
?>
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

                <!--End first loop-->
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



            <!-- Admin Only-->
            <div class="connected superUser" <?php if (!$_smarty_tpl->tpl_vars['superUser']->value) {?> style="display:none;" <?php }?>>
                <ul class="admin-only nav navbar-nav navbar-right">
                    <li>
                        <a href="" class="btn-main" data-toggle="modal" data-target="#menu-main">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- / Admin Only-->

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- / Navbar 2 -->
<?php }
}
