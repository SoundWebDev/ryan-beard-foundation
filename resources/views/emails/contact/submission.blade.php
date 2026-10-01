<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>New Contact Form Submission</title>
    </head>
    <body style="font-family: Arial, sans-serif; color: #1f2937; line-height: 1.6;">
        <h1 style="margin-bottom: 16px;">New Contact Form Submission</h1>

        <p><strong>Name:</strong> {{ $contact['name'] }}</p>
        <p><strong>Email:</strong> {{ $contact['email'] }}</p>
        <p><strong>Subject:</strong> {{ $contact['subject'] }}</p>
        <p><strong>Message:</strong></p>
        <p>{!! nl2br(e($contact['message'])) !!}</p>
    </body>
</html>
