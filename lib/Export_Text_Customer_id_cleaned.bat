echo off
C:
cd \Data
echo user crmusrdb crm@9988 > putText_Customer_id_cleaned.bat
echo cd  /oradata/crmusrdb/data >> putText_Customer_id_cleaned.bat
echo asc
echo mput CUSTOMER_ID_CLEANED.txt >> putText_Customer_id_cleaned.bat

echo quit >> putText_Customer_id_cleaned.bat

ftp -inv 172.26.2.33 < putText_Customer_id_cleaned.bat
echo on