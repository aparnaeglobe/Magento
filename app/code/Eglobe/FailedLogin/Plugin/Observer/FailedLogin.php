<?php 
namespace Eglobe\FailedLogin\Plugin\Observer;
use Magento\Customer\Controller\Account\LoginPost;
use Magento\Customer\Model\Account\Redirect as AccountRedirect;
use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\Session;
use Magento\Customer\Api\AccountManagementInterface;
use Magento\Customer\Model\Url as CustomerUrl;
use Eglobe\FailedLogin\Logger\Logger;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;
use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Exception\EmailNotConfirmedException;
use Magento\Framework\Exception\AuthenticationException;
use Magento\Framework\Data\Form\FormKey\Validator;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\State\UserLockedException;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Customer\Controller\AbstractAccount;
use Magento\Framework\Phrase;

//use Magento\Framework\Controller\ResultFactory;

class FailedLogin 
{
private $logger;
private $remoteAddress;
private $resultRedirect;
private $customerSession;

public function __construct(
Logger $logger,
RemoteAddress $remoteAddress,
\Magento\Framework\App\RequestInterface $request,
Session $customerSession
) {
$this->request = $request;
$this->logger = $logger;
$this->remoteAddress = $remoteAddress;
$this->customerSession = $customerSession;
}
    public function aroundExecute(\Magento\Customer\Controller\Account\LoginPost $subject, callable $proceed)
    {
        $result = $proceed();
        if($result) {
            if($this->customerSession->authenticate()){
                $status="Success";

            }else{
                $status="Failed";
            }
            $ip = $this->remoteAddress->getRemoteAddress();
            $postData = $this->request->getPost();
            $email = $postData['login']['username'];
            $this->logger->info("IP Address : ".$ip.", Email Address: ".$email.", Status: ".$status); 
        }
        return $result;
    }
}