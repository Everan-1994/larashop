<?php

return [
    'alipay' => [
        'app_id' => '2016092100561325',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA0exz3uge7YrFbnKm/ipX8WXkXbWD04A6oAwhqJkOixVeSv9rwahIWwXIwNQFqNcygYxD381M0W7ahB481kAWHhqQiaHrQ5iDhdfvnx8u/eyJxl5MiJXYIMgRCo2y+Imlbs/aawpUiYz3wA2p5FsC4W670FHJyS9x6HlgZ4oR7QwXPdhDS4uWVgBnhmBtQrzR1Fiobf1RsCTZHwTUjeqYdefn7qVOIGcby0fXTBOXqynANm/brIM4J0/9kaKvh9fEzzqMGZ6zzuPVZwoe8mNAltysQISUwAc/EnexLS4NGwzuRx5/eTjH9zclEh0GjfZ5xOFKM3By54pmPUAaudnU/QIDAQAB',
        'private_key' => 'MIIEowIBAAKCAQEArhw7NR5LVJpzRHbMni5xwNvheFHGeU7lwBZ0YwDm16kaiEeLJ6xQHxyUakqRcWI5XaImzyRsjVVhJyJLJtd9DLipsduBde0yd++5Er4uSv27VQC1D9vIGRdWmbAQNUAWIQi5k7KtaAs93jcbT3dRd8ppBNHYDKyCoKY3cip+VrUVdZH+kn0U5NAYamLCAtDmgh/Ll/wq6SFdtkM3+NPhcBOiGddZIu6mHuYYaMf2SZkVCMlf97XpNQ3mJAsxUDbnSOTiU854Li32a87s7Yy/oZFCJnUkGWCQ99D/jMoPhYSx/HMSKjQEe0L4EomY5d3thPG2jYqW292MvFdEFzPulQIDAQABAoIBAEhANuGoHKKTJVo34lmR9GqP1FTVuoMElprLtqiO6zx7VCNRbRGdk/IVLhGduBVRKXUNoQU8nD9aOuK+fGk16xKoXuMLsAF72QGkXSzF9vfvqxlvHbPjBHpFEQ7d3Rv76DL1J+1+rC8M2zOnspGbdhc7y7DQU9OOkvaPg1rA/4SDFneLLMX9izWNzDuAsX8vmDk5Im4cnGt17F+xWQmHI/0VgdHoKGdZeCxPzEV1uHIngJAKaDKC5vEgX43mej0LPLMegwoKNtnkuJwA4iy9UUCMxmruDl68bZ6eDqieRSWuTlBu+KvywNX/VEwWLWDlg9gRX90XDbMZElcqcAEr81ECgYEA/vLVEzf8Oa1iYgx7WVCxlUdTuHnpQY1VbdR3xIVitO/vIE7L9ZkvBwIHi/vso5dGp01ZTnpNYd3AbJx8C97VQ7Iv5ZvR1OyUwxTiQF8kUbUIDcCRnKAZGinmIPHNuwcIF76aCJQfAx7jCmAnYEWQop6/xaLLDgBBMlROb4A1MfsCgYEArtQNV6GlGr60cd1PxcYuTwAfI7q3uxU2rwduXeybQVIBDG9+Do+RKahVtqjbMS/bMegQ17jeyCQQW6/w92X1clrFfxEZSG/qR9p399igP9t10sSBW0y/WLqazuEMZB7RDqzfins0GVamZH8KNpoGPDMlQLegS1nVdWar8wRNDK8CgYEA/JdUmlT2laJ9/gzFzQjQ2MixXu2SN7syr7046EELOZ8aeRT4qJ0bZcMR/RQdMTt46dsNp14u+s58jl8/23bsLsUFBWUrMN0wylMPkp1w228TyqRG4DoShMSMV4mavjlKQFQ8QlGWpD3ezfHUMWLa2POVptcSfQ2tipLSn1AT5C8CgYBQ5gL+h+gUhiaNgfFF/Ty0hcPjDqWyRlC1kWS6xZ/aDA48KONV7Y0oj6KKEXzMN+7gGxigGgXM6xM+uh1w/ZckQWieMdVXNaJdeXSGFZGhuvW8f/2zt8HbVw4HqQ/IzJHEjq4qMHSdPQFmA3tAZOl5tdkJJ29fLsSdvNLYcycMNQKBgAI9KIZThYJVGkwTOGuE3qUOURTnPSeTbg35YCwTf932LSU5DIaE3O5agIeALzXK5bxDP8op0iY7ZNu9NH5GeXV0cCeyIA4ZGLEQu+F2D73g/WzwJh8TUsujL5Ts6gJsvjl8E3cbTiLHt547dELo1gjhCJITb1MAo8qJhxyYynfH',
        'log' => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id' => '',
        'mch_id' => '',
        'key' => '',
        'cert_client' => '',
        'cert_key' => '',
        'log' => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];
