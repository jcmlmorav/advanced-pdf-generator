<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://wordpress.org/plugins/advanced-pdf-generator
 * @since      0.4.0
 *
 * @package    Advanced_Pdf_Generator
 * @subpackage Plugin_Name/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1>Advanced PDF Generator</h1>
    <form method="post">
        <p>Advanced PDF Generator plugin allows to you the possibility to change by default the labels value to show in public face side without use the parameters into the shortcode, but you can keep parameters in the shortcode for more customization.</p>
        <h2 class="title"><input type="checkbox" name="download" value="download" <?php if($values->download) { echo 'checked="checked"'; }  ?>> Download</h2>
        <table class="form-table advanced-pdf-generator">
            <tr>
                <th>
                    <label for="download_text">Download text</label>
                </th>
                <th>
                    <input type="text" name="download_text" value="<?php echo $values->download_text; ?>">
                </th>
                <th>
                    <label for="download_class">Download class</label>
                </th>
                <th>
                    <input type="text" name="download_class" value="<?php echo $values->download_class; ?>">
                </th>
            </tr>
        </table>
        <h2 class="title"><input type="checkbox" name="send" value="send" <?php if($values->send) { echo 'checked="checked"'; }  ?>> Send</h2>
        <table class="form-table advanced-pdf-generator">
            <tr>
                <th>
                    <label for="send_text">Send text</label>
                </th>
                <th>
                    <input type="text" name="send_text" value="<?php echo $values->send_text; ?>">
                </th>
                <th>
                    <label for="send_class">Send class</label>
                </th>
                <th>
                    <input type="text" name="send_class" value="<?php echo $values->send_class; ?>">
                </th>
            </tr>
            <tr>
                <th>
                    <label for="name_label">Name label</label>
                </th>
                <th>
                    <input type="text" name="name_label" value="<?php echo $values->name_label; ?>">
                </th>
                <th>
                    <label for="name_placeholder">Name placeholder</label>
                </th>
                <th>
                    <input type="text" name="name_placeholder" value="<?php echo $values->name_placeholder; ?>">
                </th>
            </tr>
            <tr>
                <th>
                    <label for="email_label">Email label</label>
                </th>
                <th>
                    <input type="text" name="email_label" value="<?php echo $values->email_label; ?>">
                </th>
                <th>
                    <label for="email_placeholder">Email placeholder</label>
                </th>
                <th>
                    <input type="text" name="email_placeholder" value="<?php echo $values->email_placeholder; ?>">
                </th>
            </tr>
            <tr>
                <th>
                    <label for="success_message">Success message</label>
                </th>
                <th>
                    <input type="text" name="success_message" value="<?php echo $values->success_message; ?>">
                </th>
                <th>
                    <label for="error_message">Error message</label>
                </th>
                <th>
                    <input type="text" name="error_message" value="<?php echo $values->error_message; ?>">
                </th>
            </tr>
            <tr>
                <th>
                    <label for="submit_label">Submit label</label>
                </th>
                <th>
                    <input type="text" name="submit_label" value="<?php echo $values->submit_label; ?>">
                </th>
            </tr>
        </table>
        <h2 class="title"><input type="checkbox" name="view" value="view" <?php if($values->view) { echo 'checked="checked"'; }  ?>> View</h2>
        <table class="form-table advanced-pdf-generator">
            <tr>
                <th>
                    <label for="view_text">View text</label>
                </th>
                <th>
                    <input type="text" name="view_text" value="<?php echo $values->view_text; ?>">
                </th>
                <th>
                    <label for="view_class">View class</label>
                </th>
                <th>
                    <input type="text" name="view_class" value="<?php echo $values->view_class; ?>">
                </th>
            </tr>
        </table>
        <?php submit_button('Update values'); ?>
    </form>
</div>
