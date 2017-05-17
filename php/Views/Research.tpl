<!-- Query Result -->
<div class="element">
    <div class="element-content">
        <div class="font-title">Research results</div>
        <div class="font-light">You searched for : <span id="query" class="font-small color-main">{$query}</span></div>

        <div id="results">
            
            <!--If data found-->
            {if $results|@count == 0}
            <!--Nothing-->
            No results found.            
            <!--Else : show the data-->
            {else} {foreach $results as $res}

            <div class="result">
                <!-- Article title -->
                <a class="font-title" href="Index.php?module=article&id={$res.id}">{$res.title}</a>
                <div class="result-content clearfix">
                    <a class="wrapper-img" href="Index.php?module=article&id={$res.id}" style="height:250px;" data-src="../../uploads/{$res.image}"></a>
                    <!-- Article text -->
                    <div class="result-excerpt">
                        {$res.content}
                    </div>
                </div>

            </div>

            {/foreach} {/if}

        </div>
    </div>
</div>
<!-- / Query Result -->
