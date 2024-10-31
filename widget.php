<?php

/*
 * Widget to display news
 */

class RLFEED_Widget extends WP_Widget {

	function RLFEED_Widget() {
		$widget_ops = array( 'classname' => 'rlfeed_widget', 'description' => __('Display a list of news from Romania Libera. ') );
		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'rlfeed-widget' );
		
		$this->WP_Widget( 'rlfeed-widget', __('Romania Libera: Latest News'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Variables from the widget settings.
		$title = isset($instance['title']) ? $instance['title'] : '' ;
                $posts = isset($instance['posts']) ? $instance['posts'] : false ;
                $general = ($instance['general'] == 'general') ? $instance['general'] : '' ;
                $actualitate = ($instance['actualitate'] == 'actualitate') ? $instance['actualitate'] : '' ;
                $cultura = ($instance['cultura'] == 'cultura') ? $instance['cultura'] : '' ;
                $tehnologie = ($instance['tehnologie'] == 'tehnologie') ? $instance['tehnologie'] : '' ;
                $opinii = ($instance['opinii'] == 'opinii') ? $instance['opinii'] : '' ;
                $viata = ($instance['viata'] == 'viata') ? $instance['viata'] : '' ;
                $timp = ($instance['timp'] == 'timp') ? $instance['timp'] : '' ;
                $aldine = ($instance['aldine'] == 'aldine') ? $instance['aldine'] : '' ;
                $special = ($instance['special'] == 'special') ? $instance['special'] : '' ;
                $sport = ($instance['sport'] == 'sport') ? $instance['sport'] : '' ;
                $societate = ($instance['societate'] == 'societate') ? $instance['societate'] : '' ;
                $economie = ($instance['economie'] == 'economie') ? $instance['economie'] : '' ;
                $politica = ($instance['politica'] == 'politica') ? $instance['politica'] : '' ;
                $chars = isset($instance['chars']) ? $instance['chars'] : '' ;
                $description = ($instance['description'] == 'description') ? $instance['description'] : '' ;
                $date = ($instance['date'] == 'date') ? $instance['date'] : false ;
                $subtitle = ($instance['subtitle'] == 'subtitle') ? $instance['subtitle'] : false ;
                
                $newsArray = array(
                    $general,$actualitate,$cultura,$tehnologie,$opinii,$viata,$timp,$aldine,$special,$sport,$societate,$economie,$politica
                );
                
                $objNews = new RLFEED();
                $objNews->getNews($newsArray);
                
		echo $before_widget;

		// Display the widget title 
		if ( $title )
			echo '<h3 class="widget-title">' . $title . '</h3>';
?>
               
                <?php
                foreach($objNews->_rezultat as $key=>$value){
                ?>
                <div class="latest-news-footer">
                    <?php if($subtitle){ ?><h4><?php echo ucwords(str_replace('-', ' ', $key)); ?></h4><?php } ?>
                    <ul>
                        <?php foreach($value as $k=>$links){if($k<= ($posts-1)){ ?>
                        <li style="margin-bottom:10px;">
                            <a target="_blank" href="<?php echo $links['link']; ?>?utm_source=Wordpress&utm_medium=widget&utm_campaign=WordpressPlugin"><?php echo $links['title'];  ?></a><?php if($date){ echo ' - ' . date('d M Y H:i',strtotime($links['date'])); } ?>
                        </li>
                        <?php }} ?>
                    </ul>
                </div>
            <?php 
                }
		echo $after_widget;
        }

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
       
                $instance['posts'] = strip_tags( $new_instance['posts'] );
                $instance['title'] = strip_tags( $new_instance['title'] );
                $instance['general'] = strip_tags( $new_instance['general'] );
                $instance['actualitate'] = strip_tags( $new_instance['actualitate'] );
                $instance['cultura'] = strip_tags( $new_instance['cultura'] );
                $instance['tehnologie'] = strip_tags( $new_instance['tehnologie'] );
                $instance['opinii'] = strip_tags( $new_instance['opinii'] );
                $instance['viata'] = strip_tags( $new_instance['viata'] );
                $instance['timp'] = strip_tags( $new_instance['timp'] );
                $instance['aldine'] = strip_tags( $new_instance['aldine'] );
                $instance['special'] = strip_tags( $new_instance['special'] );
                $instance['sport'] = strip_tags( $new_instance['sport'] );
                $instance['societate'] = strip_tags( $new_instance['societate'] );
                $instance['economie'] = strip_tags( $new_instance['economie'] );
                $instance['politica'] = strip_tags( $new_instance['politica'] );
                $instance['chars'] = strip_tags( $new_instance['chars'] );
                $instance['description'] = strip_tags( $new_instance['description'] );
                $instance['date'] = strip_tags( $new_instance['date'] );
                $instance['subtitle'] = strip_tags( $new_instance['subtitle'] );
                
		return $instance;
	}

	
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 
                    'title'             => __('Latest posts'), 
                    'posts'             => __('5'),
                );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
                <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Widget title:'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'posts' ); ?>"><?php _e('Nr of posts:'); ?></label>
			<input id="<?php echo $this->get_field_id( 'posts' ); ?>" name="<?php echo $this->get_field_name( 'posts' ); ?>" value="<?php echo $instance['posts']; ?>" style="width:100%;" />
		</p>
                <p>
                    <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e('Choose one or more categories:'); ?></label>
                    <table width="80%" style="margin-left:30px;">
                        <tr>
                            <td width="50%"><input <?php echo ($instance['general'] == 'general') ? 'checked' : ''; ?> id="<?php echo $this->get_field_id( 'general' ); ?>" name="<?php echo $this->get_field_name( 'general' ); ?>" value="general" type="checkbox" /> General</td>
                            <td width="50%"><input <?php echo ($instance['actualitate'] == 'actualitate') ? 'checked' : ''; ?> id="<?php echo $this->get_field_id( 'actualitate' ); ?>" name="<?php echo $this->get_field_name( 'actualitate' ); ?>" value="actualitate" type="checkbox" /> Actualitate</td>
                        </tr>
                        <tr>
                            <td><input <?php echo ($instance['cultura'] == 'cultura') ? 'checked' : ''; ?> id="<?php echo $this->get_field_id( 'cultura' ); ?>" name="<?php echo $this->get_field_name( 'cultura' ); ?>" value="cultura" type="checkbox" /> Cultura</td>
                            <td><input <?php echo ($instance['aldine'] == 'aldine') ? 'checked' : ''; ?> id="<?php echo $this->get_field_id( 'aldine' ); ?>" name="<?php echo $this->get_field_name( 'aldine' ); ?>" value="aldine" type="checkbox" /> Aldine</td>
                        </tr>
                        <tr>
                            <td><input <?php echo ($instance['tehnologie'] == 'tehnologie') ? 'checked' : ''; ?> id="<?php echo $this->get_field_id( 'tehnologie' ); ?>" name="<?php echo $this->get_field_name( 'tehnologie' ); ?>" value="tehnologie" type="checkbox" /> Tehnologie</td>
                            <td><input <?php echo ($instance['special'] == 'special') ? 'checked' : ''; ?> id="<?php echo $this->get_field_id( 'special' ); ?>" name="<?php echo $this->get_field_name( 'special' ); ?>" value="special" type="checkbox" /> Special</td>
                        </tr>
                        <tr>
                            <td><input <?php echo ($instance['opinii'] == 'opinii') ? 'checked' : ''; ?> id="<?php echo $this->get_field_id( 'opinii' ); ?>" name="<?php echo $this->get_field_name( 'opinii' ); ?>" value="opinii" type="checkbox" /> Opinii</td>
                            <td><input <?php echo ($instance['sport'] == 'sport') ? 'checked' : ''; ?> id="<?php echo $this->get_field_id( 'sport' ); ?>" name="<?php echo $this->get_field_name( 'sport' ); ?>" value="sport" type="checkbox" /> Sport</td>
                        </tr>
                        <tr>
                            <td><input <?php echo ($instance['viata'] == 'viata') ? 'checked' : ''; ?> id="<?php echo $this->get_field_id( 'viata' ); ?>" name="<?php echo $this->get_field_name( 'viata' ); ?>" value="viata" type="checkbox" /> Stil de Viata</td>
                            <td><input <?php echo ($instance['timp'] == 'timp') ? 'checked' : ''; ?> id="<?php echo $this->get_field_id( 'timp' ); ?>" name="<?php echo $this->get_field_name( 'timp' ); ?>" value="timp" type="checkbox" /> Timp Liber</td>
                        </tr>
                        <tr>
                            <td><input <?php echo ($instance['societate'] == 'societate') ? 'checked' : ''; ?> id="<?php echo $this->get_field_id( 'societate' ); ?>" name="<?php echo $this->get_field_name( 'societate' ); ?>" value="societate" type="checkbox" /> Societate</td>
                            <td><input <?php echo ($instance['economie'] == 'economie') ? 'checked' : ''; ?> id="<?php echo $this->get_field_id( 'economie' ); ?>" name="<?php echo $this->get_field_name( 'economie' ); ?>" value="economie" type="checkbox" /> Economie</td>
                        </tr>
                        <tr>
                            <td><input <?php echo ($instance['politica'] == 'politica') ? 'checked' : ''; ?> id="<?php echo $this->get_field_id( 'politica' ); ?>" name="<?php echo $this->get_field_name( 'politica' ); ?>" value="politica" type="checkbox" /> Politica</td>
                            <td></td>
                        </tr>
                    </table>
                </p>
<!--                <p>
			<label for="<?php echo $this->get_field_id( 'chars' ); ?>"><?php _e('Nr of chars for description (if enabled):'); ?></label>
			<input id="<?php echo $this->get_field_id( 'chars' ); ?>" name="<?php echo $this->get_field_name( 'chars' ); ?>" value="<?php echo $instance['chars']; ?>" style="width:100%;" />
		</p>
                <p>
			<input id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" value="description" type="checkbox" /> Show description
		</p>-->
                <p>
			<input <?php echo ($instance['date'] == 'date') ? 'checked' : ''; ?> id="<?php echo $this->get_field_id( 'date' ); ?>" name="<?php echo $this->get_field_name( 'date' ); ?>" value="date" type="checkbox" /> Show date
		</p>
                <p>
			<input <?php echo ($instance['subtitle'] == 'subtitle') ? 'checked' : ''; ?> id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" value="subtitle" type="checkbox" /> Show subtitles
		</p>

	<?php
	}
}

add_action( 'widgets_init', 'rlfeed_new_widget' );
function rlfeed_new_widget() {
        register_widget( 'RLFEED_Widget' );
}
?>
