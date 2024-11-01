<div class="wrap">
<h2>Vistrail</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('vistrail'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row">Site ID:</th>
<td><input type="text" name="vt_site_id" value="<?php echo get_option('vt_site_id'); ?>" /></td>
</tr>

</tr>

</table>

<input type="hidden" name="action" value="update" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
