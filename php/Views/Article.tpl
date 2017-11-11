<!-- Article Content -->
<div class="element">
  <div class="row">
    <div class="element-content" id="article" data-id="{$pageId}">
      <!-- Article title -->
      <div class="article-title font-title" id="article-title">
        <span>{$title_article}</span>


        <!-- Admin Only-->
        <div class="connected superUser" {if !$superUser} style="display:none;" {/if}>

          <span class="pull-right edit-button">
                <a id="edit-article" class="btn-main">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
                </span>

        </div>
        <!-- / Admin Only-->


      </div>

      <div class="slick-test">
        {foreach $images as $image}
        <div>
          <img src="{$root_url}uploads/{$image.label}" alt="image" data-id="{$image.id}">
          <span class="delete"><i class="fa fa-trash" aria-hidden="true"></i></span>
        </div>
        {/foreach}
      </div>
      <div id="uploader" style="display:none;"></div>
      <div class="hr"></div>


      <form id="form-article" method="post" action="/php/Controllers/Page.php?id={$pageId}" enctype='multipart/form-data'>
        <div id="text-article">
          {$content}
        </div>
        <p id='demo'></p>
        <input id="data_article" name="data" type="hidden">
      </form>


      <!-- Bottom article -->
      <div class="article-bottom" id="keywords" style="display:none;">
        <div class="hr"></div>
        <!-- Article title -->
        <div class="article-title font-title">
          <span>Add Keywords</span>
        </div>
        <textarea class="textarea-form" placeholder="Enter the keywords here" name="keywords" data-content="{$keywords}"></textarea>
        <div class="help-block">Separate your differents keywords with commas. (e.g : "Awesome,Special,Rare,Interesting, ... "</div>
      </div>
      <!-- / Bottom article -->

      <!-- Bottom article -->
      <div class="article-bottom" id="description" style="display:none;">
        <div class="hr"></div>
        <!-- Article title -->
        <div class="article-title font-title">
          <span>Change Description</span>
        </div>
        <textarea class="textarea-form" placeholder="Enter the description here" name="description" data-content="{$description}"></textarea>
      </div>
      <!-- / Bottom article -->

      <!-- Bottom article -->
      <div class="article-bottom">
        <div class="hr"></div>
        <span class="color-on-hover"><i class="fa fa-calendar" aria-hidden="true"></i> {$date}</span>
        <span class="color-on-hover"><i class="fa fa-eye" aria-hidden="true"></i> {$view}</span>
        <span class="color-on-hover slider-wrapper">
                    <div class="my-slider">
                        {$keywords}
                    </div>
                </span>
      </div>

      <!-- / Bottom article -->


      <!-- Bottom article -->
      <div class="article-bottom changes" style="display:none;">
        <div class="hr"></div>
        <a class="btn btn-default btn-close" href="Index.php?module=article&id={$pageId}">Cancel</a>
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
          <!--If data found-->
          {if $comments|@count == 0}
          <!--Nothing-->
          <div id="emptyComment">
            No Comments added yet.
          </div>
          <!--Else : show the data-->
          {else} {foreach $comments as $comment}
          <div class="comment" data-id="{$comment.id}">
            <p class="comment-body">
              {$comment.content}
            </p>
            <div class="comment-infos">
              <span class="author">{$comment.login}</span>
              <span class="date">{$comment.date}</span>
              <a class="pull-right comment-delete" href="">delete<i class="fa fa-trash" aria-hidden="true"></i></a>
            </div>
          </div>
          {/foreach} {/if}
        </div>
      </div>



      <form id="comm" class="form-horizontal">
        <input id="commData" name="data" type="hidden">
        <div class="form-group">
          <label class="control-label col-sm-2" for="articleContent">Comment:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="articleContent" name="articleContent" placeholder="Enter comment">
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
