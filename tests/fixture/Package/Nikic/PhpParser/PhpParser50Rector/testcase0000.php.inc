<?php

declare(strict_types=1);

namespace Vendor\Package;

use PhpParser\Node\Expr\ArrayItem;

class UseArrayItem
{
    public function arrayItem(ArrayItem $arrayItem)
    {
    }
}

?>
-----
<?php

declare(strict_types=1);

namespace Vendor\Package;

use PhpParser\Node\Expr\ArrayItem;

class UseArrayItem
{
    public function arrayItem(\PhpParser\Node\ArrayItem $arrayItem)
    {
    }
}

?>
