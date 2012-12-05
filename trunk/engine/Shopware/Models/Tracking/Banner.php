<?php
/**
 * Shopware 4.0
 * Copyright © 2012 shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 *
 * @category   Shopware
 * @package    Shopware_Models
 * @subpackage Tracking
 * @copyright  Copyright (c) 2012, shopware AG (http://www.shopware.de)
 * @version    $Id$
 * @author     $Author$
 */

namespace   Shopware\Models\Tracking;
use         Shopware\Components\Model\ModelEntity,
            Doctrine\ORM\Mapping AS ORM;

/**
 * Banner Statistics
 * <br>
 * This Model represents the database table s_emarketing_banners_statistics. This is used to track
 * every shown banner and every click on that banner. The clicks and views will be accumulated on a daily basis.
 *
 * Relations and Associations
 * Has no known Associations
 *
 * Indices for s_emarketing_banners_statistcs:
 * <code>
 *   - PRIMARY KEY (`id`)
 *   - UNIQUE (`displayDate`, `bannerID`)
 *   - INDEX (bannerID)
 * </code>
 *
 * @ORM\Table(name="s_emarketing_banners_statistics")
 * @ORM\Entity(repositoryClass="Repository")
 * @ORM\HasLifecycleCallbacks
 */
class Banner extends ModelEntity
{
    /**
     * Autoincrement Identifier
     *
     * @var integer $id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Date when the banner has been shown or has been clicked.
     * Part one of the composite primary key
     *
     * @var \DateTime $displayDate
     *
     * @ORM\Column(name="display_date", type="date", nullable=false)
     */
    private $displayDate;

    /**
     * ID of the banner which should be tracked
     *
     * @var integer $bannerId
     *
     * @ORM\Column(name="bannerID", type="integer", nullable=true)
     */
    private $bannerId;

    /**
     * Accumulated number of clicks
     *
     * @var integer $clicks
     *
     * @ORM\Column(name="clicks", type="integer", nullable=true)
     */
    private $clicks;

    /**
     * Accumulated number of views
     *
     * @var integer $views
     *
     * @ORM\Column(name="views", type="integer", nullable=true)
     */
    private $views;

    /**
     * Constructor
     *
     * @param $bannerId
     * @param $date
     */
    public function __construct($bannerId, $date=null)
    {
        if (is_null($date)) {
            $date = new \DateTime();
        }
        $this->setDisplayDate($date);
        $this->setBannerId($bannerId);
    }

    /**
     * Returns the date
     *
     * @return \DateTime
     */
    public function getDisplayDate()
    {
        return $this->displayDate;
    }

    /**
     * Set the Date on when the event happened
     *
     * @param \DateTime $displayDate
     * @return \Shopware\Models\Banner\Banner
     */
    public function setDisplayDate($displayDate)
    {
        $this->displayDate = $displayDate;
        return $this;
    }

    /**
     * Returns the ID of the banner which should be tracked.
     *
     * @return int
     */
    public function getBannerId()
    {
        return $this->bannerId;
    }

    /**
     * Set the banner ID which should be tracked.
     *
     * @param int $bannerId
     * @return \Shopware\Models\Banner\Banner
     */
    public function setBannerId($bannerId)
    {
        $this->bannerId = $bannerId;
        return $this;
    }

    /**
     * Returns the amount of clicks on a particular banner.
     *
     * @return int
     */
    public function getClicks()
    {
        return $this->clicks;
    }

    /**
     * Sets the numbers of clicks this banner received
     *
     * @param int $clicks
     * @return \Shopware\Models\Banner\Banner
     */
    public function setClicks($clicks)
    {
        $this->clicks = $clicks;
        return $this;
    }

    /**
     * Return the number of times a banner has been shown
     *
     * @return int
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Sets the number of times the banner has been displayed.
     *
     * @param int $views
     * @return \Shopware\Models\Banner\Banner
     */
    public function setViews($views)
    {
        $this->views = $views;
        return $this;
    }

    /**
     * Increases the number of times the banner has been displayed by one.
     *
     * @internal param int $views
     * @return \Shopware\Models\Banner\Banner
     */
    public function increaseViews()
    {
        $this->views++;
        return $this;
    }
    /**
     * Increases the number of times the banner has been clicked by one.
     *
     * @internal param int $views
     * @return \Shopware\Models\Banner\Banner
     */
    public function increaseClicks()
    {
        $this->clicks++;
        return $this;
    }

    /**
     * Returns the unique ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}