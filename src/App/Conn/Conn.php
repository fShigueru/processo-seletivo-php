<?php

namespace App\Conn;

class Conn implements IConn
{

    private $dsn;
    private $user;
    private $pass;

    /**
     * Conn constructor.
     * @param $dsn
     * @param $user
     * @param $pass
     */
    public function __construct($dsn, $user, $pass)
    {
        $this->dsn = $dsn;
        $this->user = $user;
        $this->pass = $pass;
    }

    public function connect()
    {
        return new \PDO($this->dsn,$this->user,$this->pass);
    }
}