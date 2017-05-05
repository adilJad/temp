<?php
/**
 * @Author: jad
 * @Date:   2017-05-03 18:57:50
 * @Last Modified by:   jad
 * @Last Modified time: 2017-05-03 18:58:07
 */

namespace Acme\ApiBundle\Entity;

use FOS\OAuthServerBundle\Entity\Client as BaseClient;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table("oauth2_clients")
 * @ORM\Entity
 */
class Client extends BaseClient
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }
}

?>