<?php

declare(strict_types=1);

namespace TYPO3\CMS\Extbase\Mvc\Controller;

use TYPO3\CMS\Extbase\Mvc\Request;

abstract class AbstractController
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * AbstractController constructor.
     */
    public function __construct()
    {
        $this->request = new Request();
    }
}
