<?php

namespace Sonars\MultiAuth;

use Illuminate\Support\ServiceProvider;

class MultiAuthServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		$this->registerInstallCommand();
		$this->registerAuthSettingsInstallCommand();
		$this->registerAuthFilesInstallCommand();
		$this->registerAuthModelInstallCommand();
		$this->registerAuthViewsInstallCommand();
		//$this->registerInstallMiddlewareCommand();
	}

	/**
	 * Register the adminlte:install command.
	 */
	private function registerInstallCommand() {
		$this->app->singleton('command.sonars.multiauth.install', function ($app) {
			return $app['Sonars\MultiAuth\Commands\MultiAuthInstallCommand'];
		});

		$this->commands('command.sonars.multiauth.install');
	}

	/**
	 * Register the adminlte:install command.
	 */
	private function registerAuthSettingsInstallCommand() {
		$this->app->singleton('command.sonars.multiauth.settings', function ($app) {
			return $app['Sonars\MultiAuth\Commands\AuthSettingsInstallCommand'];
		});

		$this->commands('command.sonars.multiauth.settings');
	}

	/**
	 * Register the adminlte:install command.
	 */
	private function registerAuthFilesInstallCommand() {
		$this->app->singleton('command.sonars.multiauth.files', function ($app) {
			return $app['Sonars\MultiAuth\Commands\AuthFilesInstallCommand'];
		});

		$this->commands('command.sonars.multiauth.files');
	}

	/**
	 * Register the adminlte:install command.
	 */
	private function registerAuthModelInstallCommand() {
		$this->app->singleton('command.sonars.multiauth.model', function ($app) {
			return $app['Sonars\MultiAuth\Commands\AuthModelInstallCommand'];
		});

		$this->commands('command.sonars.multiauth.model');
	}

	/**
	 * Register the adminlte:install command.
	 */
	private function registerAuthViewsInstallCommand() {
		$this->app->singleton('command.sonars.multiauth.views', function ($app) {
			return $app['Sonars\MultiAuth\Commands\AuthViewsInstallCommand'];
		});

		$this->commands('command.sonars.multiauth.views');
	}

}
