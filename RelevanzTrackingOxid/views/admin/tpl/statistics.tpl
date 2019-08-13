[{if !$oView->isStore()}]
    <div class="messages">
        <div class="message message-notice notice">
            <div><?php echo __('Please select store first!!') ?></div>
        </div>
    </div>
    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/RosnrIJ6W5U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
[{elseif !$oView->validateApiKey()}]
    <div>
        <div class="messages">
            <div id="<?php /* @escapeNotVerified */ echo $block->getSuffixId('submit_key_messages')?>" style="display: none;"></div>
            <div class="message message-notice notice">
                <div><?php echo __('If you are already registered and have received our key, please type it below:') ?></div>
            </div>
        </div>
        <form id="<?php /* @escapeNotVerified */ echo $block->getSuffixId('submit_key_form')?>" action="<?php echo $block->apiKeyPostUrl() ?>" method="post">
            <fieldset class="fieldset admin__fieldset">
                <div class="admin__field field">
                    <label class="label admin__field-label">
                        <span><?php echo __("Api Key") ?></span>
                    </label>
                    <div class="admin__field-control control">
                        <input type="text" data-validate="{required:true}" id="<?php /* @escapeNotVerified */ echo $block->getSuffixId('submit_key_input')?>" class="admin__control-text" name="api_key" value="<?php echo $oView->getApiKey() ?>"/>
                        <input name="form_key" type="hidden" value="<?php /* @escapeNotVerified */ echo $block->getFormKey() ?>" />
                    </div>
                    <button type="submit" title="Submit" class="action submit primary">
                        <span>Submit</span>
                    </button>
                </div>
            </fieldset>
        </form>
        <div class="messages">
            <div class="message message-notice notice">
                <div><?php echo __("Not yet registered? <a href='%1' target='%2'>Now catch up.</a>", 'https://releva.nz', '_blank') ?></div>
            </div>
        </div>
    </div>
[{else}]
	<iframe src="http://customer.releva.nz/?apikey=<?php echo $oView->getApiKey();?>" style="width: 100%; min-height: 450px; border: none;" id="tracking"></iframe>
[{/if}]
