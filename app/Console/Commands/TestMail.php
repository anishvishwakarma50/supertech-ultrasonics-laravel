<?php

namespace App\Console\Commands;

use App\Mail\ContactFormMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:test {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test SMTP email configuration by sending a test email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');

        $this->info("Testing email configuration...");
        $this->info("Sending test email to: $email");

        try {
            $testData = [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'phone' => '1234567890',
                'subject' => 'Test Email',
                'message' => 'This is a test email to verify SMTP configuration is working correctly.',
            ];

            Mail::to($email)->send(new ContactFormMail($testData));

            $this->info('✓ Test email sent successfully!');
            $this->info('If you don\'t receive it, check your spam folder or email logs.');
            
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('✗ Failed to send test email');
            $this->error('Error: ' . $e->getMessage());
            $this->error('Stack Trace: ' . $e->getTraceAsString());
            
            return Command::FAILURE;
        }
    }
}
