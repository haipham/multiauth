<?php

namespace Sonars\MultiAuth\Commands;

use Sonars\MultiAuth\Core\Commands\InstallFilesCommand;

class AuthModelInstallCommand extends InstallFilesCommand {
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'multiauth:model';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Install Authenticatable Model';

	/**
	 * Get the destination path.
	 *
	 * @return string
	 */
	public function getFiles() {
		$name = $this->getParsedNameInput();

		return [
			'model' => [
				'path' => '/app/' . ucfirst($name) . '.php',
				'stub' => __DIR__ . '/../stubs/Model/Model.stub',
			],
		];
	}
}
