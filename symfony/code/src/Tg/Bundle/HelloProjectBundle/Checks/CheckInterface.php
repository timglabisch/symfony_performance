<?php

namespace Tg\Bundle\HelloProjectBundle\Checks;

use Tg\Bundle\HelloProjectBundle\CheckResult;

interface CheckInterface {

    /**
     * @return CheckResult
     */
    public function check();

} 