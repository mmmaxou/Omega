<!-- Article Content -->
<div class="element">
    <div class="row">
        <div class="element-content">
            <!-- Article title -->
            <div class="article-title font-title">
                <span>{$title_article}</span>


                <!-- Admin Only-->
                {if $connected}
                <span class="pull-right edit-button">
                <span class="hr-vertical"></span>
                <a id="edit-article" href="" class="btn-main">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
                </span>
                {/if}
                <!-- / Admin Only-->


            </div>

            <img class="img-responsive img-article" src="http://lorempixel.com/400/200/" alt="image">
            <form id="form-article" method="post" action="Page.php?id={$pageId}" enctype='multipart/form-data'>
                <div id="text-article">
                    {$content}
                </div>
                <input type='file' id='hiddenfile' name='image' style='display:none' onchange='getfile()'>
                <input type='button' value='Ajouter une image' onclick='getfile()' />
                <p id='demo'></p>
                <input id="data" name="data" type="hidden">
            </form>

            <div class="hr"></div>
            <!-- Bottom article -->
            <div class="article-bottom">

                <span class="color-on-hover"><i class="fa fa-calendar" aria-hidden="true"></i> date</span>
                <span class="color-on-hover"><i class="fa fa-eye" aria-hidden="true"></i> views</span>
                <span class="color-on-hover"><i class="fa fa-folder-o" aria-hidden="true"></i> category</span>

            </div>
            <!-- / Bottom article -->

            <!-- Bottom article -->
            <div class="article-bottom changes" style="display:none;">
                <div class="hr"></div>
                <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-default btn-main save" data-dismiss="modal">Save changes</button>
            </div>
            <!-- / Bottom article -->
        </div>
    </div>
</div>
<!-- / Article Content -->
<!-- Comments -->
<div class="element">
    <div class="element-content">
        <div class="article-title font-title">Comments</div>
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-body" id="comments">
                    <div class="comment">
                        <p class="comment-body">
                            Ubi illum mandaremus e proident enim tempor. Ab an exquisitaque, ad ne aute amet anim. Cupidatat dolore aliquip pariatur ad senserit veniam consequat.
                        </p>
                        <div class="comment-infos">
                            <span class="author">Dudule</span>
                            <span class="date">07/03/2017</span>
                        </div>
                    </div>
                    <div class="comment">
                        <p class="comment-body">
                            Ubi illum mandaremus e proident enim tempor. Ab an exquisitaque, ad ne aute amet anim. Cupidatat dolore aliquip pariatur ad senserit veniam consequat.
                        </p>
                        <div class="comment-infos">
                            <span class="author">Dudule</span>
                            <span class="date">07/03/2017</span>
                        </div>

                    </div>
                    <div class="comment">
                        <p class="comment-body">
                            summis adipisicing quid doctrina tractavissent exercitation imitarentur voluptatibus ipsum tractavissent exercitation graviterque coniunctione familiaritatem tamen possumus fabulas commodo lorem offendit ubi summis concursionibus nostrud consectetur laborum hic qui elit legam quae transferrem se a elit anim et ab distinguantur exercitation
                        </p>
                        <div class="comment-infos">
                            <span class="author">Dudule</span>
                            <span class="date">07/03/2017</span>
                        </div>
                    </div>
                    <div class="comment">
                        <p class="comment-body">
                            illustriora imitarentur a familiaritatem consectetur dolore concursionibus tamen praesentibus fabulas culpa voluptate illustriora anim eiusmod consequat laborum malis quamquam fugiat expetendis eiusmod laborum ita illustriora incididunt proident
                        </p>
                        <div class="comment-infos">
                            <span class="author">Dudule</span>
                            <span class="date">07/03/2017</span>
                        </div>
                    </div>
                </div>
            </div>
            <form id="comm" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="Enter name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="comment">Comment:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="comment" placeholder="Enter comment">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-main">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Comments -->
