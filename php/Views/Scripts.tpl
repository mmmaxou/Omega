<!-- JavaScript link -->
<script src="{$root_url}js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="{$root_url}bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{$root_url}lib/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="{$root_url}lib/tinymce.min.js" type="text/javascript"></script>
<script src="{$root_url}lib/slick/slick.min.js" type="text/javascript"></script>
<script src="{$root_url}js/main.js" type="text/javascript"></script>

<!--Display messages to the user-->
{if $toastr}
<script>
    toastr["{$toastr_type}"]("{$toastr_message}");    
</script>
{/if}
