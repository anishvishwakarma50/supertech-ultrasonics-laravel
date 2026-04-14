<?php

namespace App\Console\Commands;

use App\Mail\InquiryFormMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestInquiryMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:test-inquiry {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test inquiry email by sending a sample inquiry email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');

        $this->info("Testing inquiry email template...");
        $this->info("Sending test inquiry email to: $email");

        try {
            $inquiryData = [
                'company_name' => 'Test Company Ltd.',
                'contact_person_name' => 'John Doe',
                'phone_no' => '+91-9876543210',
                'location' => 'Mumbai, India',
                'product_name' => 'Ultrasonic Cleaning Machine',
                'description' => 'We are interested in purchasing your ultrasonic cleaning machines. Could you please provide us with detailed specifications and bulk pricing options?',
            ];

            Mail::to($email)->send(new InquiryFormMail($inquiryData));

            $this->info('✓ Test inquiry email sent successfully!');
            $this->info('If you don\'t receive it, check your spam folder.');
            
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('✗ Failed to send test inquiry email');
            $this->error('Error: ' . $e->getMessage());
            
            return Command::FAILURE;
        }
    }
}
