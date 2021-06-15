
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `transaction_history` (
  `no` int(3) NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `balance` int(8) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `customers` (
  `id` int(3) NOT NULL,
  `Name` text NOT NULL,
  `Balance` int(8) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `PhoneNumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `customers` (`id`, `Name`,`Balance`, `Email`, `PhoneNumber`) VALUES
(1, 'Deekshith K'  13900 'deek@gmail.com', '7689276723'),
(2,'Nachiketh', 3000, 'nachi@gmail.com',  '219276782'),
(3,'Nydile G V', 20000, 'nyd19@gmail.com', '9234444411'),
(4, 'Rakshith K' , 21000, 'rakshi@gmail.com','7689276734'),
(5,'Ranjith K', 30005, 'ranji@gmail.com', '9232224411'),
(6,'Rohit G', 13876, 'rohi@gmail.com', '8654123456'),
(7, 'Sunitha K C', 4567, 'sunitha@gmail.com', '9232224433'),
(8, 'Vasanth k', 32675, 'vasanth@gmail.com', '9232224444'),
(9, 'Yadhu A M', 6565, 'yadhug@gmail.com', '7689276782'),
(10, 'Yash N', 6432, 'yashhug@gmail.com', '9232224321');

ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`no`);

ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `transaction_history`
  MODIFY `no` int(3) NOT NULL AUTO_INCREMENT;

ALTER TABLE `customers`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;


