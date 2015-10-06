<?php
if (!class_exists('RAD_Dashboard')) {
	require_once(RAD_RAPIDOLOGY_PLUGIN_DIR . 'rapidology.php');
}
class rapidology_rapidbar extends RAD_Rapidology{

	public function test(){
		echo 'test';
	}

	public function display_rapidbar_table(){

		$this->display_active();


	}

	public function display_active(){
		$output = sprintf(
			'<div class="rad_dashboard_optins_list">
							<ul>
								<li>
									<div class="rad_dashboard_table_name rad_dashboard_table_column">%1$s</div>
									<div class="rad_dashboard_table_impressions rad_dashboard_table_column">%2$s</div>
									<div class="rad_dashboard_table_conversions rad_dashboard_table_column">%3$s</div>
									<div class="rad_dashboard_table_rate rad_dashboard_table_column">%4$s</div>
									<div class="rad_dashboard_table_actions rad_dashboard_table_column"></div>
									<div style="clear: both;"></div>
								</li>',
			esc_html__( 'Optin Name', 'rapidology' ),
			esc_html__( 'Impressions', 'rapidology' ),
			esc_html__( 'Conversions', 'rapidology' ),
			esc_html__( 'Conversion Rate', 'rapidology' )
		);
		return $output;
	}



}

