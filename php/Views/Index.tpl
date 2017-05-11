{foreach $menuNoChildren as $article}

<div id="articles" class="col-xs-12">
    <div class="article article-small element" id="article">
        <div class="wrapper-img" data-src="http://lorempixel.com/400/200/"></div>
        <div class="element-content">
            <!-- Article title -->
            <a href="Index.php?module=article&id={$article.page_id}" class="article-title font-title">{$article.name}</a>
            <!-- Article text -->
            <div class="article-text">
                <p>Officia ea excepteur, summis offendit id labore duis. Se e concursionibus ut eram cupidatat laboris, irure fabulas ubi labore esse in senserit summis se eiusmod tractavissent. Ut culpa quorum sint officia ut ingeniis ex nisi appellat. Amet quibusdam occaecat. Minim o ubi noster cupidatat, quo magna despicationes, excepteur quae dolor a aute do ne multos exercitation, incurreret sunt quem an veniam.</p>
            </div>
            <!-- Horizontal line -->
            <div class="hr"></div>

            <!-- Bottom article -->
            <div class="article-bottom">
                <span class="color-on-hover"><i class="fa fa-calendar" aria-hidden="true"></i> date</span>
                <span class="color-on-hover"><i class="fa fa-eye" aria-hidden="true"></i> views</span>
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

<div id="articles" class="col-xs-12">
    <div class="article article-small element" id="article">
        <div class="wrapper-img" data-src="http://lorempixel.com/400/200/"></div>
        <div class="element-content">
            <!-- Article title -->
            <a href="Index.php?module=article&id={$article.page_id}" class="article-title font-title">{$article.name}</a>
            <!-- Article text -->
            <div class="article-text">
                <p>Officia ea excepteur, summis offendit id labore duis. Se e concursionibus ut eram cupidatat laboris, irure fabulas ubi labore esse in senserit summis se eiusmod tractavissent. Ut culpa quorum sint officia ut ingeniis ex nisi appellat. Amet quibusdam occaecat. Minim o ubi noster cupidatat, quo magna despicationes, excepteur quae dolor a aute do ne multos exercitation, incurreret sunt quem an veniam.</p>
            </div>
            <!-- Horizontal line -->
            <div class="hr"></div>

            <!-- Bottom article -->
            <div class="article-bottom">
                <span class="color-on-hover"><i class="fa fa-calendar" aria-hidden="true"></i> date</span>
                <span class="color-on-hover"><i class="fa fa-eye" aria-hidden="true"></i> views</span>
                <span class="color-on-hover"><i class="fa fa-folder-o" aria-hidden="true"></i> category</span>
                <span class="color-on-hover"><a href="Index.php?module=article&id={$article.page_id}"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Read more</a></span>
            </div>
            <!-- / Bottom article -->
        </div>
    </div>
</div>

{/if} {/foreach} {/foreach}