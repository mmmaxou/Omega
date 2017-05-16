<!--
<pre>
    {$menuWithChildren|@var_dump}
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
            <a class="navbar-brand" href="Index.php">{$title}</a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="dropdown-content" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">

                {foreach $menuNoChildren as $menuItem}

                <li><a href="Index.php?module=article&id={$menuItem.page_id}">{$menuItem.name}</a></li>

                {/foreach}
                <!--End first loop-->
                {foreach $menuWithChildren as $dropdown}

                <li class="dropdown">

                    {foreach $dropdown as $menu} {if $menu@first}
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    {$menu.name}
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">

                        {else}
                        <li><a href="Index.php?module=article&id={$menu.page_id}">{$menu.name}</a></li>
                        {/if} {/foreach}

                    </ul>
                </li>

                {/foreach}

            </ul>



            <!-- Admin Only-->
            <div class="connected" {if !$connected} style="display:none;" {/if}>
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
