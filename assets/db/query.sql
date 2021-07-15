SELECT tbmhs.nama, tbspp.* FROM tbmhs JOIN tbspp 
ON tbmhs.nim = tbspp.nim
WHERE LEFT(tgl_byr1,10) BETWEEN '2019-03-23' AND '2019-04-25' OR
(LEFT(tgl_byr2,10) BETWEEN '2019-03-23' AND '2019-04-25') ORDER BY tgl_byr2 ASC;

SELECT SUM(pembayaran1) AS totol1 FROM tbspp WHERE LEFT(tgl_byr1,10) BETWEEN '01-12-2018' AND '2019-04-25';

SELECT SUM(pembayaran1) AS total1 FROM tbspp WHERE LEFT(tgl_byr1,10) BETWEEN '01-12-2018' AND '2019-04-25';

SELECT * FROM tbspp; 
SELECT id_spp, nim, semester, pembayaran1, pembayaran2,
IF (nim=nim, tgl_byr1,0, tgl_byr2,0) AS pembayaran FROM tbspp WHERE pembayaran;


SELECT tbmhs.nama, tbspp.* FROM tbmhs JOIN tbspp ON tbmhs.nim = tbspp.nim WHERE LEFT(tgl_byr1,10) 
BETWEEN '2019-03-23' AND '2019-04-25'

SELECT id_spp, nim, pembayaran1, tgl_byr1 FROM tbspp WHERE SUBSTRING(bank, 1, 3) = 'BPR'


(SELECT  tbspp.nim,tbmhs.nama, tbspp.semester, tbspp.pembayaran1, tbspp.tgl_byr1, SUBSTRING(tbspp.bank, 1, 3) AS bank1
FROM tbmhs JOIN tbspp ON tbmhs.nim = tbspp.nim WHERE (LEFT(tgl_byr1,10) 
BETWEEN '2019-05-16' AND '2019-05-16') AND SUBSTRING(bank, 1, 3) = 'BPR')
UNION
(SELECT  tbspp.nim,tbmhs.nama, tbspp.semester, tbspp.pembayaran2, tbspp.tgl_byr2, SUBSTRING(tbspp.bank, 5, 3) AS bank2
FROM tbmhs JOIN tbspp ON tbmhs.nim = tbspp.nim WHERE (LEFT(tgl_byr1,10) 
BETWEEN '2019-05-16' AND '2019-05-16') AND SUBSTRING(bank, 5, 3) = 'BRI')





(SELECT  tbspp.nim,tbmhs.nama, tbspp.semester, 
tbspp.pembayaran1 AS pembayaran, tbspp.tgl_byr1 AS tgl_byr, SUBSTRING(tbspp.bank, 1, 3) AS bank
FROM tbmhs JOIN tbspp ON tbmhs.nim = tbspp.nim WHERE LEFT(tgl_byr1,10) 
BETWEEN '2019-03-16' AND '2019-05-16')
UNION 
(SELECT  tbspp.nim,tbmhs.nama, tbspp.semester, tbspp.pembayaran2, tbspp.tgl_byr2, SUBSTRING(tbspp.bank, 5, 3)
FROM tbmhs JOIN tbspp ON tbmhs.nim = tbspp.nim WHERE LEFT(tgl_byr1,10) 
BETWEEN '2019-03-16' AND '2019-05-16') 
