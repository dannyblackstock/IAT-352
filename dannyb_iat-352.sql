-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2014 at 01:05 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dannyb_iat-352`
--
CREATE DATABASE IF NOT EXISTS `dannyb_iat-352` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dannyb_iat-352`;

-- --------------------------------------------------------

--
-- Table structure for table `followers_table`
--

DROP TABLE IF EXISTS `followers_table`;
CREATE TABLE IF NOT EXISTS `followers_table` (
  `follower_id` int(100) NOT NULL,
  `following_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers_table`
--

INSERT INTO `followers_table` (`follower_id`, `following_id`) VALUES
(1, 6),
(1, 5),
(2, 2),
(4, 2),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `high_school` varchar(100) NOT NULL,
  `grad_year` int(4) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `is_phone_preferred` tinyint(1) DEFAULT NULL,
  `bio` text,
  `twitter_handle` varchar(100) DEFAULT NULL,
  `flickr_handle` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `email`, `password`, `name`, `location`, `high_school`, `grad_year`, `phone`, `is_phone_preferred`, `bio`, `twitter_handle`, `flickr_handle`) VALUES
(1, 'dannyblackstock@gmail.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Danny Blackstock', 'Coquitlam, BC', 'Archbishop Carney Regional Secondary School', 2011, '604-111-1234', 1, 'Danny''s interests in a wide range of design topics led him to enroll in the School of Interactive Arts and Technology (SIAT). Cool!!!\r\n\r\nExciting stuff.', 'the_blackstock', 'mooglybear'),
(2, 'siat@sfu.ca', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Billy Joel', 'Surrey, BC', 'Surrey Central High School', 2014, '604-123-9876', 1, 'Billy Joel likes singing and playing guitar all the time.', 'billyjoel', 'Guren C'),
(3, 'test@sfu.ca', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Quanjip Nishnajin', 'Africa', 'Africa High School', 2000, NULL, 0, NULL, 'CMDeGit', 'cameralabs'),
(5, 'poop@sfu.ca', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Fun Gai', 'Bangkok', 'Bagnkok High School', 2001, '1-800-267-2001', 1, 'Currently works for Alarm Force.', 'mblackstock', 'charliecm'),
(6, 'marcus@sfu.ca', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Marcus Blackstock', 'Coquitlam, BC', 'Archbishop Carney Regional Secondary School', 2015, '604-123-1928', 0, '70% of my body is movies.', 'kacboy', 'solohsu93'),
(8, 'cool@sfu.ca', '19cb2a070ddbe8157e17c5dda0ea38e8aa16fae1725c1f7ac22747d870368579', 'Adam Zinga', 'Vancouver, WA', 'Terry Fox Secondary', 1977, '604-120-1239', 1, 'I''m incredibly tall at 7''6".', 'LFC_Zinga95', 'akshamwow'),
(9, 'tester@sfu.ca', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Yuri Burukov', 'Moscow', 'Moscow School', 2004, '123-123-1233', 1, 'Gunga gunga!', 'ActiveTextbook', 'ammé photographie'),
(10, 'elpresador@sfu.ca', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Elpresador', 'Youngstown, Ohio', 'N/A', 2012, 'NULL', 0, 'NULL', 'THE_ELPRESADOR', 'Eloquentress'),
(11, 'dave@sfu.ca', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Dave Dugdale', 'Boulder, Colorado', 'Boulder High School', 1903, '123.918.4566', 1, 'I''m having a blast learning about all this DSLR video stuff!', 'Dugdale', 'Dave Dugdale');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `date`) VALUES
(1, 1, 'Fun!', 'Content!', '2014-02-16 08:00:00'),
(2, 1, 'Blog Post!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, distinctio, totam, iusto optio nemo aspernatur dignissimos aperiam commodi magni sint tenetur numquam quaerat dicta incidunt rerum laborum veniam maxime excepturi.', '2014-02-16 08:00:00'),
(3, 6, 'Sad Story', 'This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. This is my sad story. ', '2014-02-16 08:00:00'),
(4, 1, 'asdfasdf', 'asdfawefrawrwr 3raq2r323r ', '2014-02-16 08:00:00'),
(5, 5, 'I am sad', 'I am sad. So very very sad. So very very sad. So very very sad. So very very sad. So very very sad. So very very sad. So very very sad. So very very sad. So very very sad. So very very sad. So very very sad. \r\n\r\n\r\n So very very sad. So very very sad. So very very sad. So very very sad.', '2014-02-17 08:00:00'),
(6, 5, 'Fun times.', 'I had a good day.', '2014-02-17 08:00:00'),
(7, 5, 'GO FAR', '$mysqltime = date ("Y-m-d H:i:s", $phptime); $mysqltime = date ("Y-m-d H:i:s", $phptime); ', '1970-01-01 08:00:00'),
(8, 5, 'YA DUN GOOFED!', 'GAHAGASFGAW AFQ$ ARA@#R', '2014-02-17 09:40:34'),
(9, 8, 'Sad tale', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2014-02-18 04:08:29'),
(10, 8, 'A funny story!', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', '2014-02-18 04:08:53'),
(11, 8, 'The worst story', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2014-02-18 04:09:14'),
(12, 2, 'Stuff and Things 1', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2014-02-18 04:13:35'),
(13, 2, 'Stuff and Things 2', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?', '2014-02-18 04:13:50'),
(14, 2, 'SO -15573408', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', '2014-02-18 04:14:05'),
(15, 6, 'Goop and Shqoop', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', '2014-02-18 04:14:56'),
(16, 6, 'Lipsum 1', '"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."\r\n"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."', '2014-02-18 04:15:09'),
(17, 3, 'Grunt work', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tempus eu lacus eu tempor. Aliquam dictum enim nec eleifend semper. Maecenas feugiat placerat egestas. Nunc mattis, nulla vel commodo bibendum, massa justo aliquet elit, eu molestie purus massa nec neque. Donec nisl magna, ultricies sit amet consectetur eget, sagittis non dui. Curabitur feugiat eget est quis bibendum. Praesent quis sodales est. Vestibulum eu dapibus dolor. Mauris cursus, massa ut aliquam fermentum, justo tellus posuere ipsum, a fringilla elit arcu at mauris. Phasellus pharetra diam nisl, nec aliquam sem ultricies eu. Pellentesque non mi condimentum ante interdum tempus. Fusce in tempor lacus. Ut eu tristique sem.', '2014-02-18 04:15:55'),
(18, 3, 'Grunt Work 2', 'Quisque vel vehicula diam, eu eleifend lacus. Sed varius arcu eu nunc facilisis euismod. Morbi placerat luctus diam, convallis egestas diam blandit quis. Donec scelerisque vehicula massa interdum tempor. Fusce hendrerit ligula vitae risus malesuada, id eleifend dui mollis. Nulla tempus, ligula in imperdiet ultricies, mauris lorem pulvinar odio, sed pretium mauris ante eget dolor. Praesent semper ipsum et semper lobortis. Morbi feugiat, arcu sed aliquam posuere, libero quam elementum diam, quis dictum turpis enim quis ligula.', '2014-02-18 04:16:06'),
(19, 3, 'This is terrible!', 'Praesent diam neque, tempor sit amet ligula vitae, vehicula tempor purus. Nulla commodo nisl eu mi luctus, non consectetur libero dictum. Integer a laoreet lectus. Sed nulla ligula, venenatis et nisl ac, vulputate vulputate ipsum. Pellentesque fermentum vulputate adipiscing. Cras gravida, lectus nec adipiscing ultricies, justo orci aliquam justo, a congue elit neque sed lectus. Donec lobortis quis nunc nec pharetra. Sed eros justo, laoreet eget commodo eu, vestibulum ut ipsum. Nunc eleifend lacus purus, tempor aliquam ligula gravida ac. In fermentum elementum ligula, ac varius mi porttitor nec. Aenean elementum tortor lacus, quis pellentesque justo tincidunt laoreet.', '2014-02-18 04:16:17'),
(20, 3, 'I am a fun person.', 'Sed facilisis quam eu urna ultricies dignissim. Nullam porttitor lacinia rutrum. Donec sollicitudin metus ut dignissim tincidunt. Sed eleifend semper augue venenatis vulputate. Quisque blandit pharetra est eu sodales. Suspendisse vel consectetur dui. Nunc sit amet faucibus lacus. Fusce consequat quis enim id eleifend. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec mollis neque ac mauris tempus, in sagittis erat cursus. Proin rutrum dolor sit amet interdum sodales. Nullam eget malesuada sem. Mauris eget elit dui. Vivamus odio nunc, vestibulum tincidunt urna at, imperdiet ultricies purus. Morbi suscipit ipsum et congue tristique.\r\n', '2014-02-18 04:16:47'),
(21, 3, 'A girl', 'Integer lorem tellus, ullamcorper aliquam feugiat congue, accumsan vitae velit. In hac habitasse platea dictumst. Maecenas eget mollis eros, consectetur aliquet nisl. Vestibulum auctor blandit porta. Vivamus eget orci varius, euismod arcu a, tristique odio. Mauris neque turpis, adipiscing eget lacus et, sollicitudin consectetur lectus. Fusce consectetur at risus ac aliquam. Praesent et tempor odio, scelerisque elementum libero. Sed auctor fermentum accumsan. Donec mollis rutrum mi, in dapibus massa rhoncus ut. Nunc sollicitudin venenatis nulla non lacinia. Nullam sodales a ligula vel bibendum.', '2014-02-18 04:17:03'),
(22, 3, 'A guy', 'Õ€Õ¡ÕµÕ¥Ö€Õ¥Õ¶ Shqip â€«Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©â€«Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©   Ð‘ÑŠÐ»Ð³Ð°Ñ€ÑÐºÐ¸ CatalÃ  Hrvatski ÄŒesky Dansk Nederlands English \r\nEesti Suomi FranÃ§ais áƒ¥áƒáƒ áƒ—áƒ£áƒšáƒ˜ Deutsch Î•Î»Î»Î·Î½Î¹ÎºÎ¬ â€«×¢×‘×¨×™×ªâ€«×¢×‘×¨×™×ª   Magyar Indonesia Italiano \r\nLatviski LietuviÅ¡kai Ð¼Ð°ÐºÐµÐ´Ð¾Ð½ÑÐºÐ¸ Melayu Norsk Polski PortuguÃªs RomÃ¢na PyccÐºÐ¸Ð¹ \r\nÐ¡Ñ€Ð¿ÑÐºÐ¸ SlovenÄina SlovenÅ¡Äina EspaÃ±ol Svenska à¹„à¸—à¸¢ TÃ¼rkÃ§e Ð£ÐºÑ€Ð°Ñ—Ð½ÑÑŒÐºÐ° Tiáº¿ng Viá»‡t', '2014-02-18 04:17:14'),
(23, 1, 'Claire', 'Claire Boucher seems to be the kind of girl that will always limply hand over her hand to shake. You''ll greet the paw with a crunch and she''ll take it back slowly, withdrawing it from view, either back behind her or back into a pocket. She''s a wisp of a girl, tiny and, you could say, frail. She appears to be the kind of person who could happily sit around in sweats or big sweaters and just fold herself into the couch for weeks or months on end, immersed or consumed with any number of personal obsessions, getting closer every day to something that''s she''s been hearing in her head for a good amount of time. Obviously, here as Grimes, the Canadian musician has focused on the weird and hyper-moody, experimental electronic and rhythm and blues music that she''s got casually nudging her from the insides. She might be made of the guts and intestines of lava lamps, the rollicking and slow-motion flowing of a glowing substance that''s working its way slowly through her body like an old lady driving on the interstate. It''s that glowing substance -- whatever it is -- that she lets out and into her music. It''s just enough light to give us something to look at, but most of the time we''re surely just letting her strange energy affect us in whatever way it would like.', '2014-02-18 04:18:27'),
(24, 1, 'Dawes', 'Since we first met the four men in Dawes a year and a half ago, we''ve spent a lot of time with them. We''ve spent days with them in barns, freezing all of our asses off, drinking lots of whiskey, hot apple cider and hot chocolate. We''ve seen them hop out into the yard and chase around barnyard animals, squawking and fussing to get out of the way. We''ve seen them get very little sleep and spend every waking hour singing and playing, just spilling with what they have running through them. We''ve spent a 4th of July with them, standing beneath a menacing purple-black sky full of storm clouds, rain and a couple hundred dollars worth of illegal fireworks. There have been babies in our families named after them. We''ve talked to them for hours until our throats were raw with the task and the effort, turned husky but still happy to have done it. We''ve come to love them as brothers and yet, through all of it, what still remains untouched is their ability to make us gasp with the purity of what they do and who they are as a group of musicians. Even a close friendship doesn''t dull one''s sense of awe when it comes to their debut album "North Hills," a live show that''s absolutely a religious experience and new songs that are just as good and scarily meaningful.', '2014-02-18 04:18:46'),
(25, 1, 'Amos Lee Blog', 'Amos Lee is an older man than he seems. He already has some of those softened edges, those grandfatherly qualities that are so seemingly easy to come by with age and the deterioration of muscles, hearing, seeing and movement. We will, at some point, all get worked over by the years that we live some of us more so than others and well begin to fall apart, or into a state where the words sweet and old and wise are synonymous with us, as they never have been before.', '2014-02-18 04:19:05'),
(26, 9, 'Hello', 'This is my first ever post. Isn''t that nice.', '2014-02-18 04:29:18'),
(27, 9, 'Cool post', 'From the end user perspective, what is expected is a fully functioning website with working navigation, pages for users to create their accounts and edit/modify information in their accounts, post blog messages, for visitors to browse members, view posted blogs via different modes (e.g. by user, by timeline, by high school).', '2014-02-18 04:31:17'),
(28, 9, 'Something about SQL', 'The tricky part here is how you submit the database. You need to submit a populated database with your website. It needs to be loaded with at least 3 high schools, at least 8 members, and at least 3 posts for each member, plus at least 2 members must have at least  6 posts each. To submit the database, follow these steps EXACTLY: ', '2014-02-18 04:31:31'),
(32, 1, 'Testerosa', 'Just trying out my new Ferrari bud', '2014-03-08 23:19:03'),
(34, 1, 'Test post with line breaks', 'Money causes teenagers to feel stress. It makes them feel bad about themselves and envy other people. My friend, for instance, lives with her family and has to share a room with her sister, who is very cute and intelligent. \r\n\r\nThis girl wishes she could have her own room and have a lot of stuff, but she canâ€™t have these things because her family doesnâ€™t have much money. Her familyâ€™s income is pretty low because her father is old and doesnâ€™t go to work. Her sister is the only one who works. Because her family canâ€™t buy her the things she wants, she feels a lot of stress and gets angry sometimes. Once, she wanted a beautiful dress to wear to a sweetheart dance. She asked her sister for some money to buy the dress. She was disappointed because her sister didnâ€™t have money to give her. She sat in silence for a little while and then started yelling out loud. She said her friends got anything they wanted but she didnâ€™t. \r\n\r\nThen she felt sorry for herself and asked why she was born into a poor family. Not having money has caused this girl to think negatively about herself and her family. It has caused a lot of stress in her life.', '2014-04-01 20:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

DROP TABLE IF EXISTS `visitors`;
CREATE TABLE IF NOT EXISTS `visitors` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `email`, `password`, `name`) VALUES
(1, 'danny@sfu.ca', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Visitor Ynnad'),
(2, 'visitor@sfu.ca', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Danny'),
(4, 'test2@sfu.ca', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Tester Two');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
