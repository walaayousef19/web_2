CREATE DATABASE IF NOT EXISTS testEvent;
use testEvent;
CREATE TABLE IF NOT EXISTS Events (
type varchar(100) NOT NULL,
target varchar(100) NOT NULL,
date varchar(100) NOT NULL
);
select * from Events;
TRUNCATE TABLE Events;