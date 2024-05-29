-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_tienda_online
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carrito_compras`
--

DROP TABLE IF EXISTS `carrito_compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito_compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `carrito_compras_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `carrito_compras_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=585 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito_compras`
--

LOCK TABLES `carrito_compras` WRITE;
/*!40000 ALTER TABLE `carrito_compras` DISABLE KEYS */;
INSERT INTO `carrito_compras` VALUES (583,26,158,45.00,2,1),(584,26,167,112.00,2,1);
/*!40000 ALTER TABLE `carrito_compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Portátiles'),(2,'Telefonía'),(3,'Televisores'),(4,'PC Sobremesa'),(5,'Componentes'),(6,'Video Consolas'),(7,'Periféricos'),(9,'Fotografía');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_pedidos`
--

DROP TABLE IF EXISTS `detalle_pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `pedido_id` (`pedido_id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `detalle_pedidos_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  CONSTRAINT `detalle_pedidos_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_pedidos`
--

LOCK TABLES `detalle_pedidos` WRITE;
/*!40000 ALTER TABLE `detalle_pedidos` DISABLE KEYS */;
INSERT INTO `detalle_pedidos` VALUES (172,94,158,45.00,2,1),(173,94,167,112.00,2,1);
/*!40000 ALTER TABLE `detalle_pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (94,26,389.00,'2024-05-28',1);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria_id` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `categoria_id` (`categoria_id`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (64,'iphone 15 pro Max','apple-iphone-15-pro-max-256-gb-titanio-negro','imgServer/65f6d68c7b3cf_apple-iphone-15-pro-max-256-gb-titanio-negro.png',1455.55,2,'2024-04-05',1),(65,'Portátil Asus','Portátil Asus VivoBook Intel Core I5','imgServer/65f6d6d031e1b_Asus_VIVOBOOK.png',649.00,1,'2024-04-04',1),(66,'Portátil Asus g750js','Portátil Asus g750js Intel Core i7 Gaming','imgServer/65f6d7153938e_asus-g750js.png',999.95,1,'2024-04-07',1),(67,'Tarjéta Gráfica Asus','asus-tuf-gaming-rtx-4070-oc-12gb-gddr6x-tarjeta-grafica','imgServer/65f6d74cece57_asus-tuf-gaming-rtx-4070-oc-12gb-gddr6x-tarjeta-grafica.png',467.34,5,'2024-04-05',1),(69,'Playstation 5 Pack','consola-playstation-5-standard-grand-theft-auto-v','imgServer/65f6d7a3e9845_consola-playstation-5-standard-grand-theft-auto-v.png',545.67,6,'2024-04-07',1),(73,'Disco duro','Disco duro Kingstone 2TB','imgServer/65f6d871078d9_discoduro.png',75.00,5,'2024-04-06',1),(75,'Tarjéta Gráfica Gigabyte','gigabyte-rtx-4070-ti-super-windforce-oc-16gb-gddr6x-tarjeta-grafica','imgServer/65f6d8ddd993b_gigabyte-rtx-4070-ti-super-windforce-oc-16gb-gddr6x-tarjeta-grafica.png',599.92,5,'2024-04-04',1),(76,'portátil hp ','HP_15s-fq5100ns Intel CoreI7','imgServer/65f6d918796cd_HP_15s-fq5100nsIntelCoreI7.png',789.99,1,'2024-04-03',1),(77,'Hp Pavilion','HP_Pavilion_Gaming_PC_TG01-2575AMD','imgServer/65f6d954849ee_HP_Pavilion_Gaming_PC_TG01-2575AMD.png',645.00,4,'2024-04-02',1),(78,'Huawey p60 PRO ','Huawey p60 PRO 8gB 256gB RAM','imgServer/65f6d995829a3_huawey p60 pro.png',299.00,2,'2024-04-05',1),(79,'iphone 15 black','iphone 15 black ','imgServer/65f6d9d7bd5b7_iphone-15-black-back.avif',999.00,2,'2024-04-03',1),(81,'Monitor Pc Gaming','Monitor Pc Gaming 27\'\' ','imgServer/65f6da4271081_monitor_pc_gaming.webp',325.00,5,'2024-04-01',1),(83,'Nintendo switch','Nintendo switch Oled','imgServer/65f6db1e31b28_Nintendo_switch_oled.png',356.00,6,'2024-04-03',1),(84,'Ordenador Marx','Ordenador-de-sobremesa-PC-Racing-Ordenador-Gaming-AMD-Ryzen-3-3200G-16GB-480GB-D-Windows-11-Home','imgServer/65f6db75275b1_Ordenador-de-sobremesa-PC-Racing-Ordenador-Gaming-AMD-Ryzen-3-3200G-16GB-480GB-D-Windows-11-Home.png',467.00,4,'2024-04-03',1),(85,'Nintendo switch Oled Pack','pack_nintendo_switchOled_64gb_mario Kart 8 Deluxe','imgServer/65f6dbb1c3167_pack_nintendo_switchOled_64gb_marioKart8Deluxe.png',425.00,6,'2024-04-01',1),(86,'pc sobremesa Voltter','pc sobremesa Voltter xj45y','imgServer/65f6dbf4177d2_pc_sobremesa_2.png',299.00,4,'2024-04-02',1),(87,'phoenix ordenador sobremesa','phoenix-ordenador-sobremesa-gaming-miracles-i5-11600-16gb-1tb-ssd-geforce-rtx-3060-ti-8gb','imgServer/65f6dc2729a6b_phoenix-ordenador-sobremesa-gaming-miracles-i5-11600-16gb-1tb-ssd-geforce-rtx-3060-ti-8gb.png',655.00,4,'2024-04-05',1),(88,'Portátil Asus Gaming','Portátil gaming Asus ROG Strix G15 G513QY-HQ008 AMD R9-5900HX','imgServer/65f6dc49e752b_Portátil gaming Asus ROG Strix G15 G513QY-HQ008 AMD R9-5900HX.png',1225.00,1,'2024-04-06',1),(89,'Portátil Asus ','Portátil Asus ','imgServer/65f6dc7131ec2_portatil_asus.png',460.00,1,'2024-04-05',1),(90,'Portátil Gaming Victus','PortátilGaming_Victus g420','imgServer/65f6dccdcdabc_PortátilGaming_Victus.png',566.00,1,'2024-04-07',1),(91,'portátil hp','portatil-hp-430-g2-i5-5200u8-gb-128-ssdw1013','imgServer/65f6dcf5796e5_portatil-hp-430-g2-i5-5200u8-gb-128-ssdw1013.png',699.95,1,'2024-04-03',1),(92,'portátil MSI ','MSI Pulse 17 B13VGK-477XES- Ordenador portátil Gaming 17.3\" 16:9 FHD, 144Hz (Intel Core i7-13700H, 32GB RAM, 1TB SSD, RTX 4070-8GB, Free Dos) Titanium Gray ','imgServer/65f6dd4c5b6ea_portatil-msi.png',1799.00,1,'2024-04-03',1),(95,'Televisión Samsung','Samsung_Neo_QLED_8K-removebg-preview','imgServer/65f6dddf435fc_Samsung_Neo_QLED_8K-removebg-preview.png',1120.00,3,'2024-04-04',1),(96,'Televisión Samsung Qled','Samsung-86793287-latin-qled-q70a','imgServer/65f6de1361d28_Samsung-86793287-latin-qled-q70a.png',1099.00,3,'2024-04-01',1),(97,'Televisión Samsung Qled2','samsung-series-9-tq65s90catxxc-televisor-165-1-cm-65-4k-ultra-hd-smart-tv-wifi-negro','imgServer/65f6de39e8a2b_samsung-series-9-tq65s90catxxc-televisor-165-1-cm-65-4k-ultra-hd-smart-tv-wifi-negro.jpg',1344.00,3,'2024-04-02',1),(98,'Tarjéta Gráfica MSI','tarjeta grafica_MSI_2-U23145781523YGP-650x455@RC','imgServer/65f6de67dbcef_tarjeta grafica_MSI_2-U23145781523YGP-650x455@RC.png',433.00,5,'2024-04-03',1),(99,'Televisión Xiaomi','TELEVISOR-LED-32_-HD-ANDROID-XIAOMI-L32M7-7AEU','imgServer/65f6de99e3ed8_TELEVISOR-LED-32_-HD-ANDROID-XIAOMI-L32M7-7AEU.png',870.00,3,'2024-04-05',1),(100,'Xbox SeriesX','Xbox SeriesX _1TBssd','imgServer/65f6dec696ded_XboxSeriesX_1TBssd-.png',499.50,6,'2024-04-06',1),(101,'Iphone 15 black 256Gb','Iphone 15 black 256Gb + Protector gel','imgServer/65f71cbfdef00_iphone-15-black-back.avif',1025.00,2,'2024-04-05',1),(111,'Camara canon','camara canon EOS-1300D','imgServer/66004acd749c3_eos_1300d.png',455.00,9,'2024-03-24',1),(113,'Camara Nikon','Camara Nikon D3500','imgServer/66004b313894c_353_1590_D3500_left.png',765.00,9,'2024-03-24',1),(116,'Memoria Ram kingston fury beast','Memoria Ram beast 1448 kingston fury beast rgb ddr5 6000mhz 32gb 2x16gb cl36','imgServer/663cd80da0a50_1448-kingston-fury-beast-rgb-ddr5-6000mhz-32gb-2x16gb-cl36-removebg-preview.png',53.00,7,'2024-05-09',1),(117,'Memoria Ram  Corsair vengeance','Memoria Ram 1147 corsair vengeance ddr5 6200mhz 32gb 2x16gb cl36 negra','imgServer/663cd97cb21fa_1147-corsair-vengeance-ddr5-6200mhz-32gb-2x16gb-cl36-negra-removebg-preview.png',253.00,7,'2024-05-09',1),(118,'Memoria Ram thermaltake','Memoria Ram 1416 thermaltake toughram xg rgb ddr4 4000 2x8gb 16gb cl19 negro','imgServer/663cdabfa2f01_1416-thermaltake-toughram-xg-rgb-ddr4-4000-2x8gb-16gb-cl19-negro-removebg-preview.png',109.00,7,'2024-05-09',1),(119,'Ratón Corsair inalámbrico','corsair raton ironclaw wireless rgb18000','imgServer/663cdcd8ca816_corsair_raton_ironclaw_wireless_rgb18000.png',78.00,7,'2024-05-09',1),(120,'Ratón Forgeon rgb','Ratón Forgeon gaming 1470 forgeon perdition rgb 16000dpi negro comprar removebg preview','imgServer/663cddc4618a1_1470-forgeon-perdition-raton-gaming-rgb-16000dpi-negro-comprar-removebg-preview.png',35.00,7,'2024-05-09',1),(121,'Ratón Trust 1600 dpi','Ratón inalambrico 1973 trust verto ergonomico 1600dpi','imgServer/663cdf10909eb_1973-trust-verto-raton-inalambrico-ergonomico-1600dpi-comprar-removebg-preview.png',31.00,7,'2024-05-09',1),(122,'Ratón Genius NX-7015','1910-genius-nx-7015-raton-inalambrico-1600-dpi-gris','imgServer/663ce0179d71a_1910-genius-nx-7015-raton-inalambrico-1600-dpi-gris-removebg-preview.png',21.00,7,'2024-05-09',1),(123,'Ratón Basilisk negro','Razer Basilisk Ultimate Ratón Gaming 20000DPI Negro','imgServer/663ce105ad9d7_Razer_Basilisk_Ultimate_Ratón_Gaming_20000DPI_Negro-removebg-preview.png',123.00,7,'2024-05-09',1),(124,'Cámara Deportiva sj4000 4k','Cámara Deportiva sj4000 1989 sjcam dual screen camara deportiva 4k wifi','imgServer/663ce1f099f40_1989-sjcam-sj4000-dual-screen-camara-deportiva-4k-wifi-removebg-preview.png',57.00,9,'2024-05-09',1),(125,'Camara CANON EOS-700D','Camara CANON EOS-700D 18-55mm','imgServer/663ce3499e3c6_Camara_CANON_EOS-700D_18-55mm-removebg-preview.png',485.00,9,'2024-05-09',1),(126,'Camara kodak pixpro az425','148-kodak-pixpro-az425-camara-compacta-digital-bridge-20mp-negra','imgServer/663ce4298ea8e_148-kodak-pixpro-az425-camara-compacta-digital-bridge-20mp-negra-removebg-preview.png',241.00,9,'2024-05-09',1),(127,'WebCam Logitech C270','Logitech C270 Webcam Streaming HD, 720p/30fps','imgServer/663ce5225d3ef_Logitech_C270_Webcam_Streaming_HD__720p_30fps-removebg-preview.png',35.00,7,'2024-05-09',1),(128,'WebCam creative live','WebCam 1598 creative live cam sync 1080p v2 webcam usb','imgServer/663ce5ff9bf24_1598-creative-live-cam-sync-1080p-v2-webcam-usb-removebg-preview.png',30.00,7,'2024-05-09',1),(129,'WebCam Scorpion ','1745 scorpion ma mpc01 webcam 1080p','imgServer/663ce6fb22865_1745-scorpion-ma-mpc01-webcam-1080p-removebg-preview.png',24.00,7,'2024-05-09',1),(130,'Edifier WH950NB Auriculares Inalámbricos ','1827-edifier-wh950nb-auriculares-inalambricos-con-cancelacion-de-ruido-activa-negros','imgServer/663ce972130ff_1827-edifier-wh950nb-auriculares-inalambricos-con-cancelacion-de-ruido-activa-negros-removebg-preview.png',171.00,7,'2024-05-09',1),(131,'Phoenix Echo Auriculares Gaming','1295-phoenix-echo-wireless-auriculares-inalambricos-gaming-71-rgb-para-ps5-pc-nintendo-switch-negros','imgServer/663cea35c3e5c_1295-phoenix-echo-wireless-auriculares-inalambricos-gaming-71-rgb-para-ps5-pc-nintendo-switch-negros-removebg-preview.png',45.00,7,'2024-05-09',1),(132,'Auriculares xiomi buds 3','1607-xiaomi-buds-3-auriculares-inalambricos-negros','imgServer/663ceadb417c4_1607-xiaomi-buds-3-auriculares-inalambricos-negros-removebg-preview.png',36.00,7,'2024-05-09',1),(133,'Procesador AMD Ryzen 5','115-amd-ryzen-5-5600-35ghz-box','imgServer/663cebcfe26c8_115-amd-ryzen-5-5600-35ghz-box-removebg-preview.png',135.00,5,'2024-05-09',1),(134,'Procesador Intel core i9','1127-intel-core-i9-14900kf-32-6ghz-box','imgServer/663cec3950a9f_1127-intel-core-i9-14900kf-32-6ghz-box-removebg-preview.png',628.00,5,'2024-05-09',1),(135,'Procesador Intel i5','Intel Core i5-9500 3 GHz 9TH GEN','imgServer/663ced169a102_Intel_Core_i5-9500_3_GHz-removebg-preview.png',203.00,5,'2024-05-09',1),(136,'Procesador Intel Celeron','Procesador Intel Celeron 1246 g5905 350ghz','imgServer/663cedf651e59_1246-intel-celeron-g5905-350ghz-removebg-preview.png',56.00,5,'2024-05-09',1),(137,'Procesador AMD Ryzen 7','Procesador AMD Ryzen 7 2700X 3.7 Ghz','imgServer/663ceeb66a767_Procesador_AMD_Ryzen_7_2700X_3.7_Ghz-removebg-preview.png',189.00,5,'2024-05-09',1),(138,'Teclado mecánico gaming mars','Teclado mecánico gaming mars 1645 mkminiwbres rgb switch marron','imgServer/663cefc759b01_1645-mars-gaming-mkminiwbres-teclado-mecanico-rgb-switch-marron-removebg-preview.png',35.00,7,'2024-05-09',1),(139,'Teclado Corsair k70','Teclado Corsair  k70 mechanical retroiluminado ','imgServer/663cf04165767_corsair_teclado_k70_mechanical.png',176.00,7,'2024-05-09',1),(140,'Teclado corsair K63','Teclado corsair K63 CHERRY MX Red mechanical keyswitches Led','imgServer/663cf09a98653_corsair_K63_teclado.png',265.00,7,'2024-05-09',1),(141,'Teclado inalámbrico newskill Pyros','Teclado inalámbrico newskill Pyros1246 mecanimo gaming rgb inalámbrico switch red outemu','imgServer/663cf17145850_1246-newskill-pyros-teclado-mecanimo-gaming-rgb-inalambrico-switch-red-outemu-removebg-preview.png',109.00,7,'2024-05-09',1),(142,'Disco Duro SSD 500GB','Samsung T7 Disco Duro SSD PCIe NVMe USB 3.2 500GB Negro','imgServer/663cf253ee738_1436-samsung-t7-disco-duro-ssd-pcie-nvme-usb-32-500gb-negro-removebg-preview.png',101.00,7,'2024-05-09',1),(143,'Disco Duro externo WD ','Disco Duro WD 1300 wd elements externo 2tb 25 usb 30','imgServer/663cf38831bc0_1300-wd-elements-disco-duro-externo-2tb-25-usb-30-removebg-preview.png',109.00,7,'2024-05-09',1),(144,'Disco Duro Interno Seagate','Seagate BarraCuda 3.5\" 2TB SATA3','imgServer/663cf45853c54_Seagate_BarraCuda_3.5_2TB_SATA3-removebg-preview.png',107.00,7,'2024-05-09',1),(145,'Fuente de Alimentación L-Link','L-Link Fuente de Alimentación ATX 500W con Cable Incluido','imgServer/663cf58dbc965_L-Link_Fuente_de_Alimentación_ATX_500W-removebg-preview.png',15.00,5,'2024-05-09',1),(146,'Fuente de Alimentación Tempest','Fuente de Alimentación Tempest 1272 psu pro 750w 80 bronze blanca','imgServer/663cf6807673c_1272-tempest-psu-pro-750w-80-bronze-fuente-de-alimentacion-blanca-removebg-preview.png',43.00,5,'2024-05-09',1),(147,'Fuente de Alimentación RM850e','Corsair RMe Series RM850e 850W 80 Plus Gold Modular\r\n','imgServer/663dc99536336_1372-corsair-rm850x-shift-850w-80-plus-gold-modular-f96b9364-ea5e-4716-8caf-896ebda5ad4e-removebg-preview.png',122.00,5,'2024-05-10',1),(148,'Placa Base Gygabyte B760M','Placa Base Gygabyte B760M 1167 gaming x ddr4','imgServer/663dcac7165cf_1167-gigabyte-b760m-gaming-x-ddr4-removebg-preview.png',131.00,5,'2024-05-10',1),(149,'Placa Base Asus 1800 ','Placa Base Asus prime b760 plus d4','imgServer/663dcbbd6bfce_1800-asus-prime-b760-plus-d4-removebg-preview.png',99.00,5,'2024-05-10',1),(150,'Placa Base MSI MPG X570','MSI MPG X570 Gaming Plus  PCIe 4.0, Lightning Gen4 x4 M.2 con accesorio M.2 Shield Frozr, StoreMI, AMD Turbo USB 3.2 GEN2','imgServer/663dccc8e5bd0_MSI_MPG_X570_Gaming_Plus-removebg-preview.png',312.00,5,'2024-05-10',1),(151,'Placa Base MSI MPG X570','Placa Base MSI MAG B760 TOMAHAWK WIFI DDR4 Pentium® Gold y Celeron® de 12.ª y 13.ª generación para zócalo LGA 1700','imgServer/663dcd8650054_1490-msi-mag-b760-tomahawk-wifi-ddr4-review-removebg-preview.png',312.00,5,'2024-05-10',1),(152,'Placa Base Gigabyte GA-Z170-HD3P','Gigabyte GA-Z170-HD3P, una placa base con socket Intel 1151 y chipset Z170','imgServer/663dce975601b_gigabyte-ga-z170-hd3p-removebg-preview.png',99.00,5,'2024-05-10',1),(153,'Placa Base Gigabyte B550 GAMING X V2','Placa base para juegos AMD B550 con solución VRM digital, LAN para juegos GIGABYTE con administración de ancho de banda, PCIe 4.0 / 3.0 x4 M.2, RGB FUSION 2.0, Smart Fan 5, Q-Flash Plus, Diseño de resistencias anti-azufre.','imgServer/663dcf8161eae_1365-gigabyte-b550-gaming-x-v2-removebg-preview.png',129.00,5,'2024-05-10',1),(154,'Placa BaseQ270 Pro BTC+','Asrock Q270 Pro BTC+ está diseñada específicamente para la minería, la revolucionaria criptomoneda digital que se puede usar en cualquier parte del mundo. Las abundantes ranuras PCIe integradas garantizan una criptominería rápida.','imgServer/663dd067a494f_1924-asrock-q270-pro-btc-removebg-preview.png',245.00,5,'2024-05-10',1),(155,'Placa Base AsRock Z790 PRO RS','AsRock Z790 PRO RS Supports 13th Gen & 12th Gen Intel® Core™ Processors\r\n14+1+1 Phase Power Design, Dr.MOS for VCore+GT\r\n4 x DDR5 DIMMs, supports up to 6800+(OC)\r\n1 PCIe 5.0 x16, 1 PCIe 4.0 x16, 2 PCIe 3.0 x1, 1 M.2 Key-E for WiFi','imgServer/663dd2f0c88ab_1859-asrock-z790-pro-rs-removebg-preview.png',240.00,5,'2024-05-10',1),(156,'Micrófono Rode X XDM-100','Rode X XDM-100 Micrófono USB Dinámico Profesional','imgServer/663dd40c9680a_1867-rode-x-xdm-100-microfono-usb-dinamico-profesional-removebg-preview.png',199.00,7,'2024-05-10',1),(157,'Micrófono HyperX SoloCast ','HyperX SoloCast Micrófono de Condensador USB Sensor de silenciamiento con un toque con indicador de estado LED','imgServer/663dd52507d71_1721-hyperx-solocast-microfono-de-condensador-usb-removebg-preview.png',82.00,7,'2024-05-10',1),(158,'EPOS B20 Micrófono USB para Streaming','EPOS B20 Micrófono USB para Streaming El micrófono de streaming USB de varios patrones EPOS B20 es un micrófono de alta calidad y con una buena relación calidad-precio.','imgServer/663deef073ac5_1425-epos-b20-microfono-usb-para-streaming-removebg-preview.png',45.00,7,'2024-05-10',1),(159,'Micrófono Direccional Ligero Rode','Rode Videomic Go II Micrófono Direccional Ligero de cañón compacto con calidad de transmisión\r\nUltraligero (solo 89 gramos)','imgServer/663defd0d921e_1709-rode-videomic-go-ii-microfono-direccional-ligero-removebg-preview.png',99.00,7,'2024-05-10',1),(160,'Micrófono HyperX SoloCast ','Micrófono HyperX SoloCast 1263 microfono de condensador usb blanco','imgServer/663df067efaff_1263-hyperx-solocast-microfono-de-condensador-usb-blanco-removebg-preview.png',99.00,7,'2024-05-10',1),(161,'Micrófono Rode NT1','Rode NT1 Signature Micrófono de Condensador de Estudio Negro, es un potente micrófono de condensador de estudio con un carácter cálido y sedoso','imgServer/663df1a7dda04_1943-rode-nt1-signature-microfono-de-condensador-de-estudio-negro-removebg-preview.png',220.00,7,'2024-05-10',1),(162,'TV LG 27TQ615S-WZ','TV LG 27TQ615S-WZ 27\" LED FullHD SmartTV,IPS Full HD LED con Profundidad de Color: 16.7M Millones de Colores.\r\nSmart TV fácil, intuitivo y con Inteligencia Artificial\r\nWiFi Integrado y Miracast para ver la pantalla de tu móvil en el TV\r\nSintonizador: DVB-','imgServer/663df26977c60_1695-lg-27tq615s-wz-27-led-fullhd-smarttv-removebg-preview.png',186.00,3,'2024-05-10',1),(164,'Samsung TU75CU8500KXXC 75\" LED UltraHD 4K HDR10+','Samsung TU75CU8500KXXC 75\" Procesador Crystal UHD: Imágenes reales con colore más puros y naturales gracias a la tecnología Dynamic Crystal Color.\r\nQ-Symphony:','imgServer/663df3f5add84_296-samsung-tu75cu8500kxxc-75-led-ultrahd-4k-hdr10-removebg-preview.png',1385.00,3,'2024-05-10',1),(165,'samsung-galaxy-a34-5g','samsung-galaxy a34 5g 8 256gb violeta libre protector pantalla','imgServer/663e0944c8b11_189-samsung-galaxy-a34-5g-8-256gb-violeta-libre-protector-pantalla-removebg-preview.png',167.00,2,'2024-05-10',1),(166,'Xiaomi-redmi-note-12','Xiaomi redmi note 12 5g 4 128gb azul libre','imgServer/663e0a0c6be39_1151-xiaomi-redmi-note-12-5g-4-128gb-azul-libre-removebg-preview.png',220.00,2,'2024-05-10',1),(167,'TCL 30E 3/64GB','TCL 30E 3/64GB 1840-tcl-30e-3-64gb-gris-libre','imgServer/663e0b0a25a14_1840-tcl-30e-3-64gb-gris-libre.png',112.00,2,'2024-05-10',1),(175,'Pc Sobremesa Gaming amd ryzen 7','Pc Sobremesa Gaming amd ryzen 7 1192 5800x 32gb 2tb ssd rtx 4060 windows 11 home','imgServer/664bae23d8b23_1192-pccom-ready-amd-ryzen-7-5800x-32gb-2tb-ssd-rtx-4060-windows-11-home-removebg-preview.png',599.00,4,'2024-05-20',1),(176,'Pc Gaming blanco','Pc Gaming blanco 1195 ready amd ryzen 5 5600x 16gb 1tb ssd rtx 3060 ','imgServer/664baef3e22aa_1195-pccom-ready-amd-ryzen-5-5600x-16gb-1tb-ssd-rtx-3060-blanco-especificaciones-removebg-preview.png',655.00,4,'2024-05-20',1),(178,'Pc Sobremesa Ryzen 5','Pc Sobremesa Ryzen 51654 pcm defender amd ryzen 5 5500 32gb 1tb ssd gtx 1650 ','imgServer/665399efe230f_1654-pcm-defender-amd-ryzen-5-5500-32gb-1tb-ssd-gtx-1650-removebg-preview.png',635.00,4,'2024-05-26',1),(179,'Pc Gaming ryzen 5 5600g','Pc Gaming ryzen 1242 racing amd 5600g 16gb 1tb 480gb ssd ','imgServer/66539a7e6e435_1242-pc-racing-amd-ryzen-5-5600g-16gb-1tb-480gb-ssd-mejor-precio-removebg-preview.png',459.00,4,'2024-05-26',1),(180,'Pc de sobremesa Gaming intel i5','Pc de sobremesa Gaming intel i51578 pcvip rainbow 10400f 16gb 1tb ssd rtx 3050','imgServer/66539b1764469_1578-pcvip-rainbow-intel-core-i5-10400f-16gb-1tb-ssd-rtx-3050-removebg-preview.png',620.00,4,'2024-05-26',1),(181,'Mini Pc amd ryzen 7','Mini Pc amd-ryzen-7 1762 ouvis f1k 7735hs 16gb 1tb ssd','imgServer/66539bca741af_1762-ouvis-f1k-mini-pc-amd-ryzen-7-7735hs-16gb-1tb-ssd-removebg-preview.png',568.00,4,'2024-05-26',1),(182,'Portatil MSI Gaming Titan	','Portatil MSI Gaming Titan 2790 18 hx a14vhg 008fr intel core i9 14900hx 64gb 2tb ssd rtx 4080 18 fr','imgServer/66539e114df06_2790-msi-titan-18-hx-a14vhg-008fr-intel-core-i9-14900hx-64gb-2tb-ssd-rtx-4080-18-fr-comprar-removebg-preview.png',4498.00,1,'2024-05-26',1),(183,'PC Portatil Gaming MSI gl75 Leopard','PC Portatil Gaming MSI gl75 Leopard 10sfk 060xes intel core i7 9750h 16gb 1tb ssd rtx 2070 173','imgServer/66539d9350868_msi-gl75-leopard-10sfk-060xes-intel-core-i7-9750h-16gb-1tb-ssd-rtx-2070-173-removebg-preview.png',1799.00,1,'2024-05-26',1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Usuario Normal'),(2,'Administrador');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) NOT NULL,
  `clave` varchar(120) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `nombre` varchar(60) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `rol_id` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `rol_id` (`rol_id`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (26,'admin','$2y$10$8DsdbKd5BGE4FoKNnOZ1MOM.puua7kCYSQyG/NLEo7YuSBuno4g5y',1,'admin','admin','admin@admin','45345345','sfsdfsd',2),(33,'pruebas','$2y$10$HG9MQwhIeMmFLXXU9V.AW.8pjyrbNFoxD4S9GwpV7pwj/gWN6txAq',1,'pruebas','pruebas2','pruebas@pruebas','23423423','sdfdfs',1),(54,'Pruebas5','$2y$10$DgzZhLkmgX69rEn1Y0sHjOErT5IezUXLWRH.jhgqBGNAiROBEVOGe',1,'pruebas5','pruebas5','pruebas5@pruebas5','963222123','pruebas y testeo 5',1),(55,'Pruebas4','$2y$10$95jD2Ctfc.ETpAj/PIUIfO36.WQcb/5S2SXT1a.qMzGN9Xef7adwa',1,'pruebas4','pruebas4','pruebas4@pruebas4','963222123','pruebas y testeo 4',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-29 20:11:40
