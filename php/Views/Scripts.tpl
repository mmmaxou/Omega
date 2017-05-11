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
    toastr['{toastr-type}']('${toastr-message}');
</script>
{/if}
