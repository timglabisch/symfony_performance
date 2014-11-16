<?php

namespace Tg\Bundle\HelloProjectBundle\Checks;

use Tg\Bundle\HelloProjectBundle\CheckResult;

class PostgresCheck implements CheckInterface {

    const SERVICE_NAME = 'Postgres';

    protected $ip;

    protected $port;

    protected $user;

    protected $password;

    protected $database;

    public function __construct($ip, $port)
    {
        $this->ip = $ip;
        $this->port = $port;
    }

    /**
     * @return CheckResult
     */
    public function check()
    {
        $port = $this->port ? $this->port : '3306';

        try {
            $dbh = new \PDO('pgsql:host='.$this->ip.';port='.$port, 'postgres');
            $dbh->query('SELECT 1=1');
        } catch (\PDOException $e) {
           return CheckResult::fail(static::SERVICE_NAME, $e->getMessage());
        }

        return CheckResult::success(static::SERVICE_NAME);
    }

} 