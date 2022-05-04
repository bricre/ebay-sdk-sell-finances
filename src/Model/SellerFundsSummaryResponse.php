<?php

namespace Ebay\Sell\Finances\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type is used by the response payload of the
 * <strong>getSellerFundsSummary</strong> method. All of the funds returned in
 * <strong>getSellerFundsSummary</strong> are funds that have not yet been paid to
 * the seller through a seller payout. If there are no funds that are pending, on
 * hold, or being processed for the seller's account, no response payload is
 * returned, and an http status code of <code>204 - No Content</code> is returned
 * instead.
 */
class SellerFundsSummaryResponse extends AbstractModel
{
    /**
     * The dollar value in this field represents the total amount of order funds that
     * are available for a payout, but processing for a seller payout has not yet
     * begun. If a seller wants to get more details on sales transactions that have yet
     * to be processed, the seller can use the <strong>getTransactions</strong> method,
     * and use the <strong>transactionStatus</strong> filter with its value set to
     * <code>FUNDS_AVAILABLE_FOR_PAYOUT</code>.<br><br>This container is not returned
     * if there are no funds available to be processed for a payout.
     *
     * @var \Ebay\Sell\Finances\Model\Amount
     */
    public $availableFunds = null;

    /**
     * The dollar value in this field represents the total amount of order funds on
     * hold. Seller payment holds can occur for different reasons. If a seller wants to
     * get more details on sales transactions where funds are currently on hold, the
     * seller can use the <strong>getTransactions</strong> method, and use the
     * <strong>transactionStatus</strong> filter with its value set to
     * <code>FUNDS_ON_HOLD</code>.<br><br>This container is not returned if there are
     * no seller payment holds that will eventually be processed for a payout.
     *
     * @var \Ebay\Sell\Finances\Model\Amount
     */
    public $fundsOnHold = null;

    /**
     * The dollar value in this field represents the total amount of order funds being
     * prepared and processed for a seller payout. If a seller wants to get more
     * details on sales transactions that are being processed, the seller can use the
     * <strong>getTransactions</strong> method, and use the
     * <strong>transactionStatus</strong> filter with its value set to
     * <code>FUNDS_PROCESSING</code>.<br><br>This container is not returned if there
     * are no funds being processed for a payout.
     *
     * @var \Ebay\Sell\Finances\Model\Amount
     */
    public $processingFunds = null;

    /**
     * The dollar value in this field represents the total amount of order funds still
     * due to be distributed to the seller through a seller payout. The dollar value in
     * this field should equal the amounts found in the three other
     * containers.<br><br>If there are no pending funds due to the seller through a
     * payout, this container is not returned, and there will not be any response
     * payload at all. Instead, an http status code of <code>204 - No Content</code> is
     * returned.
     *
     * @var \Ebay\Sell\Finances\Model\Amount
     */
    public $totalFunds = null;
}
