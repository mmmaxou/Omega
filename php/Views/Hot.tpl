<div id="hot" class="element element-lister">
    <div class="element-content container-fluid">

        <div class="font-title">Hot articles</div>
        <div class="row">
            
            {foreach $hot as $hot_item}
            <div class="col-xs-12 col-sm-6 col-md-12">
                <a href="/article/{$hot_item.id}">
                    <div class="hot-picture wrapper-img" data-src="{$root_url}uploads/{$hot_item.image}">

                        <div class="overlay overlay-black"></div>
                        <div class="hot-caption">{$hot_item.title}</div>

                    </div>
                </a>
            </div>
            {/foreach}
        </div>
    </div>
</div>
