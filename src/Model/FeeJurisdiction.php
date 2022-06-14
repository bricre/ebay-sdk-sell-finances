<?php

namespace Ebay\Sell\Finances\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This container returns jurisdiction information about region-specific fees that
 * are charged to sellers.
 */
class FeeJurisdiction extends AbstractModel
{
    /**
     * String value that indicates the name of the region to which a region-specific
     * fee applies.<br/><br/>The set of valid <b>regionName</b> values that may be
     * returned is determined by the <b>regionType</b> value.<br/><br/><span
     * class="tablenote"><strong>Note:</strong> Currently, supported <b>regionName</b>
     * values that may be returned are standard two-character country
     * codes.<br/><br/>Typical examples include:<ul><li><b>MX</b>
     * [Mexico]</li><li><b>IN</b> [India]</li><li><b>US</b> [United
     * States]</li></ul></span>.
     *
     * @var string
     */
    public $regionName = null;

    /**
     * The enumeration value returned here indicates the type of region that is
     * collecting the corresponding fee.<br/><span
     * class="tablenote"><strong>Note:</strong> Currently, the only supported
     * <b>regionType</b> is <code>COUNTRY</code>.</span> For implementation help, refer
     * to <a
     * href='https://developer.ebay.com/api-docs/sell/finances/types/pay:RegionTypeEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $regionType = null;
}
