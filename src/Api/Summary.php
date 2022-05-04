<?php

namespace Ebay\Sell\Finances\Api;

use Ebay\Sell\Finances\Model\SellerFundsSummaryResponse;

class Summary extends AbstractAPI
{
    /**
     * This method retrieves all pending funds that have not yet been distibuted
     * through a seller payout.<br><br>There are no input parameters for this method.
     * The response payload includes available funds, funds being processed, funds on
     * hold, and also an aggregate count of all three of these categories.<br><br>If
     * there are no funds that are pending, on hold, or being processed for the
     * seller's account, no response payload is returned, and an http status code of
     * <code>204 - No Content</code> is returned instead.
     *
     * @return SellerFundsSummaryResponse
     */
    public function get(): SellerFundsSummaryResponse
    {
        return $this->request(
        'getSellerFundsSummary',
        'GET',
        'seller_funds_summary',
        null,
        [],
        []
        );
    }
}
