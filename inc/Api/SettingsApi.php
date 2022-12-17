<?php
/*
@package floating_bar
*/
namespace Inc\Api;

class SettingsApi{

    public $admin_pages=array();
	private $floating_bar_options;//
    public function register()
	{
	if(!empty($this->admin_pages))
	{
	  add_action('admin_menu',array($this,'add_admin_menu'));
	 
	}
	}
	public function AddPages(array $pages)
	{
	 $this->admin_pages=$pages;
	 return $this;
	}
	
	function add_admin_menu()
	{
	  foreach($this->admin_pages as $page)
	  {
	  add_menu_page($page['page_title'],$page['menu_title'],$page['capability'],$page['menu_slug'],$page['callback'],$page['icon_url'],110);
	  }
	}
	 public function add_floating_bar_option()
	 {
	    add_action( 'admin_init', array( $this, 'floating_bar_page_init' ) );
		if (get_option( 'floating_bar_option_name' ) === false || '' ) // Nothing yet saved
    $this->floating_bar_options =='<h2>bar text here</h2>' ;
	else
		$this->floating_bar_options = get_option( 'floating_bar_option_name' );
	 }
	public function floating_bar_page_init() {
		register_setting(
			'floating_bar_option_group', // option_group
			'floating_bar_option_name', // option_name
			array( $this, 'floating_bar_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'floating_bar_setting_section', // id
			'Settings', // title
			array( $this, 'floating_bar_section_info' ), // callback
			'floating-bar-admin' // page
		);

		add_settings_field(
			'enable_0', // id
			'enable', // title
			array( $this, 'enable_0_callback' ), // callback
			'floating-bar-admin', // page
			'floating_bar_setting_section' // section
		);

		 add_settings_field(
			'position_1', // id
			'position', // title
			array( $this, 'position_1_callback' ), // callback
			'floating-bar-admin', // page
			'floating_bar_setting_section' // section
		);
		add_settings_field(
			'bar_background_0', // id
			'bar background', // title
			array( $this, 'bar_background_0_callback' ), // callback
			'floating-bar-admin', // page
			'floating_bar_setting_section' // section
		);
       add_settings_field(
			'bar_button_0', // id
			'bar button', // title
			array( $this, 'bar_button_0_callback' ), // callback
			'floating-bar-admin', // page
			'floating_bar_setting_section' // section
		);
		add_settings_field(
			'bar_button_text', // id
			'bar button text', // title
			array( $this, 'bar_button_text_callback' ), // callback
			'floating-bar-admin', // page
			'floating_bar_setting_section' // section
		);
		add_settings_field(
			'bar_button_link', // id
			'bar button link', // title
			array( $this, 'bar_button_link_callback' ), // callback
			'floating-bar-admin', // page
			'floating_bar_setting_section' // section
		);
		add_settings_field(
			'bar_html_2', // id
			'Bar_html', // title
			array( $this, 'bar_html_2_callback' ), // callback
			'floating-bar-admin', // page
			'floating_bar_setting_section' // section
		);
	}

	public function floating_bar_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['enable_0'] ) ) {
			$sanitary_values['enable_0'] = $input['enable_0'];
		}
		if ( isset( $input['position_1'] ) ) {
			$sanitary_values['position_1'] = $input['position_1'];
		}
		if ( isset( $input['bar_background_0'] ) ) {
			$sanitary_values['bar_background_0'] = sanitize_text_field( $input['bar_background_0'] );
		}
		if ( isset( $input['button_0'] ) ) {
			$sanitary_values['button_0'] = $input['button_0'];
		}
		if ( isset( $input['bar_button_text'] ) ) {
			$sanitary_values['bar_button_text'] = $input['bar_button_text'];
		}
		if ( isset( $input['bar_button_link'] ) ) {
			$sanitary_values['bar_button_link'] = $input['bar_button_link'];
		}
		if ( isset( $input['bar_html_2'] ) ) {
			$sanitary_values['bar_html_2'] = html_entity_decode( $input['bar_html_2'] );
		}

		return $sanitary_values;
	}

	public function floating_bar_section_info() {
		
	}

	public function enable_0_callback() {
		printf(
			'<input type="checkbox" name="floating_bar_option_name[enable_0]" id="enable_0" value="enable_0" %s>',
			( isset( $this->floating_bar_options['enable_0'] ) && $this->floating_bar_options['enable_0'] === 'enable_0' ) ? 'checked' : ''
		);
	}

	public function position_1_callback() {
		?> <fieldset><?php $checked = ( isset( $this->floating_bar_options['position_1'] ) && $this->floating_bar_options['position_1'] === 'top' ) ? 'checked' : '' ; ?>
		<label for="position_1-0"><input type="radio" name="floating_bar_option_name[position_1]" id="position_1-0" value="top" <?php echo $checked; ?>> top</label><br>
		<?php $checked = ( isset( $this->floating_bar_options['position_1'] ) && $this->floating_bar_options['position_1'] === 'bottom' ) ? 'checked' : '' ; ?>
		<label for="position_1-1"><input type="radio" name="floating_bar_option_name[position_1]" id="position_1-1" value="bottom" <?php echo $checked; ?>> bottom</label></fieldset> <?php
	}
	public function bar_background_0_callback() {
		printf(
			'<input class="regular-text bar-background" type="text" name="floating_bar_option_name[bar_background_0]" id="bar_background_0" value="%s">',
			isset( $this->floating_bar_options['bar_background_0'] ) ? esc_attr( $this->floating_bar_options['bar_background_0']) : ''
		);
	}
	
	public function bar_button_0_callback() {
		printf(
			'<input type="checkbox" name="floating_bar_option_name[button_0]" id="button_0" value="button_0" %s>',
			( isset( $this->floating_bar_options['button_0'] ) && $this->floating_bar_options['button_0'] === 'button_0' ) ? 'checked' : ''
		);
	}
	public function bar_button_text_callback() {
		printf(
			'<input class="regular-text " type="text" name="floating_bar_option_name[bar_button_text]" id="bar_button_text" value="%s">',
			isset( $this->floating_bar_options['bar_button_text'] ) ? esc_attr( $this->floating_bar_options['bar_button_text']) : ''
		);
	}
	public function bar_button_link_callback() {
		/* printf(
			'<input class="regular-text " type="text" name="floating_bar_option_name[bar_button_link]" id="bar_button_link" value="%s">',
			isset( $this->floating_bar_options['bar_button_link'] ) ? esc_attr( $this->floating_bar_options['bar_button_link']) : ''
		); */
		wp_dropdown_pages( array( 'name' => 'floating_bar_option_name[bar_button_link]', 'selected' => $this->floating_bar_options['bar_button_link'] ) );
	}
	public function bar_html_2_callback() {
		/* printf(
			'<textarea class="large-text" rows="5" name="floating_bar_option_name[bar_html_2]" id="bar_html_2">%s</textarea>',
			isset( $this->floating_bar_options['bar_html_2'] ) ? esc_attr( $this->floating_bar_options['bar_html_2']) : ''
		); */
		
	$content=isset( $this->floating_bar_options['bar_html_2'] ) ?  html_entity_decode($this->floating_bar_options['bar_html_2']) : '';
		 wp_editor( $content, 'pw_intro', array( 
        'textarea_name' => 'floating_bar_option_name[bar_html_2]',
        'media_buttons' => false,
    ) );
	}



}
?>