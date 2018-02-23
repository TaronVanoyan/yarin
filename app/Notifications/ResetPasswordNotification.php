<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
	/**
	 * The password reset token.
	 *
	 * @var string
	 */
	public $token;

	/**
	 * The callback that should be used to build the mail message.
	 *
	 * @var \Closure|null
	 */
	public static $toMailCallback;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
	    $this->token = $token;
    }

	/**
	 * Get the notification's channels.
	 *
	 * @param  mixed  $notifiable
	 * @return array|string
	 */
    public function via($notifiable)
    {
        return ['mail'];
    }


	/**
	 * Build the mail representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	public function toMail($notifiable)
	{
		if (static::$toMailCallback) {
			return call_user_func(static::$toMailCallback, $notifiable, $this->token);
		}

		return (new MailMessage)
			->subject(config('app.name', 'Laravel') .' '. __('app.reset_password'))
			->line(__('app.reset_password_email_line_1'))
			->action(__('app.reset_password'), url(config('app.url').route('password.reset', $this->token, false)))
			->line(__('app.reset_password_email_line_2'));
	}

	/**
	 * Set a callback that should be used when building the notification mail message.
	 *
	 * @param  \Closure  $callback
	 * @return void
	 */
	public static function toMailUsing($callback)
	{
		static::$toMailCallback = $callback;
	}
}
