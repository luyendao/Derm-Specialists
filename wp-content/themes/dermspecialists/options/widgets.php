<?php
/*
* Register the new widget classes here so that they show up in the widget list
*/
function load_widgets() {
	register_widget('LatestTweets');
	// register_widget('MyWidget');
}
add_action('widgets_init', 'load_widgets');


/*
* Displays a block with latest tweets from particular user
*/

class LatestTweets extends Carbon_Widget {
	protected $form_options = array(
		'width' => 300
	);

	function LatestTweets() {
		$this->setup('Latest Tweets', 'Displays a block with your latest tweets', array(
			Carbon_Field::factory('text', 'title', 'Title'),
			Carbon_Field::factory('text', 'username', 'Username'),
			Carbon_Field::factory('text', 'count', 'Number of Tweets to show')->set_default_value('5')
		));
	}

	/*
	* Called when rendering the widget in the front-end
	*/
	function front_end($args, $instance) {
		extract($args);
		$tweets = TwitterHelper::get_tweets($instance['username'], $instance['count']);
		if (!empty($tweets)) {
			if ($instance['title'])
				echo $before_title . $instance['title'] . $after_title;
		}
		?>
		<ul>
			<?php foreach ($tweets as $tweet): ?>
				<li><?php echo $tweet->tweet_text ?> - <span><?php echo $tweet->time_distance ?> ago</span></li>
			<?php endforeach ?>
		</ul>
		<?php
	}
}

/*
* An example widget
*/
class ThemeWidgetExample extends Carbon_Widget {
	/*
	* Register widget function. Must have the same name as the class
	*/
	function ThemeWidgetExample() {
		$this->setup('Theme Widget - Example', 'Displays a block with title/text', array(
			Carbon_Field::factory('text', 'title', 'Title')->set_default_value('Hello World!'),
			Carbon_Field::factory('textarea', 'text', 'Content')->set_default_value('Lorem Ipsum dolor sit amet')
		));
	}
	
	/*
	* Called when rendering the widget in the front-end
	*/
	function front_end($args, $instance) {
		extract($args);
		if ($instance['title'] != '') {
			echo $before_title . $instance['title'] . $after_title;
		}
		?>
		<p><?php echo $instance['text'];?></p>
		<?php
	}
}
