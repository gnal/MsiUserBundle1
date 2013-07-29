<?php

namespace Msi\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MsiUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
