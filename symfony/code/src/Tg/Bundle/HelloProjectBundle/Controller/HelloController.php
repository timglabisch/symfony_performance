<?php

namespace Tg\Bundle\HelloProjectBundle\Controller;

use Tg\Bundle\HelloProjectBundle\Checks\RedisCheck;
use Tg\Bundle\HelloProjectBundle\CheckResult;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/", service="tg.hello_project_bundle.controller.hello")
 */
class HelloController
{

    /**
     * @var RedisCheck[]
     */
    protected $checks;

    public function __construct($checks)
    {
        $this->checks = $checks;
    }

    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction() {

        /** @var $results CheckResult */
        $results = [];

        foreach ($this->checks as $check) {
            $results[] = $check->check();
        }

        return [
            'checkResults' => $results
        ];
    }

} 