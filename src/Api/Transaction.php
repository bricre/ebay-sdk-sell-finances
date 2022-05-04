<?php

namespace Ebay\Sell\Finances\Api;

use Ebay\Sell\Finances\Model\Transactions;
use Ebay\Sell\Finances\Model\TransactionSummaryResponse;

class Transaction extends AbstractAPI
{
    /**
     * This method allows a seller to retrieve one or monetary transactions. In this
     * case, 'monetary transactions' include sales orders, buyer refunds, seller
     * credits, buyer-initiated payment disputes, eBay shipping label purchases, and
     * transfers. There are numerous input filters available for use, including filters
     * to retrieve specific types of monetary transactions, to retrieve monetary
     * transactions processed within a specific date range, or to retrieve monetary
     * transactions in a specific state. See the <b>filter</b> field for more
     * information on each filter, and how each one is used. <br/><br/>There are also
     * pagination and sort query parameters that allow users to further control the
     * monetary transactions that are returned in the response.<br/><br/>If no monetary
     * transactions match the input criteria, an http status code of <em>204 No
     * Content</em> is returned with no response payload.
     *
     * @param array $queries options:
     *                       'filter'	string	Numerous filters are available for the
     *                       <strong>getTransactions</strong> method, and these filters are discussed below.
     *                       One or more of these filter types can be used. If none of these filters are
     *                       used, all monetary transactions from the last 90 days are
     *                       returned:<ul><li><b>transactionDate</b>: search for monetary transactions that
     *                       occurred within a specific range of dates.<br /><br /><span
     *                       class="tablenote"><strong>Note:</strong> All dates must be input using UTC
     *                       format (<code>YYYY-MM-DDTHH:MM:SS.SSSZ</code>) and should be adjusted
     *                       accordingly for the local timezone of the user.</span><br /><br />Below is the
     *                       proper syntax to use if filtering by a date range:
     *                       <br/><br/><code>https://apiz.ebay.com/sell/finances/v1/transaction?filter=transactionDate:[2018-10-23T00:00:01.000Z..2018-11-09T00:00:01.000Z]</code><br/><br/>Alternatively,
     *                       the user could omit the ending date, and the date range would include the
     *                       starting date and up to 90 days past that date, or the current date if the
     *                       starting date is less than 90 days in the past.</li>
     *                       <li><b>transactionType</b>: search for a specific type of monetary transaction.
     *                       The supported <b>transactionType</b> values are as
     *                       follows:<ul><li><code>SALE</code>: a sales order.</li><li> <code>REFUND</code>:
     *                       a refund to the buyer after an order cancellation or
     *                       return.</li><li><code>CREDIT</code>: a credit issued by eBay to the seller's
     *                       account.</li><li><code>DISPUTE</code>: a monetary transaction associated with a
     *                       payment dispute between buyer and seller.</li><li><code>NON_SALE_CHARGE</code>:
     *                       a monetary transaction involving a seller transferring money to eBay for the
     *                       balance of a charge for NON_SALE_CHARGE transactions (transactions that contain
     *                       non-transactional seller fees). These can include a one-time payment,
     *                       monthly/yearly subscription fees charged monthly, NRC charges, and fee
     *                       credits.</li><li><code>SHIPPING_LABEL</code>: a monetary transaction where eBay
     *                       is billing the seller for an eBay shipping label. Note that the shipping label
     *                       functionality will initially only be available to a select number of
     *                       sellers.</li><li><code>TRANSFER</code>: A transfer is a monetary transaction
     *                       where eBay is billing the seller for reimbursement of a charge. An example of a
     *                       transfer is a seller reimbursing eBay for a buyer
     *                       refund.</li><li><code>ADJUSTMENT</code>: An adjustment is a monetary transaction
     *                       where eBay is crediting or debiting the seller's
     *                       account.</li><li><code>WITHDRAWAL</code>: A withdrawal is a monetary transaction
     *                       where the seller requests an on-demand payout from eBay.</li></ul>Below is the
     *                       proper syntax to use if filtering by a monetary transaction type:
     *                       <br/><br/><code>https://apiz.ebay.com/sell/finances/v1/transaction?filter=transactionType:{SALE}</code></li><li><b>transactionStatus</b>:
     *                       this filter type is only applicable for sales orders, and allows the user to
     *                       filter seller payouts in a particular state.  The supported
     *                       <b>transactionStatus</b> values are as follows:<ul><li><code>PAYOUT</code>: this
     *                       indicates that the proceeds from the corresponding sales order has been paid out
     *                       to the seller's account.</li><li><code>FUNDS_PROCESSING</code>: this indicates
     *                       that the funds for the corresponding monetary transaction are currently being
     *                       processed.</li><li><code>FUNDS_AVAILABLE_FOR_PAYOUT</code>: this indicates that
     *                       the proceeds from the corresponding sales order are available for a seller
     *                       payout, but processing has not yet begun.</li><li><code>FUNDS_ON_HOLD</code>:
     *                       this indicates that the proceeds from the corresponding sales order are
     *                       currently being held by eBay, and are not yet available for a seller
     *                       payout.</li><li><code>COMPLETED</code>: this indicates that the funds for the
     *                       corresponding <code>TRANSFER</code> monetary transaction have transferred and
     *                       the transaction has completed.</li><li><code>FAILED</code>: this indicates the
     *                       process has failed for the corresponding <code>TRANSFER</code> monetary
     *                       transaction. </li></ul>Below is the proper syntax to use if filtering by
     *                       transaction status:
     *                       <br/><br/><code>https://apiz.ebay.com/sell/finances/v1/transaction?filter=transactionStatus:{PAYOUT}</code></li><li><b>buyerUsername</b>:
     *                       the eBay user ID of the buyer involved in the monetary transaction. Only
     *                       monetary transactions involving this buyer are returned. Below is the proper
     *                       syntax to use if filtering by a specific eBay buyer:
     *                       <br/><br/><code>https://apiz.ebay.com/sell/finances/v1/transaction?filter=buyerUsername:{buyer1234}</code>
     *                       </li><li><b>salesRecordReference</b>: the unique Selling Manager identifier of
     *                       the order involved in the monetary transaction. Only monetary transactions
     *                       involving this Selling Manager Sales Record ID are returned. Below is the proper
     *                       syntax to use if filtering by a specific Selling Manager Sales Record ID:
     *                       <br/><br/><code>https://apiz.ebay.com/sell/finances/v1/transaction?filter=salesRecordReference:{123}</code><br/><br/><span
     *                       class="tablenote"><strong>Note:</strong> For all orders originating after
     *                       February 1, 2020, a value of <code>0</code> will be returned in the
     *                       <b>salesRecordReference</b> field. So, this filter will only be useful to
     *                       retrieve orders than occurred before this date. </span></li><li><b>payoutId</b>:
     *                       the unique identifier of a seller payout. This value is auto-generated by eBay
     *                       once the seller payout is set to be processed. Only monetary transactions
     *                       involving this Payout ID are returned. Below is the proper syntax to use if
     *                       filtering by a specific Payout ID:
     *                       <br/><br/><code>https://apiz.ebay.com/sell/finances/v1/transaction?filter=payoutId:{5********8}</code>
     *                       </li><li><b>transactionId</b>: the unique identifier of a monetary transaction.
     *                       For a sales order, the <b>orderId</b> filter should be used instead. Only the
     *                       monetary transaction defined by the identifier is returned.<br /><br /><span
     *                       class="tablenote"><strong>Note:</strong> This filter cannot be used alone; the
     *                       <b>transactionType</b> must also be specified when filtering by transaction
     *                       ID.</span><br /><br />Below is the proper syntax to use if filtering by a
     *                       specific transaction ID:
     *                       <br/><br/><code>https://apiz.ebay.com/sell/finances/v1/transaction?filter=transactionId:{0*-0***0-3***3}&filter=transactionType:{SALE}</code>
     *                       </li><li><b>orderId</b>: the unique identifier of a sales order. For any other
     *                       monetary transaction, the <b>transactionId</b> filter should be used instead.
     *                       Only the sales order defined by the identifier is returned. Below is the proper
     *                       syntax to use if filtering by a specific order ID:
     *                       <br/><br/><code>https://apiz.ebay.com/sell/finances/v1/transaction?filter=orderId:{0*-0***0-3***3}</code>
     *                       </li></ul> For implementation help, refer to eBay API documentation at
     *                       https://developer.ebay.com/api-docs/sell/finances/types/cos:FilterField
     *                       'limit'	string	The number of monetary transactions to return per page of the
     *                       result set. Use this parameter in conjunction with the <b>offset</b> parameter
     *                       to control the pagination of the output. <br /><br /> For example, if
     *                       <b>offset</b> is set to <code>10</code> and <b>limit</b> is set to
     *                       <code>10</code>, the method retrieves monetary transactions 11 thru 20 from the
     *                       result set. <br /><br /> <span class="tablenote"><strong>Note:</strong> This
     *                       feature employs a zero-based list, where the first item in the list has an
     *                       offset of <code>0</code>. If an <b>orderId</b>, <b>transactionId</b>, or
     *                       <b>payoutId</b> filter is included in the request, any <b>limit</b> value will
     *                       be ignored.</span> <br /><br /> <b>Maximum:</b><code> 1000</code> <br />
     *                       <b>Default:</b><code> 20</code>
     *                       'offset'	string	This integer value indicates the actual position that the first
     *                       monetary transaction returned on the current page has in the results set. So, if
     *                       you wanted to view the 11th monetary transaction of the result set, you would
     *                       set the <strong>offset</strong> value in the request to <code>10</code>.
     *                       <br><br>In the request, you can use the <b>offset</b> parameter in conjunction
     *                       with the <b>limit</b> parameter to control the pagination of the output. For
     *                       example, if <b>offset</b> is set to <code>30</code> and <b>limit</b> is set to
     *                       <code>10</code>, the method retrieves transactions 31 thru 40 from the resulting
     *                       collection of transactions. <br /><br /> <span
     *                       class="tablenote"><strong>Note:</strong> This feature employs a zero-based list,
     *                       where the first item in the list has an offset of
     *                       <code>0</code>.</span><br/><b>Default:</b> <code>0</code> (zero)
     *                       'sort'	string	Sorting is not yet available for the <b>getTransactions</b>
     *                       method. By default, monetary transactions that match the input criteria are
     *                       sorted in descending order according to the transaction date. For implementation
     *                       help, refer to eBay API documentation at
     *                       https://developer.ebay.com/api-docs/sell/finances/types/cos:SortField
     *
     * @return Transactions
     */
    public function gets(array $queries = []): Transactions
    {
        return $this->request(
        'getTransactions',
        'GET',
        'transaction',
        null,
        $queries,
        []
        );
    }

    /**
     * This method is used to retrieve cumulative values for five types of monetary
     * transactions (order sales, seller credits, buyer refunds, buyer-initiated
     * payment disputes, eBay shipping label purchases, and transfers). If applicable,
     * the number of payment holds and the amount of the holds are also returned.
     * <br/><br/>See the description for the <b>filter</b> query parameter for more
     * information on the available filters.<br/><br/><span
     * class="tablenote"><strong>Note:</strong> Unless the <b>transactionType</b>
     * filter is used to retrieve a specific type of monetary transaction (such as
     * sale, buyer refund, seller credit, payment dispute, shipping label, transfer,
     * etc.), the <b>creditCount</b> and <b>creditAmount</b> response fields account
     * for both order sales and seller credits (the count and value is not
     * distinguished between the two monetary transaction types).</span>.
     *
     * @param array $queries options:
     *                       'filter'	string	Numerous filters are available for the
     *                       <strong>getTransactionSummary</strong> method, and these filters are discussed
     *                       below. One or more of these filter types can be used. The
     *                       <b>transactionStatus</b> filter must be used. All other filters are optional.
     *                       <ul><li><b>transactionStatus</b>: the data returned in the response pertains to
     *                       the sales, payouts, and transfer status set. The supported
     *                       <b>transactionStatus</b> values are as follows:<ul><li><code>PAYOUT</code>: only
     *                       consider monetary transactions where the proceeds from the sales order(s) have
     *                       been paid out to the seller's bank
     *                       account.</li><li><code>FUNDS_PROCESSING</code>: only consider monetary
     *                       transactions where the proceeds from the sales order(s) are currently being
     *                       processed.</li><li><code>FUNDS_AVAILABLE_FOR_PAYOUT</code>: only consider
     *                       monetary transactions where the proceeds from the sales order(s) are available
     *                       for a seller payout, but processing has not yet
     *                       begun.</li><li><code>FUNDS_ON_HOLD</code>: only consider monetary transactions
     *                       where the proceeds from the sales order(s) are currently being held by eBay, and
     *                       are not yet available for a seller payout.</li><li><code>COMPLETED</code>: this
     *                       indicates that the funds for the corresponding <code>TRANSFER</code> monetary
     *                       transaction have transferred and the transaction has
     *                       completed.</li><li><code>FAILED</code>: this indicates the process has failed
     *                       for the corresponding <code>TRANSFER</code> monetary transaction.
     *                       </li></ul>Below is the proper syntax to use when setting up the
     *                       <b>transactionStatus</b> filter:
     *                       <br/><br/><code>https://apiz.ebay.com/sell/finances/v1/transaction_summary?filter=transactionStatus:&#123;PAYOUT&#125;</code></li><li><b>transactionDate</b>:
     *                       only consider monetary transactions that occurred within a specific range of
     *                       dates.<br /><br /><span class="tablenote"><strong>Note:</strong> All dates must
     *                       be input using UTC format (<code>YYYY-MM-DDTHH:MM:SS.SSSZ</code>) and should be
     *                       adjusted accordingly for the local timezone of the user.</span><br /><br />Below
     *                       is the proper syntax to use if filtering by a date range:
     *                       <br/><br/><code>https://apiz.ebay.com/sell/finances/v1/transaction_summary?filter=transactionDate:&#91;2018-10-23T00:00:01.000Z..2018-11-09T00:00:01.000Z&#93;</code><br/><br/>Alternatively,
     *                       the user could omit the ending date, and the date range would include the
     *                       starting date and up to 90 days past that date, or the current date if the
     *                       starting date is less than 90 days in the past.</li>
     *                       <li><b>transactionType</b>: only consider a specific type of monetary
     *                       transaction. The supported <b>transactionType</b> values are as
     *                       follows:<ul><li><code>SALE</code>: a sales order.</li><li> <code>REFUND</code>:
     *                       a refund to the buyer after an order cancellation or
     *                       return.</li><li><code>CREDIT</code>: a credit issued by eBay to the seller's
     *                       account.</li><li><code>DISPUTE</code>: a monetary transaction associated with a
     *                       payment dispute between buyer and seller.</li><li><code>NON_SALE_CHARGE</code>:
     *                       a monetary transaction involving a seller transferring money to eBay for the
     *                       balance of a charge for NON_SALE_CHARGE transactions (transactions that contain
     *                       non-transactional seller fees). These can include a one-time payment,
     *                       monthly/yearly subscription fees charged monthly, NRC charges, and fee
     *                       credits.</li><li><code>SHIPPING_LABEL</code>: a monetary transaction where eBay
     *                       is billing the seller for an eBay shipping label. Note that the shipping label
     *                       functionality will initially only be available to a select number of
     *                       sellers.</li><li><code>TRANSFER</code>: A transfer is a monetary transaction
     *                       where eBay is billing the seller for reimbursement of a charge. An example of a
     *                       transfer is a seller reimbursing eBay for a buyer
     *                       refund.</li><li><code>ADJUSTMENT</code>: An adjustment is a monetary transaction
     *                       where eBay is crediting or debiting the seller's
     *                       account.</li><li><code>WITHDRAWAL</code>: A withdrawal is a monetary transaction
     *                       where the seller requests an on-demand payout from eBay.</li></ul>Below is the
     *                       proper syntax to use if filtering by a monetary transaction type:
     *                       <br/><br/><code>https://apiz.ebay.com/sell/finances/v1/transaction_summary?filter=transactionType:{SALE}</code></li><li><b>buyerUsername</b>:
     *                       only consider monetary transactions involving a specific buyer (specified with
     *                       the buyer's eBay user ID). Below is the proper syntax to use if filtering by a
     *                       specific eBay buyer:
     *                       <br/><br/><code>https://apiz.ebay.com/sell/finances/v1/transaction_summary?filter=buyerUsername:&#123;buyer1234&#125;</code>
     *                       </li><li><b>salesRecordReference</b>: only consider monetary transactions
     *                       corresponding to a specific order (identified with a Selling Manager order
     *                       identifier). Below is the proper syntax to use if filtering by a specific
     *                       Selling Manager Sales Record ID:
     *                       <br/><br/><code>https://apiz.ebay.com/sell/finances/v1/transaction_summary?filter=salesRecordReference:&#123;123&#125;</code><br/><br/><span
     *                       class="tablenote"><strong>Note:</strong> For all orders originating after
     *                       February 1, 2020, a value of <code>0</code> will be returned in the
     *                       <b>salesRecordReference</b> field. So, this filter will only be useful to
     *                       retrieve orders than occurred before this date.</span> </li><li><b>payoutId</b>:
     *                       only consider monetary transactions related to a specific seller payout
     *                       (identified with a Payout ID). This value is auto-generated by eBay once the
     *                       seller payout is set to be processed. Below is the proper syntax to use if
     *                       filtering by a specific Payout ID:
     *                       <br/><br/><code>https://apiz.ebay.com/sell/finances/v1/transaction_summary?filter=payoutId:&#123;5********8&#125;</code>
     *                       </li><li><b>transactionId</b>: the unique identifier of a monetary transaction.
     *                       For a sales order, the <b>orderId</b> filter should be used instead. Only the
     *                       monetary transaction(s) associated with this <b>transactionId</b> value are
     *                       returned.<br /><br /><span class="tablenote"><strong>Note:</strong> This filter
     *                       cannot be used alone; the <b>transactionType</b> must also be specified when
     *                       filtering by transaction ID.</span><br /><br />Below is the proper syntax to use
     *                       if filtering by a specific transaction ID:
     *                       <br/><br/><code>https://apiz.ebay.com/sell/finances/v1/transaction_summary?filter=transactionId:{0*-0***0-3***3}&filter=transactionType:{SALE}</code>
     *                       </li><li><b>orderId</b>: the unique identifier of a sales order. For any other
     *                       monetary transaction, the <b>transactionId</b> filter should be used instead.
     *                       Only the monetary transaction(s) associated with this <b>orderId</b> value are
     *                       returned. Below is the proper syntax to use if filtering by a specific order ID:
     *                       <br/><br/><code>https://apiz.ebay.com/sell/finances/v1/transaction_summary?filter=orderId:{0*-0***0-3***3}</code>
     *                       </li></ul> For implementation help, refer to eBay API documentation at
     *                       https://developer.ebay.com/api-docs/sell/finances/types/cos:FilterField
     *
     * @return TransactionSummaryResponse
     */
    public function getSummary(array $queries = []): TransactionSummaryResponse
    {
        return $this->request(
        'getTransactionSummary',
        'GET',
        'transaction_summary',
        null,
        $queries,
        []
        );
    }
}
