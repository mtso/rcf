<?php include 'head.php' ?>
        <main id="twitterfeedtest">
            <a href="http://twitter.com/RCFnews/" target="_blank" id="twitterlink">@rcfnews</a>
            <?php
                ini_set('display_errors', 1);
                require_once('TwitterAPIExchange.php');

                /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
                $settings = array(
                    'oauth_access_token' => "2393114268-7xqph50lGvWam3UL6BpvVkadIPun7zXRqEC9QUW",
                    'oauth_access_token_secret' => "p02NwHmy6eBS1VYiz8REsDsENbtkS0LxixuyPRuE6idQi",
                    'consumer_key' => "vIGTljZuv54vdvKRRDGNdCAcn",
                    'consumer_secret' => "E7YBD7ZdYWKrDN3ZX6s41j9rbVbxHiiYY16ywOYaY2FA5WsLnK"
                );

                /** Perform a GET request and echo the response **/
                /** Note: Set the GET field BEFORE calling buildOauth(); **/
                $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
                /*$getfield = '?user_id=56614397'; /** ?screen_name=matthewtso&count=5 **/
                $getfield = '?screen_name=rcfnews&count=10';
                $requestMethod = 'GET';
                $twitter = new TwitterAPIExchange($settings);

                $string = json_decode($twitter->setGetfield($getfield)
                                              ->buildOauth($url, $requestMethod)
                                              ->performRequest(),$assoc = TRUE);

                if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned  the following message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}

                foreach ($string as $items)
                {
                    echo "<div class='tweet'><h3>".date('l M j \&#8212; g:ia',strtotime($items['created_at']))."</h3>";
                    echo "<p>".$items['text']."</p></div><br /><br />";
                }
            ?>
        </main>
<?php include 'foot.php' ?>