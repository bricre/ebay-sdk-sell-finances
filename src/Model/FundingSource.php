<?php

namespace Ebay\Sell\Finances\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type provided details on the funding source for the transfer.
 */
class FundingSource extends AbstractModel
{
    /**
     * The brand name of the credit card or the name of the financial institution that
     * is the source of payment. This field may not be populated for other funding
     * sources.
     *
     * @var string
     */
    public $brand = null;

    /**
     * This field provides a note about the funding source. If the seller's credit card
     * or bank account is the funding source, this field might contain the last four
     * digits of the credit card or bank account. This field may also be returned as
     * null.
     *
     * @var string
     */
    public $memo = null;

    /**
     * The string value returned here indicates the funding source. Possible values
     * include the following:<ul><li><code>AVAILABLE_FUNDS</code>: transfer is funded
     * with seller payout funds</li><li><code>CREDIT_CARD</code>: transfer is funded
     * with seller's credit card</li><li><code>BANK</code>: transfer is funded with a
     * direct debit to seller's bank account on file with
     * eBay</li><li><code>PAY_UPON_INVOICE</code>: eBay will bill the seller for the
     * transfer on the monthly invoice</li></ul>.
     *
     * @var string
     */
    public $type = null;
}
