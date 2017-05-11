<!-- JavaScript link -->
<script src="{$root_url}js/jquery-2.2.4.min.js" type="application/javascript"></script>
<script src="{$root_url}bootstrap/js/bootstrap.min.js" type="application/javascript"></script>
<script src="{$root_url}lib/toastr/build/toastr.min.js" type="application/javascript"></script>
<script src="{$root_url}js/main.js" type="application/javascript"></script>
<script src="{$root_url}lib/tinymce.min.js" type="application/javascript"></script>
<script src="{$root_url}js/article.js" type="application/javascript"></script>

<!--Display messages to the user-->
{if $toastr}
<script>
    toastr["{$toastr_type}"]("{$toastr_message}");
    
    var url = window.location.href;
    if (url.search(/Index/)) {
        history.replaceState("","","Index.php");
    }   
    if (url.search(/Article/)) {
        history.replaceState("","","Article.php");
    }   
    if (url.search(/Research/)) {
        history.replaceState("","","Research.php");
    }    
    
</script>
{/if}
