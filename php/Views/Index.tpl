

<h2 class="font-title">Preview of all articles</h2>
<div class="hr"></div>

{foreach $menuNoChildren as $article}

<div class="col-xs-12">
    <div class="article article-small element">
        <div class="wrapper-img" data-src="../../uploads/{$article.image}"></div>
        <div class="element-content">
            <!-- Article title -->
            <a href="Index.php?module=article&id={$article.page_id}" class="article-title font-title">{$article.name}</a>
            <!-- Article text -->
            <div class="article-text">
                {$article.excerpt}
            </div>
            <!-- Horizontal line -->
            <div class="hr"></div>

            <!-- Bottom article -->
            <div class="article-bottom">
                <span class="color-on-hover"><i class="fa fa-calendar" aria-hidden="true"></i> {$article.date}</span>
                <span class="color-on-hover"><i class="fa fa-eye" aria-hidden="true"></i> {$article.view}</span>
                <span class="color-on-hover"><i class="fa fa-folder-o" aria-hidden="true"></i> category</span>
                <span class="color-on-hover"><a href="Index.php?module=article&id={$article.page_id}"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Read more</a></span>
            </div>
            <!-- / Bottom article -->
        </div>
    </div>
</div>

{/foreach}

<!--Separation-->

<!--All Menu with children-->
{foreach $menuWithChildren as $dropdown}

<!--Nested Foreach-->
{foreach $dropdown as $article} {if $article@first} {else}

<div class="col-xs-12">
    <div class="article article-small element">
        <div class="wrapper-img" data-src="../../uploads/{$article.image}"></div>
        <div class="element-content">
            <!-- Article title -->
            <a href="Index.php?module=article&id={$article.page_id}" class="article-title font-title">{$article.name}</a>
            <!-- Article text -->
            <div class="article-text">
                {$article.excerpt}
            </div>
            <!-- Horizontal line -->
            <div class="hr"></div>

            <!-- Bottom article -->
            <div class="article-bottom">
                <span class="color-on-hover"><i class="fa fa-calendar" aria-hidden="true"></i> {$article.date}</span>
                <span class="color-on-hover"><i class="fa fa-eye" aria-hidden="true"></i> {$article.view}</span>
                <span class="color-on-hover"><i class="fa fa-folder-o" aria-hidden="true"></i> category</span>
                <span class="color-on-hover"><a href="Index.php?module=article&id={$article.page_id}"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Read more</a></span>
            </div>
            <!-- / Bottom article -->
        </div>
    </div>
</div>

{/if} {/foreach} {/foreach}