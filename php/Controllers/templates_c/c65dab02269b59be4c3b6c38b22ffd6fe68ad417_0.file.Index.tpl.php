<?php
/* Smarty version 3.1.30, created on 2017-11-11 18:57:24
  from "D:\Max\Softwares\wamp\www\Omega\php\Views\Index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a073a04ba7a97_81853326',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c65dab02269b59be4c3b6c38b22ffd6fe68ad417' => 
    array (
      0 => 'D:\\Max\\Softwares\\wamp\\www\\Omega\\php\\Views\\Index.tpl',
      1 => 1495440660,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a073a04ba7a97_81853326 (Smarty_Internal_Template $_smarty_tpl) {
?>


<h2 class="font-title">Preview of all articles</h2>
<div class="hr"></div>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuNoChildren']->value, 'article');
$_smarty_tpl->tpl_vars['article']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->index++;
$_smarty_tpl->tpl_vars['article']->first = !$_smarty_tpl->tpl_vars['article']->index;
$__foreach_article_3_saved = $_smarty_tpl->tpl_vars['article'];
?>

<div class="col-xs-12">
    <div class="article article-small element">
        <div class="wrapper-img" data-src="../../uploads/<?php echo $_smarty_tpl->tpl_vars['article']->value['image'];?>
"></div>
        <div class="element-content">
            <!-- Article title -->
            <a href="Index.php?module=article&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['page_id'];?>
" class="article-title font-title"><?php echo $_smarty_tpl->tpl_vars['article']->value['name'];?>
</a>
            <!-- Article text -->
            <div class="article-text">
                <?php echo $_smarty_tpl->tpl_vars['article']->value['excerpt'];?>

            </div>
            <!-- Horizontal line -->
            <div class="hr"></div>

            <!-- Bottom article -->
            <div class="article-bottom">
                <span class="color-on-hover"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['article']->value['date'];?>
</span>
                <span class="color-on-hover"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['article']->value['view'];?>
</span>
                <span class="color-on-hover"><i class="fa fa-folder-o" aria-hidden="true"></i> category</span>
                <span class="color-on-hover"><a href="Index.php?module=article&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['page_id'];?>
"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Read more</a></span>
            </div>
            <!-- / Bottom article -->
        </div>
    </div>
</div>

<?php
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_3_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


<!--Separation-->

<!--All Menu with children-->
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuWithChildren']->value, 'dropdown');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dropdown']->value) {
?>

<!--Nested Foreach-->
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dropdown']->value, 'article');
$_smarty_tpl->tpl_vars['article']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->index++;
$_smarty_tpl->tpl_vars['article']->first = !$_smarty_tpl->tpl_vars['article']->index;
$__foreach_article_5_saved = $_smarty_tpl->tpl_vars['article'];
?> <?php if ($_smarty_tpl->tpl_vars['article']->first) {?> <?php } else { ?>

<div class="col-xs-12">
    <div class="article article-small element">
        <div class="wrapper-img" data-src="../../uploads/<?php echo $_smarty_tpl->tpl_vars['article']->value['image'];?>
"></div>
        <div class="element-content">
            <!-- Article title -->
            <a href="Index.php?module=article&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['page_id'];?>
" class="article-title font-title"><?php echo $_smarty_tpl->tpl_vars['article']->value['name'];?>
</a>
            <!-- Article text -->
            <div class="article-text">
                <?php echo $_smarty_tpl->tpl_vars['article']->value['excerpt'];?>

            </div>
            <!-- Horizontal line -->
            <div class="hr"></div>

            <!-- Bottom article -->
            <div class="article-bottom">
                <span class="color-on-hover"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['article']->value['date'];?>
</span>
                <span class="color-on-hover"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['article']->value['view'];?>
</span>
                <span class="color-on-hover"><i class="fa fa-folder-o" aria-hidden="true"></i> category</span>
                <span class="color-on-hover"><a href="Index.php?module=article&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['page_id'];?>
"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Read more</a></span>
            </div>
            <!-- / Bottom article -->
        </div>
    </div>
</div>

<?php }?> <?php
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_5_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
}
}
