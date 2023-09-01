/*
 Navicat Premium Data Transfer

 Source Server         : local1
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : portal-berita

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 02/09/2023 03:44:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for master_berita
-- ----------------------------
DROP TABLE IF EXISTS `master_berita`;
CREATE TABLE `master_berita`  (
  `id_berita` int NOT NULL AUTO_INCREMENT,
  `judul_berita` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deskripsi_berita` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `gambar_berita` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_berita`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_berita
-- ----------------------------
INSERT INTO `master_berita` VALUES (13, 'ghibli', 'One Piece is a Japanese manga series written and illustrated by Eiichiro Oda,and i watch it', 'uploads/Hayao_Miyazaki_cropped_1_Hayao_Miyazaki_201211.jpg');
INSERT INTO `master_berita` VALUES (14, 'yusuf', 'oke siap mantap beneran coy', 'uploads/jkw2.png');
INSERT INTO `master_berita` VALUES (15, 'orang hutan pilihan bangsa', 'saya fajarunidin medana', 'uploads/fajar.png');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `role` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'dika@gmail.com', 'hansdika', '666', '1');
INSERT INTO `users` VALUES (2, 'fajar.ekasandiyuda@gmail.com', 'fajarsieka', '3k4', '1');
INSERT INTO `users` VALUES (3, 'fajar.gamer.id@gmail.com', 'coba', '123', '1');

SET FOREIGN_KEY_CHECKS = 1;
