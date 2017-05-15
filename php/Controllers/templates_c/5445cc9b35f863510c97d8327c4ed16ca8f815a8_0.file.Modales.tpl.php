<?php
/* Smarty version 3.1.30, created on 2017-05-09 13:39:19
  from "/home/u462001126/public_html/Omega/php/Views/Modales.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5911c687c07830_39514231',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5445cc9b35f863510c97d8327c4ed16ca8f815a8' => 
    array (
      0 => '/home/u462001126/public_html/Omega/php/Views/Modales.tpl',
      1 => 1494337152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5911c687c07830_39514231 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Modales -->

<div id="menu-main" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- HEADER -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title font-title ">Menu edition</h4>
            </div>


            <!-- BODY -->
            <div class="modal-body menu-edit">
                
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuNoChildren']->value, 'menuItem');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['menuItem']->value) {
?>
                
                <div class="menu-group">
                    <p data-id="<?php echo $_smarty_tpl->tpl_vars['menuItem']->value['id'];?>
">
                        <span contenteditable="true"><?php echo $_smarty_tpl->tpl_vars['menuItem']->value['name'];?>
</span>
                        <a href="#">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </p>
                    <ul class="sub">
                        <li class="add">
                            <a href="#">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="hr"></div>
                
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
                
                <div class="menu-group">
                   
                   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dropdown']->value, 'menu');
$_smarty_tpl->tpl_vars['menu']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->index++;
$_smarty_tpl->tpl_vars['menu']->first = !$_smarty_tpl->tpl_vars['menu']->index;
$__foreach_menu_2_saved = $_smarty_tpl->tpl_vars['menu'];
if ($_smarty_tpl->tpl_vars['menu']->first) {?>
                   
                    <p data-id="<?php echo $_smarty_tpl->tpl_vars['menu']->value['id'];?>
">
                        <span contenteditable="true"><?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
</span>
                        <a href="#">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </p>
                    <ul class="sub ">
                      
                       <?php } else { ?>
                       
                        <p data-id="<?php echo $_smarty_tpl->tpl_vars['menu']->value['id'];?>
">
                            <span contenteditable="true"><?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
</span>
                            <a href="#">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </p>
                        
                        <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['menu'] = $__foreach_menu_2_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        
                        <li class="add ">
                            <a href="#">
                                <i class="fa fa-plus-circle " aria-hidden="true "></i>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="hr"></div>
                
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                
                <div class="add">
                    <a href="#" class="btn btn-main">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </a>
                </div>

            </div>

            <!-- FOOTER -->
            <form class="modal-footer" method="post" action="Menu.php">
                <input id="data" name="data" type="hidden">
                <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-default btn-main save" data-dismiss="modal">Save changes</button>
            </form>

        </div>
    </div>
</div>

<!-- / Modales -->
<?php }
}
