<?php
/* Smarty version 3.1.30, created on 2017-11-11 18:57:24
  from "D:\Max\Softwares\wamp\www\Omega\php\Views\Hot.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a073a04c8a3d8_78998883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51105dd1f5fd3d54311da2522efca48222d5f31f' => 
    array (
      0 => 'D:\\Max\\Softwares\\wamp\\www\\Omega\\php\\Views\\Hot.tpl',
      1 => 1495535304,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a073a04c8a3d8_78998883 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="hot" class="element element-lister">
    <div class="element-content container-fluid">

        <div class="font-title">Hot articles</div>
        <div class="row">
            
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hot']->value, 'hot_item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['hot_item']->value) {
?>
            <div class="col-xs-12 col-sm-6 col-md-12">
                <a href="/article/<?php echo $_smarty_tpl->tpl_vars['hot_item']->value['id'];?>
">
                    <div class="hot-picture wrapper-img" data-src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
uploads/<?php echo $_smarty_tpl->tpl_vars['hot_item']->value['image'];?>
">

                        <div class="overlay overlay-black"></div>
                        <div class="hot-caption"><?php echo $_smarty_tpl->tpl_vars['hot_item']->value['title'];?>
</div>

                    </div>
                </a>
            </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </div>
    </div>
</div>
<?php }
}
