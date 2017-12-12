# Advanced PDF Generator

WordPress plugin to generate PDF files from a file template totally customizable. Allow view, download and send the file via email from a template file.

## Installation

Download .zip file and install in WordPress plugin directory.

## How to

Put the below shortcode where you want to access Advanced PDF Generator features.

**To enable specific features go to admin menu in dashboard: Advanced PDF Generator**

`[advanced-pdf-generator]`

Follow next steps for customize labels and texts

#### View PDF

In admin pane check view option and type values for this feature

#### Download PDF

In admin pane check download option and type values for this feature

#### Send PDF

**Important:** If you want to send PDF via email, you need the correct setup to send emails from your WP site

In admin pane check send option and type values for this feature, set form labels and success-error messages

## Templates

Create apg-templates directory in your theme root and put the follow files to customize.
- Create a pdf.php file to write the content will be in your PDF
- Create a mail.php file to write the content will be in you email sent. For personalization use $name and $file_url to show the info previously typed in the form.
