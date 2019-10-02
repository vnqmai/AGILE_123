/*
 Navicat Premium Data Transfer

 Source Server         : mysqlFresco
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : 45.119.84.79:3306
 Source Schema         : agile

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 02/10/2019 21:10:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bill_detail
-- ----------------------------
DROP TABLE IF EXISTS `bill_detail`;
CREATE TABLE `bill_detail`  (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(10) NULL DEFAULT NULL,
  `productId` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `bill_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `del` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `bill_detail_fk0`(`bill_id`) USING BTREE,
  INDEX `bill_detail_product_id_fk`(`productId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bill_detail
-- ----------------------------
INSERT INTO `bill_detail` VALUES ('5d7f4a023734363868832a78', 4, '5d7f415f3734363868d42e70', '5d7f4a023734363868b0cf98', NULL, NULL, NULL);
INSERT INTO `bill_detail` VALUES ('5d7f6b486237380b44bd9922', 1, '5d7f50c66237380b4466220a', '5d7f6b486237380b44dcb406', NULL, NULL, NULL);
INSERT INTO `bill_detail` VALUES ('5d80a5466237380b443b8fa3', 3, '5d7f50c66237380b4466220a', '5d80a5466237380b44153bfd', NULL, NULL, NULL);
INSERT INTO `bill_detail` VALUES ('5d80a5466237380b44d5ac57', 3, '5d7f415f3734363868d42e70', '5d80a5466237380b44153bfd', NULL, NULL, NULL);
INSERT INTO `bill_detail` VALUES ('5d8b8ff06237380b448a4d7d', 1, '5d7f50c66237380b4466220a', '5d8b8ff06237380b44eaa2d6', NULL, NULL, NULL);
INSERT INTO `bill_detail` VALUES ('5d8c87c16237380b44965453', 1, '5d7f50c66237380b4466220a', '5d8c87c16237380b442b12e9', NULL, NULL, NULL);
INSERT INTO `bill_detail` VALUES ('5d8db5a46237380b445b1087', 1, '5d7f50c66237380b4466220a', '5d8db5a46237380b44babec5', NULL, NULL, 1);
INSERT INTO `bill_detail` VALUES ('5d8db5a46237380b44744a8e', 2, '5d7f415f3734363868d42e70', '5d8db5a46237380b44babec5', NULL, NULL, 1);
INSERT INTO `bill_detail` VALUES ('5d948d896237380b441cc234', 1, '5d7f50c66237380b4466220a', '5d948d896237380b44939a17', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for order_bill
-- ----------------------------
DROP TABLE IF EXISTS `order_bill`;
CREATE TABLE `order_bill`  (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `totalPrice` int(30) NULL DEFAULT NULL,
  `timestamp` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `userId` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `del` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_bill
-- ----------------------------
INSERT INTO `order_bill` VALUES ('5d7f4a023734363868b0cf98', 40000, '2019-09-16 15:38:26', '1', NULL, NULL, NULL);
INSERT INTO `order_bill` VALUES ('5d7f6b486237380b44dcb406', 10000, '2019-09-16 18:00:24', '1', NULL, NULL, NULL);
INSERT INTO `order_bill` VALUES ('5d80a5466237380b44153bfd', 345000, '2019-09-17 16:20:06', '1', NULL, NULL, NULL);
INSERT INTO `order_bill` VALUES ('5d8b8ff06237380b44eaa2d6', 15000, '2019-09-25 23:04:00', '1', NULL, NULL, NULL);
INSERT INTO `order_bill` VALUES ('5d8c87c16237380b442b12e9', 15000, '2019-09-26 16:41:21', '1', NULL, NULL, NULL);
INSERT INTO `order_bill` VALUES ('5d8db5a46237380b44babec5', 215000, '2019-09-27 14:09:24', '1', NULL, NULL, NULL);
INSERT INTO `order_bill` VALUES ('5d948d896237380b44939a17', 15000, '2019-10-02 18:44:09', '1', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `price` int(20) NOT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `del` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('5d7f415f3734363868d42e70', 'Mực chiên', 100000, '', '', NULL);
INSERT INTO `product` VALUES ('5d7f50c66237380b4466220a', 'bánh mì', 15000, '', '', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `lastName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `permissionId` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `storeId` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `del` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', '', '', '1', '1', NULL);

SET FOREIGN_KEY_CHECKS = 1;
