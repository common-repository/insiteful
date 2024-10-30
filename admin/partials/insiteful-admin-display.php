<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://insiteful.co
 * @since      1.1.1
 *
 * @package    Insiteful
 * @subpackage Insiteful/admin/partials
 */
?>
<?php
    //Grab all options
    $options = get_option($this->plugin_name);

    // Cleanup
    $code = $options['code'];

    $color = "#222";
    $status = "Not Connected";
    if( $code && $code !== ""){
    	$color = "#25e6b2";
    	$status = "Connected";
    } else {
?>
	<div class="notice notice-info is-dismissible">
	    <p><strong>Exclusive</strong> coupon: use Insiteful <strong><em>100% FREE</em></strong> for 14 days — just use promo code <u><strong>WP14DFREE</strong></u> when you get started. ONLY for WordPress users! &nbsp;<a href="https://app.insiteful.co/start-trial?ref=wp" onclick="" class="factory-button button button-primary">
	            <i class="fa fa-plus-circle"></i> Sign up FREE!</a></p>                                             
	</div>
<?php } ?>
<div class="wrap">

    <h2><img style="display: inline-block; height: 1.5em; margin-bottom: -0.25em; width: auto" src="http://app.insiteful.co/views/assets/icon.png">&nbsp; <?php echo esc_html(get_admin_page_title()); ?></h2>
    <form method="post" name="insiteful_options" action="options.php">

	<?php settings_fields($this->plugin_name); ?>
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row">
								Status						</th>
				<td>
					<span style="padding: 2px 5px; background-color: <?php echo $color; ?>; color: #fff"><?php echo $status; ?></span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="api_key">Activation Key</label>
				</th>
				<td>
					<input type="text" class="widefat" placeholder="Your Insiteful Activation key"  id="<?php echo $this->plugin_name;?>-code" name="<?php echo $this->plugin_name; ?>[code]" value="<?php echo $code; ?>" />
						<p class="help">
									The key for connecting with your Insiteful account.								
							<a target="_blank" href="http://app.insiteful.co/install?copy_key=1&ref=wp"">Get your activation key here.</a>
						</p>
					</td>
				</tr>
		</tbody>
	</table>

        <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>
<a target="_blank" href="//app.insiteful.co" class="button button-secondary">View Dashboard</a>
<script>
function isValidActivation(key){
	// if valid
	if(key.includes('insiteful') || key.includes('script') || key.includes('(')) return false;
	return true;
}

const passwordInput = document.querySelector("#<?php echo $this->plugin_name;?>-code");
passwordInput.addEventListener("change", e => {
    if (isValidActivation(e.target.value)) {
        console.log("Activation appears valid.")
    } else {
        alert("Error: Your activation key doesn't look right. Make sure not to include the entire <script> tag — just your activation key: the value in parantheses (not including quotes) in the insiteful_activate() function from your Install code.'");
    }
})
</script>
    </form>
<br/><hr/><br/><br/>


<p><em><strong>Have you tried the power-ups?</em></strong> 🚀 <a href="//app.insiteful.co/domains?p=1&ref=wp" target="_blank">Customize experience optimization settings.</a></p>
<p><em><strong>Are you automating follow-up?</em></strong> 📬 <a href="//app.insiteful.co/sequences?ref=wp" target="_blank">Setup auto drip emails to recapture partial leads here.</a></p>
<p><em><strong>Enjoying Insiteful?</em> ⭐</strong> <a href="//app.insiteful.co/subscribe?ref=wp" target="_blank">Subscribe to help support</a> our team to continue building & improving this product!</p>
<p><em><strong><a href="//app.insiteful.co/start-trial?ref=wp" target="_blank">Try it FREE!</a></em></strong> 🤑 exclusive discount code for WordPress users only: <u><strong>WP14DFREE</strong></u></p>
<p><em><strong>Having trouble? Questions or comments</em>?</strong> Just <a href="mailto:hi@mail.insiteful.co" target="_blank">shoot us an email</a> or <a href="//app.insiteful.co/help?ref=wp">open a ticket</a> &ndash; we're here to help!</p>
<p><em>This plugin is developed & maintained with ♥ by the team at <a href="https://insiteful.co/?ref=wp">Insiteful</a>.</p>

</div>