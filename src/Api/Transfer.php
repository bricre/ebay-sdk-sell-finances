<?php

namespace Ebay\Sell\Finances\Api;

use Ebay\Sell\Finances\Model\Transfer as TransferModel;

class Transfer extends AbstractAPI
{
    /**
     * This method retrieves detailed information regarding a <code>TRANSFER</code>
     * transaction type. A <code>TRANSFER</code> is a  monetary transaction type that
     * involves a seller transferring money to eBay for reimbursement of one or more
     * charges. For example, when a seller reimburses eBay for a buyer
     * refund.<br><br>If an ID is passed into the URI that is an identifier for another
     * transaction type, this call will return an http status code of <code>404 Not
     * found</code>.
     *
     * @param string $transfer_Id the unique identifier of the <code>TRANSFER</code>
     *                            transaction type you wish to retrieve
     *
     * @return TransferModel
     */
    public function get(string $transfer_Id): TransferModel
    {
        return $this->request(
        'getTransfer',
        'GET',
        "transfer/$transfer_Id",
        null,
        [],
        []
        );
    }
}
