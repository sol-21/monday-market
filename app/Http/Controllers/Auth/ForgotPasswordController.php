<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Symfony\Component\Mailer\Exception\TransportException;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
     */

    use SendsPasswordResetEmails;
    public function sendResetLinkEmail(Request $request)
    {
        try {
            $this->validateEmail($request);

            $response = $this->broker()->sendResetLink(
                $this->credentials($request)
            );

            if ($response == Password::RESET_LINK_SENT) {
                return $this->sendResetLinkResponse($request, $response);
            } else {
                return $this->sendResetLinkFailedResponse($request, $response);
            }
        } catch (TransportException $e) {

            return back()->withErrors(['email' => 'Failed to send reset link. Please check your internet connection and try again.']);
        } catch (TooManyRequestsHttpException $e) {

            $retryAfter = $e->getHeaders()['Retry-After'] ?? 60;
            return back()->withErrors(['email' => 'Too many password reset attempts. Please wait ' . $retryAfter . ' seconds before trying again.']);

        } catch (\Exception $e) {

            return back()->withErrors(['email' => 'An unexpected error occurred. Please try again later.']);
        }
    }
}
