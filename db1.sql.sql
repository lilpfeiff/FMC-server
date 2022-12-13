-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.1.72-community - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table fmc.admin: 5 rows
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`AdminID`, `Username`, `Email`, `PW`, `FirstName`, `LastName`, `Address`, `PhoneNumber`, `WorkingHours`) VALUES
	(3001, 'Madmin', 'Margaret.T05@gmail.com', 'Margt@05', 'Margaret', 'Thames', '9819 Hillcrest Drive, Arlington, VA 93718', '2411552251', 6),
	(3002, 'Dav1d', 'D.Abraham1975@gmail.com', 'DA@7519', 'David', 'Abraham', '8292 Crest Ct, Arlington, VA 48490', '7051662547', 8),
	(3003, 'Smallfinger', 'Arnie.White41@outlook.com', 'White41!!', 'Arnold', 'White', '8493 Mulholland Drive, Vienna VA', '7059884520', 8),
	(3004, 'Greenman130', 'Michael.Greene0130@gmail.com', 'Greene12', 'Michael', 'Greene', '6221 High Drive, Fairfax, VA 22046', '2411552252', 6),
	(3005, 'Carrotcake74', 'Carol.1985@gmail.com', 'Car85', 'Carol', 'Watkins', '6221 Greengrove Street, Arlington, VA 22014', '2411999840', 4);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping data for table fmc.adminreport: 2 rows
/*!40000 ALTER TABLE `adminreport` DISABLE KEYS */;
INSERT INTO `adminreport` (`AdReportID`, `ReportID`, `ReportType`, `MarketInfo`, `VendorInfo`, `AdminID`) VALUES
	(1, 6004, 'Admin', 'MI-100300', 'VI-200120', 3001),
	(2, 6005, 'Admin', 'MI-100301', 'VI-200120', 3001);
/*!40000 ALTER TABLE `adminreport` ENABLE KEYS */;

-- Dumping data for table fmc.category: 8 rows
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`CategoryID`, `CategoryName`, `CategoryImage`) VALUES
	(3001, 'Alcohol', 'alcohol'),
	(3002, 'Bakery', 'bakery'),
	(3003, 'Coffee', 'coffee'),
	(3004, 'Dairy', 'dairy'),
	(3005, 'Florist', 'florist'),
	(3006, 'Meat', 'meat'),
	(3007, 'Pasta', 'pasta'),
	(3008, 'Produce', 'produce');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping data for table fmc.customer: 10 rows
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`CustomerID`, `Username`, `Email`, `PW`, `FirstName`, `LastName`, `Address`, `DOB`, `VendorID`) VALUES
	(1001, 'LD17', 'Ldiaz17@gmail.com', 'Deeazz@1717', 'Luis', 'Diaz', '8121 Merseyside Blvd, Fairfax, VA 22044', '1995-08-01', NULL),
	(1002, 'Bobby09', 'Robb09Firmino@outlook.com', 'Bobbie-09', 'Roberto', 'Firmino', '31140 Kops End Drive, Apt. 14B, Merrifield, VA 22016', '1994-06-24', NULL),
	(1003, 'LXNDR66', 'Alex66@gmail.com', 'LX@66', 'Trent', 'Alexander-Arnold', '241 Oakwood Drive, Arlington, VA 22012', '1998-04-24', NULL),
	(1004, 'Thiagogo', 'T.Alcantara06@gmail.com', 'Thiago0606', 'Thiago', 'Alcantara', '1820 Sunset Blvd, Suitland, MD 22044', '1991-04-12', NULL),
	(1005, 'Abeck01', 'Alisson.01@gmail.com', 'Al@01', 'Alisson', 'Becker', '9661 Theodore Blvd, Washington, DC 22047', '1992-06-17', NULL),
	(1006, 'Dio45', 'D.jota20@outlook.com', 'Diogo2020', 'Diogo', 'Jota', '10151 Strawflower Ln, Manassas, VA 20110', '1996-07-17', NULL),
	(1007, 'Salah11', 'M.Salah11@gmail.com', 'Mohammad@11', 'Mohammad', 'Salah', '13568 Highland Mews Ct, Herndon, VA 20171', '1993-04-25', NULL),
	(1008, 'VVD4', 'Vvdijk.4@fastmail.com', 'Dijk.4!', 'Virgil', 'van Dijk', '441 Jefferson St NW, Washington, DC 20011', '1993-01-07', NULL),
	(1009, 'Andy26', 'Andrew.rob26@gmail.com', 'Arob@26', 'Andrew', 'Robertson', '857 50th Pl NE, Washington, DC 20019', '1996-03-21', NULL),
	(1010, 'Fab3', 'Fab.inho3@gmail.com', 'Fab@3', 'Fabinho', 'Tavares', '829 Quincy St NW #210, Washington, DC 20011', '1996-02-11', NULL),
	(1011, 'SuzyQ', 'suzy@gmail.com', 'Suz@Q', 'Suzy', 'Little', '4235 Flower Lane, Alexandria VA, 23425', '0000-00-00', NULL);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Dumping data for table fmc.follower: 13 rows
/*!40000 ALTER TABLE `follower` DISABLE KEYS */;
INSERT INTO `follower` (`CustomerID`, `VendorID`) VALUES
	(1011, 2001),
	(1011, 2004),
	(1011, 2001),
	(1001, 2001),
	(1001, 2002),
	(1010, 2001),
	(1010, 2011),
	(1009, 2011),
	(1010, 2003),
	(1008, 2011),
	(1010, 2002),
	(1010, 2012);
/*!40000 ALTER TABLE `follower` ENABLE KEYS */;

-- Dumping data for table fmc.market: 5 rows
/*!40000 ALTER TABLE `market` DISABLE KEYS */;
INSERT INTO `market` (`MarketID`, `MarketName`, `MarketAddress`, `MarketEvents`, `MarketDate`, `MarketStart`, `MarketEnd`, `AdminID`) VALUES
	(4001, 'Dupont Circle', '1600 20th St NW, Washington, DC 20009', 'Pie Eating Contest', '2022-12-03', '08:00:00', '12:00:00', 3001),
	(4002, 'Columbia Heights', '1400 Park Rd NW, Washington, DC 20010', 'N/A', '2022-12-03', '08:00:00', '12:00:00', 3001),
	(4003, 'Dupont Circle', '1600 20th St NW, Washington, DC 20009', 'N/A', '2022-12-10', '08:00:00', '12:00:00', 3001),
	(4004, 'Columbia Heights', '1400 Park Rd NW, Washington, DC 20010', 'Henna Workshop', '2022-12-10', '08:00:00', '12:00:00', 3002),
	(4005, 'Dupont Circle', '1600 20th St NW, Washington, DC 20009', 'N/A', '2022-12-17', '08:00:00', '12:00:00', 3002);
/*!40000 ALTER TABLE `market` ENABLE KEYS */;

-- Dumping data for table fmc.marketschedule: 5 rows
/*!40000 ALTER TABLE `marketschedule` DISABLE KEYS */;
INSERT INTO `marketschedule` (`MarketSchedID`, `MarketID`, `MarketAddress`, `MarketDirection`, `MarketDate`, `MarketStart`, `MarketEnd`, `VendorID`) VALUES
	(1, 4001, '1600 20th St NW, Washington, DC 20009', 'Enter through Q Street', '2022-12-03', '08:00:00', '12:00:00', 2001),
	(2, 4002, '1400 Park Rd NW, Washington, DC 20010', 'Enter through Park Road', '2022-12-03', '08:00:00', '12:00:00', 2001),
	(3, 4003, '1600 20th St NW, Washington, DC 20009', 'Enter through Q Street', '2022-12-10', '08:00:00', '12:00:00', 2002),
	(4, 4004, '1400 Park Rd NW, Washington, DC 20010', 'Enter through Park Road', '2022-12-10', '08:00:00', '12:00:00', 2002),
	(5, 4005, '1600 20th St NW, Washington, DC 20009', 'Enter through Q Street', '2022-12-17', '08:00:00', '12:00:00', 2003);
/*!40000 ALTER TABLE `marketschedule` ENABLE KEYS */;

-- Dumping data for table fmc.product: 18 rows
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`ProductID`, `ProductName`, `ProductDescription`, `ProductImage`, `ProductQuantity`, `ProductPrice`, `VendorID`, `CategoryID`) VALUES
	(5001, 'Apples', 'Farm-fresh Honeycrisp apples. Crispy and delicious!', 'honeycrispApple', '100 pieces', 1, 2003, '3008'),
	(5002, 'Goat Cheese', 'Homemade goat cheese.', 'goatCheese', '12 pounds', 10, 2001, '3004'),
	(5003, 'Milk', 'Fresh milk.', 'freshMilk', 'Out of Stock', 5, 2001, '3004'),
	(5004, 'Bread', 'Freshly-baked cinnamon bread.', 'bread', '10 loaves', 5, 2004, '3002'),
	(5005, 'Spinach', 'Organic spinach.', 'organicSpinach', '5 lbs', 3, 2003, '3008'),
	(5006, 'Beans', 'Mexican green beans.', 'mexicanGreenBeans', '10 lbs', 5, 2008, '3008'),
	(5008, 'Potatoes', 'Fresh potatoes.', 'potatoes', 'Low Stock', 2, 2011, '3008'),
	(5009, 'Bagels', 'Fresh plain bagels.', 'bagel', '43', 2, 2006, '3002'),
	(5010, 'Coffee', 'Dark roast coffee.', 'darkRoastCoffee', '4 lbs', 5, 2007, '3003'),
	(5013, 'Apple', 'Red Delicious Apples', 'redDeliciousApple', '30 pieces', 2.5, 2001, '3008'),
	(5014, 'Green Bell Pepper', 'Farm Fresh Green Bell Peppers', 'greenBellPepper', '54', 3.98, 2001, '3008'),
	(5020, 'Biscuit', 'Farm Fresh Biscuits', 'biscuit', 'No Stock', 4.5, 2011, '3002'),
	(5019, 'Carrot', 'Organic Carrots', 'carrot', '45 pieces', 2.31, 2001, '3008'),
	(5021, 'Baguette', 'Fresh baked French baguettes', 'baguette', 'Low Stock', 5.23, 2011, '3002'),
	(5022, 'Carrot', 'Farm Fresh Carrots.', 'carrot', '23', 2.34, 2011, '3008'),
	(5023, 'Cucumber', 'Farm Fresh Cucumbers', 'cucumber', '33 pieces', 2, 2011, '3008'),
	(5026, 'Succulents', 'Small succulents to grow', 'succulents', '14 plants', 12, 2011, '3005'),
	(5024, 'Butter', 'butter by the half-pound. fresh churned by my amish neighbor. what a cutie.', 'butter', '23', 5.67, 2011, '3004'),
	(5025, 'Pumpkin', 'pumpkinszszsz', 'pumpkin', 'Low Stock', 5.46, 2011, '3008');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping data for table fmc.report: 5 rows
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` (`ReportID`, `ReportDate`) VALUES
	(6001, '2022-11-29'),
	(6002, '2022-11-29'),
	(6003, '2022-12-01'),
	(6004, '2022-12-03'),
	(6005, '2022-12-08');
/*!40000 ALTER TABLE `report` ENABLE KEYS */;

-- Dumping data for table fmc.vendor: 13 rows
/*!40000 ALTER TABLE `vendor` DISABLE KEYS */;
INSERT INTO `vendor` (`VendorID`, `Username`, `Email`, `PW`, `FirstName`, `LastName`, `Address`, `WorkingLocations`) VALUES
	(2001, 'MKFarms', 'MK.Farms71@gmail.com', 'MK@71', 'Michael', 'Keeves', '10 Bel Air, Hyattsville MD 20782', 'Columbia Heights Farmers Market'),
	(2002, 'Gio&#039;s Pizza', 'Giopizza1941@gmail.com', 'GP1941', 'Giovanni', 'Polizzi', '20 Landing End, Rockville, MD 20788', 'Columbia Heights Farmers Market'),
	(2003, 'Mia&#039;s Produce', 'Mia.produce2665@outlook.com', 'MP@2665', 'Miranda', 'Gonzalves', '782 Crossing Air, Ashburn, VA 89782', 'FRESHFARM Penn Quarter Market'),
	(2004, 'Crumble Fumble Bakery', 'Crumble.fumble10@gmail.com', 'Crumble@10', 'Alex', 'Rivera', '213 Heilend Drive, Dallas, TX 75252', 'FRESHFARM Penn Quarter Market'),
	(2005, 'Onyx Jewellery', 'Onyx01410@gmail.com', 'O@01410', 'Steven', 'Burns', '7626 Beverly Heights, Potomac, MD 20785', 'FRESHFARM Dupont Circle Market'),
	(2006, 'Pete&#039;s Bagels', 'P.bageler85@gmail.com', 'Gbagel85', 'Peter', 'Jackson', '2342 Old Trail Dr, Reston, VA 20191', 'FRESHFARM Dupont Circle Market'),
	(2007, 'Old Mill Coffee', 'Old.coffee@gmail.com', 'Oldiecoffee55', 'Patricia', 'Stevens', '12802 Lady Fairfax Cir, Herndon, VA 20170', 'Columbia Heights Farmers Market'),
	(2008, 'GreenGoods', 'Green.goods1440@fastmail.com', 'Gg@1440', 'Matthew', 'Pike', '2420 Barnesley Pl, Windsor Mill, MD 21244', 'Columbia Heights Farmers Market'),
	(2009, 'The Jam Place', 'The.jam41@gmail.com', 'Tj.41', 'Carla', 'Bennington', '2423 Knapps Way, Odenton, MD 21113', 'FRESHFARM Oakton Farmers Market'),
	(2010, 'Ponnin Popcorn', 'Pop.pop1880@protonmail.com', 'Pop1880!', 'Andrew', 'Hall', '24480 Denal Ln, Aldie, VA 20105', 'FRESHFARM Dupont Circle Market'),
	(2011, 'farmerJake', 'farmerjake@gmail.com', 'Babre413', 'Jake', 'Fogarty', '3425 Reston Ave, Fairfax, VA 23415', 'Silver Spring Farmers Market'),
	(2012, 'FarmFresh', 'farm@fresh.com', 'password', 'Greg', 'Matthews', '5439 Avenue Drive Alexandria VA 23415', 'FRESHFARM Dupont Circle Market'),
	(2013, 'farmerHelen', 'farm@helen.com', 'helenF', 'Helen', 'Farmer', '2341 Haven ave Arlington VA 23415', 'FRESHFARM Dupont Circle Market'),
	(2014, 'henry3', 'henry@gmail.com', 'frazzled', 'Henry', 'Frazz', '7876 Hatzel Drive, Arlington, VA, 34123', 'Columbia Heights Farmers Market');
/*!40000 ALTER TABLE `vendor` ENABLE KEYS */;

-- Dumping data for table fmc.vendorreport: 3 rows
/*!40000 ALTER TABLE `vendorreport` DISABLE KEYS */;
INSERT INTO `vendorreport` (`VenReportID`, `ReportID`, `ReportType`, `SalesInfo`, `InventoryInfo`, `CustomerInfo`, `VendorID`) VALUES
	(1, 6001, 'Vendor', 'Receipt# SI-100410', 'II-200630', 'FI-11202020', 2001),
	(2, 6002, 'Vendor', 'Receipt# SI-100411', 'II-200631', 'FI-11212023', 2001),
	(3, 6003, 'Vendor', 'Receipt# SI-100412', 'II-200632', 'FI-11222022', 2001);
/*!40000 ALTER TABLE `vendorreport` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
