-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2021 a las 15:37:31
-- Versión del servidor: 8.0.25
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `codeigniter_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `user_id`, `type`, `status`, `created_at`) VALUES
(1, 'Technical', 1, 'blog', 0, '2017-07-31 15:03:14'),
(2, 'Business', 1, 'blog', 0, '2017-07-31 15:03:14'),
(4, 'T-Shirts', 3, 'product', 1, '2017-08-10 14:49:47'),
(5, 'Shirts', 3, 'product', 1, '2017-08-10 14:51:38'),
(6, 'FAQ Category Onee', 1, 'faq', 1, '2017-08-14 15:00:07'),
(7, 'FAQ Category two', 1, 'faq', 1, '2017-08-14 15:11:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `post_id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comment_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `username`, `email`, `comment`, `comment_type`, `status`, `created_at`) VALUES
(1, 4, 'Astha Sharma', 'astha@yopmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lobortis metus. Mauris eget turpis consectetur, gravida elit ac, gravida nibh. Maecenas massa eros, finibus id leo vitae, tempor tristique elit. Vestibulum vel nunc porttitor, feugiat quam nec, luctus justo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ullamcorper at tellus non elementum. Fusce vestibulum magna odio, eget efficitur lacus mattis ut. Integer lacinia tortor id mattis porta. ', 'blog', 1, '2017-08-01 18:35:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faqs`
--

CREATE TABLE `faqs` (
  `id` int NOT NULL,
  `faq_cat_id` int NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` longtext NOT NULL,
  `datetime` datetime NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `faqs`
--

INSERT INTO `faqs` (`id`, `faq_cat_id`, `question`, `answer`, `datetime`, `status`) VALUES
(1, 7, 'How to uses', '<p>go to registration page and registred yourself...</p>\r\n', '2017-08-14 21:04:48', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galleries`
--

CREATE TABLE `galleries` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `file_name`, `created_at`) VALUES
(39, 'gallery', '19120392_488748308124181_1356232594835898368_n.jpg', '0000-00-00 00:00:00'),
(40, 'gallery', '20066031_249507905540880_3425795962604355584_n.jpg', '0000-00-00 00:00:00'),
(41, 'gallery', '15877061_119553495224327_312221402042204160_n.jpg', '0000-00-00 00:00:00'),
(42, 'gallery', '16123278_175559819590919_7196532057399361536_n.jpg', '0000-00-00 00:00:00'),
(43, 'gallery', '16583116_1739753663021127_1111287715137060864_n.jpg', '0000-00-00 00:00:00'),
(44, 'gallery', '14574113_652781028238295_278229033701867520_n.jpg', '0000-00-00 00:00:00'),
(45, 'gallery', '15403505_270429253371351_6273410913949188096_n.jpg', '0000-00-00 00:00:00'),
(46, 'gallery', '15538121_1018367098290603_1806110868400766976_n.jpg', '0000-00-00 00:00:00'),
(47, 'gallery', '15538471_145984329220644_613923239470563328_n.jpg', '0000-00-00 00:00:00'),
(48, 'gallery', '15538718_217169452072899_4305560102691143680_n.jpg', '0000-00-00 00:00:00'),
(49, 'gallery', '15538789_241209666312136_5682089248384090112_n.jpg', '0000-00-00 00:00:00'),
(50, 'gallery', '15623741_814558755361976_817742299776679936_n.jpg', '0000-00-00 00:00:00'),
(51, 'gallery', '15625408_1148559301925971_939940647698169856_n.jpg', '0000-00-00 00:00:00'),
(53, 'gallery', '15802415_1849186702026963_3549623829707882496_n.jpg', '0000-00-00 00:00:00'),
(54, 'gallery', '16908777_182954125530306_8770190177525039104_n.jpg', '0000-00-00 00:00:00'),
(55, 'gallery', '17076922_1397885136900295_4402714397525409792_n.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `page_content`
--

CREATE TABLE `page_content` (
  `id` int NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `datetime` datetime NOT NULL,
  `updated_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `page_content`
--

INSERT INTO `page_content` (`id`, `page_name`, `content`, `datetime`, `updated_datetime`) VALUES
(1, 'About-Us', '<p>skdjshds dusdj sd sjd</p>\r\n', '0000-00-00 00:00:00', '2017-08-16 18:03:05'),
(2, 'Term And Condition', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Privacy policy', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Contact-Us', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `direccion_destino` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `direccion_origen` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_destino` date NOT NULL,
  `fecha_origen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `category_id`, `user_id`, `post_image`, `body`, `status`, `created_at`, `direccion_destino`, `direccion_origen`, `fecha_destino`, `fecha_origen`) VALUES
(6, 'Lorem Ipsum', 'lorem-ipsum', 3, 1, 'Jellyfish.jpg', '<p><em>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc</em>.</p>\r\n', 1, '2017-08-03 15:56:07', '', '', '0000-00-00', '0000-00-00'),
(7, 'Blog Post New', 'blog-post-new', 1, 2, 'noimage.jpg', '<p><span style=\"font-family:Times New Roman,Times,serif\"><em>Aliquam sed ornare dui. In sollicitudin dolor a varius venenatis. Nam eu purus id felis venenatis dictum sit amet eu neque. Sed congue tortor egestas, volutpat nisl ac, congue nunc. Fusce ut euismod massa, ornare scelerisque dui. Mauris vitae lectus eu lacus sagittis sodales at et enim. Suspendisse nisl lacus, imperdiet eget congue ut, sodales vel ex. Nam ut faucibus dui, vel fringilla leo. Duis laoreet, ex non ultricies molestie, justo erat scelerisque mauris, ut tristique sapien nisi sit amet velit. Quisque pulvinar lectus odio. Donec a nulla sed dui blandit ultrices eu et libero.</em></span></p>\r\n', 1, '2017-08-03 15:59:09', '', '', '0000-00-00', '0000-00-00'),
(8, 'aaa', 'aaa', 1, 0, '', '', 0, '2021-10-25 12:47:41', 'aaaa', 'aaaa', '2018-07-22', '2018-07-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `cat_id` int NOT NULL,
  `sku` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `save_price` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `img_alt_tag` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `tag` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` int NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_tag` varchar(255) NOT NULL,
  `meta_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `user_id`, `cat_id`, `sku`, `name`, `quantity`, `price`, `save_price`, `color`, `image`, `img_alt_tag`, `short_description`, `description`, `tag`, `size`, `datetime`, `status`, `meta_title`, `meta_tag`, `meta_desc`) VALUES
(1, 1, 0, 'GSS34523', '', '', '', '', '', '', '', '', '', '', '', '2017-08-14 20:51:39', 0, '', '', ''),
(2, 1, 5, 'ABC123', 'Dressing table', '12', '2999', '1', 'RED', 'bd2_6f5_636_330-1-original.jpg', '', 'Dressing table', '<p>Dressing table</p>\r\n', 'Woodland White Tshirts', 'medium', '2017-08-16 23:33:26', 1, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_images`
--

CREATE TABLE `product_images` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `file_name`) VALUES
(6, 1, 'tshirts2.jpg'),
(7, 1, 'tshirt.jpg'),
(8, 1, 'imagesaaaa.jpg'),
(9, 1, 'imagesaa.jpg'),
(10, 2, 'bd2_6f5_636_330-1-original.jpg'),
(11, 2, 'command.png'),
(12, 2, 'yyyy.jpg'),
(13, 2, 'yy.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sco`
--

CREATE TABLE `sco` (
  `id` int NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sco`
--

INSERT INTO `sco` (`id`, `page_name`, `title`, `keywords`, `description`) VALUES
(1, 'Home', 'Home', '', 'Homess'),
(2, 'About-Us', 'About-Us', '', ''),
(3, 'Gallery', '', '', ''),
(4, 'Contact-Us', '', '', ''),
(5, 'Term And Condition', '', '', ''),
(6, 'Privacy Policy', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `site_config`
--

CREATE TABLE `site_config` (
  `id` int NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `logo_img` varchar(255) NOT NULL,
  `site_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `site_config`
--

INSERT INTO `site_config` (`id`, `site_name`, `logo_img`, `site_title`) VALUES
(1, 'E commerce Site', 'yadi-ci-logo.png', 'E commerce Site');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders_img`
--

CREATE TABLE `sliders_img` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sliders_img`
--

INSERT INTO `sliders_img` (`id`, `title`, `description`, `image`, `status`) VALUES
(1, 'A Furniture Shops', 'A Furniture Shops', 'YADU_Logo.JPG', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE `teams` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `teams`
--

INSERT INTO `teams` (`id`, `name`, `designation`, `description`, `image`, `status`, `created_at`) VALUES
(1, 'Team Php', 'Developer1', '<p><tt><span style=\"font-family:Courier New,Courier,monospace\">Team -- Integer tincidunt odio et imperdiet luctus. Donec id sapien est. Ut consequat magna nunc, sit amet mollis nulla pretium ac. Proin rhoncus, sem id aliquet interdum, orci augue bibendum sem, id venenatis nisi sapien quis ipsum. Sed mollis finibus eros, in cursus nulla tempor ut. Mauris pretium sapien sit amet ultricies consectetur. Nullam nisl massa, condimentum nec nunc sit amet, ullamcorper mattis metus. Sed ut malesuada nulla, vel hendrerit magna. </span></tt></p>\r\n', 'Penguins.jpg', 2, '2017-08-16 19:09:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `domain` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `domain`, `description`, `image`, `status`, `created_at`) VALUES
(1, 'New Testimonial', 'www.testimonial.com', '<p><strong>Edited </strong>-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci ex, finibus vitae nunc eu, accumsan luctus metus. Curabitur magna sapien, porta et vulputate id, finibus et sapien. Fusce a varius leo, eget vestibulum velit. Ut tristique, arcu ac scelerisque iaculis, elit quam dictum sem, in sagittis justo augue sed sapien. Pellentesque mollis orci in consequat euismod. Donec sodales nisi ut diam tempus viverra. Aliquam eu efficitur velit, a sollicitudin enim. Nulla posuere ullamcorper dolor quis dapibus. Vivamus maximus purus in urna feugiat, vel ornare felis tristique. Mauris pretium faucibus metus, ut pharetra ligula bibendum ultricies. Nullam volutpat turpis vitae interdum varius. Quisque viverra dictum magna nec eleifend. Pellentesque a purus purus.</p>\r\n\r\n<p>Nunc eget vestibulum mi. In hac habitasse platea dictumst. Fusce vitae mauris sed eros volutpat porta. Sed blandit ultrices velit nec porta. Suspendisse lobortis nisl ut nisi viverra fermentum. Duis volutpat pretium consectetur. Morbi ornare ante metus. Phasellus vitae erat enim. Cras vulputate congue neque a suscipit. Integer facilisis fringilla gravida. Mauris id molestie neque, quis varius tellus. Aenean eu nisl et justo accumsan feugiat. Sed in porttitor mauris. Etiam non dui ac ipsum ullamcorper imperdiet. Etiam eget viverra enim, vel tempus urna.</p>\r\n', 'Lighthouse.jpg', 0, '2017-08-17 14:34:03'),
(3, 'New Testimonial2', 'www.testimonial2.com', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci ex, finibus vitae nunc eu, accumsan luctus metus. Curabitur magna sapien, porta et vulputate id, finibus et sapien. Fusce a varius leo, eget vestibulum velit. Ut tristique, arcu ac scelerisque iaculis, elit quam dictum sem, in sagittis justo augue sed sapien. Pellentesque mollis orci in consequat euismod. Donec sodales nisi ut diam tempus viverra. Aliquam eu efficitur velit, a sollicitudin enim. Nulla posuere ullamcorper dolor quis dapibus. Vivamus maximus purus in urna feugiat, vel ornare felis tristique. Mauris pretium faucibus metus, ut pharetra ligula bibendum ultricies. Nullam volutpat turpis vitae interdum varius. Quisque viverra dictum magna nec eleifend. Pellentesque a purus purus.</p>\r\n\r\n<p>Nunc eget vestibulum mi. In hac habitasse platea dictumst. Fusce vitae mauris sed eros volutpat porta. Sed blandit ultrices velit nec porta. Suspendisse lobortis nisl ut nisi viverra fermentum. Duis volutpat pretium consectetur. Morbi ornare ante metus. Phasellus vitae erat enim. Cras vulputate congue neque a suscipit. Integer facilisis fringilla gravida. Mauris id molestie neque, quis varius tellus. Aenean eu nisl et justo accumsan feugiat. Sed in porttitor mauris. Etiam non dui ac ipsum ullamcorper imperdiet. Etiam eget viverra enim, vel tempus urna.</p>\r\n', 'supPro.png', 1, '2017-08-17 15:27:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int NOT NULL,
  `zipcode` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `username`, `contact`, `address`, `gender`, `image`, `role_id`, `zipcode`, `dob`, `status`, `register_date`) VALUES
(1, 'Administrator', 'ynandan55@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'yadu', '9898989898', 'Admin Nagar', 'Male', 'YADU_Logo.JPG', 1, '23232', '1990-08-03', 1, '2017-08-18 16:16:38'),
(4, 'Yadu nandan', 'ynandan55@yahoo.com', 'f925916e2754e5e03f75dd58a5733251', 'yadu123', '9898989898', 'durga nagar asas', 'Male', 'slide_05.jpg', 2, '23232', '1990-08-03', 1, '2017-08-09 18:49:15'),
(8, 'Astha Sharma', 'itech1694astha@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 'astha123', '9898989898', 'Tikamgarh', 'Female', 'bd2_6f5_636_330-1-original.jpg', 2, '454545', '1990-08-03', 1, '2017-08-09 18:51:06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `page_content`
--
ALTER TABLE `page_content`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`user_id`);

--
-- Indices de la tabla `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sco`
--
ALTER TABLE `sco`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `site_config`
--
ALTER TABLE `site_config`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sliders_img`
--
ALTER TABLE `sliders_img`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `page_content`
--
ALTER TABLE `page_content`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `sco`
--
ALTER TABLE `sco`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `site_config`
--
ALTER TABLE `site_config`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sliders_img`
--
ALTER TABLE `sliders_img`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
