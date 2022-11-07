<?php


namespace Database;
use Dotenv\Dotenv;

class   Connection
{

    private array $vars;

    public function __construct() {
        $dotenv = Dotenv::createImmutable(getcwd());
        $this->vars = $dotenv->load();
    }
   public  function connect()
   {
        return $this->vars;
   }
}