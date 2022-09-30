<?php
 
declare(strict_types=1);
 
namespace Eglobe\OutofstockCronjob\Cron;
use Psr\Log\LoggerInterface;
 
class OutofstockProducts
{
 
     protected $logger;
 
     public function __construct(LoggerInterface $logger)
     {
            $this->logger = $logger;
     }
 
     /**
      * Execute the cron
      *
      * @return void
      */
      public function execute()
      {
          
        $this->logger->info("Cronjob test is executed");

      }
}