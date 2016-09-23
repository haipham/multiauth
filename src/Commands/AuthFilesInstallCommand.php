<?php

namespace Sonars\MultiAuth\Commands;

use Sonars\MultiAuth\Core\Commands\InstallFilesCommand;

class AuthFilesInstallCommand extends InstallFilesCommand {
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'multiauth:files';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Install multiauth files';

	/**
	 * Get the destination path.
	 *
	 * @return string
	 */
	public function getFiles() {
		$name = $this->getParsedNameInput();

		return [
			'routes' => [
				'path' => '/routes/' . $name . '.php',
				'stub' => __DIR__ . '/../stubs/routes/routes.stub',
			],
			'redirect_if_not' => [
				'path' => '/app/Http/Middleware/RedirectIfNot' . ucfirst($name) . '.php',
				'stub' => __DIR__ . '/../stubs/Middleware/MiddlewareIfNotAutenticate.stub',
			],
			'redirect' => [
				'path' => '/app/Http/Middleware/' . ucfirst($name) . 'Redirect.php',
				'stub' => __DIR__ . '/../stubs/Middleware/MiddlewareAdmin.stub',
			],

			'login_controller' => [
				'path' => '/app/Http/Controllers/' . ucfirst($name) . 'Auth/' . 'LoginController.php',
				'stub' => __DIR__ . '/../stubs/Controllers/LoginController.stub',
			],
			'register_controller' => [
				'path' => '/app/Http/Controllers/' . ucfirst($name) . 'Auth/' . 'RegisterController.php',
				'stub' => __DIR__ . '/../stubs/Controllers/RegisterController.stub',
			],
			'forgot_password_controller' => [
				'path' => '/app/Http/Controllers/' . ucfirst($name) . 'Auth/' . 'ForgotPasswordController.php',
				'stub' => __DIR__ . '/../stubs/Controllers/ForgotPasswordController.stub',
			],
			'reset_password_controller' => [
				'path' => '/app/Http/Controllers/' . ucfirst($name) . 'Auth/' . 'ResetPasswordController.php',
				'stub' => __DIR__ . '/../stubs/Controllers/ResetPasswordController.stub',
			],
			'reset_password_notification' => [
				'path' => '/app/Notifications/' . ucfirst($name) . 'ResetPassword.php',
				'stub' => __DIR__ . '/../stubs/Notifications/ResetPassword.stub',
			],
		];
	}
}
