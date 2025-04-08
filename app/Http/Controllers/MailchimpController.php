<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MailchimpService;

class MailchimpController extends Controller
{
    /**
     * Handle contact form submission and send transactional email.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Services\MailchimpService $mailchimpService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendEmail(Request $request, MailchimpService $mailchimpService)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'company' => 'required|string',
            'job' => 'required|string',
            'team' => 'required|string',
            'message' => 'required|string',
        ]);

        $toEmail = $validatedData['email'];
        $toName = $validatedData['first_name'];
        $subject = 'Contact Form Submission';
        $htmlContent = "
            <p><strong>Which team can help you?:</strong> {$validatedData['team']}</p>
            <p><strong>Name:</strong> {$validatedData['first_name']} {$validatedData['last_name']}</p>
            <p><strong>Email:</strong> {$validatedData['email']}</p>
            <p><strong>Company:</strong> {$validatedData['company']}</p>
            <p><strong>Job:</strong> {$validatedData['job']}</p>
            <p><strong>Message:</strong><br>{$validatedData['message']}</p>
        ";

        try {
            $result = $mailchimpService->sendTransactionalEmail($toEmail, $toName, $subject, $htmlContent);

            $emailStatus = $result[0]->status ?? null;

            if (in_array($emailStatus, ['sent', 'queued'])) {
                return redirect('/')->with('success', 'Thank you for your message! We will get back to you soon.');
            } else {
                return redirect('/')->with('error', 'Something went wrong while sending your message. Please try again later.');
            }
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
