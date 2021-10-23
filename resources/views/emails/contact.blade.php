
<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Simple Transactional Email</title>
    <style>
        @media only screen and (max-width: 620px) {
            table[class=body] h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important;
            }

            table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
                font-size: 16px !important;
            }

            table[class=body] .wrapper,
            table[class=body] .article {
                padding: 10px !important;
            }

            table[class=body] .content {
                padding: 0 !important;
            }

            table[class=body] .container {
                padding: 0 !important;
                width: 100% !important;
            }

            table[class=body] .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important;
            }

            table[class=body] .btn table {
                width: 100% !important;
            }

            table[class=body] .btn a {
                width: 100% !important;
            }

            table[class=body] .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important;
            }
        }
        @media all {
            .ExternalClass {
                width: 100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }

            .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
            }

            .btn-primary table td:hover {
                background-color: #34495e !important;
            }

            .btn-primary a:hover {
                background-color: #34495e !important;
                border-color: #34495e !important;
            }
        }
    </style>
</head>
<body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; direction: rtl:;">
<table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%; direction: rtl;" width="100%" bgcolor="#f6f6f6">
    <tr>
        <td style="text-aligh: right; font-family: sans-serif; font-size: 14px; vertical-align: top; direction: rtl;" valign="top">&nbsp;</td>
        <td class="container" style="text-aligh: right; font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; direction: rtl; margin: 0 auto;" width="580" valign="top">
            <div class="content" style="text-aligh: right; box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px; direction: rtl;">

                <!-- START CENTERED WHITE CONTAINER -->
                <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">{{ $contact->type }}</span>
                <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%; direction: rtl;" width="100%">

                    <!-- START MAIN CONTENT AREA -->
                    <tr>
                        <td class="wrapper" style="text-aligh: right; font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px; direction: rtl;" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; direction: rtl;" width="100%">
                                <tr>
                                    <td style="text-aligh: right; font-family: sans-serif; font-size: 14px; vertical-align: top; direction: rtl;" valign="top">
                                        <p style="text-aligh: right; font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px; direction: rtl;">{{ $contact->type }}</p>
                                        <p style="text-aligh: right; font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px; direction: rtl;">
                                        </p>
                                        <div style="text-aligh: right; font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px; direction: rtl;">
                                            {{ $contact->message }}
                                        </div>

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- END MAIN CONTENT AREA -->
                </table>

                <!-- START FOOTER -->
                <div class="footer" style="text-aligh: right; clear: both; margin-top: 10px; text-align: center; width: 100%; direction: rtl;">
                    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; direction: rtl;" width="100%">
                        <tr>
                        </tr>
                        <tr>
                            <td class="content-block powered-by" style="text-aligh: right; font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center; direction: rtl;" valign="top" align="center">
                                ادارة تليــد
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- END FOOTER -->

                <!-- END CENTERED WHITE CONTAINER -->
            </div>
        </td>
        <td style="text-aligh: right; font-family: sans-serif; font-size: 14px; vertical-align: top; direction: rtl;" valign="top">&nbsp;</td>
    </tr>
</table>
<!-- GA -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-1284993-68', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>
