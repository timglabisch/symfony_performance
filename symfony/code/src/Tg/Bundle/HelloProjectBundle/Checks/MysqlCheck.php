<?php

namespace Tg\Bundle\HelloProjectBundle\Checks;

use Tg\Bundle\HelloProjectBundle\CheckResult;

class MysqlCheck implements CheckInterface {

    const SERVICE_NAME = 'MySql';

    protected $ip;

    protected $port;

    protected $user;

    protected $password;

    protected $database;

    public function __construct($ip, $port, $user, $password, $database)
    {
        $this->ip = $ip;
        $this->port = $port;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    /**
     * @return CheckResult
     */
    public function check()
    {
        $port = $this->port ? $this->port : '3306';
        $password = $this->password ? $this->password : '';

        try {
            $dbh = new \PDO('mysql:host='.$this->ip.';port='.$port.';dbname='.$this->database, $this->user, $password);
            $dbh->query('SELECT 1=1');
        } catch (\PDOException $e) {
           return CheckResult::fail(static::SERVICE_NAME, $e->getMessage());
        }

        return CheckResult::success(static::SERVICE_NAME);
    }

} 