<?php
/* Smarty version 3.1.30, created on 2017-05-10 15:31:48
  from "/home/u462001126/public_html/Omega/php/Views/Index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59133264310376_00584698',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa2ef8a6481aa0eabb09af1b02c3de862cac5d75' => 
    array (
      0 => '/home/u462001126/public_html/Omega/php/Views/Index.tpl',
      1 => 1494430305,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59133264310376_00584698 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuNoChildren']->value, 'article');
$_smarty_tpl->tpl_vars['article']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->index++;
$_smarty_tpl->tpl_vars['article']->first = !$_smarty_tpl->tpl_vars['article']->index;
$__foreach_article_0_saved = $_smarty_tpl->tpl_vars['article'];
?>

<div id="articles" class="col-xs-12">
    <div class="article article-small element" id="article">
        <div class="wrapper-img" data-src="http://lorempixel.com/400/200/"></div>
        <div class="element-content">
            <!-- Article title -->
            <a href="Index.php?module=article&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['page_id'];?>
" class="article-title font-title"><?php echo $_smarty_tpl->tpl_vars['article']->value['name'];?>
</a>
            <!-- Article text -->
            <div class="article-text">
                <p>Officia ea excepteur, summis offendit id labore duis. Se e concursionibus ut eram cupidatat laboris, irure fabulas ubi labore esse in senserit summis se eiusmod tractavissent. Ut culpa quorum sint officia ut ingeniis ex nisi appellat. Amet quibusdam occaecat. Minim o ubi noster cupidatat, quo magna despicationes, excepteur quae dolor a aute do ne multos exercitation, incurreret sunt quem an veniam.</p>
            </div>
            <!-- Horizontal line -->
            <div class="hr"></div>

            <!-- Bottom article -->
            <div class="article-bottom">
                <span class="color-on-hover"><i class="fa fa-calendar" aria-hidden="true"></i> date</span>
                <span class="color-on-hover"><i class="fa fa-eye" aria-hidden="true"></i> views</span>
                <span class="color-on-hover"><i class="fa fa-folder-o" aria-hidden="true"></i> category</span>
                <span class="color-on-hover"><a href="Index.php?module=article&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['page_id'];?>
"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Read more</a></span>
            </div>
            <!-- / Bottom article -->
        </div>
    </div>
</div>

<?php
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_0_saved;
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
$__foreach_article_2_saved = $_smarty_tpl->tpl_vars['article'];
?> <?php if ($_smarty_tpl->tpl_vars['article']->first) {?> <?php } else { ?>

<div id="articles" class="col-xs-12">
    <div class="article article-small element" id="article">
        <div class="wrapper-img" data-src="http://lorempixel.com/400/200/"></div>
        <div class="element-content">
            <!-- Article title -->
            <a href="Index.php?module=article&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['page_id'];?>
" class="article-title font-title"><?php echo $_smarty_tpl->tpl_vars['article']->value['name'];?>
</a>
            <!-- Article text -->
            <div class="article-text">
                <p>Officia ea excepteur, summis offendit id labore duis. Se e concursionibus ut eram cupidatat laboris, irure fabulas ubi labore esse in senserit summis se eiusmod tractavissent. Ut culpa quorum sint officia ut ingeniis ex nisi appellat. Amet quibusdam occaecat. Minim o ubi noster cupidatat, quo magna despicationes, excepteur quae dolor a aute do ne multos exercitation, incurreret sunt quem an veniam.</p>
            </div>
            <!-- Horizontal line -->
            <div class="hr"></div>

            <!-- Bottom article -->
            <div class="article-bottom">
                <span class="color-on-hover"><i class="fa fa-calendar" aria-hidden="true"></i> date</span>
                <span class="color-on-hover"><i class="fa fa-eye" aria-hidden="true"></i> views</span>
                <span class="color-on-hover"><i class="fa fa-folder-o" aria-hidden="true"></i> category</span>
                <span class="color-on-hover"><a href="Index.php?module=article&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['page_id'];?>
"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Read more</a></span>
            </div>
            <!-- / Bottom article -->
        </div>
    </div>
</div>

<?php }?> <?php
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_2_saved;
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
