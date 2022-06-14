<?php

namespace Ebay\Sell\Finances\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type is used to express the details of one of the following monetary
 * transactions: a buyer's payment for an order, a refund to the buyer for a
 * returned item or cancelled order, or a credit issued by eBay to the seller's
 * account.
 */
class Transaction extends AbstractModel
{
    /**
     * This container shows the dollar value and currency type of the monetary
     * transaction. This field is always returned even when eBay has yet to initiate a
     * payout for the order.
     *
     * @var \Ebay\Sell\Finances\Model\Amount
     */
    public $amount = null;

    /**
     * The enumeration value returned in this field indicates if the monetary
     * transaction amount is a (<code>CREDIT</code>) or a (<code>DEBIT</code>) to the
     * seller's account. Typically, the <code>SALE</code> and <code>CREDIT</code>
     * transaction types are credits to the seller's account, and the
     * <code>REFUND</code>, <code>DISPUTE</code>, <code>SHIPPING_LABEL</code>, and
     * <code>TRANSFER</code> transaction types are debits to the seller's account. For
     * implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/finances/types/pay:BookingEntryEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $bookingEntry = null;

    /**
     * This is the unique eBay user ID for the buyer who purchased the order. This
     * field is not returned for <code>TRANSFER</code> monetary transaction types.
     *
     * @var \Ebay\Sell\Finances\Model\Buyer
     */
    public $buyer = null;

    /**
     * This container stores information about region-specific fees that are charged to
     * sellers.<br/><br/>This is returned for fees (i.e., <b>FeeTypeEnum</b> values,)
     * that are mandated by a seller's governing jurisdiction.<br/><br/>For
     * example:<ul><li><code>INCOME_TAX_WITHHOLDING</code></li><li><code>TAX_DEDUCTION_AT_SOURCE</code></li><li><code>VAT_WITHHOLDING</code></li></ul>.
     *
     * @var \Ebay\Sell\Finances\Model\FeeJurisdiction
     */
    public $feeJurisdiction = null;

    /**
     * The type of fee. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/finances/types/api:FeeTypeEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $feeType = null;

    /**
     * The unique identifier of the eBay order associated with the monetary
     * transaction.
     *
     * @var string
     */
    public $orderId = null;

    /**
     * This array shows the fees that are deducted from a seller payout for each line
     * item in an order.<br /><br /><span class="tablenote"><strong>Note:</strong> In
     * some cases, a transaction fee might be returned asynchronously from the
     * associated order. In such cases, you can determine the order to which the fee
     * applies by examining the referenceID value of the fee, which should match the ID
     * of the order.
     *
     * @var \Ebay\Sell\Finances\Model\OrderLineItem[]
     */
    public $orderLineItems = null;

    /**
     * This string value indicates the entity that is processing  the payment.
     *
     * @var string
     */
    public $paymentsEntity = null;

    /**
     * The unique identifier of the seller payout associated with the monetary
     * transaction. This identifier is generated once eBay begins processing the payout
     * for the corresponding order. This field will not be returned if eBay has not yet
     * begun processing the payout for an order.
     *
     * @var string
     */
    public $payoutId = null;

    /**
     * This field contains reference information for the transaction fee. This includes
     * an ID and the type of ID provided (such as item ID).
     *
     * @var \Ebay\Sell\Finances\Model\Reference[]
     */
    public $references = null;

    /**
     * The Sales Record Number associated with a sales order. Sales Record Numbers are
     * Selling Manager/Selling Manager Pro identifiers that are created at order
     * checkout.<br/><br/><span class="tablenote"><strong>Note:</strong> For all orders
     * originating after February 1, 2020, a value of <code>0</code> will be returned
     * in this field. The Sales Record Number field has also been removed from Seller
     * Hub. Instead of <strong>salesRecordReference</strong>, depend on
     * <strong>orderId</strong> instead as the identifier of the order. The
     * <strong>salesRecordReference</strong> field has been scheduled for deprecation,
     * and a date for when this field will no longer be returned at all will be
     * announced soon.</span>.
     *
     * @var string
     */
    public $salesRecordReference = null;

    /**
     * This amount is the total amount of selling fees paid for order. A breakdown of
     * fees for each order line item can be found in the <b>orderLineItems</b>
     * array.<br/><br/> This field is even returned if it is <code>0.0</code> (no fees
     * deducted from seller payout).
     *
     * @var \Ebay\Sell\Finances\Model\Amount
     */
    public $totalFeeAmount = null;

    /**
     * This amount is the total amount of the order before selling fees are deducted
     * from the seller payout associated with the order. To determine the actual amount
     * of the order that will be paid out through a seller payout, deduct the
     * <b>totalFeeAmount</b> from the <b>basePayoutAmount</b>.
     *
     * @var \Ebay\Sell\Finances\Model\Amount
     */
    public $totalFeeBasisAmount = null;

    /**
     * This timestamp indicates when the monetary transaction (order purchase, buyer
     * refund, seller credit) occurred. The following (UTC) format is used:
     * <code>YYYY-MM-DDTHH:MM:SS.SSSZ</code>. For example,
     * <code>2015-08-04T19:09:02.768Z</code>.
     *
     * @var string
     */
    public $transactionDate = null;

    /**
     * The unique identifier of the monetary transaction. A monetary transaction can be
     * a sales order, an order refund to the buyer, a credit to the seller's account, a
     * debit to the seller for the purchase of a shipping label, or a transaction where
     * eBay recouped money from the seller if the seller lost a buyer-initiated payment
     * dispute.
     *
     * @var string
     */
    public $transactionId = null;

    /**
     * This field provides more details on shipping label transactions and transactions
     * where the funds are being held by eBay. For shipping label transactions, the
     * <b>transactionMemo</b> gives details about a purchase, a refund, or a price
     * adjustment to the cost of the shipping label. For on-hold transactions, the
     * <b>transactionMemo</b> provides information on the reason for the hold or when
     * the hold will be released (e.g., "Funds on hold. Estimated release on Jun
     * 1").<br/><br/>This field is only returned if applicable/available.
     *
     * @var string
     */
    public $transactionMemo = null;

    /**
     * This enumeration value indicates the current status of the seller payout
     * associated with the monetary transaction. See the
     * <code>TransactionStatusEnum</code> type for more information on the different
     * states. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/finances/types/pay:TransactionStatusEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $transactionStatus = null;

    /**
     * This enumeration value indicates the type of monetary transaction. Examples of
     * monetary transactions include a buyer's payment for an order, a refund to the
     * buyer for a returned item or cancelled order, or a credit issued by eBay to the
     * seller's account. For a complete list of monetary transaction types within the
     * <strong>Finances API</strong>, see the <a
     * href="/api-docs/sell/finances/types/pay:TransactionTypeEnum">TransactionTypeEnum</a>
     * type. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/finances/types/pay:TransactionTypeEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $transactionType = null;
}
