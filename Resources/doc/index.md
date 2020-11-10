# Status Bundle

## Minimal Configuration

```yaml
# config/routes.yaml
status:
  resource: "@StatusBundle/Resources/config/routing.yaml"
  prefix:   /status
```
```yaml
# config/package/status.yaml
status:
  services:
    - 'status.status.ok_status'
```

## Create custom Status
1) Create a service
```yaml
# config/service.yaml
your.service.id:
  class: Name\Space\CustomStatus;
  arguments:
    # ...
```

2) Create your custom class
```php
<?php

namespace Name\Space;

use StatusBundle\Model\AbstractStatus;

class CustomStatus extends AbstractStatus
{
    public function __construct()
    {
        parent::__construct('status_name');
    }

    public function getStatus(): bool
    {
        /*
         * do your logic
         */
        return true;
    }
}
```

3) Set your class to status config
```yaml
# config/packages/status.yaml
status:
  services:
    - 'your.service.id'
```

## Available status
- ``status.status.ko_status`` service status failed always 
- ``status.status.ok_status`` service status succeed always
- ``status.status.doctrine_status``: doctrine status
 