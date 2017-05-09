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
                
                {foreach $menuNoChildren as $menuItem}
                
                <div class="menu-group">
                    <p data-id="{$menuItem.id}">
                        <span contenteditable="true">{$menuItem.name}</span>
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
                
                {/foreach}
                
                {foreach $menuWithChildren as $dropdown}
                
                <div class="menu-group">
                   
                   {foreach $dropdown as $menu}{if $menu@first}
                   
                    <p data-id="{$menu.id}">
                        <span contenteditable="true">{$menu.name}</span>
                        <a href="#">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </p>
                    <ul class="sub ">
                      
                       {else}
                       
                        <p data-id="{$menu.id}">
                            <span contenteditable="true">{$menu.name}</span>
                            <a href="#">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </p>
                        
                        {/if}
                        {/foreach}
                        
                        <li class="add ">
                            <a href="#">
                                <i class="fa fa-plus-circle " aria-hidden="true "></i>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="hr"></div>
                
                {/foreach}
                
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
