echo off
C:
cd \Data

echo user crmusrdb crm@9988 > getText_ECIF.bat
echo cd  /oradata/crmusrdb/export >> getText_ECIF.bat
echo asc
echo mget Export_tb_CIF_DAILY.txt >> getText_ECIF.bat

echo quit >> getText_ECIF.bat

ftp -inv 172.26.2.33 < getText_ECIF.bat
echo on