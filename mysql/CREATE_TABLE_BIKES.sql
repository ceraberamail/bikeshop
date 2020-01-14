CREATE TABLE `bikes` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `price` int(11) NOT NULL,
 `brand` varchar(100) NOT NULL,
 `name` varchar(100) NOT NULL,
 `color` varchar(50) NOT NULL,
 `description` text NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;