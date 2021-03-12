<?php

namespace App\Http\Controllers\Pessenger\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Access\AuthorizationException;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | pessenger that recently registered with the application. Emails may also
    | be re-sent if the pessenger didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect pessengers after verification.
     *
     * @var string
     */
    protected $redirectTo = '/pessenger';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('pessenger.auth');
        $this->middleware('signed')->only('pessenger.verify');
        $this->middleware('throttle:6,1')->only('pessenger.verify', 'resend');
    }

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return $request->user('pessenger')->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('pessenger.auth.verify');
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function verify(Request $request)
    {
        if (! hash_equals((string) $request->route('id'), (string) $request->user('pessenger')->getKey())) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($request->user('pessenger')->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($request->user('pessenger')->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        if ($request->user('pessenger')->markEmailAsVerified()) {
            event(new Verified($request->user('pessenger')));
        }

        return redirect($this->redirectPath())->with('verified', true);
    }

    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function resend(Request $request)
    {
        if ($request->user('pessenger')->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        $request->user('pessenger')->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
}
