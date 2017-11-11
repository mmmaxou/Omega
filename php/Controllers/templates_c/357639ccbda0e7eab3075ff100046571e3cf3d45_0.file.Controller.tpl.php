<?php
/* Smarty version 3.1.30, created on 2017-11-11 18:57:23
  from "D:\Max\Softwares\wamp\www\Omega\php\Views\Controller.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a073a03732bf2_15835269',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '357639ccbda0e7eab3075ff100046571e3cf3d45' => 
    array (
      0 => 'D:\\Max\\Softwares\\wamp\\www\\Omega\\php\\Views\\Controller.tpl',
      1 => 1495105284,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./Head.tpl' => 1,
    'file:./Header.tpl' => 1,
    'file:./Menu.tpl' => 1,
    'file:./Hot.tpl' => 1,
    'file:./Categories.tpl' => 1,
    'file:./Footer.tpl' => 1,
    'file:./Modales.tpl' => 1,
    'file:./Scripts.tpl' => 1,
  ),
),false)) {
function content_5a073a03732bf2_15835269 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:./Head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<body>
   
    <?php $_smarty_tpl->_subTemplateRender("file:./Header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <div class="content container-fluid">
        <?php $_smarty_tpl->_subTemplateRender("file:./Menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


        <!-- 2 Columns -->
        <div class="row">

            <!-- Left column -->
            <div class="col-xs-12 col-md-9 col1" id="partial">
                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['file']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            </div>
            <!-- / Left column -->
            <!-- Right column -->
            <div class="col-xs-12 col-md-3 col2">
                <?php $_smarty_tpl->_subTemplateRender("file:./Hot.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php $_smarty_tpl->_subTemplateRender("file:./Categories.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            </div>
            <!-- / Right column -->

        </div>
        <!-- / 2 Columns -->

<!--        include file="./Pager.tpl"-->
    </div>


    <?php $_smarty_tpl->_subTemplateRender("file:./Footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php $_smarty_tpl->_subTemplateRender("file:./Modales.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    
    <?php $_smarty_tpl->_subTemplateRender("file:./Scripts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
<?php }
}
