<?php
add_action('widgets_init', 'tweets_load_widgets');

function tweets_load_widgets()
{
	register_widget('Tweets_Widget');
}

class Tweets_Widget extends WP_Widget {
	
	function Tweets_Widget()
	{
		$widget_ops = array('classname' => 'twitter_widget', 'description' => 'Display latest Tweets from Twitter.');

		$control_ops = array('id_base' => 'tweets-widget');

		$this->WP_Widget('tweets-widget', '&raquo; Tweets', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = isset($instance['title']) ? $instance['title'] : '';
		$consumer_key = isset($instance['consumer_key']) ? $instance['consumer_key'] : '';
		$consumer_secret = isset($instance['consumer_secret']) ? $instance['consumer_secret'] : '';
		$query = isset($instance['query']) ? $instance['query'] : '';
		$number = isset($instance['number']) ? $instance['number'] : '';
		
		$show_follow = isset($instance['show_follow']) ? $instance['show_follow'] : '';
		$show_account = isset($instance['show_account']) ? $instance['show_account'] : '';
		$show_avatar = isset($instance['show_avatar']) ? $instance['show_avatar'] : '';
		$exclude_replies = isset($instance['exclude_replies']) ? $instance['exclude_replies'] : '';
	
		$this->bearer_token( $consumer_key, $consumer_secret );
		echo $before_widget;
		if($title) echo $before_title.$title.$after_title;
		$this->get_tweets($instance); 
		echo $after_widget;
	}
	
	function bearer_token($consumer_key, $consumer_secret){
		$consumer_key = rawurlencode( $consumer_key );
		$consumer_secret = rawurlencode( $consumer_secret );
		
		if( !$consumer_key || !$consumer_secret ) {
			return false;
		}
		
		$token = maybe_unserialize( get_option( 'prl_twitter_widget' ) );
		
	
		if( ! is_array($token) || empty($token) || $token['consumer_key'] != $consumer_key || empty($token['access_token']) ) {
			$toSend = base64_encode ($consumer_key . ':' . $consumer_secret);
		
			$args = array(
                'httpversion' => '1.1',
                'headers' => array( 
                    'Authorization' => 'Basic ' . $toSend,
                    'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
                ),
                'body' => array( 'grant_type' => 'client_credentials' )
            );
			
			add_filter('https_ssl_verify', '__return_false');
			$response = wp_remote_post('https://api.twitter.com/oauth2/token', $args);
		
			$result = json_decode(wp_remote_retrieve_body($response));
			
			if( ! isset($result->access_token) ) {
				return false;
			}
			$token = serialize( array(
				'consumer_key'      => $consumer_key,
				'access_token'      => $result->access_token
			) );
			update_option( 'prl_twitter_widget', $token );
		}		
	}	
	
	
	function get_tweets( $instance ){
        extract($instance);
		
        $token = maybe_unserialize( get_option( 'prl_twitter_widget' ) );

        if( empty($token) || !isset($token['access_token']) ) {
            $token = $this->bearer_token( $consumer_key, $consumer_secret );
            if( !$token ) {
                return false;
            }
        }
		
        if( strpos($query, 'from:') === 0  ) {
            $query_type = 'user_timeline';
            $query = substr($query, 5);
            $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.rawurlencode($query).'&count='.$number;
            if( isset($exclude_replies) ) {
                $url .= '&exclude_replies=true';
            }
        } else {
            $query_type = 'search';
            $url =  'https://api.twitter.com/1.1/search/tweets.json?q='.rawurlencode($query).'&count='.$number;
            if( $exclude_replies ) {
                $url .= '&exclude_replies=true';
            }
        }

        $remote_get_tweets = wp_remote_get( $url, array(
            'headers'   => array(
                'Authorization' => 'Bearer '. (is_array($token) && isset($token['access_token']) ? $token['access_token'] : '')
            ),
             // disable checking SSL sertificates               
            'sslverify'=>false
        ) );

        $result = json_decode( wp_remote_retrieve_body( $remote_get_tweets ) );

        if( empty($result) || (isset( $result->errors ) && ( $result->errors[0]->code == 89 || $result->errors[0]->code == 215 ) ) ) {

            delete_option( 'prl_twitter_widget' );
            $this->bearer_token($consumer_key,$consumer_secret);
            return $this->get_tweets($instance);
        } 

        $tweets = array();
        if( 'user_timeline' == $query_type ) {
            if( !empty($result) ) {
                $tweets = $result;
            }
        } else {
            if( !empty($result->statuses) ) {
                $tweets = $result->statuses;
            }

        }

        $follow_button = '<a href="https://twitter.com/__name__" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @__name__</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';

        if( !empty($tweets) ) {
			echo '<ul class="prl-list prl-list-line">';
            foreach ($tweets as $tweet ) {
               
				$text = $this->update_tweet_urls( $tweet->text );
				
                $time_str = __('about','presslayer'). ' ' . human_time_diff( strtotime($tweet->created_at), time() ). ' ' . __('ago','presslayer');
                $url = 'http://twitter.com/'.$tweet->user->id.'/status/'.$tweet->id_str; 
                $screen_name = $tweet->user->screen_name;
                $name = $tweet->user->name;
                $profile_image_url = $tweet->user->profile_image_url;

				echo '<li class="tweet-item '.$query_type.'">';
                if( 'search' == $query_type ) {
                    echo '<div class="twitter-user">';
                    if( $show_account ) {
                        echo '<a href="https://twitter.com/'.$screen_name.'" class="user">';
                        if( $show_avatar && $profile_image_url ) {
                            echo '<img src="'.$profile_image_url.'" width="16px" height="16px" >';
                        }
                        echo '&nbsp;<strong class="name">'.$name.'</strong>&nbsp;<span class="screen_name">@'.$screen_name.'</span></a>';
                    }
                    echo '</div>';
                }

                echo    '<div class="tweet-content">'.$text.' <span class="time"><a target="_blank" title="" href="'.$url.'">'.$time_str.'</a></span></div>';
                
                if( 'search' == $query_type ) {
                    if( $show_follow ) {
                        echo '<div class="tw_btn">'.str_replace('__name__', $screen_name, $follow_button).'</div>';
                    }
                }

			   echo '</li>';
            }
			
			echo '</ul>'; 

            if( 'user_timeline' == $query_type ) {
                echo    '<div class="tw_btn">';
                if( isset($show_account) ) {
                    echo '<a href="https://twitter.com/'.$screen_name.'" class="user">';
                    if( $show_avatar && $profile_image_url ) {
                        echo '<img src="'.$profile_image_url.'" width="16px" height="16px" >';
                    }
                    echo '&nbsp;<strong class="name">'.$name.'</strong>&nbsp;<span class="screen_name">@'.$screen_name.'</span></a>';
                }
				
				if( isset($show_follow) ) {
                    echo str_replace('__name__', $screen_name, $follow_button);
                }
                echo    '</div>';
            }

        }
    }
	
	function update_tweet_urls($content) {
        $maxLen = 16;
        //split long words
        $pattern = '/[^\s\t]{'.$maxLen.'}[^\s\.\,\+\-\_]+/';
        $content = preg_replace($pattern, '$0 ', $content);

        //
        $pattern = '/\w{2,4}\:\/\/[^\s\"]+/';
        $content = preg_replace($pattern, '<a href="$0" title="" target="_blank">$0</a>', $content);
        
        //search
        $pattern = '/\#([a-zA-Z0-9_-]+)/';
        $content = preg_replace($pattern, '<a href="https://twitter.com/search?q=%23$1&src=hash" title="" target="_blank">$0</a>', $content);
        //user
        $pattern = '/\@([a-zA-Z0-9_-]+)/';
        $content = preg_replace($pattern, '<a href="https://twitter.com/#!/$1" title="" target="_blank">$0</a>', $content);

        return $content;
    }
	
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['consumer_key'] = $new_instance['consumer_key'];
		$instance['consumer_secret'] = $new_instance['consumer_secret'];
		$instance['query'] = $new_instance['query'];
		$instance['number'] = $new_instance['number'];
		$instance['show_follow'] = $new_instance['show_follow'];
		$instance['show_account'] = $new_instance['show_account'];
		$instance['show_avatar'] = $new_instance['show_avatar'];
		$instance['exclude_replies'] = $new_instance['exclude_replies'];
		
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Recent Tweets', 'consumer_key' => '','consumer_secret' => '','query' => 'from:PressLayer', 'number' => 5, 'show_follow' => false, 'show_account'=> false, 'show_avatar'=> false, 'exclude_replies'=> false );
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" type="text" />
		</p>
		
		<p><label for="<?php echo $this->get_field_id('query') ?>">Search Query (<a href="https://dev.twitter.com/docs/using-search" target="_blank" title="Read more about Twitter Search query">?</a>)</label><br />
        <input type="text" name="<?php echo $this->get_field_name('query'); ?>" id="<?php echo $this->get_field_id('query'); ?>" class="widefat" value="<?php echo $instance['query'] ?>">
    	</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('consumer_key'); ?>">Consumer key:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('consumer_key'); ?>" name="<?php echo $this->get_field_name('consumer_key'); ?>" value="<?php echo $instance['consumer_key']; ?>" type="text" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('consumer_secret'); ?>">Consumer secret:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('consumer_key'); ?>" name="<?php echo $this->get_field_name('consumer_secret'); ?>" value="<?php echo $instance['consumer_secret']; ?>" type="text" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">Number of Tweets:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" type="text" />
		</p>
		
		<p><label for="<?php echo $this->get_field_id('show_follow') ?>">
        <input type="checkbox" name="<?php echo $this->get_field_name('show_follow'); ?>" id="<?php echo $this->get_field_id('show_follow'); ?>" <?php checked( 'true', $instance['show_follow'] ) ?> value="true" >
        <?php _e('Show Follow Button', 'presslayer') ?></label>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('show_account') ?>">
			<input type="checkbox" name="<?php echo $this->get_field_name('show_account'); ?>" id="<?php echo $this->get_field_id('show_account'); ?>" <?php checked( 'true', $instance['show_account'] ) ?>  value="true"  >
			<?php _e('Show Account Info', 'presslayer') ?></label>
		</p>
		<p><label for="<?php echo $this->get_field_id('show_avatar') ?>">
			<input type="checkbox" name="<?php echo $this->get_field_name('show_avatar'); ?>" id="<?php echo $this->get_field_id('show_avatar'); ?>" <?php checked( 'true', $instance['show_avatar'] ) ?>  value="true" >
			<?php _e('Show User Avatar', 'presslayer') ?></label>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('exclude_replies') ?>">
			<input type="checkbox" name="<?php echo $this->get_field_name('exclude_replies'); ?>" id="<?php echo $this->get_field_id('exclude_replies'); ?>" <?php checked( 'true', $instance['exclude_replies'] ) ?>  value="true" >
			<?php _e('Exclude replies', 'presslayer') ?> <span class="description">( from:* )<span></label>
		</p>
		
	<?php
	}
}
?>