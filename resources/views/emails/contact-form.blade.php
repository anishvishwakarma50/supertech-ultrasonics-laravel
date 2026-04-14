<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
        }
        
        .email-wrapper {
            background-color: #f4f4f4;
            padding: 20px;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .email-header {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .email-header h1 {
            font-size: 24px;
            font-weight: 600;
            margin: 0;
        }
        
        .email-header p {
            font-size: 14px;
            opacity: 0.9;
            margin-top: 5px;
        }
        
        .email-content {
            padding: 30px;
        }
        
        .greeting {
            font-size: 16px;
            margin-bottom: 20px;
            color: #555;
        }
        
        .section {
            margin: 25px 0;
        }
        
        .section-title {
            font-size: 14px;
            font-weight: 700;
            color: #007bff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .info-item {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #007bff;
        }
        
        .info-label {
            font-size: 12px;
            font-weight: 600;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 5px;
        }
        
        .info-value {
            font-size: 14px;
            color: #333;
            word-break: break-word;
        }
        
        .info-value a {
            color: #007bff;
            text-decoration: none;
        }
        
        .info-value a:hover {
            text-decoration: underline;
        }
        
        .message-section {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            border-left: 4px solid #28a745;
            margin: 20px 0;
        }
        
        .message-label {
            font-size: 12px;
            font-weight: 600;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 10px;
        }
        
        .message-body {
            font-size: 14px;
            line-height: 1.7;
            color: #333;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        
        .action-section {
            margin: 30px 0;
            text-align: center;
        }
        
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            color: white !important;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .cta-button:hover {
            text-decoration: none;
            opacity: 0.9;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
        }
        
        .email-footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }
        
        .footer-text {
            font-size: 12px;
            color: #999;
            margin: 5px 0;
        }
        
        .divider {
            height: 1px;
            background-color: #e9ecef;
            margin: 20px 0;
        }
        
        @media only screen and (max-width: 600px) {
            .email-container {
                border-radius: 0;
            }
            
            .email-header {
                padding: 20px;
            }
            
            .email-header h1 {
                font-size: 20px;
            }
            
            .email-content {
                padding: 20px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .info-item {
                padding: 12px;
            }
            
            .cta-button {
                padding: 10px 20px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-container">
            <!-- Header -->
            <div class="email-header">
                <h1>📬 New Contact Form Submission</h1>
                <p>A new message has been received from your website</p>
            </div>
            
            <!-- Content -->
            <div class="email-content">
                <div class="greeting">
                    Hello,
                </div>
                
                <!-- Sender Information -->
                <div class="section">
                    <div class="section-title">👤 Sender Information</div>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Name</div>
                            <div class="info-value">{{ $senderName }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Email</div>
                            <div class="info-value"><a href="mailto:{{ $senderEmail }}">{{ $senderEmail }}</a></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Phone</div>
                            <div class="info-value">
                                @if($senderPhone)
                                    <a href="tel:{{ $senderPhone }}">{{ $senderPhone }}</a>
                                @else
                                    <span style="color: #999;">Not provided</span>
                                @endif
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Subject</div>
                            <div class="info-value">{{ $messageSubject }}</div>
                        </div>
                    </div>
                </div>
                
                <!-- Message -->
                <div class="section">
                    <div class="section-title">💬 Message</div>
                    <div class="message-section">
                        <div class="message-label">Message Content</div>
                        <div class="message-body">{{ $messageBody }}</div>
                    </div>
                </div>
                
                <!-- Action Section -->
                <div class="action-section">
                    <a href="{{ url('/admin/contact') }}" class="cta-button">View in Admin Panel</a>
                </div>
                
                <div class="divider"></div>
                
                <p style="font-size: 12px; color: #999; text-align: center;">
                    Reply directly to <strong>{{ $senderEmail }}</strong> to respond to this message
                </p>
            </div>
            
            <!-- Footer -->
            <div class="email-footer">
                <div class="footer-text">© {{ date('Y') }} Super Tech Ultrasonics. All rights reserved.</div>
                <div class="footer-text">This is an automated email. Please do not reply to this address.</div>
            </div>
        </div>
    </div>
</body>
</html>




