-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2023 at 04:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library-hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accountId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accountId`, `username`, `password`, `firstName`, `lastName`, `birthday`, `age`, `address`, `admin`) VALUES
(1, 'admin', 'admin', 'Jericho', 'Pasco', '2000-12-31', 22, 'Mandaue City', 1),
(9, 'jasper', 'jasper', 'Jasper', 'Apos', '2003-09-20', 19, 'Consolacion, Cebu', 0),
(12, 'kristina', 'kristina', 'Kristina', 'Kristina', '2003-01-01', 20, 'Cebu City, Cebu', 0),
(13, 'john', 'john', 'John', 'Doe', '2002-10-20', 22, 'Cebu City, Cebu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookId` int(11) NOT NULL,
  `bookTitle` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `publishDate` date NOT NULL,
  `synopsis` varchar(5000) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookId`, `bookTitle`, `author`, `publishDate`, `synopsis`, `photo`) VALUES
(1, 'The White Album', 'Joan Didion', '1979-01-01', 'Examining key events, figures, and trends of the era—including Charles Manson, the Black Panthers, and the shopping mall—through the lens of her own spiritual confusion, Joan Didion helped to define mass culture as we now understand it. Written with a commanding sureness of tone and linguistic precision, The White Album is a central text of American reportage and a classic of American autobiography.', 'theWhiteAlbum.jpg'),
(2, 'A Confederacy of DUNCES', 'John Kennedy Toole', '1980-05-01', 'Meet Ignatius J. Reilly, the hero of John Kennedy Toole\'s tragicomic tale, A Confederacy of Dunces. This 30-year-old medievalist lives at home with his mother in New Orleans, pens his magnum opus on Big Chief writing pads he keeps hidden under his bed, and relays to anyone who will listen the traumatic experience he once had on a Greyhound Scenicruiser bound for Baton Rouge. (\"Speeding along in that bus was like hurtling into the abyss.\") But Ignatius\'s quiet life of tyrannizing his mother and writing his endless comparative history screeches to a halt when he is almost arrested by the overeager Patrolman Mancuso--who mistakes him for a vagrant--and then involved in a car accident with his tipsy mother behind the wheel. One thing leads to another, and before he knows it, Ignatius is out pounding the pavement in search of a job.', 'aConfederacyOfDunces.jpg'),
(3, 'The Godfather', 'Mario Puzo', '1969-03-10', '\"The Godfather—the epic tale of crime and betrayal that became a global phenomenon.\r\nAlmost fifty years ago, a classic was born. A searing portrayal of the Mafia underworld, The Godfather introduced readers to the first family of American crime fiction, the Corleones, and their powerful legacy of tradition, blood, and honor. The seduction of power, the pitfalls of greed, and the allegiance to family—these are the themes that have resonated with millions of readers around the world and made The Godfather the definitive novel of the violent subculture that, steeped in intrigue and controversy, remains indelibly etched in our collective consciousness.\"', 'theGodfather.jpg'),
(4, 'The Grapes of Wrath', 'John Steinbeck', '1939-04-14', '\"The Pulitzer Prize-winning epic of the Great Depression, a book that galvanized—and sometimes outraged—millions of readers.\r\nFirst published in 1939, Steinbeck’s Pulitzer Prize-winning epic of the Great Depression chronicles the Dust Bowl migration of the 1930s and tells the story of one Oklahoma farm family, the Joads—driven from their homestead and forced to travel west to the promised land of California. Out of their trials and their repeated collisions against the hard realities of an America divided into Haves and Have-Nots evolves a drama that is intensely human yet majestic in its scale and moral vision, elemental yet plainspoken, tragic but ultimately stirring in its human dignity. A portrait of the conflict between the powerful and the powerless, of one man’s fierce reaction to injustice, and of one woman’s stoical strength, the novel captures the horrors of the Great Depression and probes into the very nature of equality and justice in America. At once a naturalistic epic, captivity narrative, road novel, and transcendental gospel, Steinbeck’s powerful landmark novel is perhaps the most American of American Classics.\"', 'theGrapesOfWrath.jpg'),
(5, 'nineteen eighty-four', 'George Orwell', '1949-06-08', '\"The new novel by George Orwell is the major work towards which all his previous writing has pointed. Critics have hailed it as his \"\"most solid, most brilliant\"\" work. Though the story of Nineteen Eighty-Four takes place thirty-five years hence, it is in every sense timely. The scene is London, where there has been no new housing since 1950 and where the city-wide slums are called Victory Mansions. Science has abandoned Man for the State. As every citizen knows only too well, war is peace.\r\n\r\nTo Winston Smith, a young man who works in the Ministry of Truth (Minitru for short), come two people who transform this life completely. One is Julia, whom he meets after she hands him a slip reading, \"\"I love you.\"\" The other is O\'Brien, who tells him, \"\"We shall meet in the place where there is no darkness.\"\" The way in which Winston is betrayed by the one and, against his own desires and instincts, ultimately betrays the other, makes a story of mounting drama and suspense.\"', 'nineteenEighty-four.jpg'),
(6, 'American Psycho', 'Bret Easton Ellis', '1991-03-06', 'Patrick Bateman is twenty-six and he works on Wall Street, he is handsome, sophisticated, charming and intelligent. He is also a psychopath. Taking us to head-on collision with America\'s greatest dream—and its worst nightmare—American Psycho is bleak, bitter, black comedy about a world we all recognise but do not wish to confront.', 'americanPsycho.jpg'),
(7, 'A Clockwork Orange', 'A Clockwork Orange', '1962-01-01', 'In Anthony Burgess\'s influential nightmare vision of the future, criminals take over after dark. Teen gang leader Alex narrates in fantastically inventive slang that echoes the violent intensity of youth rebelling against society. Dazzling and transgressive, A Clockwork Orange is a frightening fable about good and evil and the meaning of human freedom. This edition includes the controversial last chapter not published in the first edition, and Burgess’s introduction, “A Clockwork Orange Resucked.”', 'aClockworkOrange.jpg'),
(8, 'The Handmaid\'s Tale', 'Margaret Atwood', '1985-01-01', '\"Offred is a Handmaid in the Republic of Gilead. She may leave the home of the Commander and his wife once a day to walk to food markets whose signs are now pictures instead of words because women are no longer allowed to read. She must lie on her back once a month and pray that the Commander makes her pregnant, because in an age of declining births, Offred and the other Handmaids are valued only if their ovaries are viable. Offred can remember the years before, when she lived and made love with her husband, Luke; when she played with and protected her daughter; when she had a job, money of her own, and access to knowledge. But all of that is gone now…\r\n\r\nFunny, unexpected, horrifying, and altogether convincing, The Handmaid\'s Tale is at once scathing satire, dire warning, and tour de force.\"', 'theHandmaidsTale.jpg'),
(9, 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', '1997-06-26', 'Harry Potter thinks he is an ordinary boy - until he is rescued by an owl, taken to Hogwarts School of Witchcraft and Wizardry, learns to play Quidditch and does battle in a deadly duel. The Reason ... HARRY POTTER IS A WIZARD!', 'Harry_Potter_and_the_Philosopher_s_Stone.jpg'),
(10, 'Jaws', 'Peter Benchley', '1974-05-06', 'The classic, blockbuster thriller of man-eating terror that inspired the Steven Spielberg movie and made millions of beachgoers afraid to go into the water. Experience the thrill of helpless horror again—or for the first time!', 'jaws.png'),
(11, 'I Know Why the Caged Bird Sings', 'Maya Angelou', '1969-01-01', '\"Maya Angelou’s debut memoir is a modern American classic beloved worldwide. Her life story is told in the documentary film And Still I Rise, as seen on PBS’s American Masters.\r\n\r\nHere is a book as joyous and painful, as mysterious and memorable, as childhood itself. I Know Why the Caged Bird Sings captures the longing of lonely children, the brute insult of bigotry, and the wonder of words that can make the world right. Maya Angelou’s debut memoir is a modern American classic beloved worldwide.\r\n\r\nSent by their mother to live with their devout, self-sufficient grandmother in a small Southern town, Maya and her brother, Bailey, endure the ache of abandonment and the prejudice of the local “powhitetrash.” At eight years old and back at her mother’s side in St. Louis, Maya is attacked by a man many times her age—and has to live with the consequences for a lifetime. Years later, in San Francisco, Maya learns that love for herself, the kindness of others, her own strong spirit, and the ideas of great authors (“I met and fell in love with William Shakespeare”) will allow her to be free instead of imprisoned.\r\n\r\nPoetic and powerful, I Know Why the Caged Bird Sings will touch hearts and change minds for as long as people read.\"', 'iKnowWhyTheCagedBirdSings.jpg'),
(12, 'The Great Gatsby', 'F. Scott Fitzgerald', '1925-04-10', '\"The Great Gatsby, F. Scott Fitzgerald\'s third book, stands as the supreme achievement of his career. This exemplary novel of the Jazz Age has been acclaimed by generations of readers. The story of the fabulously wealthy Jay Gatsby and his love for the beautiful Daisy Buchanan, of lavish parties on Long Island at a time when The New York Times noted \"\"gin was the national drink and sex the national obsession,\"\" it is an exquisitely crafted tale of America in the 1920s.\r\n\r\nThe Great Gatsby is one of the great classics of twentieth-century literature.\"', 'theGreatGatsby.jpg'),
(13, 'The Catcher in the Rye', 'J.D. Salinger', '1951-07-16', '\"Fleeing the crooks at Pencey Prep, he pinballs around New York City seeking solace in fleeting encounters—shooting the bull with strangers in dive hotels, wandering alone round Central Park, getting beaten up by pimps and cut down by erstwhile girlfriends. The city is beautiful and terrible, in all its neon loneliness and seedy glamour, its mingled sense of possibility and emptiness. Holden passes through it like a ghost, thinking always of his kid sister Phoebe, the only person who really understands him, and his determination to escape the phonies and find a life of true meaning.\r\n\r\nThe Catcher in the Rye is an all-time classic in coming-of-age literature- an elegy to teenage alienation, capturing the deeply human need for connection and the bewildering sense of loss as we leave childhood behind.\r\n\r\nJ.D. Salinger\'s (1919–2010) classic novel of teenage angst and rebellion was first published in 1951. The novel was included on Time\'s 2005 list of the 100 best English-language novels written since 1923. It was named by Modern Library and its readers as one of the 100 best English-language novels of the 20th century. It has been frequently challenged in the court for its liberal use of profanity and portrayal of sexuality and in the 1950\'s and 60\'s it was the novel that every teenage boy wants to read.\"', 'The-Catcher-in-the-Rye.jpg'),
(14, 'To Kill A Mockingbird', 'Harper Lee', '1960-01-01', '\"The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it. \"\"To Kill A Mockingbird\"\" became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.\r\n\r\nCompassionate, dramatic, and deeply moving, \"\"To Kill A Mockingbird\"\" takes readers to the roots of human behavior - to innocence and experience, kindness and cruelty, love and hatred, humor and pathos. Now with over 18 million copies in print and translated into forty languages, this regional story by a young Alabama woman claims universal appeal. Harper Lee always considered her book to be a simple love story. Today it is regarded as a masterpiece of American literature.\"', 'toKillAMockingbird.webp'),
(15, 'The Little Prince', 'Antoine de Saint-Exupéry', '1943-04-06', 'A pilot stranded in the desert awakes one morning to see, standing before him, the most extraordinary little fellow. \"Please,\" asks the stranger, \"draw me a sheep.\" And the pilot realizes that when life\'s events are too difficult to understand, there is no choice but to succumb to their mysteries. He pulls out pencil and paper... And thus begins this wise and enchanting fable that, in teaching the secret of what is really important in life, has changed forever the world for its readers.Few stories are as widely read and as universally cherished by children and adults alike as The Little Prince, presented here in a stunning new translation with carefully restored artwork. The definitive edition of a worldwide classic, it will capture the hearts of readers of all ages.', 'littlePrince.jpeg'),
(30, 'The Alchemist', 'Paulo Coelho', '1988-01-01', 'sadadsadasd', 'alchemist.jpeg'),
(34, 'Meditations', 'Marcus Aurelius', '1900-01-01', 'asdasdad', 'meditations.jpeg'),
(73, 'To End with US', 'Colleen Hoover', '2023-05-27', 'sadsadsadsaasdasd', 'toendwithus.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrowId` int(11) NOT NULL,
  `borrowDate` date DEFAULT NULL,
  `returnDate` date DEFAULT NULL,
  `accountId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `toReturnDate` date DEFAULT NULL,
  `late` tinyint(1) DEFAULT NULL,
  `returned` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrowId`, `borrowDate`, `returnDate`, `accountId`, `bookId`, `toReturnDate`, `late`, `returned`) VALUES
(10, '2023-05-19', '2023-05-27', 1, 4, '0000-00-00', 1, 1),
(11, '2023-05-18', '2023-05-27', 13, 3, '0000-00-00', 1, 1),
(14, '2023-05-18', '2023-05-27', 1, 1, '0000-00-00', 1, 1),
(15, '2023-05-18', '2023-05-27', 13, 3, '0000-00-00', 1, 1),
(22, '2023-05-27', '2023-05-27', 1, 1, '2023-06-16', NULL, 1),
(23, '2023-05-27', '2023-05-27', 1, 1, '2023-06-16', NULL, 1),
(24, '2023-05-27', '2023-05-27', 1, 1, '2023-06-16', NULL, 1),
(25, '2023-05-26', '2023-05-27', 1, 1, '2023-06-15', NULL, 1),
(26, '2023-05-26', '2023-05-27', 1, 1, '2023-06-15', NULL, 1),
(27, '2023-05-26', '2023-05-27', 1, 1, '2023-06-15', NULL, 1),
(28, '2023-04-05', '2023-05-27', 9, 8, '2023-04-25', 1, 1),
(32, '2023-04-04', '2023-05-27', 9, 12, '2023-04-24', 1, 1),
(33, '2023-05-27', '2023-05-27', 9, 7, '2023-06-16', 0, 1),
(34, '2023-04-13', '2023-05-27', 9, 6, '2023-05-03', 1, 1),
(35, '2023-05-31', '2023-05-27', 9, 12, '2023-06-20', 0, 1),
(36, '2023-05-27', '2023-05-27', 9, 12, '2023-06-16', 0, 1),
(37, '2023-05-27', NULL, 13, 1, '2023-06-16', 0, 0),
(38, '2023-04-12', NULL, 13, 3, '2023-05-02', 1, 0),
(39, '2023-04-12', '2023-05-27', 13, 3, '2023-05-02', 1, 1),
(40, '2023-05-27', NULL, 9, 12, '2023-06-16', 0, 0),
(41, '2023-04-11', NULL, 9, 9, '2023-05-01', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accountId`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookId`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrowId`),
  ADD KEY `adding_forkey` (`accountId`),
  ADD KEY `adding_forkey2` (`bookId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `adding_forkey` FOREIGN KEY (`accountId`) REFERENCES `accounts` (`accountId`),
  ADD CONSTRAINT `adding_forkey2` FOREIGN KEY (`bookId`) REFERENCES `books` (`bookId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
