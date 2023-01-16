-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2022 at 10:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serverside`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `time`, `content`) VALUES
(1, 'No.1', '2022-08-02 20:00:35', 'This is the first blog.'),
(2, 'No.2', '2022-08-02 20:00:47', 'This is the second Blog.'),
(3, 'No.3', '2022-08-02 20:01:19', 'Submission and Rubric\r\n\r\nYou will submit your blogging application within a zip file to the Learn Dropbox folder.\r\nPlease be sure to include an export of your database in SQL format. (Use phpMyAdmin to export your database.)\r\n\r\nDeduct from a total of 10 marks the points associated with incomplete or incorrectly implemented items listed below.\r\n\r\nHome Page: (1 point each)\r\nFive most recent blog posts displayed in reverse chronological order.\r\nFor each of these posts you should display: Title, Timestamp, Content\r\nBlog post titles link to full page for each post. (This link includes a GET parameter to specify the post id.)\r\nIf blog content is larger than 200 characters the displayed content is truncated to 200 characters.\r\nIf the content is truncated a &quot;Read Full Post&quot; link should be displayed after the content. (This link includes a GET parameter to specify the post id.)\r\nAn edit link is displayed for each post. (The link includes a GET parameter to specify the post id.)\r\nA &quot;New Post&quot; link is present somewhere on this page.\r\n\r\nFull Post Page: (1 point each)\r\nDisplayed on this page: Post title, timestamp, full post content, edit link\r\nThe blog displayed is determined by a GET parameter in the URL. This parameter should be the post&#039;s primary key id from the database table.\r\n\r\nNew Post Creation: (1 point each)\r\nProvides a form where the user can enter a new post title and contents.\r\nThe form includes a button for submitting the post to the database.\r\nThis page is protected by HTTP authentication.\r\n\r\nPost Update and Delete: (1 point each)\r\nProvides a form where the user can edit a specific post title and contents.\r\nThe post being edited is determined by a GET parameter in the URL. This parameter should be the post&#039;s primary key id from the database table.\r\nThe title and content of the post being edited should appear in the form.\r\nThe form includes a button for updating the post in the database.\r\nThe form includes a button to delete the current post from the database.\r\nThis page is protected by HTTP authentication.\r\n\r\nSecurity: (2 points each)\r\nEnsure that any id values passed by the user are validated as integers before you use them in a SQL query. This is especially important when updating or deleting a post. If you receive a non-numeric id, redirect the user back to the index page. \r\nAll user submitted strings (POSTed titles and blog content) must be sanitized using input_filter and inserted/updated using PDO statements with placeholders bound to values.\r\n\r\nValidation and Formatting: (1 point each)\r\nAll dates should be formatted: &quot;MonthName dd, yyyy, hh:mm am/pm&quot;\r\nHint: You will need a PHP function to format the date. Also check out the strtotime function.\r\nNew / Updated Posts are validated to ensure the title and content are both at least 1 character in length.\r\nA validation error message is displayed if validation fails.\r\n\r\nGeneral: (1 point each)\r\nAll scripts include a comment block at the top describing the purpose of the script.\r\nNo PHP/SQL errors are triggered and/or displayed while interacting with your blog. \r\nAll PHP code is properly indented when nested. \r\nAll markup must validates as HTML5. '),
(4, 'No.4', '2022-08-02 20:01:40', 'This is the fourth blog.'),
(5, 'No.5', '2022-08-02 20:01:53', 'This is the last blog.'),
(6, 'No.6', '2022-08-02 20:02:20', 'This is the real last blog.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
