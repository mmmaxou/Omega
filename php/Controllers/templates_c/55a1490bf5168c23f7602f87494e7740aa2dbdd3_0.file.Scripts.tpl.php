<?php
/* Smarty version 3.1.30, created on 2017-11-11 18:57:24
  from "D:\Max\Softwares\wamp\www\Omega\php\Views\Scripts.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a073a04e822c9_13727724',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55a1490bf5168c23f7602f87494e7740aa2dbdd3' => 
    array (
      0 => 'D:\\Max\\Softwares\\wamp\\www\\Omega\\php\\Views\\Scripts.tpl',
      1 => 1495053126,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a073a04e822c9_13727724 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- JavaScript link -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
js/jquery-2.2.4.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
bootstrap/js/bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
lib/toastr/build/toastr.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
lib/tinymce.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
lib/slick/slick.min.js" type="text/javascript"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
lib/fine-uploader/fine-uploader.js" type="text/javascript"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
js/main.js" type="text/javascript"><?php echo '</script'; ?>
>

<!--Display messages to the user-->
<?php if ($_smarty_tpl->tpl_vars['toastr']->value) {
echo '<script'; ?>
>
    toastr["<?php echo $_smarty_tpl->tpl_vars['toastr_type']->value;?>
"]("<?php echo $_smarty_tpl->tpl_vars['toastr_message']->value;?>
");

<?php echo '</script'; ?>
>
<?php }?>

<?php echo '<script'; ?>
 type="text/template" id="qq-template">
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
<?php echo '</script'; ?>
>
<?php }
}
