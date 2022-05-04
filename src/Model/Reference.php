<?php

namespace Ebay\Sell\Finances\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This field is returned for NON_SALE_CHARGE transactions that contain
 * non-transactional seller fees.
 */
class Reference extends AbstractModel
{
    /**
     * The identifier of the transaction as specified by the
     * <strong>referenceType</strong>. For example, with a
     * <strong>referenceType</strong> of <strong>item_id</strong>, the
     * <strong>referenceId</strong> refers to a unique item. This item may have several
     * <code>NON_SALE_CHARGE</code> transactions.
     *
     * @var string
     */
    public $referenceId = null;

    /**
     * An enumeration value that identifies the reference type associated with the
     * <strong>referenceId</strong>. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/finances/types/pay:ReferenceTypeEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $referenceType = null;
}
