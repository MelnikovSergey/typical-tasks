<?php

class ChatBot 
{
	private $botName;
	private $botProf;
	private $message;

	public function __construct($name, $prof) {
		$this->botName = $name;
		$this->botProf = $prof;
	}

	public function typicalGreeting() {
		return 'Hello, my name is ' . $this->botName . ' and my prof is ' . $this->botProf . '.';
	}

	public function questionToTheBot($message) {
		return 'You asked: ' . '"' . $message . '"';
	}

}

$bot = new ChatBot('A virtual beauty named Olga', 'funny dialog chat bot');
$bot->typicalGreeting();
$bot->questionToTheBot('Как дела?');