=== Advanced PDF Generator ===
Contributors: jcmlmorav
Donate link: https://www.paypal.me/jcmlmorav
Tags: PDF, Templates, View, Download, Send, Email, DomPDF
Requires at least: 4.5
Tested up to: 4.8.3
Requires PHP: 5.6.1
Tested PHP up to: 7.0
Stable tag: 0.3.1
Plugin URI: https://github.com/jcmlmorav/advanced-pdf-generator
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Wordpress Plugin to create PDF files from a specific file template. View, download or send by email with specific mail template.

== Description ==

This WordPress plugin allow to you, generate a PDF file from a specific template file, totally customizable and send it via email from a specific mail template file

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/advanced-pdf-generator` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress

== Change log ==

**Important changes

- v0.4.0 Labels, texts and features, now are managed from the admin pane

== How to ==

Put the below shortcode where you want to access Advanced PDF Generator features.

**To enable specific features go to admin menu in dashboard: Advanced PDF Generator**

`[advanced-pdf-generator]`

Follow next steps for customize labels, texts and function

#### View PDF

In admin pane check view option and type values for this feature

#### Download PDF

In admin pane check download option and type values for this feature

#### Send PDF

**Important:** If you want to send PDF via email, you need the correct setup to send emails from your WP site

In admin pane check send option and type values for this feature, set form labels and success-error messages

== Templates ==

Create apg-templates directory in your theme root and put the follow files to customize.
- Create a pdf.php file to write the content will be in your PDF
- Create a mail.php file to write the content will be in you email sent. For personalization user $name and $file_url to show the info previously typed in the form.
