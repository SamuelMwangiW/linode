<?php

use SamuelMwangiW\Linode\Linode;

it("gets the firewall list")
    ->only()
    ->expect(fn()=> Linode::firewall()->list())
    ->toBeCollection();
