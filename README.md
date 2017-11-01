# Advanced PDF Generator

WordPress plugin to generate PDF files from a file template totally customizable. Allow view, download and send the file via email from a template file.

## Installation

Download .zip file and install in WordPress plugin directory.

## How to

Put the below shortcode where you want to access Advanced PDF Generator features.

```[advanced-pdf-generator]```

Follow next steps for customize labels and texts

#### View PDF

```[advanced-pdf-generator view="true" view_text="View PDF" view_class="view-apdfg-link"]```

#### Download PDF

```[advanced-pdf-generator download="true" download_text="Download PDF" download_class="download-apdfg-link"]```

#### Send PDF

**Important:** If you want to send PDF vía email, you need the correct setup to send emails from your WP site and customize the modal form to get data (name and email) with [bootstrap](http://getbootstrap.com/)

```[advanced-pdf-generator send="true" send_text="Send PDF" send_class="send-apdfg-link" name_label="Name" name_placeholder="Write your name" email_label="E-mail" email_placeholder="Write your email" submit_label="Send"]```

## Templates

Create apg-templates in your theme root directory.
- Create a pdf.php file to write the content will be in your PDF
- Create a mail.php file to write the content will be in you email sent
