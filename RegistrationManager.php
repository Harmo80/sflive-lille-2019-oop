<?php

class UserController
{
	public function registerAction(RegistrationManager $manager) {
		// ...
		$manager->register($user);
		// ...
	}
}

class RegistrationManager
{
	private $db;
	private $mailer;
	private $influxdb;

	public function __construct($db, $mailer, $influxdb) {
		$this->db = $db;
		$this->mailer = $mailer;
		$this->influxdb = $influxdb;
	}

	public function register(User $user)
	{
		$this->pdo->query('INSERT INTO users ...');

		$mail = new Mail();
		$this->mailer->send($mail);

		$this->influxdb->sendUserStats(...);

		// => enregistrer DB
		// => envoyer de mail de confirmation
		// => ajouter user dans stats
	}
}

$manager = new RegistrationManager();