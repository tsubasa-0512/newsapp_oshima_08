-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-04-09 08:29:31
-- サーバのバージョン： 10.4.18-MariaDB
-- PHP のバージョン: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `news`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `tag`) VALUES
(12, 'NFTはアーティストとミュージシャンだけでなくマネーロンダリングの分野でも注目を浴びる', 'https://jp.techcrunch.com/https://jp.techcrunch.com/2021/04/03/2021-03-24-nft_users/', 'NFT'),
(13, 'VRの力を借りて人工網膜が進歩、人体臨床試験に向けて開発が進む', 'https://jp.techcrunch.com/https://jp.techcrunch.com/2021/04/03/2021-03-18-quest-for-prosthetic-retinas-progresses-towards-human-trials-with-a-vr-assist/', '医療DX'),
(14, '【コラム】投資家とビジネスリーダーが今こそ導入すべきもの、それはコーチング', 'https://jp.techcrunch.com/https://jp.techcrunch.com/2021/04/04/2021-03-25-investors-and-business-leaders-its-time-to-take-coaching-mainstream/', 'コーチング'),
(15, 'Rettyが飲食店のDX支援へ「Retty Order」ローンチ、顧客のスマホから店内注文', 'https://signal.diamond.jp/articles/-/656', '飲食DX'),
(16, 'Clubhouseが投げ銭機能「Payments」を発表──クリエイターの収益化に貢献', 'https://signal.diamond.jp/articles/-/668', '音声SNS');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
