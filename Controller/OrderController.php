<?php

namespace Retract\Controller;

use Retract\Retract;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\Exception\PropelException;
use Symfony\Component\HttpFoundation\Response as BaseResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Thelia\Controller\Front\BaseFrontController;
use Thelia\Core\Event\Delivery\DeliveryPostageEvent;
use Thelia\Core\Event\Order\OrderEvent;
use Thelia\Core\Event\Product\VirtualProductOrderDownloadResponseEvent;
use Thelia\Core\Event\TheliaEvents;
use Thelia\Core\HttpFoundation\Request;
use Thelia\Exception\TheliaProcessException;
use Thelia\Form\Definition\FrontForm;
use Thelia\Form\Exception\FormValidationException;
use Thelia\Log\Tlog;
use Thelia\Model\Address;
use Thelia\Model\AddressQuery;
use Thelia\Model\AreaDeliveryModuleQuery;
use Thelia\Model\ConfigQuery;
use Thelia\Model\ModuleQuery;
use Thelia\Model\Order;
use Thelia\Model\OrderProductQuery;
use Thelia\Model\OrderQuery;
use Thelia\Module\AbstractDeliveryModule;
use Thelia\Module\Exception\DeliveryException;

/**
 * Class OrderController
 * @package Thelia\Controller\Retract
 */
class OrderController extends BaseFrontController
{
   
    private function checkOrderCustomer($order_id)
    {
        $this->checkAuth();

        $order = OrderQuery::create()->findPk($order_id);
        $valid = true;
        if ($order) {
            $customerOrder = $order->getCustomer();
            $customer = $this->getSecurityContext()->getCustomerUser();

            if ($customerOrder->getId() != $customer->getId()) {
                $valid = false;
            }
        } else {
            $valid = false;
        }

        if (false === $valid) {
            throw new AccessDeniedHttpException();
        }
    }
    public function generateReturnPdf($order_id)
    {
        $this->checkOrderCustomer($order_id);

        return $this->generateOrderPdf($order_id, ConfigQuery::read('pdf_return_file', 'return'));
    }

   
}
