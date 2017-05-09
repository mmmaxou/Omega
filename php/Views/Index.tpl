{include file="./Head.tpl"}

<body>
   
    {$menu|@var_dump}
   
    {include file="./Header.tpl"}


    <div class="content container-fluid">
        {include file="./Menu.tpl"}

        <!-- 2 Columns -->
        <div class="row">

            <!-- Left column -->
            <div class="col-xs-12 col-md-9 col1">
                {include file="./Articles.tpl"}
            </div>
            <!-- / Left column -->
            <!-- Right column -->
            <div class="col-xs-12 col-md-3 col2">
                {include file="./Hot.tpl"} {include file="./Categories.tpl"}
            </div>
            <!-- / Right column -->

        </div>
        <!-- / 2 Columns -->

        {include file="./Pager.tpl"}
    </div>


    {include file="./Footer.tpl"}
    {include file="./Modales.tpl"}    
    {include file="./Scripts.tpl"}
</body>
