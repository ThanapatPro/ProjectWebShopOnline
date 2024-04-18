-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 01:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `config_shop`
--

CREATE TABLE `config_shop` (
  `shopid` int(3) NOT NULL,
  `shopname` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `config_shop`
--

INSERT INTO `config_shop` (`shopid`, `shopname`) VALUES
(1, 'Core-It');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mb_id` int(5) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสมาชิก',
  `mb_fname` varchar(30) NOT NULL COMMENT 'ชื่อสมาชิก',
  `mb_lname` varchar(30) NOT NULL COMMENT 'นาสกุล',
  `mb_email` varchar(30) NOT NULL COMMENT 'อีเมล',
  `username` varchar(10) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `password` varchar(10) NOT NULL COMMENT 'รหัสผ่าน',
  `mb_status` int(1) DEFAULT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mb_id`, `mb_fname`, `mb_lname`, `mb_email`, `username`, `password`, `mb_status`) VALUES
(00004, 'admin', 'admin', 'admin@gmail.com', 'admin', 'admin', 1),
(00005, 'user', 'user', 'user@gmail.com', 'user', 'user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL COMMENT 'ลำดับ',
  `orderID` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสินค้า',
  `orderPrice` float NOT NULL COMMENT 'ราคาสินค้า',
  `orderQty` int(11) NOT NULL COMMENT 'จำนวนที่สั่งซื้อ',
  `Total` float NOT NULL COMMENT 'ราคารวม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `orderID`, `pro_id`, `orderPrice`, `orderQty`, `Total`) VALUES
(1, 0000000001, 000024, 11900, 2, 23800),
(2, 0000000001, 000029, 10500, 1, 10500),
(3, 0000000001, 000027, 990, 1, 990),
(4, 0000000001, 000019, 4990, 2, 9980),
(5, 0000000001, 000008, 4690, 1, 4690),
(6, 0000000001, 000011, 1590, 1, 1590),
(7, 0000000002, 000032, 5590, 1, 5590),
(8, 0000000002, 000025, 1350, 1, 1350),
(9, 0000000002, 000023, 14900, 1, 14900),
(10, 0000000002, 000022, 15400, 2, 30800),
(11, 0000000003, 000031, 6290, 1, 6290);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสินค้า',
  `pro_name` varchar(100) NOT NULL COMMENT 'ชื่อสินค้า',
  `pro_detail` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ข้อมูลสินค้า',
  `type_id` int(3) NOT NULL COMMENT 'รหัสประเภทสินค้า',
  `pro_price` float NOT NULL COMMENT 'ราคา',
  `pro_amount` int(11) NOT NULL COMMENT 'จำนวนคงเหลือ',
  `pro_image` varchar(100) NOT NULL COMMENT 'รูปภาพ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_detail`, `type_id`, `pro_price`, `pro_amount`, `pro_image`) VALUES
(000001, 'AMD RYZEN 5 4600G 3.7 GHz (SOCKET AM4)', 'ModelRyzen 5 BrandAMD Specification SocketAM4 (4000 G-Series - Renoir) CPU Core / Thread6 Cores / 12 Threads Frequency3.7 GHz Turbo4.2 GHz Integrated GraphicsAMD Radeon Graphics CPU Bus- ArchitectureTSMC 7nm FinFET Cache L23 MB Cache L38 MB TDP65 W CPU Cooler', 1, 3650, 50, 'product_644007f66c4c6.png'),
(000002, 'AMD RYZEN 7 5800X3D 3.4 GHz (SOCKET AM4)', 'ModelRyzen 7 BrandAMD Specification SocketAM4 (5000 Series - Vermeer) CPU Core / Thread8 Cores / 16 Threads Frequency3.4 GHz Turbo4.5 GHz Integrated Graphics CPU Bus- Architecture7 nm Cache L24 MB Cache L396 MB TDP105 W CPU Cooler', 1, 12200, 50, 'product_644008312dd34.png'),
(000003, 'AMDAMD RYZEN 7 5700X 3.4 GHz (SOCKET AM4)', 'SocketAMModelRyzen 7 BrandAMD Specification SocketAM4 (5000 Series - Vermeer) CPU Core / Thread8 Cores / 16 Threads Frequency3.4 GHz Turbo4.6 GHz Integrated Graphics CPU Bus- Architecture7 nm Cache L24 MB Cache L332 MB TDP65 W CPU Cooler', 1, 8990, 50, 'product_6440018042889.png'),
(000006, '32GB (16GBx2) DDR4 3200MHz RAM KINGSTON FURY BEAST DDR4 RGB SPECIAL EDITION (WHITE) (KF432C16BWAK2/3', 'Latency16-20-20 Number Of DIMMs2 DIMM(s) Capacity Per DIMM16 GB Total Capacity32 GB Speed3200 (OC) MHz TypeDDR4', 2, 4990, 50, 'product_6440030aae29b.png'),
(000007, '32GB (16GBx2) DDR4 3600MHz RAM KINGSTON FURY BEAST DDR4 RGB (BLACK) (KF436C18BBAK2/32)', 'Latency8-22-22 Number Of DIMMs2 DIMM(s) Capacity Per DIMM16 GB Total Capacity32 GB Speed3600 (OC) MHz TypeDDR4', 2, 3990, 50, 'product_64400364cac77.png'),
(000008, '32GB (16GBx2) DDR4 3600MHz RAM CORSAIR VENGEANCE RGB PRO SL (BLACK) (CMH32GX4M2D3600C18)', 'Latency18-22-22-42 Number Of DIMMs2 DIMM(s) Capacity Per DIMM16 GB Total Capacity32 GB Speed3600 MHz TypeDDR4', 2, 4690, 49, 'product_644003d9e010c.png'),
(000010, 'GAMDIAS AURA GC3 (BLACK) (ATX)', 'Power Supply ในตัว- Cooling Fan• Pre-installed Fan  - Rear : 120 mm ARGB x 1 — • Fan Support  - Front : 120 mm x 3 or 140 mm x 2  - Rear : 120 mm x 1  - Top : 120 mm x 2 — • Radiator Support  - Front : 120 mm or 240 mm  - Rea', 3, 1690, 50, 'product_6440051c48926.png'),
(000011, 'GAMDIAS TALOS E3 MESH WH (SNOWY WHITE) (ATX)', 'Power Supply ในตัว- Cooling Fan• Pre-installed Fan  - Front : 120 mm ARGB x 2  - Rear : 120 mm ARGB x 1 — • Fan Support  - Front : 120 mm x 2 or 140 mm x 2  - Rear : 120 mm x 1  - Top : 120 mm x 2 — • Radiator Support  - Fron', 3, 1590, 49, 'product_6440055d1fa3d.png'),
(000012, 'ZALMAN N4 REV.1 (BLACK) (ATX)', 'Power Supply ในตัว- Cooling FanPre-installed Fan • Front : 140 mm RGB x 3 • Rear : 120 mm RGB x 1 • Top : 120 mm RGB x 2 — Fan Support • Front : 120 mm x 3 or 140 mm x 3 or 180 mm x 2 • Rear : 120 mm x 1 • Top : 120 mm x 2 • ', 3, 1490, 50, 'product_644005c011363.png'),
(000014, 'GIGABYTE B550M AORUS ELITE (REV. 1.2) (SOCKET AM4) (MICRO-ATX)', 'randGigabyte ModelB550M AORUS ELITE (rev. 1.2) CPU SocketAM4 (3000 Series - Matisse) , AM4 (4000 G-Series - Renoir) , AM4 (4000 Series - Renoir) , AM4 (5000 G-Series - Cezanne) , AM4 (5000 Series - Vermeer) Wattage150W ChipsetB550 SeriesRyzen 3 , Ryzen 5 , Ryzen 7 , Ryzen 9 Memory Slot4 Memory TypeDDR4 Max. Capacity128 GB Speed2133 , 2400 , 2666 , 2933 , 3200 , 3200 (OC) , 3400 (OC) , 3466 (OC) , 3600 (OC) , 3733 (OC) , 3866 (OC) , 4000 (OC) , 4133 (OC) , 4266 (OC) , 4400 (OC) , 4600 (OC) , 4733 (OC) Graphic & Audio GraphicIntegrated Graphics Processor (Depends on CPU) AudioRealtek 2/4/5.1/7.1-channel Storage SATA 2- Port SATA 34 Port RAID0, 1, 10 M.22 x M.2 Slot(s) — • 1 x M.2 connector (M2A_CPU), integrated in the CPU, supporting Socket 3, M key, type 2242/2260/2280/22110 SSDs: AMD Ryzen™ 5000 Series and Ryzen™ 3000 Series Processors support SATA and PCIe 4.0 x4/x2 SSDs AMD Ryzen™ Ryzen™ 5000 G-Series and Ryzen™ 4000 G-Series Processors support SATA and PCIe 3.0 x4/x2 SSDs — • 1 x M.', 5, 3990, 50, 'product_6440098cca9ac.png'),
(000015, 'MSI PRO B550M-P GEN3 (SOCKET AM4) (MICRO-ATX)', 'BrandMSI ModelPRO B550M-P GEN3 CPU SocketAM4 (3000 Series - Matisse) , AM4 (4000 G-Series - Renoir) , AM4 (4000 Series - Renoir) , AM4 (5000 G-Series - Cezanne) , AM4 (5000 Series - Vermeer) Wattage105W ChipsetB550 SeriesRyzen 3 , Ryzen 5 , Ryzen 7 , Ryzen 9 Memory Slot4 Memory TypeDDR4 Max. Capacity128 GB Speed1866 , 2133 , 2400 , 2666 , 2800 , 2933 , 3000 , 3000 (OC) , 3066 , 3066(OC) , 3200 , 3200 (OC) , 3466 (OC) , 3600 (OC) , 3733 (OC) , 3866 (OC) , 4000 (OC) , 4133 (OC) , 4266 (OC) , 4400 (OC) Graphic & Audio GraphicIntegrated Graphics Processor (Depends on CPU) AudioRealtek ALC897 7.1-Channel High Definition Audio Storage SATA 2- Port SATA 34 Port RAIDRAID 0, 1, 10 for SATA Storage Devices M.21 x M.2 slot (Key M) — M2_1 slot (From CPU) Supports PCIe 3.0 x4 Supports SATA 6Gb/s Supports 2242/ 2260/ 2280 storage devices Port Expansion Slots DetailsNo Slot1 x PCIe 3.0 x16 Slot , 2 x PCIe 3.0 x1 Slots Network LANRealtek RTL8111H LAN Speed10/100/1000 Mbps WirelessNo Back Panel I/O Por', 5, 3890, 50, 'product_644009c9b69da.png'),
(000016, 'AM4 ASROCK B550M STEEL LEGEND', 'BrandASRock ModelB550M Steel Legend CPU SocketAM4 (3000 G-Series - Picasso) , AM4 (3000 Series - Matisse) , AM4 (4000 G-Series - Renoir) , AM4 (4000 Series - Renoir) , AM4 (5000 G-Series - Cezanne) , AM4 (5000 Series - Vermeer) Wattage105W ChipsetB550 SeriesRyzen 3 , Ryzen 5 , Ryzen 7 , Ryzen 9 Memory Slot4 Memory TypeDDR4 Max. Capacity128 GB Speed2133 , 2400 , 2666 , 2933 , 2933 (OC) , 3200 , 3200 (OC) , 3466 (OC) , 3600 (OC) , 3733 (OC) , 3800 (OC) , 3866 (OC) , 4000 (OC) , 4133 (OC) , 4200 (OC) , 4266 (OC) , 4333 (OC) , 4400 (OC) , 4466 (OC) , 4533 (OC) Graphic & Audio GraphicIntegrated Graphics Processor (Depends on CPU) AudioRealtek ALC1200 7.1 CH HD Audio Storage SATA 2- Port SATA 36 Port RAID0/1/10 M.22 (1 x PCIe, 1x PCIe & SATA) Port Expansion Slots DetailsNo Slot1 x PCIe 3.0 x1 Slot , 2 x PCIe 4.0 x16 Slot Network LANDragon RTL8125BG LAN Speed10/100/1000/2500 Mbps WirelessNo Back Panel I/O Ports USB 2.02 Port USB 3.0- Port USB 3.1- Port Serial- Port USB 3.21 x USB 3.2 Gen2 Typ', 5, 4490, 50, 'product_64400a0f0fa0a.png'),
(000018, 'WD BLUE SA510 - 2.5\" SATA3 (WDS500G3B0A)', 'ModelBlue BrandWD Specification Random Write (Up To)82,000 IOPS Random Read (Up To)90,000 IOPS Sequential Write (Up To)510 MB/s Sequential Read (Up To)560 MB/s Technology- ขนาด SSD2.5 inch ความจุ500.00 GB Interface Connector InterfaceSATA 3.0 (6 Gb/s)', 12, 1790, 50, 'product_64400b811d5e5.png'),
(000019, 'HIKSEMI FUTURE CONSUMER SSD - PCIe 4x4/NVMe M.2 2280 (HS-SSD-FUTURE 2048G)', 'ModelFUTURE Consumer SSD BrandHiksemi Specification Random Write (Up To)690,000 IOPS Random Read (Up To)860,000 IOPS Sequential Write (Up To)6,750 MB/s Sequential Read (Up To)7,450 MB/s Technology3D TLC ขนาด SSD22 x 80 mm ความจุ2.00 TB Interface Connector InterfacePCIe 4.0 Warranty การรับประกัน5 Years', 12, 4990, 48, 'product_64400bde3ddfb.png'),
(000020, 'MSI SPATIUM M371 - PCIe 3/NVMe M.2 2280', 'Model ModelSPATIUM M371 NVMe M.2 BrandMSI Specification Random Write (Up To)200,000 IOPS Random Read (Up To)60,000 IOPS Sequential Write (Up To)1,150 MB/s Sequential Read (Up To)2,200 MB/s Technology3D NAND ขนาด SSD22 x 80 mm ความจุ500.00 GB Interface Connector InterfacePCIe 3.0 Warranty การรับประกัน5 Years', 12, 1290, 50, 'product_64400c12bf3f8.png'),
(000022, 'POWERCOLOR HELLHOUND SAKURA AMD RADEON RX 6650 XT 8GB GDDR6 (AXRX 6650 XT 8GBD6-3DHLV3/OC)', 'Model BrandPower Color ModelHellhound Sakura AMD Radeon™ RX 6650 XT 8GB GDDR6 Specification Slot1 x PCIe 4.0 x16 Slot ChipsetAMD SeriesAMD Radeon RX 6000 Series GPU ModelRadeon RX 6650 XT ความเร็ว GPU2410 - 2689 MHz ความเร็ว RAM17.5 Gbps ขนาดความจุ RAM8 GB ชนิดของ RAMGDDR6 CUDA Core / Compute Units / Stream Processor2048 Length232 mm Width150 mm Height45 mm General Bus Width128 bit ความละเอียดสูงสุด7680 x 4320 DirectX12 รองรับ Cross Fire/SLINo Port Connector DVI Port- Port HDMI Port1 (Version 2.1) Port Display Port3 (Version 1.4) Port Option Port- Port Power Requirement อัตราการกินไฟ≈ 180 W Need Power Supply600 W Power Connectors1 x 8 Pin Warranty การรับประกัน3 Years', 8, 15400, 48, 'product_64400cebb450e.png'),
(000023, 'INNO3D GEFORCE RTX 2060 TWIN X2 - 6GB GDDR6 (N20602-06D6-1710VA15L)', 'Model BrandInno3D ModelGEFORCE RTX 2060 TWIN X2 Specification Slot1 x PCIe 3.0 x16 Slot ChipsetNVIDIA SeriesNVIDIA GeForce 20 Series GPU ModelGeForce RTX 2060 ความเร็ว GPUBoost Clock (MHz): 1680 MHz ความเร็ว RAM14 Gbps ขนาดความจุ RAM6 GB ชนิดของ RAMGDDR6 CUDA Core / Compute Units / Stream Processor1920 Length220 mm Width113 mm Height40 mm General Bus Width192 bit ความละเอียดสูงสุด7680 x 4320 DirectX12 รองรับ Cross Fire/SLIN/A Port Connector DVI Port- Port HDMI Port1 (Version 2.0) Port Display Port3 (Version 1.4) Port Option Port- Port Power Requirement อัตราการกินไฟ160 W Need Power Supply500 W Power Connectors1 x 8 Pin Warranty การรับประกัน3 Years', 8, 14900, 49, 'product_64400d2d8663e.png'),
(000024, 'ASUS DUAL GEFORCE RTX 3060 WHITE OC EDITION 8GB GDDR6', 'Model BrandAsus ModelDual GeForce RTX 3060 White OC Edition 8GB GDDR6 Specification Slot1 x PCIe 4.0 x16 Slot ChipsetNVIDIA SeriesNVIDIA GeForce 30 Series GPU ModelGeForce RTX 3060 ความเร็ว GPUDefault Mode : 1837 MHz OC Mode : 1867 MHz ความเร็ว RAM15 Gbps ขนาดความจุ RAM8 GB ชนิดของ RAMGDDR6 CUDA Core / Compute Units / Stream Processor3584 Length200 mm Width123 mm Height38 mm General Bus Width128 bit ความละเอียดสูงสุด7680 x 4320 DirectX12 รองรับ Cross Fire/SLINo Port Connector DVI Port- Port HDMI Port1 (Version 2.1) Port Display Port3 (Version 1.4a) Port Option Port- Port Power Requirement อัตราการกินไฟ≈ 170 W Need Power Supply650 W Power Connectors1 x 8 Pin Warranty การรับประกัน3 Years', 8, 11900, 48, 'product_64400d6d63f8b.png'),
(000025, 'ANTEC ATOM V650 - 650W (BLACK) (ATX)', 'Model ModelATOM V650 BrandAntec Specification ขนาด150 x 86 x 140 mm รองรับไฟขาเข้า200 - 230 VAC ระบบป้องกันไฟเกินOVP, OPP, SCP, NLO มาตราฐานรับรอง- สามารถถอดสายได้NON Modular Floppy Connector1 Molex Connector2 Sata Connector5 PCI Ex Connector2 x 6+2 Pin CPU Connector1 x 4+4 Pin Mainboard Connector1 x 24 Pin Power Factor Correction- Fan Size120 mm กำลังไฟสูงสุด650 W Warranty การรับประกัน2 Years', 7, 1350, 49, 'product_64400dd23c49e.png'),
(000027, 'GAMDIAS AURA GP550 - 550W (BLACK) (ATX)', 'Model ModelAura GP550 BrandGamdias Specification ขนาด- mm รองรับไฟขาเข้า230 VAC ระบบป้องกันไฟเกิน- มาตราฐานรับรอง- สามารถถอดสายได้NON Modular Floppy Connector1 Molex Connector2 Sata Connector5 PCI Ex Connector2 x 6+2 Pin CPU Connector1 x 4+4 Pin Mainboard Connector1 x 20+4 Pin Power Factor Correction- Fan Size120 mm กำลังไฟสูงสุด550 W Warranty การรับประกัน2 Years', 7, 990, 49, 'product_64400f201fad2.png'),
(000028, 'DEEPCOOL PF450 - 450W 80 PLUS (ATX)', 'Model ModelPF450 BrandDeepCool Specification ขนาด150 x 86 x 140 mm รองรับไฟขาเข้า230 VAC ระบบป้องกันไฟเกินOPP/OVP/SCP มาตราฐานรับรอง80 Plus สามารถถอดสายได้NON Modular Floppy Connector Molex Connector2 Sata Connector6 PCI Ex Connector2 x 6+2 Pin CPU Connector1 x 4+4 Pin Mainboard Connector1 x 20+4 Pin Power Factor CorrectionActive PFC Fan Size120 mm กำลังไฟสูงสุด450 W Warranty การรับประกัน3 Years', 7, 990, 50, 'product_64400f5ba7247.png'),
(000029, 'CREATIVE SOUND BLASTER X AE-9 METALLIC (GRAY)', 'Specification การรับประกัน1 Year Compatible Operating SystemsMicrosoft Windows 10 32 / 64 bit, Windows 8.1/8.0 32 / 64 bit, Windows 7 32 / 64 bit On Board ConnectorsLine Out 1 x 1/8 Number Channel SignalN/A Technical SpecificationsCleanLine Technology Type CardPCI Express', 9, 10500, 49, 'product_64401025b4319.png'),
(000031, 'CREATIVE SOUND BLASTER X AE-7 (BLACK)', 'Specification การรับประกัน1 Year Compatible Operating SystemsWindows® 10 , 32bit/64bit Windows® 8.1 , 32bit/64bit Windows® 7 , 32bit/64bit On Board ConnectorsAnalog Output 5 x 3.5 mm jack Number Channel SignalN/A Technical SpecificationsN/A Type CardPCI Express', 9, 6290, 49, 'product_64401217894c8.png'),
(000032, 'CREATIVE SOUND BLASTER GC7', 'Specification การรับประกัน1 Year Compatible Operating SystemsWindows 7 / 8 / 8.1 / 10 Mac OS X v10.8 and above On Board Connectors1 x 1/8″ Ext. Mic-in Jack 1 x 1/8″ Line In / Mobile 1 x 1/8″ Line Out 1 x 1/8″ 4-Pole Combo Jack 1 x SPDIF In 1 x SPDIF Out 1 x Type-C port for PC / Mac / Consoles Number Channel SignalStereo Technical SpecificationsDynamic Range (DNR) : 116 dB Audio Technology : SB-Axx1™, Super X-Fi Ultra DSP Max. Playback Quality • DSP Mode: PCM 16 / 24-bit 48.0, 96.0kHz, 192 kHz • SPDIF Output: PCM 16 / 24-bit, 48.0 kHz Type CardUSB DAC / Amp', 9, 5590, 49, 'product_6440143536eac.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `orderID` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `cus_name` varchar(60) NOT NULL COMMENT 'ชื่อ-สกุล',
  `address` text NOT NULL COMMENT 'ที่อยู่จัดส่ง',
  `phone` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `total_price` float NOT NULL COMMENT 'ราคารวมสุทธิ',
  `order_status` varchar(1) NOT NULL COMMENT '1=รอชำระเงิน 2=ชำระเงิน',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่สั่งซื้อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`orderID`, `cus_name`, `address`, `phone`, `total_price`, `order_status`, `reg_date`) VALUES
(0000000001, 'นายสายัณห์ จันทร์ภูธร', '99 ม.9 ต.99 อ.99 จ.99 90110', '0999999999', 51550, '2', '2023-04-19 16:25:08'),
(0000000002, 'นายสายัณห์ จันทร์ภูธร Vr.1', '777 ม.7 ต.7 อ.7 จ.7 90110 ', '0777777777', 52640, '1', '2023-04-19 16:28:33'),
(0000000003, 'ธนภัทร พรหมสุทธิ์', '9 ซอย 3', '0923436581', 6290, '1', '2023-04-19 21:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `type_p`
--

CREATE TABLE `type_p` (
  `type_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสประเภทสินค้า',
  `type_name` varchar(50) NOT NULL COMMENT 'ชื่อประเภทสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_p`
--

INSERT INTO `type_p` (`type_id`, `type_name`) VALUES
(001, 'CPU'),
(002, 'Ram for PC'),
(003, 'Case'),
(005, 'Mainboard'),
(007, 'Power Supply'),
(008, 'Graphic Card (VGA)'),
(009, 'Sound Card'),
(012, 'Solid State Drive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config_shop`
--
ALTER TABLE `config_shop`
  ADD PRIMARY KEY (`shopid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mb_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `type_p`
--
ALTER TABLE `type_p`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config_shop`
--
ALTER TABLE `config_shop`
  MODIFY `shopid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mb_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสสมาชิก', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับ', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `orderID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'เลขที่ใบสั่งซื้อ', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type_p`
--
ALTER TABLE `type_p`
  MODIFY `type_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทสินค้า', AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
