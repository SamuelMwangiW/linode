<?php

declare(strict_types=1);

dataset('instance-id', [54472202]);
dataset('delete-instance-id', [54472029]);
dataset('image-id', ['linode/ubuntu20.04']);
dataset(
    name: 'disk',
    dataset: [
        fn () => ['disk_id' => 48694547, 'label' => 'backup_disk', 'description' => 'Created in tests, delete'],
    ]
);

dataset('instance', [
    fn () => [
        'authorized_keys' => ['ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABgQCo0z7DrPhlm6xFaexs+OhpVII3U3B36F6S/kmRlXGUeRkNOc4okmR8POAHAcctRM2c0kyDbhbX7E52efyEHvOCfvpjA23SIM+bxn0Do3az2lLZZQ3EDjgjkANHXPh4zOSPTYKMAivsT6JY521bQwDXa6oqrG36/wuJhHZWJLaCoq86KYpm2smcKe2W+5f/GWwXNNGBAqCfVA3MK0RbnTdyUL0AUJz3V+wLUAqqf3rSLJmthiKfvexxY1b9srhyM/V2R4zUplZgOl5FkQ8NVbHGSCHTx8q8vdDqMGTx1tdbvuiWsXnIIFoJHE4ZY7LVAbm+VoXmeiNpzn14xWNSM7hWh0AwAlZPviTVFAR+htffc45g2fIF9XDcvDFbCQBv3GpYMgcxMeE1IC4oLDbOhmDUgyonooY9ginmFM5HiVU8AaIKMqpBlX+618YHWD1GF2qL1IfQKiQXp+UvLHYOY9XpTjPyUw+Ku9BqCDiQma+ROhi39aAd/ZAWS5FOu3/s6Bk='],
        'authorized_users' => ['mwangithegreat'],
        'region' => 'eu-west',
        'image' => 'linode/ubuntu20.04',
        'private_ip' => true,
        'label' => 'pest-test-' . fake()->numerify(),
        'root_pass' => fake()->password(20),
        'type' => 'g6-nanode-1',
        'watchdog_enabled' => true,
        'tags' => ['linode-sdk', 'test'],
    ],
]);

dataset('instance-clone', [
    fn () => [
        'authorized_keys' => ['ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABgQCo0z7DrPhlm6xFaexs+OhpVII3U3B36F6S/kmRlXGUeRkNOc4okmR8POAHAcctRM2c0kyDbhbX7E52efyEHvOCfvpjA23SIM+bxn0Do3az2lLZZQ3EDjgjkANHXPh4zOSPTYKMAivsT6JY521bQwDXa6oqrG36/wuJhHZWJLaCoq86KYpm2smcKe2W+5f/GWwXNNGBAqCfVA3MK0RbnTdyUL0AUJz3V+wLUAqqf3rSLJmthiKfvexxY1b9srhyM/V2R4zUplZgOl5FkQ8NVbHGSCHTx8q8vdDqMGTx1tdbvuiWsXnIIFoJHE4ZY7LVAbm+VoXmeiNpzn14xWNSM7hWh0AwAlZPviTVFAR+htffc45g2fIF9XDcvDFbCQBv3GpYMgcxMeE1IC4oLDbOhmDUgyonooY9ginmFM5HiVU8AaIKMqpBlX+618YHWD1GF2qL1IfQKiQXp+UvLHYOY9XpTjPyUw+Ku9BqCDiQma+ROhi39aAd/ZAWS5FOu3/s6Bk='],
        'authorized_users' => ['test'],
        'region' => 'eu-west',
        'image' => 'linode/ubuntu20.04',
        'private_ip' => true,
        'label' => 'pest-clone-' . fake()->numerify(),
        'root_pass' => fake()->password(),
        'type' => 'g6-nanode-1',
        'tags' => ['linode-sdk', 'cloned'],
    ],
]);

dataset('instance-update', [
    fn () => [
        'label' => 'pest-test-updated-' . random_int(10, 99),
        'tags' => ['updated', 'test', 'linode-sdk'],
    ],
]);
