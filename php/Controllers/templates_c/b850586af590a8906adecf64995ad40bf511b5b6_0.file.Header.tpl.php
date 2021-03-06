<?php
/* Smarty version 3.1.30, created on 2017-05-11 11:03:25
  from "/home/u462001126/public_html/Omega/php/Views/Header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_591444fd79aec7_42745398',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b850586af590a8906adecf64995ad40bf511b5b6' => 
    array (
      0 => '/home/u462001126/public_html/Omega/php/Views/Header.tpl',
      1 => 1494500581,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_591444fd79aec7_42745398 (Smarty_Internal_Template $_smarty_tpl) {
?>
<header>

    <!--Navbar 1-->
    <nav class="navbar navbar-default" id="main-navbar">
        <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="Index.php"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 | <?php if ($_smarty_tpl->tpl_vars['connected']->value) {?>Connected<?php } else { ?>Not connected<?php }?></a>
                <div id="connexion-btn" class="pull-right">
                    <a class="btn btn-main" data-toggle="collapse" data-target="#connexion-dropdown">
                    <?php if ($_smarty_tpl->tpl_vars['connected']->value) {?>
                        <p><?php echo $_smarty_tpl->tpl_vars['login']->value;?>
</p><!--
                        --><i class="fa fa-times" aria-hidden="true"></i>
                    <?php } else { ?>
                        <i class="fa fa-sign-in" aria-hidden="true"></i><!--
                        --><p>Log in</p><!--
                        --><i class="fa fa-times" aria-hidden="true"></i>
                    <?php }?>
                    </a>
                </div>
            </div>

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- / Navbar 1-->

    <div class="collapse" id="connexion-dropdown">

        <?php if ($_smarty_tpl->tpl_vars['connected']->value) {?>
        <a href="#change" data-toggle="collapse" class="btn btn-default btn-block">Change Password</a>

        <!--Form for changing password-->
        <div id="change" class="collapse">
            <form action="Change.php" class="active" method="post">

                <div class="hr"></div>

                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon7"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Old password" name='old' aria-describedby="basic-addon7">
                </div>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon8"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    <input type="password" class="form-control" placeholder="New password" name='password' aria-describedby="basic-addon8">
                </div>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon9"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    <input type="password" class="form-control" placeholder="Confirm New password" name='confirm' aria-describedby="basic-addon9">
                </div>

                <div class="hr"></div>
                <input class="btn btn-main btn-block" type='submit' value='Change' style="cursor:pointer;">
                
                <div class="hr"></div>
            </form>
        </div>
        <!--Form for changing password-->


        <a href="Disconnect.php" style="cursor:pointer;" class="btn btn-main btn-block">Disconnect</a>
        <!--/ Not connected-->
        <?php } else { ?>
        <ul class="nav nav-pills nav-justified">
            <li role="presentation" data-toggle="subscribe" class="active"><a href="#">Subscribe</a></li>
            <li role="presentation" data-toggle="connect"><a href="#">Connect</a></li>
        </ul>
        <form class="active" id="subscribe" action="Subscribe.php" method="post">

            <div class="hr"></div>

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Login" name='login' aria-describedby="basic-addon1">
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon2"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Email" name='email' aria-describedby="basic-addon2">
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon3"><i class="fa fa-lock" aria-hidden="true"></i></span>
                <input type="password" class="form-control" placeholder="Password" name='password' aria-describedby="basic-addon3">
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon4"><i class="fa fa-lock" aria-hidden="true"></i></span>
                <input type="password" class="form-control" placeholder="Verification" name='confirm' aria-describedby="basic-addon4">
            </div>

            <div class="hr"></div>
            <input class="btn btn-main btn-block" type='submit' value='Subscribe' style="cursor:pointer;">

        </form>
        <form id="connect" action="Login.php" method="post">

            <div class="hr"></div>

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon5"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Login" name='login' aria-describedby="basic-addon5">
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon6"><i class="fa fa-lock" aria-hidden="true"></i></span>
                <input type="password" class="form-control" placeholder="Password" name='password' aria-describedby="basic-addon6">
            </div>


            <div class="hr"></div>
            <input class="btn btn-main btn-block" type='submit' value='Connect' style="cursor:pointer;">

        </form>
        <?php }?>
    </div>

    <!-- Banner -->
    <div class="banner">
        <div class="container-fluid">

            <!--Main title and subtext-->
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 col-sm-offset-2 col-sm-8">
                    <h1 class="font-huge"><span id="logo">Ω</span>mega</h1>
                </div>
                <div class="col-xs-12 col-sm-offset-2 col-sm-8">
                    <h2 class="font-big">The starting place of your life. We are a website dedicated to create cool stuff and neat things. Love us !</h2>
                </div>
            </div>
            <!--Search Bar-->
            <div class="row search-bar">
                <div class="col-xs-12 col-sm-offset-2 col-sm-8">
                    <form action="Index.tpl?module=research" class="fit">

                        <input type="text" class="fit-large btn" placeholder="Search something to begin.">
                        <a href="Index.tpl?module=research" class="btn btn-search">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </a>

                    </form>
                </div>
            </div>
            <!--End Search Bar-->
        </div>
    </div>
    <!-- / Banner-->

</header>
<?php }
}
