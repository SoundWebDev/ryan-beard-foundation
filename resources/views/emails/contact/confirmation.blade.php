<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>We Received Your Message</title>
    </head>
    <body style="font-family: Arial, sans-serif; color: #1f2937; line-height: 1.6;">
        <h1 style="margin-bottom: 16px;">Message Received. Crisis Averted.</h1>

        <p>Hi {{ $contact['name'] }},</p>

        <p>Thank you for contacting the Ryan Beard Foundation.</p>

        <p>Your message has safely arrived at Foundation HQ and has been routed to our highly sophisticated review process (one inbox, several browser tabs, and very strong opinions about UX).</p>

        <p><strong>Your subject:</strong> {{ $contact['subject'] }}</p>

        <p><strong>Your message:</strong></p>
        <p>{!! nl2br(e($contact['message'])) !!}</p>

        <p>We will get back to you soon. In the meantime, please enjoy the comforting knowledge that your email was successfully sent and is now part of this noble cause.</p>

        <p>With gratitude and mild urgency,<br>The Ryan Beard Foundation</p>
        <p style="font-size: 12px; color: #6b7280; margin-top: 24px;">This is an automated confirmation email. No sourdough was harmed in the making of this reply.</p>
    </body>
</html>
