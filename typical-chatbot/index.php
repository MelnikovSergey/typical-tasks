<?php

class ChatBot 
{
	private $botName;

	public function __construct($name) {
		$this->botName = $name;
	}

	public function typicalGreeting() {
		return 'Hello, my name is ' . $this->botName;
	}

}

$bot = new ChatBot('A virtual beauty named Olga');
$bot->typicalGreeting();
