const mysql = require('mysql');
mysql.config();
{
    host : '127.0.0.1',
    user : 'root',
    password : process.env.MYSQL_PW,
    database : 'database_name'
}