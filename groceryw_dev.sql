-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2025 at 10:34 AM
-- Server version: 10.6.21-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `groceryw_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='tbl_category';

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `name`, `description`, `image`, `created_date`) VALUES
(1, '', '', 'banner_1_338164894.jpeg', '2025-03-05 09:02:53'),
(2, '', '', 'banner_2_1563369215.jpeg', '2025-03-05 09:03:10'),
(3, '', '', 'banner_3_70416637.png', '2025-03-05 09:31:28'),
(4, '', '', 'banner_4_1628845994.png', '2025-03-05 09:31:38'),
(5, '', '', 'banner_5_962805902.jpeg', '2025-03-05 09:31:51'),
(6, '', '', 'banner_6_1009637633.jpeg', '2025-03-05 09:32:02'),
(7, '', '', 'banner_7_1739367253.jpeg', '2025-03-05 09:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `is_check_out` tinyint(1) DEFAULT 0,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='tbl_products';

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `user_id`, `product_id`, `quantity`, `price`, `is_check_out`, `created_date`) VALUES
(1, 3, 171, 1, '140', 1, '2025-03-09 20:02:15'),
(2, 3, 164, 3, '261', 1, '2025-03-09 20:02:49'),
(3, 3, 149, 2, '270', 1, '2025-03-09 20:34:40'),
(4, 3, 157, 2, '150', 1, '2025-03-10 22:55:55'),
(5, 3, 169, 1, '85', 1, '2025-03-10 22:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='tbl_category';

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `description`, `image`, `created_date`) VALUES
(1, 'Grocery', '', 'masala.jpg', '2025-01-21 21:00:12'),
(2, 'House cleaning', '', 'home.jpg', '2025-01-21 21:00:12'),
(3, 'Personal and Baby Care', '', 'care.jpg', '2025-01-21 21:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT 0,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='tbl_products';

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `user_id`, `product_id`, `quantity`, `price`, `is_delete`, `created_date`) VALUES
(1, 3, 149, 2, '90', 0, '2025-03-10 22:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='tbl_products';

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `name`, `category_id`, `image`, `description`, `price`, `created_date`) VALUES
(2, 'Aashirvaad Atta', 1, 'ata1.jpg', 'Superior MP Atta 0% Maida 100% Atta', '50', '2025-01-19 03:30:17'),
(3, 'Saffola oil', 1, 'oil2.jpg', 'Saffola Total is a blended edible oil made from rice bran and safflower oil. It is clinically tested to help manage cholesterol and improve heart health. Ingredients Refined rice bran oil, Refined sunflower kardi seed oil, Antioxidants, Anti-foaming agent, and Vitamins A and D.', '200', '2025-02-20 04:24:15'),
(4, 'Idli ', 1, 'rady_item2.jpg', 'In a bowl, uniformly mix Rice Idli mix with 300 ml of water. Blend well to form a smooth and uniform batter, allow the batter to stand for 10 â€“ 15 minutes.\r\nGrease an Idli mould with oil, add spoonful of batter to each idli plates and steam the batter in an idli vessel for 12 minutes.', '80', '2025-02-20 04:31:06'),
(5, 'Aachi Diet Dosa', 1, 'rady_item3.jpg', 'Aachi Rice Dosa Breakfast Mix 1 kg is a combination of rice and lentils to prepare a crispy pancake.This product is processed in a facility that also processes products that contains sesame, sulfite, gluten, mustard, peanuts, tree nuts, soy, and milk.', '100', '2025-02-20 04:33:50'),
(6, 'Tata Cooking Soda', 1, 'besan2.jpg', 'Unleash your culinary creativity with Tata I Shakti Cooking Soda! This 100 g pack is an essential kitchen ingredient, perfect for all your baking adventures. Let your imagination run wild as you use this versatile baking soda as a leavening agent. Elevate your culinary delights, from fluffy dhoklas and idlis to delicious pancakes and cake bases. Tata I Shakti Cooking Soda is your go-to partner for creating light and airy baked goods.', '80', '2025-02-20 04:35:08'),
(7, 'Eastern Chilli Powder', 1, 'powder3.jpg', 'Eastern Chilli Powder is made from freshly ground top-grade red chillies, ensuring superior taste and flavour. Made without any additives or preservatives, Eastern Chilli Powder is a natural spice that elevates your cooking.', '100', '2025-02-20 04:44:55'),
(8, 'Turmeric powder', 1, 'powder2.jpg', 'Enjoy the rich taste of Tata Sampann Turmeric Powder in all your favourite dishes.Every pack carries the promise of an active ingredient called curcumin.These spices have the natural oils in the spices intact thus offering you sampann goodness', '80', '2025-02-20 04:47:01'),
(9, 'Catch Garam masala', 1, 'masala2.jpg', 'Catch Garam Masala is used extensively in Indian cuisine to add colour, flavourful aroma and an earthy-spiciness to vegetables, meats, curries and gravies.Garam masala can be combined with any other Indian spices for a stronger taste.', '80', '2025-02-20 04:49:10'),
(10, 'Red Label Tea', 1, 'tea.jpg', 'Red Label Natural Care is a tasty masala tea with 5 ayurvedic ingredients such as ginger, tulsi, cardamom, mulethi & ashwagandha. Contains only natural ingredients. Mulethi is known to help soothe the throat and ashwagandha to help with stress.', '60', '2025-02-20 04:59:19'),
(11, 'Dabur Chyawanprash', 1, 'chyawanprash.jpg', 'Dabur Chyawanprash is an Ayurvedic health supplement that is made from a combination of herbs and minerals. It is intended to boost immunity and promote long-term health. Dabur Chyawanprash also contains Giloy, Pippali, Ashwagandha, Haritaki, and more. People of all ages, including children, adults, and the elderly.', '100', '2025-02-20 05:01:02'),
(12, 'NescafÃ© Coffee', 0, 'coffee.jpg', 'NescafÃ© products are designed to capture the natural aroma and flavor of each coffee bean. NescafÃ© works with farmers to improve their practices and distribute coffee plantlets. NescafÃ© is working on creating recyclable sachets and fully recyclable cartons.', '100', '2025-02-20 05:02:23'),
(13, 'NescafÃ© Coffee', 1, 'coffee_2136933768.jpg', 'NescafÃ© products are designed to capture the natural aroma and flavor of each coffee bean. NescafÃ© works with farmers to improve their practices and distribute coffee plantlets. NescafÃ© is working on creating recyclable sachets and fully recyclable cartons.', '100', '2025-02-20 05:03:31'),
(14, 'Honey', 1, 'honey.jpg', 'Honey is a sweet, viscous fluid made by honey bees from plant nectar. It\'s a natural sweetener that can be used in place of sugar. Honey is also used as an anti-inflammatory, antioxidant, and antibacterial agent. Honey is mostly made of glucose and fructose, two simple sugars. It also contains smaller amounts of other sugars, like maltose, sucrose, and turanose.', '100', '2025-02-20 05:05:22'),
(15, 'Basmati rice', 1, 'rice.jpg', 'Basmati rice is a long-grain rice that\'s known for its aroma, flavor, and texture. It\'s a staple in many Indian dishes and is also popular in the Middle East and South Asia. Basmati rice has a distinct, enticing aroma that\'s often described as nutty, floral, and slightly sweet. The word \"basmati\" comes from Hindi and means \"fragrant\" or \"full of aroma\".', '120', '2025-02-20 05:06:48'),
(16, 'Organic Moong Dal', 1, 'dal.jpg', 'Organic moong dal is a bean or seed from the legume family that is grown without chemical fertilizers or pesticides. It is a staple of Indian cuisine and is high in protein and fiber.  Grown without chemical fertilizers or pesticides.  Can be used in soups, salads, dals, and curries.', '100', '2025-02-20 05:13:27'),
(17, 'Organic Mix Dal', 1, 'dal1.jpg', 'Organic mix dal is a blend of organic lentils that\'s high in protein, fiber, and nutrients. It\'s a good source of plant-based protein and can be used in many dishes. Ingredients Arhar dal, Chana dal, Masoor dal, Moong dal, and Urad dal. Mix Dal is a blend of various types of lentils and pulses that are grown without chemical pesticides or fertilizers.', '80', '2025-02-20 05:16:13'),
(18, 'Chana Dal', 1, 'dal2.jpg', 'Tata Sampann Chana Dal is an unpolished, high-protein dal that is a staple of the Indian diet. It is made from select grains and is known for its rich flavor and aroma.  Tata Sampann Chana Dal is not polished with water, oil, or leather.  Chana dal is nutritious and easy to digest.', '80', '2025-02-20 05:19:02'),
(19, 'Mung Beans', 1, 'dal3.jpg', 'Mung Beans are small green legumes which are also known as â€œGreen Bean or Bean Sproutsâ€. It is mostly cultivated in Asia and the subcontinent. From Mung Beans you can find Mung Dal Split With Skin, and Mung Dal Split Without Skin.', '80', '2025-02-20 05:31:04'),
(20, 'Organics Black eyed peas', 1, 'dal4.jpg', 'Rani organics black eyed peas They help thicken soups, stews and curries as they cook. They boast an earthy flavor and a soft yet firm texture that makes them an ideal addition to recipes from salads and stir-fries to grain bowls and soups.', '80', '2025-02-20 05:33:21'),
(21, 'Organic Kala Chana', 1, 'dal5.jpg', 'Rani Organic Kala Chana (Desi Chickpeas with Skin) 28oz (800g) PET Jar ~ All Natural | Vegan | Gluten Friendly | NON-GMO | USDA Certified Organics \r\nAashirvaad Superior MP Atta, 10kg, 100% Whole Wheat Flour, 0% Maida', '80', '2025-02-20 05:38:12'),
(22, 'Black Beans', 1, 'dal6.jpg', 'Black Beans are seasoned with a flavorful blend of salt, onion powder, spices, garlic powder and more. Their rich taste and excellent texture lends itself to a variety of delicious recipes. They are great for soups, stews, dips, spreads or as an addition to casseroles and other vegetable and meat dishes.', '80', '2025-02-20 05:40:36'),
(23, 'Mung dal', 1, 'dal7.jpg', 'Mung dal which is very high in protein and low in fat, is perfect for preparing a dal that is both healthy and delicious. Mung Dal, a split and blanched mung bean that then resembles yellow lentils, is used in a variety of traditional Indian vegetable dishes.', '80', '2025-02-20 05:43:28'),
(24, 'Rani Organics Sabudana', 1, 'dal8.jpg', 'Rani organics sabudana 100% Natural, No preservatives, Non-GMO, Gluten Friendly PREMIUM Gourmet Food Grade Sago. Sabudana is a versatile ingredient used to make both sweet and savoury dishes. It is most commonly used in North Indian fasting dishes such as sabudana khichdi, sabudana vada, sabudana kheer, sabudana chiwda, etc.', '80', '2025-02-20 05:44:47'),
(25, 'Rani Poha', 1, 'poha.jpg', 'Rani Poha Thin Rice flakes are prepared by flattening peeled rice. This flattened rice or pressed rice provides a light, healthy and delicious Indian snack and breakfast dish. Rice is parboiled before flattening so that poha can be consumed with very little to no cooking.', '100', '2025-02-20 05:45:57'),
(26, 'Organic Caraway seeds', 1, 'seeds1.jpg', 'Organic caraway seeds, also known as shah jeera, are a spice that are dark brown or black in color and have a ridged appearance. They have a strong aroma and a complex flavor that is often described as a combination of anise, dill.', '90', '2025-02-20 05:48:09'),
(27, 'Organic fenugreek seeds', 1, 'seeds2.jpg', 'Organic fenugreek seeds are small, brown, slightly rectangular-shaped seeds from the Trigonella foenum-graecum plant, known for their distinct maple-like aroma and taste, often used in cooking as a spice, particularly in Indian cuisine, and traditionally used in herbal medicine due to their potential benefits for regulating blood sugar, stimulating lactation, and easing menstrual cramps; when grown organically, they are cultivated without synthetic pesticides or fertilizers.', '100', '2025-02-20 05:50:08'),
(28, 'Rani Sesame Seeds', 1, 'seeds3.jpg', 'Rani Sesame Seeds one of the initial oil seeds known to humankind, sesame seeds have been widely employed in culinary as well as their traditional health benefits. Sesame plant is a tall annual herb in the Pedaliaceae family, which grows extensively in Asia, particularly in Burma, China, and India.', '80', '2025-02-20 05:51:56'),
(29, 'Organic Black seeds', 1, 'seeds4.jpg', 'Desi Earth Organic Black Mustard Seeds are a spice with a pungent, spicy flavor and aroma. They are part of the Brassica plant species and are rich in nutrients like selenium, iron, zinc, and calcium. ', '80', '2025-02-20 05:55:10'),
(30, 'Everest Hing Powder', 1, 'seeds5.jpg', 'Everest Hing-Asafoetida Powder is a staple in Indian kitchens, prized for its pungent aroma and flavour-enhancing properties. Derived from the resin of the asafoetida plant, it adds a unique umami depth to dishes.', '50', '2025-02-20 05:56:17'),
(31, 'Organic Ajwain', 1, 'seeds6.jpg', 'Pristine fields of gold ajwain\" refers to a picturesque image of a vast, clean, and expansive field of mature ajwain (also known as carom seeds) plants, where the golden-colored seeds are fully ripe and ready for harvest, creating a visually stunning sight akin to a field of gold.', '80', '2025-02-20 06:01:48'),
(32, 'Organic Almonds', 1, 'dry1.jpg', 'Organic unsalted almonds are crunchy, flavorful almonds that are grown without harmful chemicals. They are a healthy snack that can be eaten raw or roasted, and can be used in sweet and savory recipes.', '200', '2025-02-20 06:03:09'),
(33, 'Organic Pistachios', 1, 'dry2.jpg', 'Nichols Farms Pistachios Fresh Roasted Inshell Pistachio - Nutrient Rich Nuts Snack Packs - Non-GMO, California Grown Nut Pistachios - Healthy, Lightly Salted, Party Snack Organic Roasted with Sea Salt.', '200', '2025-02-20 08:19:07'),
(34, 'Organic Cashew', 1, 'dry3.jpg', 'Organic Cashew nuts supplied by Aryan are known for being a rich source of minerals like potassium, magnesium, copper, iron, manganese, zinc and many others, thus eating a handful of cashew nuts daily ensures proper body growth and development, good body metabolism and help to cure any deficiencies in body.', '200', '2025-02-20 08:21:05'),
(35, 'Black raisins', 1, 'dry4.jpg', 'Black raisins are dried black grapes that are rich in vitamins, minerals, and antioxidants. Black raisin is made by drying out black Corinth seedless grapes under the sun', '150', '2025-02-20 08:28:31'),
(36, 'Afghani Anjeer', 1, 'dry5.jpg', 'Afghani anjeer also known as dried figs, is a sweet, chewy fruit that is a member of the mulberry family. It is a healthy snack that is high in fiber, vitamins, and minerals.', '220', '2025-02-20 08:30:03'),
(37, 'Green Raisins', 1, 'dry6.jpg', 'King Uncle Green Raisins\" are a brand of seedless, naturally dried green raisins, typically marketed as \"Kandhari Kishmish,\" known for their consistent quality, clean processing, and are often used as a snack or added to baking and cooking due to their sweet taste and plump texture; they are usually packed in a resealable pouch to maintain freshness.', '120', '2025-02-20 08:31:49'),
(38, 'Organic Walnuts', 1, 'dry7.jpg', 'Foods Alive organic walnuts are non-GMO, high in omega-3s, iron, and magnesium, and are a good source of nutrition', '100', '2025-02-21 10:59:01'),
(39, 'Apricots', 1, 'dry8.jpg', 'Good Sense apricots are typically described as plump, juicy, and brightly colored apricots with a sweet, slightly tart flavor, often considered a good quality choice for fresh eating or drying due to their consistent size and sweetness; they are a reliable source of vitamins like Vitamin A and fiber, contributing to overall health benefits.', '120', '2025-02-21 11:00:13'),
(40, 'Saffola Masala Oats', 1, 'oats.jpg', 'Saffola Masala Oats is a vegetarian, wholegrain oat cereal that combines spices, vegetables, and oats. It\'s a quick and easy snack that can be eaten in a variety of ways.', '90', '2025-02-21 11:11:32'),
(41, 'Govind Milk powder', 1, 'milk_powder.jpg', 'Govind milk powder is a milk powder brand that offers whole milk powder and skimmed milk powder. It\'s made from pasteurized and homogenized milk, and is a good source of protein, calcium, and vitamins.', '80', '2025-02-21 11:12:48'),
(42, 'Eno', 1, 'eno.jpg', 'Eno is India\'s No. 1 Antacid Brand. Eno Regular Antacid Sachet is used for the symptomatic relief of acidity, heartburn, acid indigestion, sour stomach and an upset stomach. Eno Regular Antacid provides fast relief from acidity & gets to work in 6 secs by neutralising excess stomach acid.', '68', '2025-02-21 11:14:03'),
(43, 'Tata Salt', 1, 'salt.jpg', 'Tata Salt is a vacuum-evaporated iodized salt that\'s made from sea brine and is hygienically packed. It\'s India\'s first national branded iodized salt.', '45', '2025-02-21 11:21:41'),
(44, 'Organic Saffron', 1, 'saffron.jpg', 'Handpicked organic saffron is a spice that comes from the saffron crocus flower and is hand-picked from organic farms. It\'s a premium quality spice that\'s rich in antioxidants and has a unique flavor and aroma.', '150', '2025-02-21 11:23:23'),
(45, 'Nutri Coconut', 1, 'coconut.jpg', 'Coconuts are a nutritious fruit that contain fiber, protein, minerals, and medium-chain fatty acids (MCFAs). They are high in calories and saturated fat, but also have many potential health benefits.', '90', '2025-02-21 11:25:02'),
(46, 'Organic Jaggery ', 1, 'jaggery.jpg', 'Sri Tattva Organic Jaggery  is a natural sweetener made from organic sugarcane. It is a dark brown, granular powder that can be used in place of sugar in cooking and beverages.', '80', '2025-02-21 11:28:39'),
(47, 'Mother\'s Mixed Pickle', 1, 'pickle.jpg', 'Mother\'s Recipe Mixed Pickle is a pickle made with a variety of vegetables, spices, and condiments. It\'s a product of Desai Foods Pvt. Ltd., an ethnic food brand.', '65', '2025-02-21 11:36:42'),
(48, 'Sevardhan Supari', 1, 'supari.jpg', 'Sevardhan Supari\" refers to a specific, high-quality variety of betel nut (also called \"supari\" in Hindi) known for its rich flavor, satisfying crunch, and aromatic profile, often considered a premium choice for chewing due to its meticulous processing and taste.', '55', '2025-02-21 11:38:39'),
(49, 'Organic Black pepper', 1, 'black_paper.jpg', 'Organic black pepper is a spice that comes from dried berries of the Piper nigrum plant. It has a pungent, spicy taste and is used in many cuisines. It\'s also used in traditional medicine.', '85', '2025-02-21 11:40:30'),
(50, 'Green Cardamom', 1, 'cardamom.jpg', 'Green cardamom is a spice that comes from the ginger family and is known for its strong aroma and flavor. It\'s also called \"true cardamom\" or \"Ceylon cardamom\".', '99', '2025-02-21 11:42:15'),
(51, 'Star Anise', 1, 'star_anise.jpg', 'The Spice Way Star Anise is a premium spice that can be used for baking, cooking, and tea. It\'s made from premium star anise and is available in whole and ground forms.', '89', '2025-02-21 11:51:31'),
(52, 'Cloves', 0, 'clove.jpg', 'Cloves are a pungent warm spice with an intense flavor and aroma. The flavor comes from the compound eugenol. On the tongue, you\'ll detect sweetness, bitterness, and astringency (drying the mouth), with a noticeable amount of heat. Similar warm spices include nutmeg, cinnamon, and allspice.', '85', '2025-02-21 11:53:01'),
(53, 'Organic Nutmeg', 1, 'nutmeg.jpg', 'Organic whole nutmeg is a spice that comes from the seed of the Myristica fragrans tree. It has a warm, aromatic, and slightly sweet flavor.', '98', '2025-02-21 11:54:21'),
(54, 'Cinnamon', 1, 'cinnamon.jpg', 'Cinnamon is a spice that comes from the inner bark of certain trees in the Cinnamomum genus. It has a sweet, woody flavor with a slight citrus note.', '100', '2025-02-21 11:54:59'),
(55, 'Bay leaves', 1, 'bay_leaves_787314564.jpg', 'Bay leaves are aromatic, dried leaves from the bay laurel tree that are used to flavor soups, stews, and other dishes. They are also known as laurel leaves.', '75', '2025-02-21 11:56:20'),
(56, 'Makhana', 1, 'makhana.jpg', 'Gajdant Fox Nut Makhana, also known as phool makhana, popped lotus seeds, or gorgon nuts, are a popular and nutritious snack in India. Makhana is derived from the seeds of the lotus flower and is known for its numerous health benefits.', '80', '2025-02-24 03:30:51'),
(59, ' Ajwa Dates', 1, 'dates_1670660805.jpg', 'Wholesome First Ajwa Dates are a type of date fruit known for being soft, chewy, and mildly sweet, with hints of licorice or chocolate caramel. They are rich in nutrients, offering several potential health benefits', '120', '2025-02-24 11:12:03'),
(60, 'Bournvita', 1, 'bournvita.jpg', 'Bournvita is a chocolate malt drink mix that contains vitamins and minerals. It\'s made by Cadbury and is sold in many countries, including India.', '110', '2025-02-24 11:20:53'),
(61, 'Ensure Protein', 1, 'ensure.jpg', 'Ensure protein drinks are high-protein nutritional shakes that contain vitamins and minerals. They are designed to support muscle mass, bone health, and energy.', '128', '2025-02-25 11:43:09'),
(62, 'Balaji Simply Salted Wafers', 1, 'chips.jpg', 'Balaji Simply Salted Wafers are potato chips produced by Balaji Wafers, an Indian snack food company. The ingredients are potato, edible vegetable oil, and iodized salt. The true essence of potato wafers is the ideal combination of potato and salt, deep-fried to make it crispy and delicious.', '20', '2025-02-25 11:45:30'),
(63, 'Balaji Masala Masti Wafers', 1, 'c1.jpg', 'Balaji Masala Masti is a flavor of potato chips produced by Balaji Wafers, an Indian snack food company. These chips are known for their spicy and tangy flavor, derived from a blend of spices and condiments including chili powder, dry mango powder, coriander powder, cumin powder, black pepper powder, ginger powder, and clove powder. The ingredients are listed as potato, edible vegetable oil, sugar, spices and condiments, iodized salt, and black salt. ', '20', '2025-02-25 01:52:14'),
(64, 'Ramdev Aloo Sev', 1, 'aloosev.jpg', 'Ramdev Aloo Sev is a crispy, crunchy Indian snack made from potatoes, spices, and flour. It is also known as aloo bhujia or potato sev.', '50', '2025-02-25 01:54:29'),
(65, 'Kurkure Masala Munch', 1, 'kurkur.jpg', 'Kurkure Masala Munch is a classic Kurkure flavour, offering a perfect blend of spice and crunch. This delicious snack delivers a tantalizing taste experience, making it an ideal companion for any time of the day.', '30', '2025-02-25 02:03:36'),
(66, 'Balaji Masala Sev Mamra', 1, 'sev1.jpg', 'Balaji Masala Sev Mamra refers to a popular Indian snack produced by Balaji Wafers, consisting of a mix of crunchy puffed rice (mamra or murmura) combined with crispy fried sev (thin gram flour noodles) and a blend of spices.', '10', '2025-02-25 02:14:37'),
(67, 'Bingo Mad Angles', 1, 'bingo.jpg', 'Bingo Mad Angles Achaari Masti\" describes a crunchy, triangle-shaped snack chip from the Bingo brand, featuring a distinct flavor profile that mimics the taste of authentic Indian mango pickles (\"achaar\"), made from a corn, rice, and flour base, offering a unique texture with a tangy, spicy kick in every bite.', '20', '2025-02-25 02:23:21'),
(68, 'Maggi 2-Minute Masala Noodles', 1, 'maggie.jpg', 'Maggi 2-Minute Masala Noodles is a popular instant noodle product in India. It consists of dried noodles and a \"tastemaker\" sachet containing a blend of spices. The ingredients typically include wheat flour, vegetable oil, salt, mineral salts, and vegetable gum for the noodle cake, while the tastemaker contains mixed spices, hydrolyzed peanut protein, sugar, onion powder, corn starch, and other flavorings.', '89', '2025-02-25 02:26:08'),
(69, 'YiPPee! Magic Masala noodles', 1, 'yippe.jpg', ' Sunfeast YiPPee! Magic Masala noodles, an instant noodle product. The packet is predominantly red and orange, with the brand name \"Sunfeast\" at the top and \"YiPPee!\" in large, stylized letters. The words \"Magic Masala\" are written in blue below the brand name.', '78', '2025-02-25 02:28:26'),
(72, ' Bhujia Sev', 1, 'bhujiya_1265910054.jpg', 'Haldiram\'s Bhujia Sev is a savory Indian snack made primarily from tepary bean flour, gram flour, and spices. It is a popular and crispy snack, often enjoyed as a tea-time treat or as a topping for dishes like upma, poha, and chaat. The ingredients typically include tepary beans flour, vegetable oil, gram pulse flour, iodized salt, and a blend of spices such as black pepper, ginger, clove, mace, nutmeg, and cardamom. ', '99', '2025-02-26 11:25:22'),
(73, 'Doritos Tangy Cheese', 1, 'doritos.jpg', 'Doritos Tangy Cheese is a flavored tortilla chip produced by Frito-Lay. The ingredients include corn, vegetable oil, and tangy cheese flavoring.', '20', '2025-02-26 11:30:28'),
(74, 'Lay\'s Potato Chips', 1, 'lays.jpg', 'Lay\'s potato slices, a whole potato, tomato pieces, garlic, and chili peppers, representing the flavor ingredients. The Lay\'s logo is prominently displayed in the center.', '30', '2025-02-26 11:32:05'),
(75, 'Balaji Pop Rings', 1, 'popring1.jpg', 'Balaji Pop Rings Masala is a snack food product made by Balaji Namkeen, an Indian snack food company. The product is described as corn puff rings with masala flavor.', '20', '2025-02-26 11:32:55'),
(76, 'Britannia Milk Bikis ', 1, 'bikis1.jpg', 'Britannia Milk Bikis are biscuits made by Britannia Industries, an Indian food products company. These biscuits are known for being enriched with milk and are often targeted towards children. They are described as having a sweet and milky flavor. The ingredients include wheat flour, sugar, refined oil, and milk solids, and they are fortified with vitamins and calcium.', '78', '2025-02-26 11:35:53'),
(77, ' Black Bourbon Choco', 1, 'burbon.jpg', 'Parle Hide & Seek Black Bourbon Choco is a chocolate creme sandwich cookie. It consists of two thin, dark chocolate-flavored biscuits with a chocolate buttercream filling. The packaging highlights \"Pure Dark Indulgence\" and \"Richness of Cocoa\". The ingredients include wheat flour, sugar, cocoa solids, and vanilla flavoring. ', '99', '2025-02-26 11:37:30'),
(79, 'Britannia Good Day', 1, 'goodday1.jpg', 'Britannia Good Day Choco-Chip Cookies are sprinkled with delectable chocolate chips all over it for lovers of chocolate. Every bite of Good Day Choco-Chip promises to offer a crunchy crumble of biscuit contrasted with melt in mouth choco chips.', '75', '2025-02-26 11:40:59'),
(80, 'Britannia Fruity Fun Cake', 1, 'cake.jpg', 'Britannia Gobbles Fruity Fun Cake is a 100% vegetarian snack. It is made with refined wheat flour, sugar, eggs, edible hydrogenated vegetable oil, maltose syrup, edible starch, fruit products, iodized salt, preservatives, acidity regulator, baking powder, raising agent, and artificial flavoring substances like vanilla and mixed fruit. It contains bits of cherry, pineapple, and citrus fruits. It is available in various sizes, including 45g, 55g, 60g, and 110g packs. ', '86', '2025-02-26 11:43:49'),
(81, 'Dark Fantasy Choco', 1, 'fantacy_1892113350.jpg', 'Sunfeast Dark Fantasy Choco Fills are described as rich, dark, crunchy cookies with a gooey, molten chocolate crÃ¨me center, sometimes with a hint of coffee. Some varieties have almonds and cashews on the outside with a chocolate and hazelnut crÃ¨me filling. The ingredients typically include a multigrain flour mix, sugar, choco cream, and cocoa solids.', '85', '2025-02-26 11:44:32'),
(82, ' Hide & Seek Chocolate ', 1, 'hide&seek.jpg', 'Each cookie is filled with decadent chocolate flavour. Hide & Seek Chocolate Chip Cookies are packed with delicious chocos which are not hidden in real and gets melted soon after you eating in your mouth. Made from wheat flour that makes it a combination of taste and health.', '87', '2025-02-26 11:46:36'),
(83, 'Marie Gold Biscuits', 1, 'mariegold.jpg', 'Britannia Marie Gold Biscuits are crisp and light biscuits packed with the goodness of vitamins and minerals. Being low fat and zero cholesterol snacks, Marie Gold biscuits act as a perfect companion for your cup of tea.', '76', '2025-02-26 11:48:01'),
(84, 'Parle G Gold Biscuits', 1, 'parle.jpg', 'Parle G Gold Gluco Biscuits are a popular snack known for their rich, buttery flavour and crisp texture. Made from high-quality ingredients, these biscuits are enjoyed by all age groups. Ideal for tea-time or a quick snack, they offer a satisfying taste and a delightful crunch.', '48', '2025-02-26 11:49:33'),
(85, 'Chocolate Cake Roll', 1, 'cake1.jpg', 'Britannia Cake Roll Yo! Triple Chocolate Swiss Roll is a delightful combination of smooth chocolate cream with fluffy and spongy cake. Every bite of these delicious, chocolaty rolls entices you for more and more. The satisfying and rich taste of triple chocolate swiss roll gives a mouth-watering experience.', '85', '2025-02-26 11:51:51'),
(86, 'Monaco Biscuit', 1, 'monaco.jpg', 'Parle Monaco is a crispy, light, and salty snack, often enjoyed with tea, especially by those who prefer savory biscuits. It is described as a classic and regular snack. The ingredients include wheat flour, sugar, edible vegetable oils, leavening agents, salt, yeast, zeera, invert syrup, acid regulators, dough conditioner, emulsifier, amylases, and enzymes.', '35', '2025-02-26 12:00:17'),
(87, 'Cadbury Dairy Milk Silk', 1, 'choco.jpg', 'Cadbury Dairy Milk Silk logo and flavor name printed on the front. The packaging also indicates that the cocoa used is \"100% SUSTAINABLY SOURCED COCOA.\" Nutritional information is provided on some of the wrappers, such as the Hazelnut bar having 91 calories (5% of GDA) per 16g serving and the Oreo bar having 111 calories (6% of GDA) per 20g serving. ', '210', '2025-02-26 02:17:45'),
(88, 'Kit Kat', 1, 'kitkat1.jpg', 'Kit Kat is a chocolate bar consisting of wafer layers separated and covered by an outer chocolate layer. Standard bars have two or four pieces (\"fingers\") that can be broken off individually. The slogan \"Have a break, have a Kit Kat\".', '72', '2025-02-26 02:20:03'),
(89, 'Cadbury 5 Star', 1, 'star.jpg', 'Cadbury 5 Star is a chocolate bar produced by Cadbury and is described as a \"caramel and nougat\" mix covered in milk chocolate. It is sold in a golden wrapper with stars. The ingredients include non-hydrogenated vegetable fat, sugar, skimmed milk powder, and cocoa powder. ', '10', '2025-02-26 02:21:28'),
(90, 'Cadbury Perk', 1, 'perk1.jpg', 'Cadbury Perk, a combination of chocolate-coated wafer and delicious Cadbury milk chocolate that enlivens your mood and adds sweet moments to your day. Munch on these chocolate bars for a delicious break from a boring day.', '10', '2025-02-26 02:22:56'),
(92, 'Harpic Toilet Cleaner', 2, 'harpic_2062533040.jpg', 'Harpic Disinfectant Toilet Cleaner is the one stop shop for all toilet cleaning needs. Unlike ordinary cleaners, it combines the benefits of Tough stain removal^, 99.9% germ kill and Freshness. The result is a sparkling clean, hygienic, fresh and germ free toilet without any malodour with every use of Harpic.', '199', '2025-02-27 04:58:04'),
(93, 'Harpic Bathroom Cleaner', 2, 'harpic1.jpg', 'Harpic Disinfectant Bathroom Cleaner in lemon scent is a cleaning product designed for bathrooms. It comes in a 500ml bottle and claims to kill 99.9% of germs while providing 10x better cleaning compared to standard cleaners. It is suitable for use on various bathroom surfaces like tiles, floors, and basins. The formula is designed to remove tough stains and leave a fresh lemon fragrance. ', '89', '2025-02-27 05:02:35'),
(94, 'Ariel Matic liquid', 2, 'ariel.jpg', 'Ariel Matic liquid detergent removes tough stains in just 1 wash and protects your colored clothes from fading. As a liquid detergent, it dissolves easily in water, which means your clothes maintain brightness without any residue.', '160', '2025-02-27 05:14:06'),
(95, 'Colin Glass & Multisurface Cleaner', 2, 'colin.jpg', 'Colin Glass & Multisurface Cleaner is a cleaning product designed for glass and other surfaces. It promises a \"sparkling shine\" and \"hygienically cleans\". It can be used on various surfaces such as glass, wash basins, toilets, window grills, pipes, taps, bathtubs, showers, fridges, ovens, kitchen cabinets, ceramic floors, and wall tiles. It is applied by spraying directly on the surface and wiping clean with a cloth. ', '45', '2025-02-27 05:16:53'),
(97, 'Tide Detergent Washing Powder', 2, 'tide1_1051858416.jpg', 'Tide Ultra 3 in 1 Clean Detergent Washing Powder is a laundry detergent designed for use in semi-automatic washing machines and for hand washing. It claims to offer Tide\'s best clean and comes in powder form. The packaging indicates it is suitable for both semi-automatic machines and hand washing. It is available in sizes such as 1 kg and 2 kg. ', '99', '2025-02-27 05:33:20'),
(98, ' Dettol Liquid Handwash', 2, 'dettol.jpg', 'The product shown is Dettol Original Germ Defence Liquid Handwash, which comes in a white bottle with a green pump. It claims to kill 99.99% of illness-causing germs and is recommended by the Indian Medical Association. \r\n', '195', '2025-02-27 05:49:51'),
(99, 'Vim Dishwash Gel', 2, 'vim.jpg', 'The image shows a 2L mega value pack of Vim Dishwash Gel with tropical lemon freshness, designed to remove odor and grease in one wash. The packaging is yellow and features the Vim brand name prominently, along with images of lemons and a dish being washed. The text on the packaging highlights key features like \"Tropical Lemon Freshness\" and \"Odour & Grease Gone in 1 Wash\". ', '120', '2025-02-27 05:51:58'),
(100, 'Dettol Instant Hand Sanitizer', 2, 'sanitizer.jpg', 'Dettol Original Instant Hand Sanitizer is a product designed to kill 99.99% of germs on hands without the need for water. It comes in a 50ml bottle and is intended for use on the go. The sanitizer is rinse-free and non-sticky. It contains 72.34% alcohol by volume and other ingredients, including acrylates and propylene glycol. ', '70', '2025-02-27 05:54:40'),
(101, 'Lifebuoy Handwash ', 2, 'lifeboy.jpg', 'Lifebuoy Total 10 Handwash is an effective way to fight infection causing bacteria and viruses.This enables Lifebuoy to give 99.9% germ protection.', '79', '2025-02-27 09:47:12'),
(102, 'Lysol Clean & Fresh Cleaner', 2, 'lysol.jpg', 'The product shown is Lysol Clean & Fresh Toilet Bowl Cleaner in Lavender Fields scent. It is a clinging gel formula designed to kill 99.9% of germs. The cleaner is packaged in a purple and white bottle with a blue nozzle and features the Lysol brand name prominently on the front.', '99', '2025-02-27 09:49:26'),
(103, 'Scotch-Brite Silver Sparks scrub', 2, 'scotchh.jpg', 'The image shows a green and white Scotch-Brite Silver Sparks scrub pad package. The package contains 6 scrub pads designed for cleaning utensils and removing tough stains. The scrub pads are made of nylon with silver particles for effective cleaning.', '55', '2025-02-27 09:51:33'),
(104, 'Vanish Stain Remover Gel', 2, 'vanish.jpg', 'Vanish Oxi Advance Stain and Odour Remover Gel is a laundry product designed to remove stains, prevent color transfer, eliminate odors, and boost hygiene in the wash. It is suitable for use on both colored and white clothing, and even delicates like silk and wool.', '95', '2025-02-27 09:53:29'),
(105, 'Surf Excel Liquid Detergent ', 2, 'surfxl.jpg', 'Surf Excel Matic Front Load Liquid Detergent is a one of its kind detergent liquid whose cleaning action and superior fragrance is much sought after. Surf Excel matic liquid with a powerful cleaning technology penetrates stains faster and removes tough stains in machines itself.', '120', '2025-02-27 09:56:01'),
(106, 'Godrej Ezee Liquid Detergent', 2, 'ezee.jpg', 'Godrej Ezee Liquid Detergent is designed for gently cleaning and softening winter wear, chiffon, and silks. It comes in a bottle with a blue and white argyle pattern and is Woolmark certified. The detergent is suitable for use on all materials and has a pH-neutral, no-soda formula.', '135', '2025-02-27 09:57:09'),
(107, ' Comfort Liquid', 2, 'comfort.jpg', 'The Comfort Pro Formula fabric softener Blue Skies ensures long-lasting freshness and exceptional softness for all types of fabric. It gives textiles a pleasantly soft feel and a long-lasting, fresh fragrance.', '145', '2025-02-27 09:59:02'),
(108, 'Colgate toothpaste', 2, 'colgate.jpg', 'Colgate Strong Teeth toothpaste is designed to strengthen teeth and protect them from cavities. It contains calcium and fluoride to reinforce tooth enamel and prevent decay. The toothpaste also helps to remineralize weakened enamel and fight plaque, promoting healthier gums.', '98', '2025-02-27 10:43:53'),
(109, 'Sensodyne toothpaste', 2, 'sensodine.jpg', 'Sensodyne Sensitivity & Gum toothpaste is a dual-action toothpaste designed to protect against tooth sensitivity and improve gum health. It contains ingredients like stannous fluoride and potassium nitrate. It works by building a protective layer over sensitive areas to relieve sensitivity and targets and removes plaque bacteria to help reduce gum problems. ', '110', '2025-02-27 10:45:42'),
(110, 'Patanjali Dant Kanti', 2, 'dantkanti.jpg', 'Patanjali Dant Kanti is a natural toothpaste that aims to provide comprehensive oral care. It is formulated with herbal extracts, including neem, clove, babool, and mint. It helps to prevent tooth pain, bad breath, and gum problems. It is also effective against dental issues like gingivitis, pyorrhea, toothache, bleeding gums, and yellowing of teeth. ', '89', '2025-02-27 10:55:28'),
(111, 'Lifebuoy germ protection soap', 2, 'lifeboy1.jpg', 'Lifebuoy Total 10 is a germ protection soap that aims to provide 100% better protection against germs. It contains an \"activ naturol shield\" and is marketed as the world\'s number one hygiene soap brand. ', '79', '2025-02-27 10:58:56'),
(112, 'Dettol Soap', 2, 'dettol1.jpg', 'Dettol Antibacterial Original Bar Soap is a gentle soap with antibacterial action to wash away dirt and bacteria. Dermatologically tested & suitable for the whole family, this bar soap is formulated with moisturising ingredients and pine fragrance to leave you feeling clean and refreshed all day.', '79', '2025-02-27 11:00:15'),
(113, 'Wheel Active 2-in-1', 2, 'wheel.jpg', 'Wheel Active 2-in-1 Green Detergent Powder is a laundry detergent designed to remove visible dirt and kill invisible bacteria, while also leaving a fresh, floral scent on clothes.', '89', '2025-02-27 11:24:29'),
(114, 'Rin Detergent Powder', 2, 'rin.jpg', 'The image shows a pack of Rin Antibac Detergent Powder, which claims to remove up to 99.9% of germs. Detergent powders are cleaning agents used for washing laundry and usually contain surfactants and other chemical compounds. Major raw materials used in making detergent powder include soda ash, carboxy methyl chloride, sodium perborate, lather-forming chemicals, colors, and perfumes.', '82', '2025-02-27 11:25:45'),
(115, 'Ghadi Detergent', 2, 'ghadi.jpg', 'Ghadi detergent removes dirt from clothes, thereby removing dullness. It ensures tough stain removal. It has a pleasant fragrance. It is suitable for whites and colored clothes. It dissolves completely leaving no residue on your clothes.', '86', '2025-02-27 11:26:27'),
(116, 'Kala HIT ', 2, 'hit.jpg', 'Instant mosquito and flying insect killer spray for killing dangerous mosquitoes and houseflies by reaching even the deepest corners of your house. Kala HIT mosquito and insect killer spray is also available in lime fragrance.', '98', '2025-02-28 01:03:14'),
(117, 'Good Knight Power Activ+', 2, 'goodnight.jpg', 'Good Knight Power Activ+ is described as a technologically advanced mosquito repellent system designed for home use. It includes a liquid vaporizer and refill, offering protection against mosquitoes that may carry diseases like Malaria, Chikungunya, and Dengue.', '75', '2025-02-28 01:04:24'),
(118, 'Savlon Antiseptic Liquid', 2, 'savlon.jpg', 'Savlon Antiseptic Liquid is a disinfectant used for first aid, personal hygiene, and cleaning minor wounds like cuts and grazes. It contains chlorhexidine gluconate and cetrimide as active ingredients, which help to kill bacteria and prevent infection.', '99', '2025-02-28 01:05:41'),
(119, 'HIT Anti Roach Gel', 2, 'hitgel.jpg', 'HIT Anti Roach Gel, a simple do-it-yourself pest control solution. It is an innovative gel formulation that attracts and kills cockroaches and their nests. The gel has special ingredients which attract cockroaches.', '58', '2025-02-28 01:14:54'),
(120, 'Odonil Zipper air fresheners', 2, 'odonil.jpg', 'Odonil Zipper air fresheners: The package is yellow and white with a purple and pink design. It advertises \"5 Powerful Fragrances\" and states that \"each pack lasts until 30 days.\" The five fragrances depicted are:Orchid, Citrus, Lavender, Floral, Sand.', '85', '2025-02-28 01:16:23'),
(121, 'Goodknight Fabric Roll-On', 2, 'rollon.jpg', 'Goodknight Fabric Roll-On is a new personal mosquito repellent. It is made using 100% natural and plant-based ingredients such as citronella and eucalyptus oils and is applied on clothes, not skin. By just applying 4 coin-sized dots on your clothes.', '99', '2025-02-28 01:17:34'),
(122, 'Odonil Room Spray', 2, 'odonil1.jpg', 'Odonil Room Spray in Lavender Mist scent. The can is white with a purple and pink floral design. The brand name \"Odonil\" is printed in blue, and the words \"ROOM SPRAY\" and \"Lavender MIST\" are printed below in smaller fonts. The top of the can is translucent purple with a hole for hanging. ', '110', '2025-02-28 01:18:44'),
(123, 'Goodknight Fast paper card', 2, 'card.jpg', 'Goodknight Fast card is a special paper card that has TFT dots on it. On lighting it, the TFT molecules linger in the air, providing instant relief from the mosquitoes.', '65', '2025-02-28 01:19:40'),
(124, 'Godrej Aer Matic air freshener', 2, 'freshner.jpg', 'Godrej Aer Matic air freshener kit, including the automatic dispenser and a refill can. The refill can is labeled \"Violet Valley Bloom\" and contains 2200 sprays. The dispenser is black with a grey sensor area and a green light indicator. The product is designed for both home and car use. It releases fragrance at regular intervals, providing a consistent scent experience. The device can be set to spray at 10, 20, or 40-minute intervals and can last up to 60 days.', '350', '2025-02-28 01:20:23'),
(126, 'Pampers diapers ', 3, 'dpamper.jpg', 'Pampers diapers are made from soft cloth-like material which is gentle on delicate skin and they also contain Aloe Vera extracts which are known for their soothing properties.', '150', '2025-02-28 03:40:44'),
(127, 'Vicks BabyRub', 3, 'babyrub.jpg', 'Vicks BabyRub is a non-medicated ointment that is designed to soothe and moisturize a baby\'s skin. It contains aloe vera, coconut oil, and fragrances of lavender and rosemary.', '99', '2025-02-28 03:41:19'),
(128, 'NIVEA Sun cream Kids', 3, 'suncream.jpg', 'NIVEA SUN Kids Ultra Protect & Play Lotion protects children\'s delicate skin against sunburn and long-term UV damage. This formula with Dexpanthenol supports the skin\'s protective barrier, provides long-lasting moisture and immediate, long-lasting water resistance.', '85', '2025-02-28 03:50:04'),
(129, 'Johnson s Baby Oil Gel', 3, 'oilgel.jpg', 'Johnson s Baby Oil Gel with Cocoa Butter provides all the benefits of Johnson s Baby Oil in a concentrated gel form for long-lasting miniaturization. It contains Cocoa Butter known for its skin nourishing properties.', '110', '2025-02-28 03:51:31'),
(130, 'Nivea Baby Cream', 3, 'cream.jpg', 'Nivea has developed the Baby My First Cream for babies to provide the skin with sufficient moisture. Vegan and hypoallergenic, it pampers the face and body with almond oil and essential vitamins. Perfect for everyday care and when travelling.', '78', '2025-02-28 03:52:50'),
(131, 'Johnson s Baby powder', 3, 'babypowder.jpg', 'Baby powder is an astringent powder used for preventing diaper rash and for cosmetic uses. It may be composed of talc (in which case it is also called talcum powder), corn starch or potato starch. It may contain additional ingredients such as fragrances.', '84', '2025-02-28 03:54:42'),
(132, 'JOHNSON\'S Baby Shampoo', 3, 'shampoo.jpg', 'JOHNSON\'S Baby Shampoo is as gentle to the eyes as pure water and is specially designed to gently cleanse baby\'s delicate hair and scalp.', '100', '2025-02-28 03:55:47'),
(133, 'JOHNSON\'S Baby Lotion', 3, 'lotion.jpg', 'JOHNSON\'S Baby Soft Lotion is a clinically proven mildness formula with coconut oil that leaves your baby\'s skin feeling soft and smooth after just 1 use.', '88', '2025-02-28 03:57:20'),
(134, 'Petite Planet Massage Oil', 3, 'babyoil.jpg', 'Petite Planet Soothing Massage Oil is a baby massage oil with coconut oil from South Asia. It is designed for infant\'s sensitive skin and enhances touch for massages that comfort babies. it\'s recommended to use cold-pressed coconut oil. To massage the baby, start with the legs and arms, then gently turn the baby onto their stomach to massage the back, and finish with the chest and abdomen.', '89', '2025-02-28 04:05:35'),
(135, 'Iodex Balm', 3, 'iodex.jpg', 'Iodex balm is a power packed formula of 5 natural ingredients. Helps provide a warm and soothing effect at the site of pain that helps reduce inflammation and relieves pain.', '45', '2025-02-28 06:38:16'),
(136, 'Moov spray', 3, 'move.jpg', 'Moov spray provides relief from muscle pain, neck and backache, inflammation, sprain, myositis, fibrositis, sciatica or any other kind of spasms in the body. Moov spray is also effective for pain or sprains received during sports or while doing some height weight exercises or running, jogging, etc.', '38', '2025-02-28 06:39:21'),
(137, 'Vicks VapoRub', 3, 'vaporub.jpg', 'Vicks VapoRub is an ointment that\'s rubbed on the throat and chest to relieve a cough. It\'s unsafe for any use in children under 2 years old. In adults and children age 2 and older, use it only on the neck and chest to ease coughing during a cold.', '59', '2025-02-28 06:40:07'),
(138, 'Stayfree', 3, 'stayfree.jpg', 'Stayfree is produces feminine hygiene products like maxi pads and ultra-thin pads. Sanitary pads, also known as sanitary napkins, are designed to absorb menstrual flow. Some pads have \"wings\" that fold over the edges of underwear to keep the pad in place and prevent leaks. \r\n', '89', '2025-02-28 08:28:06'),
(139, 'Lux Jasmine & Vitamin E soap', 3, 'lux1.jpg', 'Lux Jasmine & Vitamin E soap is a product designed for soft, glowing skin, containing 7 beauty ingredients and infused with jasmine and Vitamin E. The soap aims to gently cleanse the skin while leaving it feeling moisturized and smooth.', '55', '2025-02-28 08:32:06'),
(140, 'Santoor Sandal & Turmeric soap', 3, 'santor.jpg', 'Santoor Sandal & Turmeric soap is a bath soap that incorporates sandalwood and turmeric, ingredients known in India for their skincare benefits. It is produced by Wipro Consumer Care and Lighting. It aims to provide smooth, soft, and clear skin while also offering a youthful glow.', '78', '2025-02-28 08:34:27'),
(141, 'Pears Soft & Fresh Soap', 3, 'pears.jpg', 'Pears Soft & Fresh Soap is a moisturising soap with glycerin. It has a refreshing mint fragrance which is perfect for summer. It contains hydrating properties which moisturise your skin and keeps it soft, smooth and glowing. It has no parabens and thus can be used both on the body and face.', '78', '2025-02-28 08:43:27'),
(142, 'Dove Beauty Soap', 3, 'dove1.jpg', 'Dove Beauty Bar is made with 1/4 moisturizing cream to deeply nourish skin and help prevent dryness. This cleansing bar is uniquely created with 1/4 moisturizing cream and a plant-based cleanser for skin care that maintains pH balance and the natural skin barrier.', '89', '2025-02-28 08:44:47'),
(144, 'Nivea Frangipani Shower Gel', 3, 'nivea.jpg', 'Nivea Frangipani & Oil Shower Gel is a shower gel designed to cleanse and moisturize the body. It is enriched with care oil pearls and the scent of frangipani flower, aiming to provide a refreshing and invigorating shower experience.', '85', '2025-02-28 09:04:15'),
(145, 'Lux Body Wash', 3, 'lux.jpg', 'Lux Skin Detox Body Wash with Freesia Scent and Aloe Vera. The bottle is green and features white floral designs. Text on the bottle includes the brand name \"LUX\" in bold letters, followed by \"BODY WASH,\" \"SKIN DETOX,\" and \"FREESIA SCENT & ALOE VERA.\" ', '89', '2025-02-28 09:05:37'),
(146, 'Fiama Shower Gel ', 3, 'fiama.jpg', 'Fiama Cooling Menthol & Magnolia Shower Gel Indulge in a fun, foamy bathing experience with this season\'s cooling range of Menthol & Magnolia showe gel It doesn\'t just keep you cool and refreshed , it also showers love on your skin and keeps you moisturised.', '89', '2025-02-28 09:17:16'),
(147, 'Hydrating Glow Sheet Mask ', 3, 'facemsk.jpg', 'The Super Hydrating Glow Boosting Sheet Mask , An Ingredient Naturally Found In Skin, Floods Skin With Intense, Weightless Hydration. Free Of Mineral Oil And Petrolatum, This Non-Greasy Formula Provides A Soothing Burst Of Hydration And A Fresher, Softer, More Radiant Look.', '85', '2025-02-28 09:19:31'),
(148, 'LakmÃ© Sunscreen', 3, 'lakme_2138477986.jpg', 'LakmÃ© sun expert brings to you a tinted sunscreen, our revolutionary sun protection formula that blends into your skin for an invisible, natural finish.', '95', '2025-02-28 09:33:23'),
(149, 'Mamaearth Sunscreen', 3, 'sunscreen.jpg', 'Mamaearth Ultra Light Indian Sunscreen SPF 50. The sunscreen is designed for sun protection and contains carrot seed and turmeric. The packaging highlights that it is suitable for all skin types, dermatologically tested, and free of silicones and fragrance. ', '90', '2025-02-28 09:35:27'),
(150, 'POND\'S Sunscreen', 3, 'pond.jpg', 'POND\'S Serum-Boost Sunscreen SPF 55 PA++ is a lightweight cream formulated with niacinamide and vitamin C. It provides broad-spectrum protection against UVA and UVB rays, is non-oily, and leaves no white cast. The PA++ rating indicates moderate protection against UVA rays. SPF 55 blocks about 98% of UVB rays, reducing the risk of sunburn.', '92', '2025-02-28 09:37:12'),
(151, 'Garnier Toner', 3, 'gtoner.jpg', 'Garnier Pure Active Daily Pore Reducing Toner Oily To Combination Skin 200ml contains salicylic acid & purifying zinc to clear away blemish-causing germs and reduce pore size. It also helps remove excess oils to leave skin looking beautifully matte.', '80', '2025-02-28 10:30:17'),
(152, 'NIVEA Toner', 3, 'ntoner.jpg', 'NIVEA Refreshing 2-in-1 Milk & Toner for normal and combination skin: Enriched with Vitamin E and Hydramine, this Refreshing Cleansing Milk deeply cleanses and clarifies the skin in one single step. It not only removes make-up, but also intensively moisturises, leaving the skin healthy looking and refreshed.', '85', '2025-02-28 10:30:56'),
(153, 'Nivea Soft RosÃ© lip balm ', 3, 'lipbalm.jpg', 'Nivea Soft RosÃ© lip balm is a lip care product designed to moisturize and soften lips, providing 24-hour melt-in moisture with a subtle rose tint. It contains natural oils and is formulated to be non-greasy and non-sticky.', '59', '2025-02-28 10:32:07'),
(154, 'Vaseline Lotion', 3, 'vaselin.jpg', 'Vaseline Healthy Bright Daily Brightening Even Tone Lotion. The bottle is white with a pink cap and accents. The label highlights the product\'s non-greasy formula and its inclusion of Vaseline Jelly and Vitamin B3.', '82', '2025-02-28 10:35:27'),
(155, 'Pond\'s Body Lotion', 3, 'ponds.jpg', 'Pond\'s Triple Vitamin Moisturising Body Lotion is designed to provide silky, smooth, and soft skin with the help of Vitamins B3, E, and C. It aims to nourish the skin, combat dryness, and promote radiance. ', '86', '2025-02-28 10:36:36'),
(156, 'Nivea Body lotion ', 3, 'ncream.jpg', 'Nivea Body Milk Nutritiva is a body lotion designed for extra dry skin, offering 48-hour moisturization. It contains deep moisture serum and almond oil to nourish and hydrate the skin. The product is available in a 250ml bottle. ', '89', '2025-02-28 10:37:59'),
(157, 'Mamaearth Charcoal Face Wash', 3, 'mface.jpg', 'Mamaearth Charcoal Face Wash is crafted with the natural goodness of Activated Charcoal that helps keep excess oil deposits at bay. As a result, it helps keep the skin refreshed, prevents breakouts, heals acne marks and scars, and keeps you looking fresh all day.', '75', '2025-02-28 10:44:09'),
(158, 'Mamaearth Charcoal Face Scrub', 3, 'scurb.jpg', 'Mamaearth Charcoal Face Scrub is designed for deep exfoliation and is suitable for oily and normal skin types. It contains charcoal and walnut as its main ingredients. It aims to detoxify the skin, remove impurities, and unclog pores.', '80', '2025-02-28 10:44:44');
INSERT INTO `tbl_products` (`id`, `name`, `category_id`, `image`, `description`, `price`, `created_date`) VALUES
(159, 'Medimix Face Wash', 3, 'medimix.jpg', 'Medimix Anti Pimple Cleanser Face Wash is an ayurvedic mix of multani mitti, cinnamon, neem, and turmeric. This soap-free, acne-fighter face wash is suitable for all skin types. It helps in getting rid of blackheads, dark circles and pimple scars. It has anti-ageing properties.', '89', '2025-02-28 10:45:55'),
(160, 'Everyuth Scrub', 3, 'escurb.jpg', 'Everyuth Naturals Exfoliating Walnut Scrub is a skincare product designed to exfoliate the skin, remove dead skin cells, blackheads, and impurities, and promote a clear and glowing complexion.', '82', '2025-02-28 10:47:38'),
(161, 'Garnier Face wash', 3, 'gface.jpg', 'Garnier Vitamin C and lemon, this gel face wash eliminates dirt, dust and impurities, oil from the skin and makes it glow from the inside. It is a mild face wash made with a silicone-free, paraben-free, lightweight gel formula that cleanses your pores without making the skin feel overly dry.', '85', '2025-02-28 10:48:58'),
(162, 'Mamaearth Ubtan', 3, 'mcomb.jpg', 'Mamaearth Ubtan skincare products: Face Wash, Face Scrub, and Face Mask, all featuring turmeric and saffron. the Face Wash and Face Scrub positioned on either side of the Face Mask.', '210', '2025-02-28 10:51:04'),
(163, 'Bajaj Almond Hair Oil ', 3, 'aoil.jpg', 'Bajaj Almond Drops Hair Oil is a non-sticky hair oil enriched with Vitamin E, designed to nourish and strengthen hair. It is suitable for all hair types and lengths. Almond oil, the key ingredient, is known for its hydrating and softening properties, helping to remove dirt, reduce inflammation, and revitalize hair follicles. ', '85', '2025-02-28 11:01:27'),
(164, 'Jasmine Coconut Hair Oil', 3, 'jasmin.jpg', 'Jasmine Coconut Hair Oil is a hair product designed to soften and add shine to hair while providing nourishment. It combines the benefits of coconut oil with the pleasant fragrance of jasmine. ', '87', '2025-02-28 11:02:35'),
(165, 'Mamaearth Onion Shampoo & Conditioner', 3, 'mshampo.jpg', 'Mamaearth Onion Shampoo is enriched with onion, wheat amino acids, plant keratin, and soy amino acids. These ingredients make the hair stronger, smoother, shinier, more elastic, and more manageable.', '150', '2025-02-28 11:04:44'),
(166, 'L\'OrÃ©al Paris Shampoo & Conditioner', 3, 'lshampo.jpg', 'L\'OrÃ©al Paris shampoo and conditioner for dry hair to hydrate, nourish, and revive your locks and say goodbye to lackluster hair. The L\'OrÃ©al Paris 6 Oil Nourish Range will moisturize your hair, leaving it soft, shiny, and manageable â€“ the perfect solution for dry hair.', '130', '2025-02-28 11:05:51'),
(168, 'Sunsilk Black Shine Shampoo ', 3, 'sshampo.jpg', 'Sunsilk Stunning Black Shine Shampoo is designed to nourish hair, enhance shine, and is suitable for all hair types. It contains an Amla Pearl Complex, which rejuvenates hair, leaving it shiny and full. The shampoo aims to make hair look healthy and robust by nourishing weak and damaged strands. ', '89', '2025-02-28 11:13:35'),
(169, 'Sunsilk Conditioner', 3, 'scodi.jpg', 'Sunsilk Lusciously Thick & Long Conditioner is designed to make hair thicker and longer. It contains an activ-mix of keratin, yogurt protein, and macadamia oil. It comes in a pink bottle and is applied after shampooing, focusing on the tips of the hair. ', '85', '2025-02-28 11:14:51'),
(170, 'Dove Shampoo and Conditioner', 3, 'dshampo_495577884.jpg', 'Dove Intensive Repair Shampoo and Conditioner are designed to nourish and repair damaged hair. The shampoo and conditioner contain ingredients that help to restore the hair\'s strength against breakage, making it look healthier over time. They work by repairing signs of surface damage, penetrating hair strands to provide deep nourishment, and renewing lost gloss and vigor. They are formulated for hair that has been exposed to heat styling, sun, or chemical treatments. ', '120', '2025-02-28 11:15:40'),
(171, 'TRESemmÃ© Keratin Shampoo & Conditioner', 3, 'tshampo.jpg', 'TRESemmÃ© Keratin Smooth shampoo and conditioner, featuring a new look, are designed for professional use and contain marula oil. These products aim to provide five benefits in one system: anti-frizz, detangling, shine, softness, and taming fly-aways.', '140', '2025-02-28 11:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(5) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='tbl_user';

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `password`, `email`, `gender`, `mobile_no`, `images`) VALUES
(1, 'misha patel', '2004', 'pmisha1409@gmail.com', 'Female', '6354606816', '5207.jpg'),
(2, 'heer p', '2004', 'pheer1409@gmail.com', 'Female', '6354608616', 'a (2).PNG'),
(3, 'Test User', 'test@12345', 'test@gmail.com', 'Male', '9875643223', 'disney-has6vy47k75d0bzs.jpg'),
(4, 'Test', 'test1@123456', 'test1@gmail.com', 'Male', '9875643210', '1.jpg'),
(5, 'Test 3', 'test2@12345', 'test3@gmail.com', 'Male', '9876543234', 'pikachu-2c7i301s15ihjg55.jpg'),
(6, 'patel sonu M', '241409', 'psonu_1409@gimal.com', 'Female', '6354608616', 'b1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
