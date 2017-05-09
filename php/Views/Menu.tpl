<pre>
    {$menuWithChildren|@var_dump}
</pre>

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
        <div class="collapse navbar-collapse" id="dropdown-content">
            <ul class="nav navbar-nav">
               
                {foreach $menuNoChildren as $menuItem}
                
                    <li><a href="Article.php?id={$menuItem.page_id}">{$menuItem.name}</a></li>
                
                {/foreach}
               
               
               
               
               
               
               
<!--
                <li class="active"><a href="article.html">Life<span class="sr-only">(current)</span></a></li>
                <li><a href="article.html">Death</a></li>
                <li><a href="article.html">Politics</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
-->
                
                
                
                
            </ul>

            <!--Admin-->
            <ul class="admin-only nav navbar-nav navbar-right">
                <li>
                    <a href="" class="btn-main" data-toggle="modal" data-target="#menu-main">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
            <!--Fin Admin-->

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- / Navbar 2 -->
