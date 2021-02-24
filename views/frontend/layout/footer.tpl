[{$smarty.block.parent}]
[{get_relevanz_tracking_url assign='relevanzTrackingUrl'}]
[{if $relevanzTrackingUrl}]
    [{assign var=oConfig value=$oView->getConfig()}]
    <script type="text/javascript">
        [{$oConfig->getConfigParam('sAlternativeCookieCheck')}]
        var relevanzInterval = window.setInterval(function () {
            if (typeof relevanzRetargetingForcePixel !== "undefined" && relevanzRetargetingForcePixel === true && document.querySelector("[src='[{$relevanzTrackingUrl}]']") === null) {
                window.clearInterval(relevanzInterval);
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = "[{$relevanzTrackingUrl}]";
                script.async = true;
                document.body.appendChild(script);
            }
        }, 500);
    </script>
[{/if}]
