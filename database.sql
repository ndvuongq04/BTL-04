-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: btl_04
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ct_don_hang`
--

DROP TABLE IF EXISTS `ct_don_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_don_hang` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_don_hang` bigint DEFAULT NULL,
  `id_san_pham` bigint DEFAULT NULL,
  `so_luong` int DEFAULT NULL,
  `gia` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ct_don_hang_don_hang` (`id_don_hang`),
  KEY `fk_ct_don_hang_san_pham` (`id_san_pham`),
  CONSTRAINT `fk_ct_don_hang_don_hang` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id`),
  CONSTRAINT `fk_ct_don_hang_san_pham` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_don_hang`
--

LOCK TABLES `ct_don_hang` WRITE;
/*!40000 ALTER TABLE `ct_don_hang` DISABLE KEYS */;
INSERT INTO `ct_don_hang` VALUES (53,32,15,2,59000);
/*!40000 ALTER TABLE `ct_don_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_gio_hang`
--

DROP TABLE IF EXISTS `ct_gio_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct_gio_hang` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_gio_hang` bigint DEFAULT NULL,
  `id_san_pham` bigint DEFAULT NULL,
  `so_luong` bigint DEFAULT NULL,
  `gia` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ct_gio_hang_san_pham` (`id_san_pham`),
  KEY `fk_ct_gio_hang_gio_hang` (`id_gio_hang`),
  CONSTRAINT `fk_ct_gio_hang_gio_hang` FOREIGN KEY (`id_gio_hang`) REFERENCES `gio_hang` (`id`),
  CONSTRAINT `fk_ct_gio_hang_san_pham` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_gio_hang`
--

LOCK TABLES `ct_gio_hang` WRITE;
/*!40000 ALTER TABLE `ct_gio_hang` DISABLE KEYS */;
INSERT INTO `ct_gio_hang` VALUES (79,26,25,1,59000),(80,27,12,1,29000);
/*!40000 ALTER TABLE `ct_gio_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `don_hang`
--

DROP TABLE IF EXISTS `don_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `don_hang` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_nguoi_dung` bigint DEFAULT NULL,
  `tong_tien` float DEFAULT NULL,
  `dia_chi` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `sdt` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `ten` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `trang_thai` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_don_hang_nguoi_dung` (`id_nguoi_dung`),
  CONSTRAINT `fk_don_hang_nguoi_dung` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `don_hang`
--

LOCK TABLES `don_hang` WRITE;
/*!40000 ALTER TABLE `don_hang` DISABLE KEYS */;
INSERT INTO `don_hang` VALUES (32,7,118000,'hà nội','1234567890','vuong','choDuyet');
/*!40000 ALTER TABLE `don_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gio_hang`
--

DROP TABLE IF EXISTS `gio_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gio_hang` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_nguoi_dung` bigint DEFAULT NULL,
  `so_luong_sp` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gio_hang_nguoi_dung` (`id_nguoi_dung`),
  CONSTRAINT `fk_gio_hang_nguoi_dung` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gio_hang`
--

LOCK TABLES `gio_hang` WRITE;
/*!40000 ALTER TABLE `gio_hang` DISABLE KEYS */;
INSERT INTO `gio_hang` VALUES (25,4,0),(26,7,1),(27,35,1);
/*!40000 ALTER TABLE `gio_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nguoi_dung`
--

DROP TABLE IF EXISTS `nguoi_dung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nguoi_dung` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_vai_tro` int DEFAULT NULL,
  `ho_ten` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `gioi_tinh` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `so_dien_thoai` varchar(50) DEFAULT NULL,
  `dia_chi` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `ten_dang_nhap` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `mat_khau` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nguoi_dung_vai_tro` (`id_vai_tro`),
  CONSTRAINT `fk_nguoi_dung_vai_tro` FOREIGN KEY (`id_vai_tro`) REFERENCES `vai_tro` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nguoi_dung`
--

LOCK TABLES `nguoi_dung` WRITE;
/*!40000 ALTER TABLE `nguoi_dung` DISABLE KEYS */;
INSERT INTO `nguoi_dung` VALUES (4,1,'user','NU','12344444','hà nội','user','123456'),(7,2,'admin','NAM','123','123','admin','123'),(35,2,'nguyen van a','nu','1234567890','Ba vì / Hà nội','admin44','123'),(37,2,'nguyen van an','nam','123','hà nội','123','123');
/*!40000 ALTER TABLE `nguoi_dung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `san_pham`
--

DROP TABLE IF EXISTS `san_pham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `san_pham` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `ten` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `loai` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `so_luong` int DEFAULT NULL,
  `gia` float DEFAULT NULL,
  `mo_ta` text,
  `anh` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `trang_thai` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `san_pham`
--

LOCK TABLES `san_pham` WRITE;
/*!40000 ALTER TABLE `san_pham` DISABLE KEYS */;
INSERT INTO `san_pham` VALUES (12,'Cà Phê Đen Đá','CaPhe',34444,29000,'                       Ngày thêm dịu êm với Bạc Xỉu Lắc Hạnh Nhân Nướng. Cà phê phin Robusta đượm hương “lắc tới bến” cùng sữa yến mạch sánh mịn, Hạnh Nhân Nướng thơm bùi và đá đập mát lạnh. Lắc trước rồi hớp, hớp trực tiếp từ nắp lại càng ngon. *Để giữ trọn vị, Bạc Xỉu Lắc luôn được phục vụ với định lượng đá và độ ngọt không đổi.                       ','1733320125_cf4.png',1),(13,'Bơ Arabica','CaPhe',50,49000,'  Bơ sáp Đắk Lắk dẻo quẹo hòa quyện cùng Cà phê Arabica Cầu Đất êm mượt. Khuấy đều để thưởng thức hương vị tươi tỉnh, đầy mới lạ!  ','1733320187_cf5.png',0),(14,'Đường Đen Sữa Đá','CaPhe',100,45000,'Nếu chuộng vị cà phê đậm đà, bùng nổ và thích vị đường đen ngọt thơm, Đường Đen Sữa Đá đích thị là thức uống dành cho bạn. Không chỉ giúp bạn tỉnh táo buổi sáng, Đường Đen Sữa Đá còn hấp dẫn đến ngụm cuối cùng bởi thạch cà phê giòn dai, nhai cực cuốn. - Khuấy đều trước khi sử dụng','1733322215_cf6.png',0),(15,'Trà Sữa Oolong Nướng Sương Sáo','CaPhe',300,59000,'Tận hưởng hương vị Oolong nướng đậm đà được Nhà rang kỹ càng, quyện cùng sữa thơm béo, càng thêm hấp dẫn với sương sáo thanh mát.','1733631612_cf7.png',1),(18,'Bạc Sỉu','CaPhe',12,29000,'Bạc sỉu chính là \"Ly sữa trắng kèm một chút cà phê\". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.','1733676970_cf2.png',1),(19,'Hi Tea Đào','Tra',50,49000,'Sự kết hợp ăn ý giữa Đào cùng trà hoa Hibiscus, tạo nên tổng thể hài hoà dễ gây “thương nhớ” cho team thích món thanh mát, có vị chua nhẹ.','1734279586_tra5.png',1),(20,'Hi Tea Vải','Tra',50,49000,'Chút ngọt ngào của Vải, mix cùng vị chua thanh tao từ trà hoa Hibiscus, mang đến cho bạn thức uống đúng chuẩn vừa ngon, vừa healthy.','1734279622_tra4.png',1),(21,'Hi Tea Đào','Tra',233,49000,'Sự kết hợp ăn ý giữa Đào cùng trà hoa Hibiscus, tạo nên tổng thể hài hoà dễ gây “thương nhớ” cho team thích món thanh mát, có vị chua nhẹ.\r\n\r\n','1734279646_tra3.png',1),(22,'Trà Đào Cam Sả Đá','Tra',123,49000,'Vị thanh ngọt của đào, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này.','1734279679_tra2.png',1),(23,'Oolong Tứ Quý Dâu Trân Châu','Tra',234,49000,'Sảng khoái với vị dâu chín mọng chua thanh. Nền trà Oolong Tứ Quý đậm hương, ngọt thanh hậu vị. Thêm tận hưởng với trân châu trắng giòn dai.\r\n\r\n','1734279701_tra1.png',1),(24,'Frosty Choco Chip','traiCayXayLanh',123,59000,'Đá Xay Frosty Choco Chip, thử là đã! Lớp whipping cream bồng bềnh, beo béo lại có thêm bột sô cô la và sô cô la chip trên cùng. Gấp đôi vị ngon với sô cô la thật xay với đá sánh mịn, đậm đà đến tận ngụm cuối cùng.','1734279937_cay6.png',1),(25,'Frosty Cà Phê Đường Đen','traiCayXayLanh',1234,59000,'Đá Xay Frosty Cà Phê Đường Đen mát lạnh, sảng khoái ngay từ ngụm đầu tiên nhờ sự kết hợp vượt chuẩn vị quen giữa Espresso đậm đà và Đường Đen ngọt thơm. Đặc biệt, whipping cream beo béo cùng thạch cà phê giòn dai, đậm vị nhân đôi sự hấp dẫn, khơi bừng sự hứng khởi trong tích tắc.\r\n\r\n','1734279968_cay5.png',1),(26,'Frosty Bánh Kem Dâu','traiCayXayLanh',1234,59000,'Bồng bềnh như một đám mây, Đá Xay Frosty Bánh Kem Dâu vừa ngon mắt vừa chiều vị giác bằng sự ngọt ngào. Bắt đầu bằng cái chạm môi với lớp kem whipping cream, cảm nhận ngay vị beo béo lẫn sốt dâu thơm lừng. Sau đó, hút một ngụm là cuốn khó cưỡng bởi đá xay mát lạnh quyện cùng sốt dâu ngọt dịu. Lưu ý: Khuấy đều phần đá xay trước khi dùng','1734280008_cay4.png',1),(28,'Frosty Cà Phê Đường Đen','traiCayXayLanh',1234,59000,' Đá Xay Frosty Cà Phê Đường Đen mát lạnh, sảng khoái ngay từ ngụm đầu tiên nhờ sự kết hợp vượt chuẩn vị quen giữa Espresso đậm đà và Đường Đen ngọt thơm. Đặc biệt, whipping cream beo béo cùng thạch cà phê giòn dai, đậm vị nhân đôi sự hấp dẫn, khơi bừng sự hứng khởi trong tích tắc.\r\n\r\n ','1734280057_cay2.png',1),(29,'Frosty Phin Gato','traiCayXayLanh',50,55000,' Đá Xay Frosty Phin-Gato là lựa chọn không thể bỏ lỡ cho tín đồ cà phê. Cà phê nguyên chất pha phin truyền thống, thơm đậm đà, đắng mượt mà, quyện cùng kem sữa béo ngậy và đá xay mát lạnh. Nhân đôi vị cà phê nhờ có thêm thạch cà phê đậm đà, giòn dai. Thức uống khơi ngay sự tỉnh táo tức thì. Lưu ý: Khuấy đều phần đá xay trước khi dùng\r\n\r\n ','1734280078_cay1.png',1),(30,'sữa tươi ba vì','traiCayXayLanh',50,123,'  adfdsds àdsf sdff   ','1734850974_chi-can-ban-du-tin-nhung-dieu-ban-nghi-cung-co-the-thanh-su-that.jpg',0),(31,'Cà Phê Đen Đá','Tra',50,12,'Cà Phê Đen Đá Cà Phê Đen Đá Cà Phê Đen Đá ','1734865092_anhBauTroi.jpg',0),(32,'sữa tươi ba vì','Tra',9999,9999,'demo ','1734955238_chi-can-ban-du-tin-nhung-dieu-ban-nghi-cung-co-the-thanh-su-that.jpg',0),(33,'123','traiCayXayLanh',123,123,'123','1735148389_gg.jpg',1);
/*!40000 ALTER TABLE `san_pham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vai_tro`
--

DROP TABLE IF EXISTS `vai_tro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vai_tro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vai_tro`
--

LOCK TABLES `vai_tro` WRITE;
/*!40000 ALTER TABLE `vai_tro` DISABLE KEYS */;
INSERT INTO `vai_tro` VALUES (1,'USER'),(2,'ADMIN');
/*!40000 ALTER TABLE `vai_tro` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-26  0:43:44
