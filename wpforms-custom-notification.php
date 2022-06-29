<?php
/*
  Plugin Name: WPforms custom email notification
  Plugin URI: https://github.com/CylasKiganda/WPforms-custom-email-notification-plugin
  Description: Sends custom email notifications to inquiry form users.
  Version: 1.1
  Author: Cylas Kiganda
  WC requires at least: 3.5
  WC tested up to: 3.5
  Text Domain:  wpforms-custom-notification
*/
 
defined( 'ABSPATH' ) or exit;


// Make sure wpforms is active
if ( ! in_array( 'wpforms/wpforms.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	return;
}


function newwpf_dev_process_complete( $fields, $entry, $form_data, $entry_id ) {
      
    // Optional, you can limit to specific forms. Below, we restrict output to
    // form #5.
    if ( absint( $form_data['id'] ) !== 6444 ) {
        return;
    }
     
    // Get the full entry object
    $entry = wpforms()->entry->get( $entry_id );
 
    // Fields are in JSON, so we decode to an array
    $entry_fields = json_decode( $entry->fields, true );

   $email = $entry_fields[19]['value'];
   $now = new DateTime($entry->date);
	// Setup email data
	$subject = "[Automatic transmission] Thank you for your inquiry. (Receipt number：No.". $entry_id. ")";
	$message = '
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<!--[if gte mso 15]>
	<xml>
		<o:OfficeDocumentSettings>
		<o:AllowPNG/>
		<o:PixelsPerInch>96</o:PixelsPerInch>
		</o:OfficeDocumentSettings>
	</xml>
	<![endif]-->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		p{
			margin:10px 0;
			padding:0;
		}
		table{
			border-collapse:collapse;
		}
		h1,h2,h3,h4,h5,h6{
			display:block;
			margin:0;
			padding:0;
		}
		img,a img{
			border:0;
			height:auto;
			outline:none;
			text-decoration:none;
		}
		body,#bodyTable,#bodyCell{
			height:100%;
			margin:0;
			padding:0;
			width:100%;
		}
		#outlook a{
			padding:0;
		}
		img{
			-ms-interpolation-mode:bicubic;
		}
		table{
			mso-table-lspace:0pt;
			mso-table-rspace:0pt;
		}
		.ReadMsgBody{
			width:100%;
		}
		.ExternalClass{
			width:100%;
		}
		p,a,li,td,blockquote{
			mso-line-height-rule:exactly;
		}
		a[href^=tel],a[href^=sms]{
			color:inherit;
			cursor:default;
			text-decoration:none;
		}
		p,a,li,td,body,table,blockquote{
			-ms-text-size-adjust:100%;
			-webkit-text-size-adjust:100%;
		}
		.ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{
			line-height:100%;
		}
		a[x-apple-data-detectors]{
			color:inherit !important;
			text-decoration:none !important;
			font-size:inherit !important;
			font-family:inherit !important;
			font-weight:inherit !important;
			line-height:inherit !important;
		}
		#bodyCell{
			padding:50px 50px;
		}
		.templateContainer{
			max-width:600px !important;
			border:0;
		}
		a.mcnButton{
			display:block;
		}
		.mcnTextContent{
			word-break:break-word;
		}
		.mcnTextContent img{
			height:auto !important;
		}
		.mcnDividerBlock{
			table-layout:fixed !important;
		}
		/***** Make theme edits below if needed *****/
		/* Page - Background Style */
		body,#bodyTable{
			background-color:#e9eaec;
		}
		/* Page - Heading 1 */
		h1{
			color:#202020;
			font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
			font-size:26px;
			font-style:normal;
			font-weight:bold;
			line-height:125%;
			letter-spacing:normal;
			text-align:left;
		}
		/* Page - Heading 2 */
		h2{
			color:#202020;
            font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
			font-size:22px;
			font-style:normal;
			font-weight:bold;
			line-height:125%;
			letter-spacing:normal;
			text-align:left;
		}
		/* Page - Heading 3 */
		h3{
			color:#202020;
            font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
			font-size:20px;
			font-style:normal;
			font-weight:bold;
			line-height:125%;
			letter-spacing:normal;
			text-align:left;
		}
		/* Page - Heading 4 */
		h4{
			color:#202020;
            font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
            font-size:18px;
			font-style:normal;
			font-weight:bold;
			line-height:125%;
			letter-spacing:normal;
			text-align:left;
		}
		/* Header - Header Style */
		#templateHeader{
			border-top:0;
			border-bottom:0;
			padding-top:0px;
			padding-bottom:20px;
		}
		/* Body - Body Style */
		#templateBody{
			background-color:#FFFFFF;
			border-top:0;
			border: 1px solid #c1c1c1;
			padding-top:0;
			padding-bottom:0px;
		}
		/* Body -Body Text */
		#templateBody .mcnTextContent,
		#templateBody .mcnTextContent p{
			color:#555555;
            font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
			font-size:14px;
			line-height:150%;
			text-align:left;
		}
		/* Body - Body Link */
		#templateBody .mcnTextContent a,
		#templateBody .mcnTextContent p a{
			color:#ff7f50;
			font-weight:normal;
			text-decoration:underline;
		}
		/* Footer - Footer Style */
		#templateFooter{
			background-color:#e9eaec;
			border-top:0;
			border-bottom:0;
			padding-top:12px;
			padding-bottom:12px;
		}
		/* Footer - Footer Text */
		#templateFooter .mcnTextContent,
		#templateFooter .mcnTextContent p{
			color:#cccccc;
				font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
			font-size:12px;
			line-height:150%;
			text-align:center;
		}
        a{
            color: blue !important;
        }
		/* Footer - Footer Link */
		#templateFooter .mcnTextContent a,
		#templateFooter .mcnTextContent p a{
			color:#cccccc;
			font-weight:normal;
			text-decoration:underline;
		}
		@media only screen and (min-width:768px){
			.templateContainer{
				width:600px !important;
			}
		}
		@media only screen and (max-width: 480px){
			body,table,td,p,a,li,blockquote{
				-webkit-text-size-adjust:none !important;
			}
		}
		@media only screen and (max-width: 480px){
			body{
				width:100% !important;
				min-width:100% !important;
			}
		}
		@media only screen and (max-width: 480px){
			#bodyCell{
				padding:5px !important;
			}
		}
		@media only screen and (max-width: 480px){
			.mcnTextContentContainer{
				max-width:100% !important;
				width:100% !important;
			}
		}
	</style>
</head>
<body>
	<center>
		<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
			<tr>
				<td align="center" valign="top" id="bodyCell">
					<!-- BEGIN TEMPLATE // -->
					<!--[if gte mso 9]>
					<table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
					<tr>
					<td align="center" valign="top" width="600" style="width:600px;">
					<![endif]-->
					<table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
						
						<tr>
							<td valign="top" id="templateBody">
								<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
									<tbody class="mcnTextBlockOuter">
										<tr>
											<td valign="top" class="mcnTextBlockInner">
												<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;" class="mcnTextContentContainer">
													<tbody>
														<tr>
															<td valign="top" class="mcnTextContent" style="padding-top:30px; padding-right: 30px; padding-bottom: 30px; padding-left: 30px;">

																<!-- Content -->
																<div id="newx-notif"  >
                                                                <hr style="border:none;border-top:1px dashed #636363;color:#636363;height:1px; ">
                                                                <p style=" color:black">We have received your product inquiry.</p>
                                                                <hr style="border:none;border-top:1px dashed #636363;color:#636363;height:1px; ">
                                                                <p style="padding-top:30px; color:black">* This email is automatically sent from the email form system, so you cannot reply to this email address.</p>
                                                                
                                                                <p style=" color:black">* If you are not familiar with this email, please contact us at the email address for replying to this email.</p>
                                                                
                                                                <p style=" margin-top:30px; color:black" > Mr./Mrs.'. $entry_fields[11]["value" ] .'</p>
                                                                
                                                                <p style=" color:black">We become indebted to.<br/>
                                                                This is Cylas Zone Co.</p>
                                                                
                                                                <p style="margin-top:30px; color:black">Thank you for your inquiry regarding our products. <br/>
																We have received inquiries with the following contents. <br/>
																Our sales staff will contact you within 4 days, so please wait for a while.</p>

                                                                <p style="margin-top:30px; color:black">▼ Inquiry details ▼</p>
                                                                <hr style="border:none;border-top:1px dashed #636363;color:#636363;height:1px;display:none;">
                                                                <p style=" color:black"> name:'. $entry_fields[11]["value"] .'<br/>
                                                                phone number: '. $entry_fields[19]["value"] .'<br/> 
																Inquiry date and time: '. $now->format("Y") ."YY.$now->format("m")."MM".$now->format("d")."DD".'<br/>
                                                                contact number: '.$entry_id .'<br/>
																Inquiries: '. $entry_fields[33]["value"] .' </p>

                                                                
                                                               

                                                                </div>

															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td valign="top" id="templateFooter">
								<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
									<tbody class="mcnTextBlockOuter">
										<tr>
											<td valign="top" class="mcnTextBlockInner">
												<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;" class="mcnTextContentContainer">
													<tbody>
														<tr>
															<td valign="top" class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;">

                                                            <hr style="border:none;border-top:1px solid #636363;color:#636363;height:1px;display:none;">
                                                            <p style=" color:black"'>Cylas Zone Co.  <br />
															122357 Turkey, Adana, Seyhan <br />
															Website: cylaszone.com <br/>
															Email address: info@cylaszone.com</p>
																

															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</table>
					<!--[if gte mso 9]>
					</td>
					</tr>
					</table>
					<![endif]-->
					<!-- // END TEMPLATE -->
					</td>
				</tr>
			</table>
		</center>
	</body>
</html>

    ';
    
   
	$headers = $headers = array('Content-Type: text/html; charset=UTF-8', 'From: CylasZone Co., Ltd. | Distributor that provides full PC devices <info@cylaszone.com>');

	wp_mail( $email, $subject, $message, $headers );
 
}
add_action( 'wpforms_process_complete', 'newwpf_dev_process_complete', 10, 4 );