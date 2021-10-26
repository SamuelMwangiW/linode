<?php

use SamuelMwangiW\Linode\Linode;

it("gets the firewall list")
    ->expect(fn () => Linode::firewall()->list())
    ->toBeCollection();
