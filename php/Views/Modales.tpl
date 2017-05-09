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

                <div class="menu-group">
                    <p>
                        <span contenteditable="true">Life</span>
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

                <div class="menu-group">
                    <p>
                        <span contenteditable="true">Death</span>
                        <a href="#">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </p>
                    <ul class="sub ">
                        <li class="add ">
                            <a href="#">
                                <i class="fa fa-plus-circle " aria-hidden="true "></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="hr "></div>

                <div class="menu-group">
                    <p>
                        <span contenteditable="true">Politics</span>
                        <a href="#">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </p>
                    <ul class="sub ">
                        <li class="add ">
                            <a href="#">
                                <i class="fa fa-plus-circle " aria-hidden="true "></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="hr"></div>

                <div class="menu-group">
                    <p>
                        <span contenteditable="true">Dropdown</span>
                        <a href="#">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </p>
                    <ul class="sub ">
                        <p>
                            <span contenteditable="true">Action</span>
                            <a href="#">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </p>
                        <p>
                            <span contenteditable="true">Another</span>
                            <a href="#">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </p>
                        <p>
                            <span contenteditable="true">Something else here</span>
                            <a href="#">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </p>
                        <li class="add ">
                            <a href="#">
                                <i class="fa fa-plus-circle " aria-hidden="true "></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="hr"></div>

                <div class="add">
                    <a href="#" class="btn btn-main">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </a>
                </div>

            </div>

            <!-- FOOTER -->
            <form class="modal-footer" method="post" action="php/Views/View_menu.php">
                <input id="data" name="data" type="hidden">
                <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-default btn-main save" data-dismiss="modal">Save changes</button>
            </form>

        </div>
    </div>
</div>

<!-- / Modales -->
