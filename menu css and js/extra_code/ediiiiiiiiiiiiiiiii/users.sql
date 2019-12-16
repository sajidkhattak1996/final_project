
CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(60) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `users` (`id`, `username`, `name`, `gender`, `email`) VALUES
(1, 'yssyogesh', 'Yogesh singh', 'male', 'yogesh@makitweb.com'),
(2, 'sonarika', 'Sonarika Bhadoria', 'female', 'bsonarika@gmail.com'),
(3, 'vishal', 'Vishal sahu', 'male', 'vishal@yahoo.com'),
(4, 'sunil', 'sunil', 'male', 'sunil521@gmail.com');
