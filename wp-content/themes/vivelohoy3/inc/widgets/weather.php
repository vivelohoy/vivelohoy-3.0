<?php
/*
FILTERS AVAILABLE:
awesome_weather_cache 						= How many seconds to cache weather: default 3600 (one hour).
awesome_weather_error 						= Error message if weather is not found.
awesome_weather_sizes 						= array of sizes for widget
awesome_weather_extended_forecast_text 		= Change text of footer link


// CLEAR OUT THE TRANSIENT CACHE
add to your URL 'clear_awesome_widget' 
For example: http://url.com/?clear_awesome_widget

*/

// THE LOGIC
function awesome_weather_logic( $atts )
{
	
	$rtn 				= "";
	$weather_data		= array();
	$location 			= isset($atts['location']) ? $atts['location'] : false;
	$units 				= (isset($atts['units']) AND strtoupper($atts['units']) == "C") ? "metric" : "imperial";
	$units_display		= $units == "metric" ? __('C', 'presslayer') : __('F', 'presslayer');
	$override_title 	= isset($atts['override_title']) ? $atts['override_title'] : false;
	$show_link 			= (isset($atts['show_link']) AND $atts['show_link'] == 1) ? 1 : 0;
	$locale				= 'en';

	$sytem_locale = get_locale();
	$available_locales = array( 'en', 'sp', 'fr', 'it', 'de', 'pt', 'ro', 'pl', 'ru', 'ua', 'fi', 'nl', 'bg', 'se', 'tr', 'zh_tw', 'zh_cn' ); 
	
	// Weather icon conversion
	$wicons = array();
	$wicons['01d'] = 'wi-day-sunny';
	$wicons['01n'] = 'wi-night-clear';
	
	$wicons['02d'] = 'wi-day-cloudy';
	$wicons['02n'] = 'wi-night-cloudy';
	
	$wicons['03d'] = 'wi-cloudy';
	$wicons['03n'] = 'wi-night-cloudy';
	
	$wicons['04d'] = 'wi-cloudy';
	$wicons['04n'] = 'wi-night-cloudy';
	
	$wicons['09d'] = 'wi-rain';
	$wicons['09n'] = 'wi-rain';
	
	$wicons['10d'] = 'wi-day-rain';
	$wicons['10n'] = 'wi-night-rain';
	
	$wicons['11d'] = 'wi-day-lightning';
	$wicons['11n'] = 'wi-night-lightning';
	
	$wicons['13d'] = 'wi-day-snow';
	$wicons['13n'] = 'wi-night-snow';
	
	$wicons['50d'] = 'wi-day-fog';
	$wicons['50d'] = 'wi-night-fog';
	
	
    // CHECK FOR LOCALE
    if( in_array( $sytem_locale , $available_locales ) )
    {
    	$locale = $sytem_locale;
    }
    
    
    // CHECK FOR LOCALE BY FIRST TWO DIGITS
    if( in_array(substr($sytem_locale, 0, 2), $available_locales ) )
    {
    	$locale = substr($sytem_locale, 0, 2);
    }

	// NO LOCATION, ABORT ABORT!!!1!
	if( !$location ) { return awesome_weather_error(); }
	
	
	//FIND AND CACHE CITY ID
	if( is_numeric($location) )
	{
		$city_name_slug 			= $location;
		$api_query					= "id=" . $location;
	}
	else
	{
		$city_name_slug 			= sanitize_title( $location );
		$api_query					= "q=" . $location;
	}
	
	
	// TRANSIENT NAME
	$weather_transient_name 		= 'awesome-weather-' . $units . '-' . $city_name_slug . "-". $locale;
	
    // CLEAR THE TRANSIENT
    if( isset($_GET['clear_awesome_widget']) )
    {
    	delete_transient( $weather_transient_name );
    }
    
	
	// GET WEATHER DATA
	if( get_transient( $weather_transient_name ) )
	{
		$weather_data = get_transient( $weather_transient_name );
	}
	else
	{
		$weather_data['now'] = array();
		$weather_data['forecast'] = array();
		
		// NOW
		$now_ping = "http://api.openweathermap.org/data/2.5/weather?" . $api_query . "&lang=" . $locale . "&units=" . $units;
		$now_ping_get = wp_remote_get( $now_ping );
	
		if( is_wp_error( $now_ping_get ) ) 
		{
			return awesome_weather_error( $now_ping_get->get_error_message()  ); 
		}	
	
		$city_data = json_decode( $now_ping_get['body'] );
		
		if( isset($city_data->cod) AND $city_data->cod == 404 )
		{
			return awesome_weather_error( $city_data->message ); 
		}
		else
		{
			$weather_data['now'] = $city_data;
		}
		
		
		// FORECAST
		$forecast_ping = "http://api.openweathermap.org/data/2.5/forecast/daily?" . $api_query . "&lang=" . $locale . "&units=" . $units ."&cnt=7";
		$forecast_ping_get = wp_remote_get( $forecast_ping );
	
		if( is_wp_error( $forecast_ping_get ) ) 
		{
			return awesome_weather_error( $forecast_ping_get->get_error_message()  ); 
		}	
		
		$forecast_data = json_decode( $forecast_ping_get['body'] );
		
		if( isset($forecast_data->cod) AND $forecast_data->cod == 404 )
		{
			return awesome_weather_error( $forecast_data->message ); 
		}
		else
		{
			$weather_data['forecast'] = $forecast_data;
		}	
		
		if($weather_data['now'] OR $weather_data['forecast'])
		{
			// SET THE TRANSIENT, CACHE FOR A LITTLE OVER THREE HOURS
			set_transient( $weather_transient_name, $weather_data, apply_filters( 'awesome_weather_cache', 11000 ) ); 
		}
	}



	// NO WEATHER
	if( !$weather_data OR !isset($weather_data['now'])) { return awesome_weather_error(); }
	
	
	// TODAYS TEMPS
	$today 			= $weather_data['now'];
	$today_temp 	= round($today->main->temp);
	$today_high 	= round($today->main->temp_max);
	$today_low 		= round($today->main->temp_min);

	// DATA
	$header_title = $override_title ? $override_title : $today->name;
	
	$today->main->humidity 		= round($today->main->humidity);
	$today->wind->speed 		= round($today->wind->speed);
	
	$wind_label = array ( 
							__('N', 'presslayer'),
							__('NNE', 'presslayer'), 
							__('NE', 'presslayer'),
							__('ENE', 'presslayer'),
							__('E', 'presslayer'),
							__('ESE', 'presslayer'),
							__('SE', 'presslayer'),
							__('SSE', 'presslayer'),
							__('S', 'presslayer'),
							__('SSW', 'presslayer'),
							__('SW', 'presslayer'),
							__('WSW', 'presslayer'),
							__('W', 'presslayer'),
							__('WNW', 'presslayer'),
							__('NW', 'presslayer'),
							__('NNW', 'presslayer')
						);
						
	$wind_direction = $wind_label[ fmod((($today->wind->deg + 11) / 22.5),16) ];

	// DISPLAY WIDGET	
	$rtn .= "<div id=\"awesome-weather-{$city_name_slug}\" class=\"awesome-weather-wrap awecf awe_wide\">";


	$rtn .= "
			<div class=\"awesome-weather-header\">{$header_title}</div>
			
			<div class=\"awesome-weather-current-temp\">
				$today_temp<sup>{$units_display}</sup>
			</div> <!-- /.awesome-weather-current-temp -->
	";	
	
	$speed_text = ($units == "metric") ? __('km/h', 'presslayer') : __('mph', 'presslayer');
	
	$rtn .= "
			
			<div class=\"awesome-weather-todays-stats\">
				<div class=\"awe_desc\">{$today->weather[0]->description}</div>
				<div class=\"awe_humidty\">" . __('humidity:', 'presslayer') . " {$today->main->humidity}% </div>
				<div class=\"awe_wind\">" . __('wind:', 'presslayer') . " {$today->wind->speed}" . $speed_text . " {$wind_direction}</div>
				<div class=\"awe_highlow\"> "  .__('H', 'presslayer') . " {$today_high} &bull; " . __('L', 'presslayer') . " {$today_low} </div>	
			</div> <!-- /.awesome-weather-todays-stats -->
	";

	$days_to_show = 3;
	$rtn .= "<div class=\"awesome-weather-forecast awe_days_{$days_to_show} awecf\">";
	$c = 1;
	$dt_today = date( 'Ymd', current_time( 'timestamp', 0 ) );
	$forecast = $weather_data['forecast'];
	
	
	foreach( (array) $forecast->list as $forecast )
	{
		if( $dt_today >= date('Ymd', $forecast->dt)) continue;
		$days_of_week = array( __('Sun' ,'presslayer'), __('Mon' ,'presslayer'), __('Tue' ,'presslayer'), __('Wed' ,'presslayer'), __('Thu' ,'presslayer'), __('Fri' ,'presslayer'), __('Sat' ,'presslayer') );
		
		$forecast->temp = (int) $forecast->temp->day;
		$day_of_week = $days_of_week[ date('w', $forecast->dt) ];
		$rtn .= "
			<div class=\"awesome-weather-forecast-day\">
				<div class=\"awesome-weather-forecast-day-abbr\">$day_of_week</div>
				<div class=\"awesome-weather-forecast-day-icon\"><i class=\"{$wicons[$forecast->weather[0]->icon]}\"></i></div>
				<div class=\"awesome-weather-forecast-day-temp\">{$forecast->temp}<sup>{$units_display}</sup></div>
			</div>
		";
		if($c == $days_to_show) break;
		$c++;
	}
	$rtn .= " </div> <!-- /.awesome-weather-forecast -->";
	
	if($show_link AND isset($today->id))
	{
		$show_link_text = apply_filters('awesome_weather_extended_forecast_text' , __('extended forecast', 'presslayer'));

		$rtn .= "<div class=\"awesome-weather-more-weather-link\">";
		$rtn .= "<a href=\"http://openweathermap.org/city/{$today->id}\" target=\"_blank\">{$show_link_text}</a>";		
		$rtn .= "</div> <!-- /.awesome-weather-more-weather-link -->";
	}
	
	$rtn .= "</div> <!-- /.awesome-weather-wrap -->";
	return $rtn;
}


// RETURN ERROR
function awesome_weather_error( $msg = false )
{
	if(!$msg) $msg = __('No weather information available', 'presslayer');
	return apply_filters( 'awesome_weather_error', "<!-- AWESOME WEATHER ERROR: " . $msg . " -->" );
}

// AWESOME WEATHER WIDGET, WIDGET CLASS, SO MANY WIDGETS
class AwesomeWeatherWidget extends WP_Widget 
{
	function AwesomeWeatherWidget() { parent::WP_Widget(false, $name = '&raquo; Weather', array('description' => 'Weather widget')); }

    function widget($args, $instance) 
    {	
        extract( $args );
        
		$override_title = isset($instance['override_title']) ? $instance['override_title'] : '';
		$title = isset($instance['title']) ? $instance['title'] : '';
		$location = isset($instance['location']) ? $instance['location'] : '';
		$units = isset($instance['units']) ? $instance['units'] : '';
		$forecast_days = isset($instance['forecast_days']) ? $instance['forecast_days'] : '';
		$show_link = isset($instance['show_link']) ? $instance['show_link'] : '';
		
		echo $before_widget;
		if($title != "") echo $before_title . $title . $after_title;
		
		echo awesome_weather_logic( array( 'location' => $location, 'override_title' => $override_title, 'units' => $units, 'show_link' => $show_link));
		echo $after_widget;
    }
 
    function update($new_instance, $old_instance) 
    {		
		$instance = $old_instance;
		
		$instance['title'] 	= strip_tags($new_instance['title']);
		$instance['override_title'] 	= strip_tags($new_instance['override_title']);
		$instance['location'] 			= strip_tags($new_instance['location']);
		$instance['widget_title'] 		= strip_tags($new_instance['widget_title']);
		$instance['units'] 				= strip_tags($new_instance['units']);
		$instance['show_link'] 		= $new_instance['show_link'];
        
		return $instance;
    }
 
    function form($instance) 
    {	
    	
		$defaults = array(
			'title' => '',
			'override_title' => 'New York', 
			'location' => 'New York City,NY', 
			'units' => 'C',
			'forecast_days'=>'',
			'show_link' => 0
		);
		$instance = wp_parse_args((array) $instance, $defaults);
	?>
        
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title: (optional)', 'presslayer'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" type="text" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('location'); ?>"><?php _e('Location', 'presslayer'); ?>:</label><br />
			<small>(i.e: London,UK or New York City,NY)</small>
			<input class="widefat" id="<?php echo $this->get_field_id('location'); ?>" name="<?php echo $this->get_field_name('location'); ?>" value="<?php echo $instance['location']; ?>" type="text" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('override_title'); ?>"><?php _e('Override title', 'presslayer'); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('override_title'); ?>" name="<?php echo $this->get_field_name('override_title'); ?>" value="<?php echo $instance['override_title']; ?>" type="text" />
		</p>
		
        <p>
          <label for="<?php echo $this->get_field_id('units'); ?>"><?php _e('Units', 'presslayer'); ?>:</label>  &nbsp;
      
		  <input id="<?php echo $this->get_field_id('units'); ?>" name="<?php echo $this->get_field_name('units'); ?>" type="radio" value="F" <?php if($instance['units'] == "F") echo ' checked="checked"'; ?> /> F &nbsp; &nbsp;
          <input id="<?php echo $this->get_field_id('units'); ?>" name="<?php echo $this->get_field_name('units'); ?>" type="radio" value="C" <?php if($instance['units'] == "C") echo ' checked="checked"'; ?> /> C
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('show_link'); ?>"><?php _e('Link to OpenWeatherMap:', 'presslayer'); ?></label>  &nbsp;
          <input id="<?php echo $this->get_field_id('show_link'); ?>" name="<?php echo $this->get_field_name('show_link'); ?>" type="checkbox" value="1" <?php if($instance['show_link'] == 1) echo ' checked="checked"'; ?> />
        </p>
		
        <?php 
    }
}

add_action( 'widgets_init', create_function('', 'register_widget("AwesomeWeatherWidget");') );
?>