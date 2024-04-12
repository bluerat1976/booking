<?
    const NEW_STICKER = '../images/new.jpg';
    $tours = [
        [
            'name' =>  'Montenegro - Excurcion Tour',
            'image' => '../images/montenegro-excursion.jpg',
            'category' => 'Excursion tours',
            'country' => 'Montenegro',
            'new' => false,
            'price' => [
                'ammount' => 460,
                'currency' => 'USD',
            ]
        ],
        [
            'name' =>  'Swiss Mountain Adventure',
            'image' => '../images/swiss-mountain.jpg',
            'category' => 'Mountain Winter Tour',
            'country' => 'Swiss',
            'new' => true,
            'price' => [
                'ammount' => 740,
                'currency' => 'USD',
            ]
        ],
        [
            'name' =>  'Montenegro Sea Tour',
            'image' => '../images/montenegro-sea-shore.jpg',
            'category' => 'Summer Sea Tours',
            'country' => 'Montenegro',
            'new' => false,
            'price' => [
                'ammount' => 580,
                'currency' => 'USD',
            ]
        ],
        [
            'name' =>  'Romanian Old Touns',
            'image' => '../images/romatia-excursion.jpg',
            'category' => 'Excursion tours',
            'country' => 'Romania',
            'new' => false,
            'price' => [
                'ammount' => 270,
                'currency' => 'USD',
            ]
        ],
        [
            'name' =>  'Croatia Summer Tour',
            'image' => '../images/croatia-sea-shore.jpg',
            'category' => 'Summer Sea tours',
            'country' => 'Croatia',
            'new' => false,
            'price' => [
                'ammount' => 630,
                'currency' => 'USD',
            ]
        ],
    ];

save($tours, 'tours.json');

?>