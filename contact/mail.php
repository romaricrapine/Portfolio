<?php

require "mailsuccess.php";

// Check voir si conditions = ok
if (empty($_POST['name']) ||
    empty($_POST['email']) ||
    empty($_POST['message']) ||
    empty($_POST['subject']) ||
    !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "No arguments Provided!";
    return false;
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$subject = strip_tags(htmlspecialchars($_POST['subject']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$body_message_support = '

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office" lang="FR-fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1;"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8;"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Mail</title>

    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml><![endif]-->
</head>

<body style="padding: 0; margin: 0;font-family: \'Poppins\', Helvetica, sans-serif;font-weight: 600;font-style: normal;">
<span style="color:transparent !important; overflow:hidden !important; display:none !important; line-height:0 !important; height:0 !important; opacity:0 !important; visibility:hidden !important; width:0 !important; mso-hide:all;">Vous avez reçus un mail de votre Portfolio !</span>

<!-- / Full width container -->
<table class="full-width-container" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%"
       bgcolor="#5A5A5A" style="width: 100%; height: 100%; padding: 30px 0 30px 0;">
    <tr>
        <td align="center" valign="top">
            <!-- / 700px container -->
            <table class="container" border="0" cellpadding="0" cellspacing="0" width="700" bgcolor="#333"
                   style="width: 700px;border-radius: 0 30px 0 30px; border: transparent 1px solid;box-shadow: -10px 0px 13px -7px #000000, 10px 0px 13px -7px #000000, 5px 5px 15px 5px rgba(255,255,255,0);">
                <tr>
                <td align="center" valign="top">
                        <!-- / Header -->
                        <table class="container header" border="0" cellpadding="0" cellspacing="0" width="620"
                               style="width: 620px;">
                             <tr>
                                <td style="padding: 43px 0 30px 0; border-bottom: solid 3px #eeeeee;" align="left">
                                    <h1 style="font-size: 30px; text-decoration: none; color: white;">Message de ' . $name . '</h1>
                                </td>
                            </tr>
                        </table>
                        <!-- /// Header -->
                        
                        <!-- / Hero subheader -->
                        <table class="container hero-subheader" border="0" cellpadding="0" cellspacing="0" width="620"
                               style="width: 620px;">
                            <tr>
                                <td class="hero-subheader__title"
                                    style="font-size: 30px; font-weight: bold; padding: 80px 0 15px 0;color: white" align="left">
                                    Sujet : ' . $subject . '
                                </td>
                            </tr>

                            <tr>
                                <td class="hero-subheader__content"
                                    style="font-size: 20px; line-height: 27px; color: white; padding: 0 60px 90px 0; border-bottom: solid 3px #eeeeee;"
                                    align="left">' . $message . '
                                </td>
                            </tr>
                        </table>
                        <!-- /// Hero subheader -->

                        <!-- / Footer -->
                        <table class="container" border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
                            <tr>
                                <td align="center">
                                    <table class="container" border="0" cellpadding="0" cellspacing="0" width="620"
                                           align="centers">

                                        <tr>
                                            <td style="color: white; text-align: center; font-size: 15px; padding: 30px 0 30px 0; line-height: 22px;">
                                                Copyright &copy; <a href="https://romaricr.promo-47.codeur.online/portfolio_v3/index.html" target="_blank"
                                                                    style="text-decoration: underline; color: white;">Romaric Rapiné</a>.
                                                <br/>2021 Tous droits réservés.
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <!-- /// Footer -->
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>

</html>

';

// Message envoyer au support
$to = 'contact@romaric-rapine.fr';
$email_subject = "$subject";
$email_body = "$body_message_support";
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = "From: $name <$email_address>";
mail($to, $email_subject, $email_body, implode("\r\n", $headers));
return true;
