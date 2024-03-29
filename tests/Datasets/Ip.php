<?php

declare(strict_types=1);

dataset('valid-ipv4', [
    '8.8.8.8',
    '10.10.10.10',
    '192.168.20.13',
    '192.168.1.1',
    '1.2.3.4',
]);

dataset('private-ipv4', [
    '10.10.10.10',
    '192.168.20.13',
]);

dataset('public-ipv4', [
    '1.2.3.4',
    '8.8.8.8',
    '5.11.11.5',
    '9.9.9.9',
]);
