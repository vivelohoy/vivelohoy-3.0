                <div style="position: absolute; top: 10px; right: 4px">
                    <div class="compartelo">COMPÁRTELO: </div>
                    <?php
                    $facebook_share_link = "https://www.facebook.com/sharer/sharer.php?u=";
                    $facebook_share_link .= urlencode(get_permalink());
                    ?>
                    <a class="twitter-share-link" href="" target="_blank" style="border-bottom: none">
                        <span class="genericon genericon-twitter" style="color: #55acee; margin: 0; width: 35px"></span>
                    </a>
                    <a href="<?php echo $facebook_share_link; ?>" target="_blank" style="border-bottom: none">
                        <span class="genericon genericon-facebook" style="margin-right: 0; color:#3b5998; width: 35px"></span>
                    </a>
                </div>