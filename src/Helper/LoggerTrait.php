<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 30/08/2018
 * Time: 15:19
 */

namespace App\Helper;


use Psr\Log\LoggerInterface;

trait LoggerTrait
{

    /**
     * @var LoggerInterface|null
     */

    private $logger;

    /**
     * @required
     */

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function LogInfo(string $message, array $context =[])
    {
        if($this->logger) {
            $this->logger->info($message, $context);
        }
    }


}