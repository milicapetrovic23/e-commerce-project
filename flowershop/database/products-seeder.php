<?php
$products = [
    [
        "id"=>110,
        "title"=>"Chinese Fan Palm",
        "description"=>"This tropical palm is full and compact, showcasing large, dramatic fronds that resemble a folded paper fan. A slow-growing houseplant that does not require special care, the Chinese Fan Palm makes a statement. Non-toxic for the whole family — including pets — this potted palm is sure to add a tropical feel to your home.",
        "img"=>"./public/theme/img/p1.jpg",
        "price"=>24.90,
        "category"=>"green plants",
        "available"=>true
    ], [
        "id"=>109,
        "title"=>"Calathea Peacock",
        "description"=>"This bold calathea has decorative green markings on its long pointed leaves resembling a peacock’s tail, giving the beautiful Calathea Peacock its common name. The underside of the leaves are a deep magenta; you’ll be able to admire all aspects of its leaves as they fold up at night and open back up during the day. These plants prefer a warm humid environment and moist soil to look their best.",
        "img"=>"./public/theme/img/p2.jpg",
        "price"=>37.95,
        "category"=>"green plants",
        "available"=>true
    ],
    [
        "id"=>108,
        "title"=>"Dracaena Warneckii",
        "description"=>"The Dracaena Warneckii is a stand-out among Dracaenas with its multi-colored green and creamy white leaves towering above sturdy canes. Known for their carefree care regime, dracaenas are ideal for those who want a lush large plant without all the fuss. The Dracaena Warneckii does well in low to indirect light. Prune off any brown tips on their long leaves as they appear.",
        "img"=>"./public/theme/img/p3.jpg",
        "price"=>19.95,
        "category"=>"house plants",
        "available"=>true
    ],
    [
        "id"=>107,
        "title"=>"Bromeliad Aechmea Pink",
        "description"=>"Featuring colorful, long-lasting blooms, the Bromeliad Aechmea Pink is a unique flowering plant to add a touch of the tropics to your space. With blooms that last for up to six months, these are sure to brighten any home.",
        "img"=>"./public/theme/img/p4.jpg",
        "price"=>21.95,
        "category"=>"green plants",
        "available"=>true
    ],
    [
        "id"=>106,
        "title"=>"Monstera",
        "description"=>"This tropical plant originates from the rainforests of southern Mexico and is extremely adaptable to indoor conditions. Monsteras love bright, indirect light, but will be happy under fluorescent lights as well. Monsteras are climbers, so as they grow, they will want to vine out. This impressive, wild plant is also tolerant of the occasional missed watering, making it an ideal addition for any home.",
        "img"=>"./public/theme/img/p5.jpg",
        "price"=>15.95,
        "category"=>"house plants",
        "available"=>true
    ],
    [
        "id"=>105,
        "title"=>"Dracaena Limelight",
        "description"=>"With wide, neon leaves and tall stature, the Dracaena Limelight is one of the best plants for new or hands-off plant parents looking for a bright splash of color in a shady corner of your home. This plant thrives in any level of indirect light and doesn’t mind an occasional missed watering. Keep the broad leaves looking their best with regular dusting.",
        "img"=>"./public/theme/img/p6.jpg",
        "price"=>24.90,
        "category"=>"green plants",
        "available"=>true
    ], [
        "id"=>104,
        "title"=>"Fiddle Leaf Fig",
        "description"=>"The Fiddle Leaf Fig is easily recognizable and loved for its distinctive foliage. This tall, dramatic plant has very large, heavily veined, violin-shaped leaves that grow upright. It’s not bushy, making it a beautiful interior design addition for a brightly lit corner or cozy nook in your home.",
        "img"=>"./public/theme/img/p7.jpg",
        "price"=>37.95,
        "category"=>"green plants",
        "available"=>true
    ],
    [
        "id"=>103,
        "title"=>"Bromeliad Summer",
        "description"=>"A colorful and low-maintenance air plant, the Bromeliad Summer is a striking houseplant that adds warmth to your home. With a bright and cheery magenta flower, this bromeliad is pet-friendly and makes for a great gift for any plant lover or beginner plant parent.",
        "img"=>"./public/theme/img/p8.jpg",
        "price"=>19.95,
        "category"=>"house plants",
        "available"=>true
    ],
    [
        "id"=>102,
        "title"=>"Dracaena Elegance",
        "description"=>"Simple yet statement worthy, the Dracaena Elegance is the perfect match for low-fuss plant parents. This dracaena features long glossy leaf tufts atop sturdy canes. The Dracaena Elegance is perfect for darker corners or spots with bright filtered light. It likes to stay fairly dry and will forgive a missed watering or two. Keep the sleek green leaves clean with regular dusting.",
        "img"=>"./public/theme/img/p9.jpg",
        "price"=>21.95,
        "category"=>"green plants",
        "available"=>true
    ],
    [
        "id"=>101,
        "title"=>"Sansevieria",
        "description"=>"Architectural and sturdy, this plant is easy to care for and highly adaptable. Also known as a Snake Plant and Mother-in-Law’s Tongue. This hardy plant remains popular because of its adaptability to a wide range of growing conditions. It can withstand full sun and handle low light, though it will do best in indirect sunlight. ",
        "img"=>"./public/theme/img/p10.jpg",
        "price"=>15.95,
        "category"=>"house plants",
        "available"=>true
    ]
];


/* * * mysql hostname ** */
$hostname = "localhost";
/* * * mysql username ** */
$username = "root";
/* * * mysql password ** */
$password = "";
/* * * mysql database name ** */
$database = "flowershop";

try {
    $connection = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach ($products as $product) {
        $sqlQueryString = "INSERT INTO ec_products (title, description, price, stock, img, status, barcode)"
                        . " VALUES (" . ":title" . ", " . ":description" . ", " . ":price" . ", " . ":stock" . ", " . ":img" . ", "
                        . ":status" . ", " . ":barcode" . ")";
        $statement = $connection->prepare($sqlQueryString);
        $params = [
            'title' => $product["title"],
            'description' => $product["description"],
            'price' => $product["price"],
            'stock' => rand(1, 10),
            'img' => $product["img"],
            'status' => $product["available"],
            'barcode' => $product["id"],
        ];
        $status = $statement->execute($params);
    }
} catch (PDOException $exception) {
    echo "Something went wrong: " . $exception->getMessage() . "<br>";
}
