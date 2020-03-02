
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>[{oxmultilang ident="RELEVANZ_DASHBOARD"}]</title>
        <link rel="stylesheet" href="[{$oViewConf->getResourceUrl()}]main.css">
        <link rel="stylesheet" href="[{$oViewConf->getResourceUrl()}]colors_[{$oViewConf->getEdition()|lower}].css">
        <meta http-equiv="Content-Type" content="text/html; charset=[{$charset}]">
        <script type="text/javascript">
            parent.sShopTitle = "[{$actshop|oxaddslashes}]";
            parent.setTitle();
        </script>
    </head>
    <body>
        <h1>[{oxmultilang ident="RELEVANZ_DASHBOARD"}]</h1>
        <hr>
        [{include file="inc_error.tpl" Errorlist=$Errors.default}]
        [{if !$oView->isStore()}]
            <div class="messagebox">
                [{oxmultilang ident="MAIN_INFO"}]:<br>
                <p class="message">[{oxmultilang ident="RELEVANZ_SELECT_STORE"}]</p>
            </div>
            <hr>
            <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/RosnrIJ6W5U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        [{elseif !$oView->validateApiKey()}]
            <div class="messagebox">
                [{oxmultilang ident="MAIN_INFO"}]:<br>
                <p class="message">[{oxmultilang ident="RELEVANZ_ALREADY_REGISTERED"}]</p>
                <form action="[{$oViewConf->getSelfLink()}]" method="post">
                    <fieldset>
                        [{$oViewConf->getHiddenSid()}]
                        <input type="hidden" name="cl" value="relevanzdashboard">
                        <input type="hidden" name="fnc" value="sendapikey">
                        <input type="hidden" name="oxid" value="[{$oxid}]">
                        <label>
                            <span>[{oxmultilang ident="RELEVANZ_API_KEY"}]</span>
                        </label>
                        <input type="text" name="api_key" value="[{$oView->getApiKey()}]"/>
                        <button type="submit" title="[{oxmultilang ident="RELEVANZ_SUBMIT_BUTTON"}]">
                            <span>[{oxmultilang ident="RELEVANZ_SUBMIT_BUTTON"}]</span>
                        </button>
                    </fieldset>
                </form>
            </div>
            <hr>
            <div class="messagebox">
                <p class="message">[{oxmultilang ident="RELEVANZ_NOT_REGISTERED"}]</p>
            </div>
        [{else}]
            <iframe src="http://customer.releva.nz/?apikey=[{$oView->getApiKey()}]" style="width: 100%; min-height: 450px; border: none;"></iframe>
        [{/if}]
    </body>
</html>


