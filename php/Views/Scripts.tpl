<!-- JavaScript link -->
<script src="{$root_url}js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="{$root_url}bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{$root_url}lib/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="{$root_url}lib/tinymce.min.js" type="text/javascript"></script>
<script src="{$root_url}lib/slick/slick.min.js" type="text/javascript"></script>

<script src="{$root_url}lib/fine-uploader/fine-uploader.js" type="text/javascript"></script>

<script src="{$root_url}js/main.js" type="text/javascript"></script>

<!--Display messages to the user-->
{if $toastr}
<script>
    toastr["{$toastr_type}"]("{$toastr_message}");

</script>
{/if}

<script type="text/template" id="qq-template">
    <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Drop files here">
        <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
            <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
        </div>
        <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
            <span class="qq-upload-drop-area-text-selector"></span>
        </div>
        
        
        <div class="buttons container-fluid">
            <div class="row">
            <a class="qq-upload-button-selector btn btn-main col-sm-6 col-xs-12">
                <div>Select your images</div>
            </a>
            <a id="trigger-upload" class="btn btn-inverted col-sm-6 col-xs-12">
                Upload them
            </a>
            </div>
        </div>
        
        
        
        <span class="qq-drop-processing-selector qq-drop-processing">
            <span>Processing dropped files...</span>
        <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
        </span>
        
        
        <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
            <li>
                <div class="qq-progress-bar-container-selector">
                    <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                </div>
                <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                <img class="qq-thumbnail-selector" qq-max-size="100" qq-server-scale>
                <span class="qq-upload-file-selector qq-upload-file"></span>
                <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                <span class="qq-upload-size-selector qq-upload-size"></span>
                <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel">Cancel</button>
                <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Retry</button>
                <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">Delete</button>
                <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
            </li>
        </ul>

        <dialog class="qq-alert-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">Close</button>
            </div>
        </dialog>

        <dialog class="qq-confirm-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">No</button>
                <button type="button" class="qq-ok-button-selector">Yes</button>
            </div>
        </dialog>

        <dialog class="qq-prompt-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <input type="text">
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">Cancel</button>
                <button type="button" class="qq-ok-button-selector">Ok</button>
            </div>
        </dialog>
        
            <div class="help-block">Don't forget to save the changes or your images won't be added.</div>
        
    </div>
    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
</script>
